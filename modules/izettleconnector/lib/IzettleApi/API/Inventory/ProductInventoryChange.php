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

class ProductInventoryChange extends IzettlePostable
{
    protected $productUuid;
    protected $trackingStatusChange;
    protected $variantChanges;

    /**
     * ProductInventoryChange constructor.
     * @param $productUuid
     * @param $trackingStatusChange
     * @param $variantChanges
     */
    public function __construct($productUuid, $trackingStatusChange, $variantChanges)
    {
        $this->productUuid = $productUuid;
        $this->trackingStatusChange = $trackingStatusChange;
        $this->variantChanges = $variantChanges;
    }


    public static function create($productUuid, $trackingStatusChange, $variantChanges)
    {
        return new self($productUuid, $trackingStatusChange, $variantChanges);
    }

    /**
     * @return mixed
     */
    public function getProductUuid()
    {
        return $this->productUuid;
    }

    /**
     * @return mixed
     */
    public function getTrackingStatusChange()
    {
        return $this->trackingStatusChange;
    }

    /**
     * @return mixed
     */
    public function getVariantChanges()
    {
        return $this->variantChanges;
    }

}