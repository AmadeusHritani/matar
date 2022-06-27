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

class ProductInventorySyncCollection extends IzettlePostable
{
    /** @var VariantInventoryChange[] */
    protected $changes = [];
    protected $externalUuid;

    public static function create($changes, $externalUuid) {
        return new self($changes, $externalUuid);
    }

    public function __construct($changes, $externalUuid)
    {
        $this->changes = $changes;
        $this->externalUuid = $externalUuid;
    }
}