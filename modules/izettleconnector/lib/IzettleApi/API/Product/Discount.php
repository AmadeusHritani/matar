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
use IzettleApi\API\ImageCollection;
use IzettleApi\API\Universal\IzettlePostable;


class Discount extends IzettlePostable
{
    protected $uuid;
    protected $name;
    protected $description;
    protected $amount;
    protected $percentage;
    protected $externalReference;
    protected $imageCollection;
    protected $etag;
    protected $updatedAt;
    protected $updatedBy;
    protected $createdAt;

    public static function create(
        $uuid,
        $name,
        $description,
        $amount = null,
        $percentage = null,
        $externalReference = null,
        $imageCollection = null,
        $etag = null,
        $updatedAt = null,
        $updatedBy = null,
        $createdAt = null
    ) {
        return new self(
            $uuid,
            $name,
            $description,
            $amount,
            $percentage,
            $externalReference,
            $imageCollection,
            $etag,
            $updatedAt,
            $updatedBy,
            $createdAt
        );
    }

//    public static function new(
//        string $name,
//        string $description,
//        ImageCollection $imageCollection,
//        Money $amount = null,
//        float $percentage = null,
//        string $externalReference = null
//    ): self {
//        return new self(
//            Uuid::uuid1(),
//            $name,
//            $description,
//            $imageCollection,
//            $amount,
//            $percentage,
//            $externalReference
//        );
//    }

    public function getUuid()//: UuidInterface
    {
        return $this->uuid;
    }

    public function getName()//: string
    {
        return $this->name;
    }

    public function getDescription()//: string
    {
        return $this->description;
    }

    public function getImageCollection()//: ?ImageCollection
    {
        return $this->imageCollection;
    }

    public function getAmount()//: ?Money
    {
        return $this->amount;
    }

    public function getPercentage()//: ?float
    {
        return $this->percentage;
    }

    public function getExternalReference()//: ?string
    {
        return $this->externalReference;
    }

    public function getEtag()//: ?string
    {
        return $this->etag;
    }

    public function getUpdatedAt()//: ?DateTime
    {
        return $this->updatedAt;
    }

    public function getUpdatedBy()//: ?UuidInterface
    {
        return $this->updatedBy;
    }

    public function getCreatedAt()//: ?DateTime
    {
        return $this->createdAt;
    }


    protected function __construct(
        $uuid,
        $name,
        $description,
        $amount = null,
        $percentage = null,
        $externalReference = null,
        $imageCollection = null,
        $etag = null,
        $updatedAt = null,
        $updatedBy = null,
        $createdAt = null
    ) {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->description = $description;
        $this->imageCollection = $imageCollection;
        $this->amount = $amount;
        $this->percentage = $percentage;
        $this->externalReference = $externalReference;
        $this->etag = $etag;
        $this->updatedAt = $updatedAt;
        $this->updatedBy = $updatedBy;
        $this->createdAt = $createdAt;
    }

//    public function getPostBodyData()//: string
//    {
//        $data = [
//            'uuid' => $this->uuid,
//            'name' => $this->name,
//            'description' => $this->description,
//            'imageLookupKeys' => $this->imageCollection->getCreateDataArray(),
//            'externalReference' => $this->externalReference
//        ];
//
//        if ($this->amount) {
//            $data['amount'] = [
//                'amount' => $this->amount->getAmount(),
//                'currencyId' => (string) $this->amount->getCurrency(),
//            ];
//        }
//
//        if ($this->percentage) {
//            $data['percentage'] = (string) $this->percentage;
//        }
//
//        return json_encode($data);
//    }
}
