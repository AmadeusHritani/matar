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

class Location extends IzettlePostable
{
    protected $uuid;
    protected $type;
    protected $name;
    protected $description;
    protected $default;

    /**
     * Location constructor.
     * @param $uuid
     * @param $type
     * @param $name
     * @param $description
     * @param $default
     */
    protected function __construct(
        $uuid,
        $type,
        $name,
        $description,
        $default
    )
    {
        $this->uuid = $uuid;
        $this->type = $type;
        $this->name = $name;
        $this->description = $description;
        $this->default = $default;
    }


    public static function create(
        $uuid,
        $type,
        $name,
        $description,
        $default
    ) {
        return new self(
            $uuid,
            $type,
            $name,
            $description,
            $default
        );
    }


    public function getUuid()//: UuidInterface
    {
        return $this->uuid;
    }

    public function getName()//: string
    {
        return $this->name;
    }
    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }




}