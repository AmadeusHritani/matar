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

class ProductCollection extends IzettlePostable
{

    /** @var Product[] */
    protected $products = [];

    public static function create($products) {
        return new self($products);
    }

    public function __construct($products = [])
    {
        $this->products = $products;
    }

}
