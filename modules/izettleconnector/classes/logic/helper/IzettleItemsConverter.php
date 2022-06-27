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

use IzettleApi\API\Product\Presentation;
use IzettleApi\API\Product\Price;
use IzettleApi\API\Product\Variant;
use IzettleApi\API\Product\VariantOption;
use IzettleApi\API\Product\VariantOptionDefinition;
use IzettleApi\API\Product\VariantOptionDefinitionCollection;
use IzettleApi\API\Product\VariantOptionDefinitionProperty;

/**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : iZettle
 */

abstract class IzettleItemsConverter
{

    const MAX_ATTRIBUTE_COUNT = 3;
    const MAX_DESC_LENGTH = 1024;
    const MAX_NAME_LENGTH = 256;
    const MAX_OPTION_NAME_LENGTH = 30;
    const MAX_OPTION_VALUE_LENGTH = 256;
    const MAX_COMBINATION_NAME_LENGTH = 99;

    public static function convertToIzettleProduct(
        $product,
        $id_lang = 0,
        $replace_mode = true,
        $use_price = true,
        $use_wholesale_price = true,
        $custom_name = null,
        $custom_barcode = null,
        $tax_type = 'VAT',
        $tax_params = array()
    ) {
        $barcode_field = Configuration::get(IZETTLECONNECTOR_BARCODE_FIELD);
        if (!$barcode_field) {
            $barcode_field = 'ean13';
        }

        $is_vat = false;
        $is_sales_tax = false;
        //$no_tax = false;
        switch (Tools::strtolower($tax_type)) {
            case 'vat':
                $is_vat = true;
                break;
//            case 'none':
//                $no_tax = true;
//                break;
            case 'sales_tax':
                $is_sales_tax = true;
                break;
        }
        $context = Context::getContext();
        if (!$id_lang) {
            $id_lang = $context->language->id;
        }

        if (is_int($product)) {
            $product =
                new Product(
                    $product,
                    true
                );
        }
        $id_currency =
            Validate::isLoadedObject($context->currency)
                ? (int)$context->currency->id : (int)Configuration::get('PS_CURRENCY_DEFAULT');
        $currency = new Currency($id_currency);

        $categories =
            Product::getProductCategoriesFull(
                $product->id,
                $id_lang
            );
//        $categories_name = array();
//        foreach ($categories as $row) {
//            $categories_name[] = $row['name'];
//        }
        $categories_name = null;

        $base_color = "#ffffff";

        $izettleProductPresentation = null;
        $imageLookupKeys = array();

        $image_cover = Product::getCover($product->id);

        if ($image_cover) {
            $image = IzettleImage::getItemByImageId($image_cover['id_image']);
            if ($image) {
                $imageLookupKeys[] = $image->key.'.jpeg';// only JPEG available ???
                $image_url = $image->url;
                $izettleProductPresentation =
                    Presentation::create(
                        $image_url,
                        '#ffffff',
                        '#000000'
                    );
            }
        }

        $description = self::prepareDesc(strip_tags($product->description_short[$id_lang]));
        $name = self::prepareName($custom_name ? $custom_name : $product->name[$id_lang]);

        $izettlevariantOptionDefinitions = null;
        $izettleVariants = array();

        if ($product->hasAttributes()) {
            $attributes = $product->getAttributesResume($id_lang);
            $attributes_group_list = $product->getAttributesGroups($id_lang);

            $attribute_group = array();
            $color_map = array();

            foreach ($attributes_group_list as $item) {
                if (!array_key_exists(
                    $item['group_name'],
                    $attribute_group
                )) {
                    $attribute_group[$item['group_name']] = array();
                }
                if (!in_array(
                    $item['attribute_name'],
                    $attribute_group[$item['group_name']]
                )) {
                    $attribute_group[$item['group_name']][] = $item['attribute_name'];
                }
                if ($item['attribute_color']) {
                    $color_map[(int)$item['id_product_attribute']] = $item['attribute_color'];
                }
            }

            $is_list_mode =
                !self::isAttributesConsistent($product->id)
                || count($attribute_group) > self::MAX_ATTRIBUTE_COUNT;


            $definitionArray = array();
            $combinationName = "Variant";

            if ($is_list_mode) {
                $properties = array();
                foreach ($attributes as $attribute) {
                    $properties[] = VariantOptionDefinitionProperty::create(
                        self::prepareOptionValue($attribute['attribute_designation']),
                        null
                    );
                }
                $variantOptionDefinition =
                    VariantOptionDefinition::create(
                        $combinationName,
                        $properties
                    );
                $definitionArray[] = $variantOptionDefinition;
            } else {
                foreach ($attribute_group as $key => $values) {
                    $properties = array();
                    foreach ($values as $value) {
                        $properties[] = VariantOptionDefinitionProperty::create(
                            self::prepareOptionValue($value),
                            null
                        );
                    }
                    $variantOptionDefinition =
                        VariantOptionDefinition::create(
                            self::prepareOptionName($key),
                            $properties
                        );
                    $definitionArray[] = $variantOptionDefinition;
                }
            }

            $variantImages = $product->getCombinationImages($id_lang);

            foreach ($attributes as $attribute) {
                $id_product_attribute = (int)$attribute['id_product_attribute'];

                $wholesale_price =
                    $attribute['wholesale_price'] ? $attribute['wholesale_price'] : $product->wholesale_price;

                $options = array();
                if ($is_list_mode) {
                    $options[] =
                        VariantOption::create(
                            self::prepareCombinationName($combinationName),
                            self::prepareOptionValue($attribute['attribute_designation'])
                        );
                } else {
                    $params =
                        IzettleHelper::getAttributesParams(
                            $product->id,
                            $id_product_attribute,
                            $id_lang
                        );
                    foreach ($params as $value) {
                        $options[] =
                            VariantOption::create(
                                self::prepareOptionName($value['group']),
                                self::prepareOptionValue($value['name'])
                            );
                    }
                }
                $color =
                    array_key_exists(
                        $id_product_attribute,
                        $color_map
                    )
                        ? $color_map[$id_product_attribute]
                        : $base_color;

                $presentation = null;


                if (isset($variantImages[$id_product_attribute])
                    && is_array($variantImages[$id_product_attribute])
                    && count($variantImages[$id_product_attribute])) {
                    $current_images = $variantImages[$id_product_attribute];
                    $id_image_max = 0;
                    foreach ($current_images as $current_image) {
                        if ((int) $current_image['id_image'] > $id_image_max) {
                            $id_image_max = (int) $current_image['id_image'];
                        }
                    }
                    if ($id_image_max) {
                        $image = IzettleImage::getItemByImageId($id_image_max);
                        if ($image) {
                            //$img_key = $image->key.'.jpeg';
//                            if (!in_array($img_key, $imageLookupKeys)) {
//                                $imageLookupKeys[] = $img_key;// only JPEG available ???
//                            }
                            $image_url = $image->url;
                            $presentation =
                                Presentation::create(
                                    $image_url,
                                    $color,
                                    IzettleHelper::colorInverse($color)
                                );
                        }
                    }
                }

                $dbItem = IzettleVariant::getItem($product->id, $id_product_attribute);
                $is_new = false;

                if (!$dbItem) {
                    $is_new = true;
                    $dbItem = new IzettleVariant();
                    $dbItem->uuid = UUID::generateV1();
                    $dbItem->id_product = $product->id;
                    $dbItem->id_product_attribute = $id_product_attribute;
                    $dbItem->save();
                }

                if ($replace_mode && !$is_new) {
                    $dbItem->uuid = UUID::generateV1();
                    $dbItem->save();
                }

                if ($custom_barcode) {
                    $barcode = $custom_barcode;
                } else {
                    $barcode = empty($attribute[$barcode_field])
                        ?  $product->{$barcode_field}
                        : $attribute[$barcode_field];
                }


                $izettleVariants[] = Variant::create(
                    $dbItem->uuid,
                    $name,
                    $description,
                    empty($attribute['reference']) ? $product->reference : $attribute['reference'],
                    $barcode,
                    $use_price
                        ? new Price($product->getPrice(true, $id_product_attribute), $currency->iso_code)
                        : null,
                    ($use_wholesale_price && $wholesale_price) ? new Price(
                        $wholesale_price,
                        $currency->iso_code
                    ) : null,
                    $is_vat ? $product->tax_rate : null,
                    $options,
                    $presentation
                );
            }

            $izettlevariantOptionDefinitions = VariantOptionDefinitionCollection::create($definitionArray);
        } else {
            $dbItem = IzettleVariant::getItem($product->id, 0);
            $is_new = false;

            if (!$dbItem) {
                $is_new = true;
                $dbItem = new IzettleVariant();
                $dbItem->uuid = UUID::generateV1();
                $dbItem->id_product = $product->id;
                $dbItem->id_product_attribute = 0;
                $dbItem->save();
            }

            if ($replace_mode && !$is_new) {
                $dbItem->uuid = UUID::generateV1();
                $dbItem->save();
            }

            $izettleVariants[] = Variant::create(
                $dbItem->uuid,
                $name,
                $description,
                $product->reference,
                $custom_barcode ? $custom_barcode : $product->{$barcode_field},
                $use_price
                    ? new Price($product->getPrice(true), $currency->iso_code)
                    : null,
                ($use_wholesale_price && $product->wholesale_price)
                    ? new Price($product->wholesale_price, $currency->iso_code)
                    : null,
                $is_vat ? $product->tax_rate : null,
                null,
                $izettleProductPresentation
            );
        }

        $category_uuid = IzettleCategory::getUuid($product->id_category_default);

        if (!$category_uuid) {
            //if ($replace_mode) {
                $category_uuid = UUID::generateV1();
                $dbItem = new IzettleCategory();
                $dbItem->uuid = $category_uuid;
                $dbItem->id_category = $product->id_category_default;
                $dbItem->save();
//            } else {
//                throw new Exception("uuid for category does`t exist (id=$product->id_category_default)");
//            }
        }

        $cat_name = $categories[$product->id_category_default]['name'];
        $izettleCategory =
            \IzettleApi\API\Product\Category::create(
                $category_uuid,
                $cat_name ? $cat_name : "--"
            );


        $dbItem = IzettleProduct::getItemByProductId($product->id);
        $is_new = false;

        if (!$dbItem) {
            $is_new = true;
            $dbItem = new IzettleProduct();
            $dbItem->uuid = UUID::generateV1();
            $dbItem->id_product = $product->id;
            $dbItem->save();
        }

        if ($replace_mode && !$is_new) {
            $dbItem->uuid = UUID::generateV1();
            $dbItem->save();
        }

        $taxRates = null;
        $taxExempt = null;
        $createWithDefaultTax = null;

        if ($is_sales_tax && !is_null($tax_params)) {
            if (isset($tax_params['createWithDefaultTax'])) {
                $createWithDefaultTax = (bool) $tax_params['createWithDefaultTax'];
            }

            if (isset($tax_params['explicitDefaulTaxes'])) {
                $explicitDefaulTaxes = $tax_params['explicitDefaulTaxes'];
                if (is_array($explicitDefaulTaxes) && count($explicitDefaulTaxes)) {
                    $taxRates = array_unique($explicitDefaulTaxes);
                }
            }

            if (isset($tax_params['taxmap']) && count($tax_params['taxmap'])) {
                $taxmap = $tax_params['taxmap'];
                if (is_null($taxRates)) {
                    $taxRates = array();
                }

                $product_tax = IzettleHelper::getProductsTaxes(array($product->id));

                foreach ($product_tax as $tax) {
                    $id_tax = (int) $tax['id_tax'];
                    if (isset($taxmap[$id_tax]) && $taxmap[$id_tax] && !in_array($taxmap[$id_tax], $taxRates)) {
                        $taxRates[] = $taxmap[$id_tax];
                    }
                }
            }
        }


        $izettleProduct = \IzettleApi\API\Product\Product::create(
            $dbItem->uuid,
            $categories_name,
            $name,
            $description,
            $imageLookupKeys,
            $izettleProductPresentation,
            $izettleVariants,
            $product->id,
            $product->unity ? $product->unity : null,
            $is_vat ? $product->tax_rate : null,
            $izettlevariantOptionDefinitions,
            $is_vat ? $product->tax_rate."%" : null,
            $izettleCategory,
            $taxRates,
            $taxExempt,
            $createWithDefaultTax
        );

        return $izettleProduct;
    }


    public static function isAttributesConsistent($id_product)
    {
        //orderby is important
        $rows = Db::getInstance()->executeS('
            SELECT pa.id_product_attribute, a.`id_attribute_group`
            FROM `' . _DB_PREFIX_ . 'attribute` a
            LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute_combination` pac
                ON (pac.`id_attribute` = a.`id_attribute`)
            LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute` pa
                ON (pa.`id_product_attribute` = pac.`id_product_attribute`)
            WHERE pa.`id_product` = ' . (int) $id_product . '
            ORDER BY  pa.id_product_attribute, a.`id_attribute_group`');

        $data = array();

        foreach ($rows as $row) {
            $id_product_attribute = (int)$row['id_product_attribute'];
            if (!isset($data[$id_product_attribute])) {
                $data[$id_product_attribute] = array();
            }
            $data[$id_product_attribute][] = (int)$row['id_attribute_group'];
        }

        if (!count($data)) {
            return false;
        }

        $reference = null;
        foreach ($data as $id_product_attribute => $attributes_list) {
            if (is_null($reference)) {
                $reference = json_encode($attributes_list);
            } elseif ($reference != json_encode($attributes_list)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param $description
     * @return string
     */
    protected static function prepareDesc($description)
    {
        return self::prepareString($description, self::MAX_DESC_LENGTH);
    }

    /**
     * @param $name
     * @return string
     */
    protected static function prepareName($name)
    {
        return self::prepareString($name, self::MAX_NAME_LENGTH);
    }

    /**
     * @param $optionName
     * @return string
     */
    protected static function prepareOptionName($optionName)
    {
        return self::prepareString($optionName, self::MAX_OPTION_NAME_LENGTH);
    }

    /**
     * @param $optionVal
     * @return string
     */
    protected static function prepareOptionValue($optionVal)
    {
        return self::prepareString($optionVal, self::MAX_OPTION_VALUE_LENGTH);
    }

    /**
     * @param $combinationName
     * @return string
     */
    protected static function prepareCombinationName($combinationName)
    {
        return self::prepareString($combinationName, self::MAX_COMBINATION_NAME_LENGTH);
    }



    /**
     * @param $string
     * @param $length
     * @return string
     */
    protected static function prepareString($string, $length)
    {
        return
            Tools::strlen($string) > $length
                ? (mb_substr($string, 0, $length - 3)."...")
                : $string;
    }
}
