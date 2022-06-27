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
use IzettleApi\API\Universal\IzettlePostableInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Category extends IzettlePostable
{
    protected $uuid;
    protected $name;


    public static function create(
        $uuid,
        $name
    ) {
        return new self(
            $uuid,
            $name
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




    public function getPostBodyData()//: string
    {
        $data = [
            'uuid' => $this->uuid,
            'name' => $this->name,
        ];

        return json_encode($data);
    }

    protected function __construct(
        $uuid,
        $name
    ) {
        $this->uuid = $uuid;
        $this->name = $name;
    }
}
