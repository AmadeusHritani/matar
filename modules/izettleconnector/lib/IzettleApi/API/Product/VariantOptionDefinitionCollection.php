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

class VariantOptionDefinitionCollection extends IzettlePostable
{
    /**
     * @var array
     */
    protected $definitions;


    public static function create($definitions) {
        return new self($definitions);
    }
    /**
     * VariantOptionDefinitionCollection constructor.
     * @param array $definitions
     */
    public function __construct($definitions)
    {
        $this->definitions = $definitions;
    }


    /**
     * @return array|null
     */
    public function getDefinitions()//: ?array
    {
        return $this->definitions;
    }

    /**
     * @param array|null $definitions
     *
     * @return void
     */
    public function setDefinitions($definitions)//: VariantOptionDefinitions
    {
        $this->definitions = $definitions;
    }
}