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

class Payment extends IzettlePostable
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var int
     */
    protected $amount;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var array
     */
    protected $references;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * Payment constructor.
     * @param string $uuid
     * @param int $amount
     * @param string $type
     * @param array $references
     * @param array $attributes
     */
    public function __construct($uuid, $amount, $type, array $references, array $attributes)
    {
        $this->uuid = $uuid;
        $this->amount = $amount;
        $this->type = $type;
        $this->references = $references;
        $this->attributes = $attributes;
    }

    public static function create($uuid, $amount, $type, array $references, array $attributes) {
        return new self($uuid, $amount, $type, $references, $attributes);
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
     * @return int|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int|null $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
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
     * @return array|null
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * @param array|null $references
     */
    public function setReferences($references)
    {
        $this->references = $references;
    }

    /**
     * @return array|null
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param array|null $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }
}