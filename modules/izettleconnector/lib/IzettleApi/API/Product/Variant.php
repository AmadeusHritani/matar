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


class Variant extends IzettlePostable
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var string
     */
    protected $barcode;

    /**
     * @var Price
     */
    protected $price;

    /**
     * @var Price
     */
    protected $costPrice;

    /**
     * @var int
     */
    protected $vatPercentage;

    /**
     * @var array
     */
    protected $options;

    /**
     * @var Presentation
     */
    protected $presentation;

    public static function create(
        $uuid,
        $name,
        $description,
        $sku,
        $barcode,
        $price,
        $costPrice,
        $vatPercentage,
        $options = null,
        $presentation = null
    ) {
        return new self(
            $uuid,
            $name,
            $description,
            $sku,
            $barcode,
            $price,
            $costPrice,
            $vatPercentage,
            $options,
            $presentation
        );
    }

    /**
     * Variants constructor.
     * @param string $uuid
     * @param string $name
     * @param string $description
     * @param string $sku
     * @param string $barcode
     * @param Price $price
     * @param Price $costPrice
     * @param int $vatPercentage
     * @param array $options
     * @param Presentation $presentation
     */
    public function __construct(
        $uuid,
        $name,
        $description,
        $sku,
        $barcode,
        $price,
        $costPrice,
        $vatPercentage,
        $options,
        $presentation)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->description = $description;
        $this->sku = $sku;
        $this->barcode = $barcode;
        $this->price = $price;
        $this->costPrice = $costPrice;
        $this->vatPercentage = $vatPercentage;
        $this->options = $options;
        $this->presentation = $presentation;
    }


    /**
     * @return string|null
     */
    public function getUuid()//: ?string
    {
        return $this->uuid;
    }

    /**
     * @param string|null $uuid
     *
     * @return void
     */
    public function setUuid($uuid)//: Variants
    {
        $this->uuid = $uuid;


    }

    /**
     * @return string|null
     */
    public function getName()//: ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return void
     */
    public function setName($name)//: Variants
    {
        $this->name = $name;


    }

    /**
     * @return string|null
     */
    public function getDescription()//: ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return void
     */
    public function setDescription($description)//: Variants
    {
        $this->description = $description;


    }

    /**
     * @return string|null
     */
    public function getSku()//: ?string
    {
        return $this->sku;
    }

    /**
     * @param string|null $sku
     *
     * @return void
     */
    public function setSku($sku)//: Variants
    {
        $this->sku = $sku;


    }

    /**
     * @return string|null
     */
    public function getBarcode()//: ?string
    {
        return $this->barcode;
    }

    /**
     * @param string|null $barcode
     *
     * @return void
     */
    public function setBarcode($barcode)//: Variants
    {
        $this->barcode = $barcode;


    }

    /**
     * @return Price|null
     */
    public function getPrice()//: ?Price
    {
        return $this->price;
    }

    /**
     * @param Price|null $price
     *
     * @return void
     */
    public function setPrice($price)//: Variants
    {
        $this->price = $price;


    }

    /**
     * @return Price|null
     */
    public function getCostPrice()//: ?CostPrice
    {
        return $this->costPrice;
    }

    /**
     * @param Price|null $costPrice
     *
     * @return void
     */
    public function setCostPrice($costPrice)//: Variants
    {
        $this->costPrice = $costPrice;


    }

    /**
     * @return int|null
     */
    public function getVatPercentage()//: ?int
    {
        return $this->vatPercentage;
    }

    /**
     * @param int|null $vatPercentage
     *
     * @return void
     */
    public function setVatPercentage($vatPercentage)//: Variants
    {
        $this->vatPercentage = $vatPercentage;


    }

    /**
     * @return array|null
     */
    public function getOptions()//: ?array
    {
        return $this->options;
    }

    /**
     * @param array|null $options
     *
     * @return void
     */
    public function setOptions($options)//: Variants
    {
        $this->options = $options;


    }

    /**
     * @return Presentation|null
     */
    public function getPresentation()//: ?Presentation
    {
        return $this->presentation;
    }

    /**
     * @param Presentation|null $presentation
     *
     * @return void
     */
    public function setPresentation($presentation)//: Variants
    {
        $this->presentation = $presentation;


    }
}