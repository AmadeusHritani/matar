<?php
/**
 * 2020 Zettle Prestashop Connector
 *  @author    : Zettle
 *  @copyright : 2020 Zettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : zettle.com
 *
 */

use IzettleApi\API\Purchase\Purchase;

class PurchaseImportAction extends IzettleAction
{

    protected function runInner($params)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }
        $purchaseBuilder = new \IzettleApi\Client\Purchase\PurchaseBuilder();

        //purchase data has to be created before running ImportAction
        //getProductList in this case return list of prepared purchases (undo_json field)
        $purchaseData = $this->task->getProductList();


        $counter = 1;
        $processed_counter = 0;
        foreach ($purchaseData as $purchaseTaskItem) {
            if (!$this->isKeepGoing()) {
                //stop running if cancelled or stopped
                return false;
            }

            if ($purchaseTaskItem['processed']) {
                $processed_counter++;
                continue;
            }

            $id_izettle_task_product = (int)$purchaseTaskItem['id_izettle_task_product'];
            $purchaseJson = $purchaseTaskItem['undo_json'];

            if (!$purchaseJson) {
                continue;
            }

            $zettle_purchase = $purchaseBuilder->buildFromJson($purchaseJson);

            if (!$zettle_purchase->getPurchaseUuid() || $zettle_purchase->getAmount() <= 0) {
                continue;
            }

            if (IzettleHelper::isPurchaseImported($zettle_purchase->getPurchaseUuid())) {
                continue;
            }


            $order_id = $this->createPrestashopOrder($zettle_purchase);
            if (!$order_id) {
                //stop running if order is not created
                return false;
            }

            $desc = $this->getPurchaseDescription($zettle_purchase, (int)$order_id);

            if ($this->is_archived) {
                $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task_product_history`
                            SET `processed` = 1, `desc` = \''.pSQL($desc).'\'
                            WHERE `id_izettle_task_product` = '.(int)$id_izettle_task_product;
            } else {
                $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task_product`
                            SET `processed` = 1, `desc` = \''.pSQL($desc).'\'
                            WHERE `id_izettle_task_product` = '.(int)$id_izettle_task_product;
            }
            Db::getInstance()->execute($sql);

            $this->refreshTask();
            $this->task->processed_count = $processed_counter + $counter++;
            $this->task->save();
        }

        return true;
    }


    private function getPurchaseDescription($zettle_purchase, $order_id)
    {
        $description = "Zettle PurchaseUUID ".$zettle_purchase->getPurchaseUuid()."; ";
        $description .= "Prestashop order_id ".((int)$order_id)."; ";
        $description .= "Total ".$zettle_purchase->getAmount().$zettle_purchase->getCurrency()."; ";
        $payments = $zettle_purchase->getPayments();
        if (count($payments)) {
            $payment = $payments[0];
            $description .= "Payment ".str_replace("IZETTLE_", "", $payment->getType())."; ";
        }
        $description .= "Products: ";
        foreach ($zettle_purchase->getProducts() as $zettleProduct) {
            $description .= "name ".$zettleProduct->getName().' '.$zettleProduct->getVariantName();
            $description .= " variantUUID ".$zettleProduct->getVariantUuid();
            $variant = IzettleVariant::getItemByUuid($zettleProduct->getVariantUuid());
            if ($variant) {
                $id_product_attribute = $variant->id_product_attribute ? $variant->id_product_attribute : null;
                $variant->id_product;
                $description .= ' (id_product='.$variant->id_product;
                if (!is_null($id_product_attribute)) {
                    $description .= ', id_product_attribute='.$id_product_attribute;
                }
                $description .= ')';
            } else {
                $description .= '(!!! the product has no association in PrestaShop !!!)';
            }

            $description .= " X".$zettleProduct->getQuantity();
            $description .= "; ";
        }
        return $description;
    }


    private function createPrestashopOrder(IzettleApi\API\Purchase\Purchase $zettle_purchase)
    {
        $return = false;
        $context = Context::getContext();

        $id_carrier = $this->module->getIdZettleCarrier();
        if (!$id_carrier) {
            $this->setTaskInfo('Zettle POS Carrier isn`t ready');
            return false;
        }
        $carrier = new Carrier($id_carrier);


        $id_order_state = $this->module->getIdZettleOrderState();
        if (!$id_order_state) {
            $this->setTaskInfo('order state for Zettle POS is wrong');
            return false;
        }
        //$order_status = new OrderState((int) $id_order_state, (int) $context->language->id);

        $customer = new Customer();
        $customer->email = $zettle_purchase->getPurchaseUuid().'@dummy.zettle.com';
        $customer->lastname = 'Zettle POS';
        $customer->firstname = "Customer";
        $customer->passwd = Tools::encrypt(Tools::passwdGen());
        $customer->active = 1;
        $customer->is_guest = 0;
        $customer->save();
        if (!$customer->id) {
            $this->setTaskInfo('cannot create customer');
            return false;
        }


        $id_currency = Currency::getIdByIsoCode($zettle_purchase->getCurrency());
        if (!$id_currency) {
            $this->setTaskInfo($zettle_purchase->getCurrency().' doesn`t  exist in PrestShop');
            return false;
        }
        $currency = new Currency((int)$id_currency, null, (int)$context->shop->id);

        $address = new Address();
        $address->alias = 'Zettle POS';
        $address->id_country =
            Configuration::get('PS_SHOP_COUNTRY_ID')
                ? Configuration::get('PS_SHOP_COUNTRY_ID')
                : Configuration::get('PS_COUNTRY_DEFAULT');

        $address->lastname = $customer->lastname;
        $address->firstname = $customer->firstname;
        $address->address1 =
            Configuration::get('PS_SHOP_ADDR1')
                ? Configuration::get('PS_SHOP_ADDR1')
                : "Zettle POS";

        $address->city =
            Configuration::get('PS_SHOP_CITY')
                ? Configuration::get('PS_SHOP_CITY')
                : "Zettle POS";

        if (Country::containsStates($address->id_country)) {
            $id_state = Configuration::get('PS_SHOP_STATE_ID');
            if ($id_state) {
                $address->id_state = $id_state;
            } else {
                $states = State::getStates($address->id_country);
                $address->id_state = $states[0]['id_state'];
            }
        }
        $postcode = Configuration::get('PS_SHOP_CODE');
        if (!$postcode) {
            $postcode = Country::getZipCodeFormat($address->id_country);
            $postcode = str_replace('N', '1', $postcode);
        }
        $address->postcode = $postcode;
        $address->phone = Configuration::get('PS_SHOP_PHONE');
        $address->id_customer = $customer->id;
        $address->save();

        $total_product = 0;
        $products = array();
        $unsynced_products = array();
        foreach ($zettle_purchase->getProducts() as $zettleProduct) {
            $variant = IzettleVariant::getItemByUuid($zettleProduct->getVariantUuid());
            if ($variant) {
                $id_product_attribute = $variant->id_product_attribute ? $variant->id_product_attribute : null;
                $key = $variant->id_product."_".$variant->id_product_attribute;
                $products[$key] = array(
                    'id_product'           => $variant->id_product,
                    'id_product_attribute' => $id_product_attribute,
                    'name'                 => $zettleProduct->getName(),
                    'unit_price'           => $zettleProduct->getUnitPrice(),
                    'paid_qty'             => $zettleProduct->getQuantity(),
                    'discount'             => $zettleProduct->getDiscount(),
                    'qty_before'           => Product::getQuantity($variant->id_product, $id_product_attribute)
                );
            } else {
                $unsynced_products[] = array(
                    'variant_uuid' => $zettleProduct->getVariantUuid(),
                    'name'         => $zettleProduct->getName(),
                    'variant_name' => $zettleProduct->getVariantName(),
                    'unit_price'   => $zettleProduct->getUnitPrice(),
                    'paid_qty'     => $zettleProduct->getQuantity(),
                    'discount'     => $zettleProduct->getDiscount(),
                    'sku'          => $zettleProduct->getSku(),
                );
            }
            $total_product += $zettleProduct->getUnitPrice()*$zettleProduct->getQuantity();
        }

        $cart = new Cart();
        $cart->id_currency = $id_currency;
        $cart->id_lang = (int)$context->language->id;
        $cart->id_customer = $customer->id;
        $cart->id_carrier = $id_carrier;
        $cart->id_address_delivery = $address->id;
        $cart->id_address_invoice = $address->id;
        $cart->recyclable = 0;
        $cart->gift = 0;
        $cart->save();


        try {
            $total_discount = 0;
            $cartRules = array();
            $this->module->disableUpdateHook();
            foreach ($products as $product) {
                StockAvailable::setQuantity(
                    $product['id_product'],
                    $product['id_product_attribute'],
                    $product['paid_qty'] + $product['qty_before']
                );
                $cart->updateQty(
                    $product['paid_qty'],
                    $product['id_product'],
                    $product['id_product_attribute']
                );
                if ($product['discount']) {
                    $product_discount = false;
                    $product_discount_name = $product['name'];
                    if (isset($product['discount']['amount'])) {
                        $product_discount = ((int)$product['discount']['amount']) * 0.01;//due to Zettle cost format
                        $product_discount_name =
                            "-".$product_discount.$zettle_purchase->getCurrency()." ".$product_discount_name;
                    }
                    if (isset($product['discount']['percentage'])) {
                        $percentage = (float)$product['discount']['percentage'];
                        $product_discount = $percentage * 0.01 * $product['paid_qty'] * $product['unit_price'];
                        $product_discount_name =
                            "-".$percentage."% ".$product_discount_name;
                    }
                    if ($product_discount) {
                        $product_discount = round($product_discount, 2);
                        $cartRule =
                            $this->createCartRule(
                                $product_discount,
                                $product_discount_name,
                                $id_currency,
                                $customer->id
                            );

                        $cart->addCartRule($cartRule->id);
                        $cartRules[] = $cartRule;
                        $total_discount += $product_discount;
                    }
                }
            }

            $total = $zettle_purchase->getAmount();
            $total_tax = $zettle_purchase->getVatAmount();
            $total_tax_exclude = $total - $total_tax;

            if ($zettle_purchase->getDiscounts() && count($zettle_purchase->getDiscounts())) {
                $discounts = $zettle_purchase->getDiscounts();
                $purchase_discount_item = $discounts[0];
                $purchase_discount = 0;
                $purchase_discount_name = "Zettle (".$zettle_purchase->getPurchaseUuid().")";
                if (isset($purchase_discount_item['amount'])) {
                    $purchase_discount = ((int)$purchase_discount_item['amount']) * 0.01;//due to Zettle cost format
                    $purchase_discount_name =
                        "-".$purchase_discount.$zettle_purchase->getCurrency()." ".$purchase_discount_name;
                }
                if (isset($purchase_discount_item['percentage'])) {
                    $percentage = (float)$purchase_discount_item['percentage'];

                    $total_before_discount = $total / (1 - $percentage * 0.01);

                    $purchase_discount = $total_before_discount * $percentage * 0.01;
                    $purchase_discount_name =
                        "-".$percentage."% ".$purchase_discount_name;
                }
                if ($purchase_discount) {
                    $purchase_discount = round($purchase_discount, 2);
                    $cartRule =
                        $this->createCartRule(
                            $purchase_discount,
                            $purchase_discount_name,
                            $id_currency,
                            $customer->id
                        );

                    $cart->addCartRule($cartRule->id);
                    $cartRules[] = $cartRule;
                    $total_discount += $purchase_discount;
                }
            }

            do {
                $reference = Order::generateReference();
            } while (Order::getByReference($reference)->count());

            $order = new Order();
            $order->id_address_delivery = $cart->id_address_delivery;
            $order->id_address_invoice = $cart->id_address_invoice;
            $order->id_cart = $cart->id;

            $order->id_currency = $cart->id_currency;
            $order->id_customer = $cart->id_customer;
            $order->id_carrier = $cart->id_carrier;
            $order->reference = $reference;
            $order->gift = $cart->gift;
            $order->recyclable = $cart->recyclable;

            $payments = $zettle_purchase->getPayments();
            $order->payment = "Zettle POS";
            if (count($payments)) {
                $payment = $payments[0];
                $order->payment .= " (".str_replace("IZETTLE_", "", $payment->getType()).")";
            }

            $order->module = $this->module->name;


            $order->valid = 1;
            $order->total_paid_tax_excl = $total_tax_exclude;
            $order->total_discounts_tax_incl = $total_discount;
            $order->total_discounts_tax_excl = $total_discount;
            $order->total_discounts = $total_discount;
            $order->total_paid = $total;
            $order->total_paid_tax_incl = $total;
            $order->total_paid_real = 0;
            $order->total_products = $total_product;
            $order->total_products_wt = $total_product;
            $order->conversion_rate = $currency->conversion_rate;
            $order->id_shop = $context->shop->id;
            $order->id_shop_group = $context->shop->id_shop_group;
            $order->id_lang = (int)$context->language->id;
            $order->secure_key = md5(uniqid(rand(), true));
            $order->round_mode = Configuration::get('PS_PRICE_ROUND_MODE');
            $order->round_type = Configuration::get('PS_ROUND_TYPE');
            $order->current_state = $id_order_state;
            $order->invoice_date = '0000-00-00 00:00:00';
            $order->delivery_date = '0000-00-00 00:00:00';
            $order->add();
            $order_id = $order->id;

            $return = $order_id;

            Db::getInstance()->insert(
                'izettle_purchase',
                array(
                    'uuid'     => $zettle_purchase->getPurchaseUuid(),
                    'id_order' => $order_id,
                    'date_add' => date('Y-m-d H:i:s'),
                )
            );

            $cartProductList = $cart->getProducts(true);

            foreach ($cartProductList as &$cartProduct) {
                $key = $cartProduct["id_product"]."_";
                if ($cartProduct["id_product_attribute"]) {
                    $key .= $cartProduct["id_product_attribute"];
                } else {
                    $key .= "0";
                }
                if (array_key_exists($key, $products)) {
                    $cartProduct['price_wt'] = $products[$key]['unit_price'];
                    $cartProduct['price'] = $products[$key]['unit_price'];
                }
            }
            $order_detail = new OrderDetail(null, null, $context);
            $order_detail->createList($order, $cart, $id_order_state, $cartProductList);

            $is_discount_need_to_be_updated = false;
            foreach ($unsynced_products as $unsynced_product) {
                $order_detail = new OrderDetail(null, null, $context);
                $order_detail->id_order = $order_id;
                $order_detail->id_order_invoice = 0;
                $order_detail->id_shop = $context->shop->id;
                $order_detail->product_id = 0;
                $order_detail->product_attribute_id = 0;
                $order_detail->id_customization = 0;
                $order_detail->product_name = $unsynced_product['name'] . ' ' . $unsynced_product['variant_name'];
                $order_detail->product_quantity = (int) $unsynced_product['paid_qty'];
                $order_detail->product_ean13 = null ;
                $order_detail->product_isbn = null ;
                $order_detail->product_upc =  null;
                $order_detail->product_mpn =  null ;
                $order_detail->product_reference =
                    $unsynced_product['sku']
                        ? $unsynced_product['sku']
                        : $unsynced_product['variant_uuid'];

                $order_detail->product_supplier_reference = null;
                $order_detail->product_weight = 0;
                $order_detail->id_warehouse = 0;
                $order_detail->product_quantity_in_stock = 100;
                $order_detail->download_deadline = '0000-00-00 00:00:00';
                $order_detail->download_hash = null;

                $current_unit_price = $unsynced_product['unit_price'];
                $current_total_price = $current_unit_price * $unsynced_product['paid_qty'];

                $order_detail->original_product_price = $current_total_price;
                $order_detail->product_price = $current_total_price;
                $order_detail->unit_price_tax_incl = $current_unit_price;
                $order_detail->unit_price_tax_excl = $current_unit_price;
                $order_detail->total_price_tax_incl = $current_total_price;
                $order_detail->total_price_tax_excl = $current_total_price;

                $order_detail->purchase_supplier_price = 0;
                $order_detail->group_reduction = 0;
                $order_detail->product_quantity_discount = 0.00;
                $order_detail->discount_quantity_applied = 0;
                $order_detail->tax_name = '-';
                $order_detail->save();

                if ($unsynced_product['discount']) {
                    $product_discount = false;
                    $product_discount_name = $unsynced_product['name'];
                    if (isset($unsynced_product['discount']['amount'])) {
                        //due to Zettle cost format
                        $product_discount = ((int)$unsynced_product['discount']['amount']) * 0.01;
                        $product_discount_name =
                            "-".$product_discount.$zettle_purchase->getCurrency()." ".$product_discount_name;
                    }
                    if (isset($unsynced_product['discount']['percentage'])) {
                        $percentage = (float)$unsynced_product['discount']['percentage'];
                        $product_discount = $percentage * 0.01 * $current_total_price;
                        $product_discount_name =
                            "-".$percentage."% ".$product_discount_name;
                    }
                    if ($product_discount) {
                        $product_discount = round($product_discount, 2);
                        $values = array(
                            'tax_incl' => $product_discount,
                            'tax_excl' => $product_discount
                        );

                        $order->addCartRule(
                            0,
                            $product_discount_name,
                            $values,
                            0,
                            0
                        );
                        $is_discount_need_to_be_updated = true;
                        $total_discount += $product_discount;
                    }
                }
            }

            if ($is_discount_need_to_be_updated) {
                $order->total_discounts_tax_incl = $total_discount;
                $order->total_discounts_tax_excl = $total_discount;
                $order->total_discounts = $total_discount;
                $order->save();
            }

            foreach ($cartRules as $cartRule) {
                $values = array(
                    'tax_incl' => $cartRule->reduction_amount,
                    'tax_excl' => $cartRule->reduction_amount
                );
                $order->addCartRule(
                    $cartRule->id,
                    $cartRule->name[$context->language->id],
                    $values,
                    0,
                    $cartRule->free_shipping
                );
                $cartRule->quantity = 0;
                $cartRule->update();
            }

            $order->addOrderPayment($total, $order->payment, $zettle_purchase->getPurchaseUuid());
            $order->setInvoice(true);
            if (null !== $carrier) {
                $order_carrier = new OrderCarrier();
                $order_carrier->id_order = (int)$order->id;
                $order_carrier->id_carrier = $carrier->id;
                $order_carrier->weight = (float)$order->getTotalWeight();
                $order_carrier->shipping_cost_tax_excl = (float)$order->total_shipping_tax_excl;
                $order_carrier->shipping_cost_tax_incl = (float)$order->total_shipping_tax_incl;
                $order_carrier->add();
            }
        } catch (Exception $e) {
            // logging
            $this->setTaskInfo($e->getMessage());
            $return = false;
        } finally {
            foreach ($products as $product) {
                StockAvailable::setQuantity(
                    $product['id_product'],
                    $product['id_product_attribute'],
                    $product['qty_before']
                );
            }
            $this->module->enableUpdateHook();
        }

        return $return;
    }

    private function createCartRule($amount, $name, $id_currency, $id_customer)
    {
        $cartRule = new CartRule();

        $names = array();

        $languages = Language::getLanguages(true);
        foreach ($languages as $language) {
            $names[(int)$language['id_lang']] = $name;
        }

        $cartRule->name = $names;
        $cartRule->description = "";
        $cartRule->code = Order::generateReference();
        $cartRule->highlight = false;
        $cartRule->partial_use = false;
        $cartRule->priority = 1;
        $cartRule->active = true;

        $cartRule->id_customer = $id_customer;

        $now = new DateTime();
        $cartRule->date_from = $now->format('Y-m-d').' 00:00:00';
        $cartRule->date_to = $now->format('Y-m-d').' 23:59:59';

        $cartRule->minimum_amount = 0;
        $cartRule->minimum_amount_currency = $id_currency;
        $cartRule->minimum_amount_shipping = 0;
        $cartRule->minimum_amount_tax = 0;

        $cartRule->quantity = 1;
        $cartRule->quantity_per_user = 1;

        $cartRule->country_restriction = 0;
        $cartRule->carrier_restriction = 0;
        $cartRule->group_restriction = 0;
        $cartRule->cart_rule_restriction = 0;
        $cartRule->product_restriction = 0;
        $cartRule->shop_restriction = 0;

        $cartRule->free_shipping = 0;

        $cartRule->gift_product = null;
        $cartRule->gift_product_attribute = null;
        $cartRule->reduction_amount = $amount;
        $cartRule->reduction_currency = $id_currency;

        // Legacy reduction_tax property is true when it's tax included, false when tax excluded.
        $cartRule->reduction_tax = null;

        $cartRule->reduction_percent = null;
        $cartRule->reduction_exclude_special = null;
        $cartRule->save();

        return $cartRule;
    }


    private function setTaskInfo($message)
    {
        $this->refreshTask();
        $this->task->current_info = $message;
        $this->task->save();
    }
}
