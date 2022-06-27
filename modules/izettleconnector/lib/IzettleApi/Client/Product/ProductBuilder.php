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
use IzettleApi\API\Product\Category;
use IzettleApi\API\Product\Presentation;
use IzettleApi\API\Product\Product;
use IzettleApi\API\Product\ProductCollection;
use IzettleApi\API\Product\VariantOptionDefinition;
use IzettleApi\API\Product\VariantOptionDefinitionCollection;
use IzettleApi\API\Product\VariantOptionDefinitionProperty;
use IzettleApi\Client\Universal\Builder;

final class ProductBuilder extends Builder
{
    private $imageBuilder;
    private $categoryBuilder;
    private $variantBuilder;

    /**
     * ProductBuilder constructor.
     * @param CategoryBuilder $categoryBuilder
     * @param Builder $imageBuilder
     * @param VariantBuilder $variantBuilder
     */
    public function __construct(
        $categoryBuilder,
        $imageBuilder,
        $variantBuilder
    ) {
        $this->categoryBuilder = $categoryBuilder;
        $this->imageBuilder = $imageBuilder;
        $this->variantBuilder = $variantBuilder;
    }

    /**
     * @param $json
     * @return Product[]
     */
    public function buildFromJson($json)//: array
    {
        $data = json_decode($json, true);

        if (isset($data['uuid']) && isset($data['name'])) {
            return $this->build($data);
        }

        $products = [];

        foreach ($data as $item) {
            $products[] = $this->build($item);
        }

        return $products;
    }

    public function buildFromArray($data)//: ProductCollection
    {
        $productCollection = new ProductCollection();

        foreach ($data as $product) {
            $productCollection->add($this->build($product));
        }

        return $productCollection;
    }

    private function build(array $data)//: Product
    {
        $presentation = null;
        if (isset($data['presentation'])) {

            $is_image = isset($data['presentation']['imageUrl']);
            $is_back = isset($data['presentation']['backgroundColor']);
            $is_color = isset($data['presentation']['textColor']);

            if($is_image || $is_back || $is_color) {
                $presentation =
                    Presentation::create(
                        $is_image ? $data['presentation']['imageUrl'] : null,
                        $is_back ? $data['presentation']['backgroundColor'] : null,
                        $is_color ? $data['presentation']['textColor'] : null
                    );
            }

        }

        $variantOptionDefinitions = null;
        if (isset($data['variantOptionDefinitions']) && isset($data['variantOptionDefinitions']['definitions'])) {

            $options = array();
            foreach ($data['variantOptionDefinitions']['definitions'] as $definition) {

                $properties = array();

                foreach ($definition['properties'] as $property) {

                    $properties[] = VariantOptionDefinitionProperty::create(
                                        $property['value'],
                                        $property['imageUrl']
                                    );
                }

                $options[] =
                    VariantOptionDefinition::create(
                        $definition['name'],
                        $properties
                    );
            }

            $variantOptionDefinitions = VariantOptionDefinitionCollection::create($options);
        }




        return Product::create(
            $data['uuid'],
            $data['categories'],
            $data['name'],
            $data['description'],
            isset($data['imageLookupKeys']) ? $data['imageLookupKeys'] : null,
            $presentation,
            $this->variantBuilder->buildFromArray($data['variants']),
            $data['externalReference'],
            isset($data['unitName']) ? $data['unitName'] : null,
            isset($data['vatPercentage']) ? (float) $data['vatPercentage'] : null,
            $variantOptionDefinitions,
            isset($data['taxCode']) ? $data['taxCode'] : null,
            $this->categoryBuilder->buildFromArray($data['category']),
            isset($data['taxRates']) ? $data['taxRates'] : null,
            isset($data['taxExempt']) ? ((bool) $data['taxExempt']) : null,
            isset($data['createWithDefaultTax']) ? ((bool) $data['createWithDefaultTax']) : null
        );
    }
}
