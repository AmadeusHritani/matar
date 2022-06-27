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

namespace IzettleApi\Client;

use IzettleApi\API\Product\Category;
use IzettleApi\API\Product\Discount;
use IzettleApi\API\Product\Library;
use IzettleApi\API\Product\Product;
use IzettleApi\API\Product\ProductCollection;
use IzettleApi\Client\Exception\ImportException;
use IzettleApi\Client\Product\CategoryBuilder;
use IzettleApi\Client\Product\DiscountBuilder;
use IzettleApi\Client\Product\LibraryBuilder;
use IzettleApi\Client\Product\ProductBuilder;
use IzettleApi\Client\Product\TaxBuilder;
use IzettleApi\Client\Product\VariantBuilder;
use IzettleApi\Client\Universal\ImageBuilder;
use IzettleApi\Exception\UnprocessableEntityException;
use IzettleApi\IzettleClientInterface;

final class ProductClient
{
    const BASE_URL = 'https://products.izettle.com/organizations/%s';

    const POST_CATEGORY = self::BASE_URL . '/categories';
    const GET_CATEGORY = self::BASE_URL . '/categories/%s';
    const GET_CATEGORIES = self::BASE_URL . '/categories';

    const POST_DISCOUNT = self::BASE_URL . '/discounts';
    const GET_DISCOUNT = self::BASE_URL . '/discounts/%s';
    const PUT_DISCOUNT = self::BASE_URL . '/discounts/%s';
    const DELETE_DISCOUNT = self::BASE_URL . '/discounts/%s';
    const GET_DISCOUNTS = self::BASE_URL . '/discounts';

    const GET_EXPORT = self::BASE_URL . '/products/%s';
    const GET_EXPORT_TEMPLATE = self::BASE_URL . '/products/%s/template';

    const GET_LIBRARY = self::BASE_URL . '/library';

    const POST_PRODUCT = self::BASE_URL . '/products';
    const POST_PRODUCT_BULK_IMPORT = self::BASE_URL . '/import/v2';
    const MAX_BULK_IMPORT_COUNT = 2000;
    const GET_PRODUCT_BULK_IMPORT_STATUS = self::BASE_URL . '/import/status/%s';
    const GET_PRODUCT = self::BASE_URL . '/products/%s';
    const PUT_PRODUCT = self::BASE_URL . '/products/v2/%s';
    const DELETE_PRODUCT = self::BASE_URL . '/products/%s';
    const DELETE_PRODUCTS_BULK = self::BASE_URL . '/products?%s';
    const MAX_BULK_DELETE_COUNT = 100;
    const POST_PRODUCT_VARIANT = self::BASE_URL . '/products/%s/variants';
    const PUT_PRODUCT_VARIANT = self::BASE_URL . '/products/%s/variants/%s';
    const DELETE_PRODUCT_VARIANT = self::BASE_URL . '/products/%s/variants/%s';
    const GET_PRODUCTS = self::BASE_URL . '/products';
    const DELETE_PRODUCTS = self::BASE_URL . '/products';

    const GET_TAXES = 'https://products.izettle.com/v1/taxes';

    private $client;
    private $organizationUuid;
    private $categoryBuilder;
    private $discountBuilder;
    private $libraryBuilder;
    private $productBuilder;
    private $taxBuilder;

    public function __construct(
        IzettleClientInterface $client,
        $organizationUuid
    ) {
        $this->client = $client;
        $this->organizationUuid = $organizationUuid ? $organizationUuid : 'self';

        $categoryBuilder = new CategoryBuilder();
        $imageBuilder = new ImageBuilder();
        $variantBuilder = new VariantBuilder();
        $discountBuilder = new DiscountBuilder($imageBuilder);
        $productBuilder = new ProductBuilder($categoryBuilder, $imageBuilder, $variantBuilder);
        $libraryBuilder = new LibraryBuilder($productBuilder, $discountBuilder);
        $taxBuilder = new TaxBuilder();

        $this->categoryBuilder = $categoryBuilder;
        $this->discountBuilder = $discountBuilder;
        $this->libraryBuilder = $libraryBuilder;
        $this->productBuilder = $productBuilder;
        $this->taxBuilder = $taxBuilder;
    }

    /**
     * @return Category[]
     */
    public function getCategories()//: array
    {
        $url = sprintf(self::GET_CATEGORIES, $this->organizationUuid);
        $json = $this->client->getJson($this->client->get($url));

        return $this->categoryBuilder->buildFromJson($json);
    }

    /**
     * @throws UnprocessableEntityException
     */
    public function createCategory($category)//: void
    {
        $url = sprintf(self::POST_CATEGORY, $this->organizationUuid);
        $this->client->post($url, $category);
    }

    /**
     * @return Discount[]
     */
    public function getDiscounts()//: array
    {
        $url = sprintf(self::GET_DISCOUNTS, $this->organizationUuid);
        $json = $this->client->getJson($this->client->get($url));

        return $this->discountBuilder->buildFromJson($json);
    }

    /**
     * @return Discount[]
     */
    public function getDiscount($uuid)//: array
    {
        $url = $url = sprintf(self::GET_DISCOUNT, $this->organizationUuid, $uuid);

        $json = $this->client->getJson($this->client->get($url));

        return $this->discountBuilder->build($json);
    }

    /**
     * @throws UnprocessableEntityException
     */
    public function createDiscount($discount)//: void
    {
        $url = sprintf(self::POST_DISCOUNT, $this->organizationUuid);

        $this->client->post($url, $discount);
    }

    /**
     * @throws UnprocessableEntityException
     */
    public function updateDiscount($discount)//: void
    {
        $url = $url = sprintf(self::PUT_DISCOUNT, $this->organizationUuid, $discount->getUuid());
        $this->client->put($url, $discount->getPostBodyData());
    }

    /**
     * @throws UnprocessableEntityException
     */
    public function deleteDiscount($uuid)//: void
    {
        $url = sprintf(self::DELETE_DISCOUNT, $this->organizationUuid, $uuid);

        $this->client->delete($url);
    }

    public function getLibrary()//: Library
    {
        $url = sprintf(self::GET_LIBRARY, $this->organizationUuid);
        $json = $this->client->getJson($this->client->get($url));

        return $this->libraryBuilder->buildFromJson($json);
    }

    /**
     * @return Product[]
     */
    public function getProducts()//: array
    {
        $url = sprintf(self::GET_PRODUCTS, $this->organizationUuid);
        $json = $this->client->getJson($this->client->get($url));

        return $this->productBuilder->buildFromJson($json);
    }

    public function getProduct($uuid)//: array
    {
        $url = sprintf(self::GET_PRODUCT, $this->organizationUuid, $uuid);
        $response = $this->client->get($url);
        $json = $this->client->getJson($response);

        $product = $this->productBuilder->buildFromJson($json);
        $headers = $response->getHeaders();
        if (isset($headers['ETag'])) {
            $product->setETag($headers['ETag']);
        }
        if (isset($headers['etag'])) {
            $product->setETag($headers['etag']);
        }

        return $product;
    }


    /**
     * @throws UnprocessableEntityException
     */
    public function createProduct($product)//: void
    {
        $url = sprintf(self::POST_PRODUCT, $this->organizationUuid);

        $this->client->post($url, $product);
    }

    public function updateProduct($productUuid, $json, $headers)
    {
        $url = sprintf(self::PUT_PRODUCT, $this->organizationUuid, $productUuid);

        $this->client->put($url, $json, $headers);
    }

    /**
     * @throws UnprocessableEntityException
     */
    public function deleteProduct($product)//: void
    {
        $url = sprintf(self::DELETE_PRODUCT, $this->organizationUuid, $product->getUuid());

        $this->client->delete($url);
    }

    public function deleteProductBulk($products)//: void
    {
        $count = count($products);

        if ($count < 1) {
            return;
        }
        if ($count > self::MAX_BULK_DELETE_COUNT) {
            $portions = ceil($count/self::MAX_BULK_DELETE_COUNT);
            for ($i = 0; $i < $portions; $i++) {
                $this->deleteProductBulk(array_slice($products, $i*self::MAX_BULK_DELETE_COUNT, self::MAX_BULK_DELETE_COUNT));
            }
            return;
        }

        $uuids = "";

        foreach ($products as $product) {
            $current_uuid = false;
            if ($product instanceof Product) {
                $current_uuid = $product->getUuid();
            } elseif (is_array($product) && isset($product['uuid'])) {
                $current_uuid = $product['uuid'];
            } elseif (is_string($product)) {
                $current_uuid = $product;
            }
            if ($current_uuid) {
                $uuids .= "&uuid=".$current_uuid;
            }
        }
        $url = sprintf(self::DELETE_PRODUCTS_BULK, $this->organizationUuid, $uuids);

        $this->client->delete($url);
    }

    /**
     * @param $products
     * @return array
     * @throws ImportException
     * @throws UnprocessableEntityException
     */
    public function importProductsAsync($products)//: void
    {

        $import_uuids = array();
        $count = count($products);

        if ($count < 1) {
            return $import_uuids;
        }
        if ($count > self::MAX_BULK_IMPORT_COUNT) {
            $portions = ceil($count/self::MAX_BULK_IMPORT_COUNT);
            $imported = 0;
            try {
                for ($i = 0; $i < $portions; $i++) {
                    $import_uuids = array_merge(
                                        $import_uuids,
                                        $this->importProductsAsync(
                                            array_slice(
                                                $products,
                                                $i * self::MAX_BULK_IMPORT_COUNT,
                                                self::MAX_BULK_IMPORT_COUNT
                                            )
                                        )
                                    );

                    $imported += self::MAX_BULK_IMPORT_COUNT;
                }
                $imported = $count;
            } catch (\Exception $e) {
                throw new ImportException($e->getMessage(), $imported, $count, $import_uuids);
            }
        } else {
            $url =
                sprintf(
                    self::POST_PRODUCT_BULK_IMPORT,
                    $this->organizationUuid
                );
            $request = $this->client->post($url, ProductCollection::create($products));

            if ($request) {
                $data =
                    json_decode(
                        $request->getBody(),
                        true
                    );

                if (isset($data['uuid'])) {
                    $import_uuids[] = $data['uuid'];
                }
            }
        }

        return $import_uuids;
    }


    public function getImportStatus($import_uuid)//: void
    {
        $url = sprintf(self::GET_PRODUCT_BULK_IMPORT_STATUS, $this->organizationUuid, $import_uuid);

        return $this->client->get($url);
    }


    public function getTaxes()//: void
    {
        $url = self::GET_TAXES;

        return $this->taxBuilder->buildFromJson($this->client->getJson($this->client->get($url)));
    }


}
