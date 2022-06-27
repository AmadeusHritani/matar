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

namespace IzettleApi;

use IzettleApi\Client\AccountClient;
use IzettleApi\Client\ImageClient;
use IzettleApi\Client\InventoryClient;
use IzettleApi\Client\Product\CategoryBuilder;
use IzettleApi\Client\Product\DiscountBuilder;
use IzettleApi\Client\Product\LibraryBuilder;
use IzettleApi\Client\Product\ProductBuilder;
use IzettleApi\Client\Product\VariantBuilder;
use IzettleApi\Client\ProductClient;
use IzettleApi\Client\PurchaseClient;
use IzettleApi\Client\Universal\ImageBuilder;
use IzettleApi\Client\Universal\MerchantAccountInformationBuilder;
use IzettleApi\Client\WebhookClient;


final class IzettleClientFactory
{
    public static function getProductClient($client, $organizationUuid = null)//: ProductClient
    {
        return new ProductClient(
            $client,
            $organizationUuid
        );
    }

    public static function getImageClient(IzettleClientInterface $client, $organizationUuid = null)//: ImageClient
    {
        return new ImageClient($client, $organizationUuid, new ImageBuilder());
    }

    public static function getAccountClient(IzettleClientInterface $client)
    {
        return new AccountClient($client, new MerchantAccountInformationBuilder());
    }

    public static function getInventoryClient(IzettleClientInterface $client, $organizationUuid = null)
    {
        return new InventoryClient($client, $organizationUuid);
    }

    public static function getWebhookClient(IzettleClientInterface $client, $organizationUuid = null)
    {
        return new WebhookClient($client, $organizationUuid);
    }

    public static function getPurchaseClient(IzettleClientInterface $client)
    {
        return new PurchaseClient($client);
    }
}
