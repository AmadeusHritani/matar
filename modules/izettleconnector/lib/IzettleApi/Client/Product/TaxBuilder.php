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

use IzettleApi\API\Product\Tax;
use IzettleApi\Client\Universal\Builder;

class TaxBuilder extends Builder
{
    public function buildFromJson($json)//: array
    {
        $data = json_decode($json, true);

        $taxes = [];
        if (isset($data['taxRates'])) {
            foreach ($data['taxRates'] as $item) {
                $taxes[] = $this->build($item);
            }
        }
        return $taxes;
    }

    private function build(array $data)//: Tax
    {
        return Tax::create(
            $data['uuid'],
            $data['label'],
            (float) $data['percentage'],
            (bool) $data['default']
        );
    }
}