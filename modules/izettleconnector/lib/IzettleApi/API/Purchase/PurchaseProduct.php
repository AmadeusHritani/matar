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

namespace IzettleApi\API\Purchase;


use IzettleApi\API\Universal\IzettlePostable;

class PurchaseProduct extends IzettlePostable
{
    /**
     * @var string
     */
    protected $productUuid;

    /**
     * @var string
     */
    protected $variantUuid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $variantName;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var int
     */
    protected $unitPrice;

    /**
     * @var int
     */
    protected $costPrice;

    /**
     * @var string
     */
    protected $quantity;

    /**
     * @var float
     */
    protected $vatPercentage;

    /**
     * @var array
     */
    protected $taxRates;

    /**
     * @var bool
     */
    protected $taxExempt;

    /**
     * @var string
     */
    protected $taxCode;

    /**
     * @var string
     */
    protected $type;


    protected $discount;

    public static function create(
        $productUuid,
        $variantUuid,
        $name,
        $variantName,
        $sku,
        $unitPrice,
        $costPrice,
        $quantity,
        $vatPercentage,
        array $taxRates,
        $taxExempt,
        $taxCode,
        $type,
        $discount
    ) {
        return new self(
            $productUuid,
            $variantUuid,
            $name,
            $variantName,
            $sku,
            $unitPrice,
            $costPrice,
            $quantity,
            $vatPercentage,
            $taxRates,
            $taxExempt,
            $taxCode,
            $type,
            $discount
        );
    }

    /**
     * PurchaseProduct constructor.
     * @param string $productUuid
     * @param string $variantUuid
     * @param string $name
     * @param string $variantName
     * @param string $sku
     * @param int $unitPrice
     * @param int $costPrice
     * @param string $quantity
     * @param float $vatPercentage
     * @param array $taxRates
     * @param bool $taxExempt
     * @param string $taxCode
     * @param string $type
     * @param $discount
     */
    public function __construct(
        $productUuid,
        $variantUuid,
        $name,
        $variantName,
        $sku,
        $unitPrice,
        $costPrice,
        $quantity,
        $vatPercentage,
        array $taxRates,
        $taxExempt,
        $taxCode,
        $type,
        $discount
    ) {
        $this->productUuid = $productUuid;
        $this->variantUuid = $variantUuid;
        $this->name = $name;
        $this->variantName = $variantName;
        $this->sku = $sku;
        $this->unitPrice = $unitPrice;
        $this->costPrice = $costPrice;
        $this->quantity = $quantity;
        $this->vatPercentage = $vatPercentage;
        $this->taxRates = $taxRates;
        $this->taxExempt = $taxExempt;
        $this->taxCode = $taxCode;
        $this->type = $type;
        $this->discount = $discount;
    }


    /**
     * @return string|null
     */
    public function getProductUuid()
    {
        return $this->productUuid;
    }

    /**
     * @param string|null $productUuid
     */
    public function setProductUuid($productUuid)
    {
        $this->productUuid = $productUuid;
    }

    /**
     * @return string|null
     */
    public function getVariantUuid()
    {
        return $this->variantUuid;
    }

    /**
     * @param string|null $variantUuid
     */
    public function setVariantUuid($variantUuid)
    {
        $this->variantUuid = $variantUuid;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getVariantName()
    {
        return $this->variantName;
    }

    /**
     * @param string|null $variantName
     */
    public function setVariantName($variantName)
    {
        $this->variantName = $variantName;
    }

    /**
     * @return string|null
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param string|null $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return int|null
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param int|null $unitPrice
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return int|null
     */
    public function getCostPrice()
    {
        return $this->costPrice;
    }

    /**
     * @param int|null $costPrice
     */
    public function setCostPrice($costPrice)
    {
        $this->costPrice = $costPrice;
    }

    /**
     * @return string|null
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param string|null $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float|null
     */
    public function getVatPercentage()
    {
        return $this->vatPercentage;
    }

    /**
     * @param float|null $vatPercentage
     */
    public function setVatPercentage($vatPercentage)
    {
        $this->vatPercentage = $vatPercentage;
    }

    /**
     * @return array|null
     */
    public function getTaxRates()
    {
        return $this->taxRates;
    }

    /**
     * @param array|null $taxRates
     */
    public function setTaxRates($taxRates)
    {
        $this->taxRates = $taxRates;
    }

    /**
     * @return bool|null
     */
    public function isTaxExempt()
    {
        return $this->taxExempt;
    }

    /**
     * @param bool|null $taxExempt
     */
    public function setTaxExempt($taxExempt)
    {
        $this->taxExempt = $taxExempt;
    }

    /**
     * @return string|null
     */
    public function getTaxCode()
    {
        return $this->taxCode;
    }

    /**
     * @param string|null $taxCode
     */
    public function setTaxCode($taxCode)
    {
        $this->taxCode = $taxCode;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param mixed $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }


}