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

namespace IzettleApi\Client\Inventory;


use IzettleApi\API\Inventory\Location;
use IzettleApi\Client\Universal\Builder;


class LocationBuilder extends Builder
{
    /**
     * @return Category[]
     */
    public function buildFromJson($json)//: array
    {
        $locations = [];
        foreach (json_decode($json, true) as $item) {
            $locations[] = $this->build($item);
        }

        return $locations;
    }

    private function build($category)//: Category
    {
        return Location::create(
            $category['uuid'],
            $category['type'],
            $category['name'],
            $category['description'],
            $category['default']
        );
    }
}