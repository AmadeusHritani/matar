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

namespace IzettleApi\Client\Product;

use IzettleApi\API\Product\Presentation;
use IzettleApi\API\Product\Price;
use IzettleApi\API\Product\Variant;
use IzettleApi\API\Product\VariantCollection;
use IzettleApi\API\Product\VariantOption;
use IzettleApi\Client\Universal\Builder;

final class VariantBuilder extends Builder
{
    public function buildFromArray($data)
    {
        $collection = new VariantCollection();

        if (isset($data['collection'])) {
            foreach ($data['collection'] as $uuid => $variant) {
                $collection->add($this->build($variant));
            }
        } else {
            foreach ($data as $variant) {
                $collection->add($this->build($variant));
            }
        }



        return $collection;
    }

    private function build($data)//: Variant
    {
        $options = null;
        if (isset($data['options'])) {
            $options = array();
            foreach ($data['options'] as $option) {
                $options[] =
                    VariantOption::create(
                        $option['name'],
                        $option['value']
                    );
            }
        }

        $presentation = null;
        if (isset($data['presentation'])) {

            $is_image = isset($data['presentation']['imageUrl']);
            $is_back = isset($data['presentation']['backgroundColor']);
            $is_color = isset($data['presentation']['textColor']);

            if($is_image || $is_back || $is_color) {
                $presentation =
                    Presentation::create(
                        $is_image ? $data['presentation']['imageUrl'] : null,
                        $is_back ? $data['presentation']['backgroundColor'] : null,
                        $is_color ? $data['presentation']['textColor'] : null
                    );
            }

        }

        return Variant::create(
            $data['uuid'],
            $data['name'],
            $data['description'],
            $data['sku'],
            $data['barcode'],
            $data['price'] ? new Price(0.01*$data['price']['amount'], $data['price']['currencyId']) : null,
            $data['costPrice'] ? new Price(0.01*$data['costPrice']['amount'], $data['costPrice']['currencyId']) : null,
            (float) $data['vatPercentage'],
            $options,
            $presentation
        );
    }
}
