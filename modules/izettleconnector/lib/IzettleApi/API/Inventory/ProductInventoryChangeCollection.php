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

class ProductInventoryChangeCollection extends IzettlePostable
{
    /** @var VariantInventoryChange[] */
    protected $productChanges = [];
    protected $returnBalanceForLocationUuid;

    public static function create($productChanges, $returnBalanceForLocationUuid) {
        return new self($productChanges, $returnBalanceForLocationUuid);
    }

    public function __construct($productChanges, $returnBalanceForLocationUuid)
    {
        $this->productChanges = $productChanges;
        $this->returnBalanceForLocationUuid = $returnBalanceForLocationUuid;
    }
}