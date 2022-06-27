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

class TaxCollection extends IzettlePostable
{
    /**
     * @var array
     */
    protected $taxRates;


    public static function create($definitions) {
        return new self($definitions);
    }
    /**
     * VariantOptionDefinitionCollection constructor.
     * @param array $taxRates
     */
    public function __construct($taxRates)
    {
        $this->taxRates = $taxRates;
    }


    /**
     * @return array|null
     */
    public function getTaxRates()//: ?array
    {
        return $this->taxRates;
    }

    /**
     * @param array|null $taxRates
     *
     * @return void
     */
    public function setTaxRates($taxRates)//: VariantOptionDefinitions
    {
        $this->taxRates = $taxRates;
    }
}