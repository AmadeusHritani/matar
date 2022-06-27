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

use DateTime;
use IzettleApi\API\Universal\IzettlePostable;

class Tax extends IzettlePostable
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var float
     */
    protected $percentage;

    /**
     * @var bool
     */
    protected $default;


    public static function create($uuid, $label, $percentage, $default) {
        return new self($uuid, $label, $percentage, $default);
    }


    /**
     * Tax constructor.
     * @param string $uuid
     * @param string $label
     * @param float $percentage
     * @param bool $default
     */
    public function __construct($uuid, $label, $percentage, $default)
    {
        $this->uuid = $uuid;
        $this->label = $label;
        $this->percentage = $percentage;
        $this->default = $default;
    }


    /**
     * @return string|null
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param string|null $uuid
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string|null
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string|null $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return float|null
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * @param float|null $percentage
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;
    }

    /**
     * @return bool|null
     */
    public function isDefault()
    {
        return $this->default;
    }

    /**
     * @param bool|null $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }
}