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

namespace IzettleApi\API\Product;

use Ramsey\Uuid\UuidInterface;

class CategoryCollection
{
    /** @var Category[] */
    protected $collection = [];

    public function __construct(array $categories = [])
    {
        foreach ($categories as $category) {
            $this->add($category);
        }
    }

    public function add(Category $category)//: void
    {
        $this->collection[(string) $category->getUuid()] = $category;
    }

    public function remove(Category $category)//: void
    {
        unset($this->collection[(string)$category->getUuid()]);
    }

    public function get(UuidInterface $key)//: Category
    {
        return $this->collection[(string)$key];
    }

    /** @return Category[] */
    public function getAll()//: array
    {
        return $this->collection;
    }

    public function getCreateDataArray()//: array
    {
        $data = [];
        foreach ($this->collection as $category) {
            $data[] = $category->getUuid();
        }

        return $data;
    }
}
