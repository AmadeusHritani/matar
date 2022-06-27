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

class VariantInventoryChange extends IzettlePostable
{
    protected $productUuid;
    protected $variantUuid;
    protected $change;
    protected $fromLocationUuid;
    protected $toLocationUuid;

    public static function create($productUuid, $variantUuid, $change, $fromLocationUuid, $toLocationUuid)
    {
        return new self($productUuid, $variantUuid, $change, $fromLocationUuid, $toLocationUuid);
    }
    /**
     * VariantInventoryChange constructor.
     * @param $productUuid
     * @param $variantUuid
     * @param $change
     * @param $fromLocationUuid
     * @param $toLocationUuid
     */
    protected function __construct($productUuid, $variantUuid, $change, $fromLocationUuid, $toLocationUuid)
    {
        $this->productUuid = $productUuid;
        $this->variantUuid = $variantUuid;
        $this->change = $change;
        $this->fromLocationUuid = $fromLocationUuid;
        $this->toLocationUuid = $toLocationUuid;
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
    public function getVariantUuid()
    {
        return $this->variantUuid;
    }

    /**
     * @return mixed
     */
    public function getChange()
    {
        return $this->change;
    }

    /**
     * @return mixed
     */
    public function getFromLocationUuid()
    {
        return $this->fromLocationUuid;
    }

    /**
     * @return mixed
     */
    public function getToLocationUuid()
    {
        return $this->toLocationUuid;
    }


}