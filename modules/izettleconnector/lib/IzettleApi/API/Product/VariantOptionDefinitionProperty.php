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

class VariantOptionDefinitionProperty extends IzettlePostable
{
    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    protected $imageUrl;

    public static function create($value, $imageUrl) {
        return new self($value, $imageUrl);
    }

    /**
     * VariantOptionDefenitionProperty constructor.
     * @param string $value
     * @param string $imageUrl
     */
    public function __construct($value, $imageUrl)
    {
        $this->value = $value;
        $this->imageUrl = $imageUrl;
    }


    /**
     * @return string|null
     */
    public function getValue()//: ?string
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     *
     * @return void
     */
    public function setValue($value)//: Properties
    {
        $this->value = $value;

    }

    /**
     * @return string|null
     */
    public function getImageUrl()//: ?string
    {
        return $this->imageUrl;
    }

    /**
     * @param string|null $imageUrl
     *
     * @return void
     */
    public function setImageUrl($imageUrl)//: Properties
    {
        $this->imageUrl = $imageUrl;

    }
}