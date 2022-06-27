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

class DiscountCollection
{
    /** @var Discount[] */
    protected $collection = [];

    public function __construct(?array $discounts = [])
    {
        foreach ($discounts as $discount) {
            $this->add($discount);
        }
    }

    public function add(Discount $discount): void
    {
        $this->collection[(string) $discount->getUuid()] = $discount;
    }

    public function remove(Discount $discount): void
    {
        unset($this->collection[(string) $discount->getUuid()]);
    }

    public function get(UuidInterface $key): Discount
    {
        return $this->collection[(string) $key];
    }

    /** @return Discount[] */
    public function getAll()//: array
    {
        return $this->collection;
    }
}
