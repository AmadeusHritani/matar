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

use IzettleApi\API\Universal\IzettlePostable;

class VariantCollection extends IzettlePostable
{
    /** @var Variant[] */
    protected $collection = [];

    public function __construct($variants = [])
    {
        foreach ($variants as $variant) {
            $this->add($variant);
        }
    }

    public function add($variant)//: void
    {
        $this->collection[$variant->getUuid()] = $variant;
    }

    public function remove($variant)//: void
    {
        unset($this->collection[(string)$variant->getUuid()]);
    }

    public function get($key)//: Variant
    {
        return $this->collection[$key];
    }

    /** @return Variant[] */
    public function getAll()//: array
    {
        return $this->collection;
    }

    public function getCreateDataArray()//: array
    {
        return $this->getPostBodyData();
    }

    public function getPostBodyData()
    {
        return json_encode(array_values($this->collection));
    }

    public function getAsArray() {

        $objectArray = [];
        foreach($this->collection as $key => $value) {
            $objectArray[] = $value->getAsArray();
        }
        return $objectArray;

    }
}
