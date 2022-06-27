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

use Ramsey\Uuid\UuidInterface;

class Library
{
    protected $fromEventLogUuid;
    protected $untilEventLogUuid;
    protected $products;
    protected $discounts;
    protected $deletedProducts;
    protected $deletedDiscounts;

    public function __construct(
        UuidInterface $fromEventLogUuid = null,
        UuidInterface $untilEventLogUuid,
        ProductCollection $products,
        DiscountCollection $discounts,
        ProductCollection $deletedProducts,
        DiscountCollection $deletedDiscounts
    ) {
        $this->fromEventLogUuid = $fromEventLogUuid;
        $this->untilEventLogUuid = $untilEventLogUuid;
        $this->products = $products;
        $this->discounts = $discounts;
        $this->deletedProducts = $deletedProducts;
        $this->deletedDiscounts = $deletedDiscounts;
    }

    public function getFromEventLogUuid()//: ?UuidInterface
    {
        return $this->fromEventLogUuid;
    }

    public function getUntilEventLogUuid()//: UuidInterface
    {
        return $this->untilEventLogUuid;
    }

    public function getProducts()//: ProductCollection
    {
        return $this->products;
    }

    public function getDiscounts()//: DiscountCollection
    {
        return $this->discounts;
    }

    public function getDeletedProducts()//: ProductCollection
    {
        return $this->deletedProducts;
    }

    public function getDeletedDiscounts()//: DiscountCollection
    {
        return $this->deletedDiscounts;
    }
}
