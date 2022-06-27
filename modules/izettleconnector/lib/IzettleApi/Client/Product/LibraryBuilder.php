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

use IzettleApi\API\Product\Library;
use IzettleApi\Client\Universal\Builder;

final class LibraryBuilder extends Builder
{
    private $productBuilder;
    private $discountBuilder;

    /**
     * LibraryBuilder constructor.
     * @param ProductBuilder $productBuilder
     * @param DiscountBuilder $discountBuilder
     */
    public function __construct(
        $productBuilder,
        $discountBuilder
    ) {
        $this->productBuilder = $productBuilder;
        $this->discountBuilder = $discountBuilder;
    }

    public function buildFromJson($json)
    {
        $data = json_decode($json, true);
        $fromEventLogUuid = $data['fromEventLogUuid'] ? $data['fromEventLogUuid'] : null;

        return new Library(
            $fromEventLogUuid,
            $data['untilEventLogUuid'],
            $this->productBuilder->buildFromArray($data['products']),
            $this->discountBuilder->buildFromArray($data['discounts']),
            $this->productBuilder->buildFromArray($data['deletedProducts']),
            $this->discountBuilder->buildFromArray($data['deletedDiscounts'])
        );
    }
}
