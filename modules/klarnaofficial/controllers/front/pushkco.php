<?php
/**
 * Prestaworks AB
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the End User License Agreement(EULA)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://license.prestaworks.se/license.html
 *
 * @author    Prestaworks AB <info@prestaworks.se>
 * @copyright Copyright Prestaworks AB (https://www.prestaworks.se/)
 * @license   http://license.prestaworks.se/license.html
 */
 
class KlarnaOfficialPushKcoModuleFrontController extends ModuleFrontController
{
    public $display_column_left = false;
    public $display_column_right = false;
    public $ssl = true;

    public function postProcess()
    {
        if (!Tools::getIsset('klarna_order_id')) {
            Logger::addLog('KCO V3: bad push by:'.Tools::getRemoteAddr(), 1, null, null, null, true);
            die('missing parameters');
        }
        //$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        //Logger::addLog($url, 1, null, null, null, true);

        try {
            $headers = $this->module->getKlarnaHeaders();
            $merchantId = Configuration::get('KCOV3_MID');
            $sharedSecret = Configuration::get('KCOV3_SECRET');
            require_once dirname(__FILE__).'/../../libraries/commonFeatures.php';
            $KlarnaCheckoutCommonFeatures = new KlarnaCheckoutCommonFeatures();
            $klarna_order_id = pSQL(Tools::getValue('klarna_order_id'));
            
            $checkout = $KlarnaCheckoutCommonFeatures->getFromKlarna($merchantId, $sharedSecret, $headers, '/checkout/v3/orders/'.$klarna_order_id);
            $checkout = json_decode($checkout, true);

            if ($checkout['status'] == 'checkout_complete') {
                $id_cart = $checkout['merchant_reference2'];
                $cart = new Cart((int) ($id_cart));

                Context::getContext()->currency = new Currency((int) $cart->id_currency);

                if ($cart->OrderExists()) {
                    $sql = 'SELECT m.transaction_id, o.id_order FROM `'._DB_PREFIX_.
                    'order_payment` m LEFT JOIN `'._DB_PREFIX_.
                    'orders` o ON m.order_reference=o.reference WHERE o.id_cart='.(int) ($id_cart);
                    
                    $messages = Db::getInstance()->ExecuteS($sql);
                    foreach ($messages as $message) {
                        //Check if reference matches
                        if ($message['transaction_id']==$klarna_order_id) {
                            //Already created, send create
                            $order_reference = (int) $message['id_order'];
                            if (Configuration::get('KCO_ORDERID') == 1) {
                                $order = new Order($order_reference);
                                $order_reference = $order->reference;
                            }
                            $data = array(
                                'merchant_reference1' => ''.$order_reference,
                                'merchant_reference2' => ''.(int) $id_cart,
                            );

                            $endpoint = '/ordermanagement/v1/orders/'.$klarna_order_id.'/merchant-references';
                            $KlarnaCheckoutCommonFeatures->postToKlarna($data, $merchantId, $sharedSecret, $headers, $endpoint);
                            
                            $endpoint = '/ordermanagement/v1/orders/'.$klarna_order_id.'/acknowledge';
                            $update = $KlarnaCheckoutCommonFeatures->postToKlarna($data, $merchantId, $sharedSecret, $headers, $endpoint, true);
                            $update = json_decode($update, true);

                            Logger::addLog(
                                'KCO: created sent: '.$id_cart.' res:'.$klarna_order_id,
                                1,
                                null,
                                null,
                                null,
                                true
                            );
                            die;
                        }
                    }
                    //Duplicate reservation, cancel reservation.
                    Logger::addLog(
                        'KCO: Duplicate reservation: id_cart:'.$id_cart.' res:'.$klarna_order_id,
                        1,
                        null,
                        null,
                        null,
                        true
                    );
                } else {
                    //Create the order
                    $shipping = $checkout['shipping_address'];
                    $billing = $checkout['billing_address'];

                    if (!Validate::isEmail($billing['email'])) {
                        $billing['email'] = 'ingen_mejl_'.$id_cart.'@ingendoman.cc';
                    }
                    
                    $newsletter = 0;
                    $newsletter_setting = (int)Configuration::get('KCO_ADD_NEWSLETTERBOX', null, $cart->id_shop);
                    if ($newsletter_setting == 0 || $newsletter_setting == 1) {
                        if (isset($checkout['merchant_requested']) &&
                            isset($checkout['merchant_requested']['additional_checkbox']) &&
                            $checkout['merchant_requested']['additional_checkbox'] == true
                        ) {
                            $newsletter = 1;
                        }
                    } elseif ($newsletter_setting == 2) {
                        $newsletter = 1;
                    }

                    if (0 == (int)$cart->id_customer) {
                        $id_customer = (int) (Customer::customerExists($billing['email'], true, true));
                    } else {
                        $id_customer = (int)$cart->id_customer;
                    }
                    if ($id_customer > 0) {
                        $customer = new Customer($id_customer);
                        if ($newsletter == 1) {
                            $sql_update_customer = "UPDATE "._DB_PREFIX_."customer SET newsletter=1".
                            " WHERE id_customer=$id_customer;";
                            Db::getInstance()->execute(pSQL($sql_update_customer));
                        }
                    } else {
                        //add customer
                        $id_gender = 9;
                        $date_of_birth = "";
                        $customer = $this->module->createNewCustomer(
                            $billing['given_name'],
                            $billing['family_name'],
                            $billing['email'],
                            $newsletter,
                            $id_gender,
                            $date_of_birth,
                            $cart
                        );
                    }

                    $this->module->changeAddressOnKCOCart($shipping, $billing, $customer, $cart);
                    
                    $amount = (int) ($checkout['order_amount']);
                    $amount = (float) ($amount / 100);

                    $cart->id_customer = $customer->id;
                    $cart->secure_key = $customer->secure_key;
                    $cart->update();

                    $update_sql = 'UPDATE '._DB_PREFIX_.
                    'cart SET id_customer='.
                    (int) $customer->id.
                    ', secure_key=\''.
                    pSQL($customer->secure_key).
                    '\' WHERE id_cart='.
                    (int) $cart->id;
                    
                    Db::getInstance()->execute($update_sql);

                    // if (Configuration::get('KCO_ROUNDOFF') == 1) {
                    //     $total_cart_price_before_round = $cart->getOrderTotal(true, Cart::BOTH);
                    //     $total_cart_price_after_round = round($total_cart_price_before_round);
                    //     $diff = abs($total_cart_price_after_round - $total_cart_price_before_round);
                    //     if ($diff > 0) {
                    //         $amount = $total_cart_price_before_round;
                    //     }
                    // }

                    $merchantId = pSQL($merchantId);
                    
                    $extra = array();
                    $extra['transaction_id'] = $klarna_order_id;

                    $id_shop = (int) $cart->id_shop;

                    $sql = "INSERT INTO `"._DB_PREFIX_.
                        "klarna_orders`(eid, id_order, id_cart, id_shop, ssn, invoicenumber,risk_status ,reservation) ".
                        "VALUES('$merchantId', 0, ".
                        (int) $cart->id.", $id_shop, '', '', '','$klarna_order_id');";
                    Db::getInstance()->execute($sql);
                    
                    $this->module->validateOrder(
                        $cart->id,
                        Configuration::get('PS_OS_PAYMENT'),
                        number_format($amount, 2, '.', ''),
                        $this->module->displayName,
                        '',
                        $extra,
                        $cart->id_currency,
                        false,
                        $customer->secure_key
                    );

                    $order_reference = $this->module->currentOrder;
                    if (Configuration::get('KCO_ORDERID') == 1) {
                        $order = new Order((int) $this->module->currentOrder);
                        $order_reference = $order->reference;
                    }
                    
                    $data = array(
                        'merchant_reference1' => ''.$order_reference,
                        'merchant_reference2' => ''.(int) $cart->id,
                    );

                    $endpoint = '/ordermanagement/v1/orders/'.$klarna_order_id.'/merchant-references';
                    $KlarnaCheckoutCommonFeatures->postToKlarna($data, $merchantId, $sharedSecret, $headers, $endpoint, true);
                    
                    $endpoint = '/ordermanagement/v1/orders/'.$klarna_order_id.'/acknowledge';
                    $KlarnaCheckoutCommonFeatures->postToKlarna($data, $merchantId, $sharedSecret, $headers, $endpoint);
                    
                    $klarnaorder = $KlarnaCheckoutCommonFeatures->getFromKlarna($merchantId, $sharedSecret, $headers, '/ordermanagement/v1/orders/'.$klarna_order_id);
                    $klarnaorder = json_decode($klarnaorder, true);
                    if (isset($klarnaorder['fraud_status']) && $klarnaorder['fraud_status'] == "PENDING") {
                        $new_pending_status = Configuration::get('KCO_PENDING_PAYMENT');
                        $history = new OrderHistory();
                        $history->id_order = $this->module->currentOrder;
                        $history->changeIdOrderState((int)$new_pending_status, $this->module->currentOrder, true);
                        $templateVars = array();
                        $history->addWithemail(true, $templateVars);
                    }

                    $sql = "UPDATE `"._DB_PREFIX_.
                        "klarna_orders` SET id_order=".
                        (int) $this->module->currentOrder.
                        " WHERE id_order=0 AND id_cart=".
                        (int) $cart->id;

                    Db::getInstance()->execute($sql);
                    
                    $additional_checkboxes = array();
                    if (isset($checkout['options']) && isset($checkout['options']['additional_checkboxes'])) {
                        foreach ($checkout['options']['additional_checkboxes'] as $additional_checkbox) {
                            $additional_checkboxes[$additional_checkbox['id']] = $additional_checkbox['text'];
                        }
                    }
                    if (isset($checkout['merchant_requested']) &&
                    isset($checkout['merchant_requested']['additional_checkboxes'])) {
                        foreach ($checkout['merchant_requested']['additional_checkboxes'] as $additional_checkbox) {
                            if (isset($additional_checkboxes[$additional_checkbox['id']])) {
                                $text_at_time_of_purchase = pSQL($additional_checkboxes[$additional_checkbox['id']]);
                            } else {
                                $text_at_time_of_purchase = pSQL($additional_checkbox['id']);
                            }
                            $id_cart = (int) $cart->id;
                            $checked = (int) $additional_checkbox['checked'];
                            $sql = "INSERT INTO `"._DB_PREFIX_.
                            "klarna_checkbox` (id_cart, text_at_time_of_purchase, checked)".
                            " VALUES($id_cart, '$text_at_time_of_purchase', $checked);";
                            Db::getInstance()->execute($sql);
                        }
                    }
                    Hook::exec('actionKlarnaOrderDone', array('klarnadata' => $checkout));
                }
            }
        } catch (Exception $e) {
            Logger::addLog('Klarna Checkout: '.htmlspecialchars($e->getMessage()), 1, null, null, null, true);
        }
        exit;
    }
    
    protected function displayMaintenancePage()
    {
        return;
    }
}
