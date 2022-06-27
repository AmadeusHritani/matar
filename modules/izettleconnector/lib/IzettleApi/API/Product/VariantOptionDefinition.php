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

class VariantOptionDefinition  extends IzettlePostable
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $properties;

    public static function create($name, $properties) {
        return new self($name, $properties);
    }

    /**
     * VariantOptionDefinition constructor.
     * @param string $name
     * @param array $properties
     */
    public function __construct($name, $properties)
    {
        $this->name = $name;
        $this->properties = $properties;
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
    public function setName($name)//: Definitions
    {
        $this->name = $name;

        
    }

    /**
     * @return array|null
     */
    public function getProperties()//: ?array
    {
        return $this->properties;
    }

    /**
     * @param array|null $properties
     *
     * @return void
     */
    public function setProperties($properties)//: Definitions
    {
        $this->properties = $properties;

        
    }
}