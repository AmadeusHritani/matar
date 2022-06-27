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

namespace IzettleApi\Client\Product;

use DateTime;
use IzettleApi\API\Product\Discount;
use IzettleApi\API\Product\DiscountCollection;
use IzettleApi\API\Product\Price;
use IzettleApi\Client\Universal\Builder;


final class DiscountBuilder extends Builder
{
    private $imageBuilder;

    public function __construct($imageBuilder)
    {
        $this->imageBuilder = $imageBuilder;
    }

    /**
     * @return Discount[]
     */
    public function buildFromJson($json)
    {
        $products = [];
        $data = json_decode($json, true);
        foreach ($data as $product) {
            $products[] = $this->build($product);
        }

        return $products;
    }

    public function buildFromArray($discounts)
    {
        $discountCollection = new DiscountCollection();

        foreach ($discounts as $discount) {
            $discountCollection->add($this->build($discount));
        }

        return $discountCollection;
    }
    
    public function build(array $data)//: Discount
    {
        return Discount::create(
            $data['uuid'],
            $data['name'],
            $data['description'],
            $data['amount'] ? new Price(0.01 * $data['amount']['amount'], $data['amount']['currencyId']) : null,
            $data['percentage'] ? (float)$data['percentage'] : null,
            $data['externalReference'] ? $data['externalReference'] : null,
            $data['imageLookupKeys'] ? $data['imageLookupKeys'] : null,
            $data['etag'],
            new DateTime($data['updated']),
            $data['updatedBy'],
            new DateTime($data['created'])
        );
    }
}
