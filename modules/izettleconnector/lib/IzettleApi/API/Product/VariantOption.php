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

class VariantOption extends IzettlePostable
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    public static function create($name, $value) {
        return new self($name, $value);
    }

    /**
     * VariantOption constructor.
     * @param string $name
     * @param string $value
     */
    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
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
    public function setName($name)//: Options
    {
        $this->name = $name;
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
    public function setValue($value)//: Options
    {
        $this->value = $value;
    }
}