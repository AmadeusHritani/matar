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

class VariantInventoryChangeCollection extends IzettlePostable
{
    /** @var VariantInventoryChange[] */
    protected $variantChanges = [];

    public static function create($variantChanges) {
        return new self($variantChanges);
    }

    public function __construct($variantChanges = [])
    {
        $this->variantChanges = $variantChanges;
    }
}