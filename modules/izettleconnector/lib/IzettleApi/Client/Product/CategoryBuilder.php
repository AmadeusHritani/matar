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

use DateTime;
use IzettleApi\API\Product\Category;
use IzettleApi\API\Product\CategoryCollection;
use IzettleApi\Client\Universal\Builder;

final class CategoryBuilder extends Builder
{
    /**
     * @return Category[]
     */
    public function buildFromJson($json)//: array
    {
        $categories = [];
        foreach (json_decode($json, true) as $category) {
            $categories[] = $this->build($category);
        }

        return $categories;
    }

    public function buildFromArray($categories)//: CategoryCollection
    {

        try {
            if (isset($categories['uuid']) && isset($categories['name'])) {
                return $this->build($categories);
            }
            $collection = new CategoryCollection();
            foreach ($categories as $category) {
                $collection->add($this->build($category));
            }
            return $collection;
        } catch (\Exception $e) {
            return null;
        }
    }

    private function build($category)//: Category
    {
        return Category::create(
            $category['uuid'],
            $category['name']
        );
    }
}
