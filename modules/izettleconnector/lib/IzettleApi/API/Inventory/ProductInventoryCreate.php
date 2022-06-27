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

namespace IzettleApi\API\Inventory;


use IzettleApi\API\Universal\IzettlePostable;

class ProductInventoryCreate extends IzettlePostable
{
    protected $productUuid;

    public static function create($productUuid)
    {
        return new self($productUuid);
    }
    /**
     * ProductInventoryCreate constructor.
     * @param $productUuid
     */
    public function __construct($productUuid)
    {
        $this->productUuid = $productUuid;
    }

    /**
     * @return mixed
     */
    public function getProductUuid()
    {
        return $this->productUuid;
    }



}