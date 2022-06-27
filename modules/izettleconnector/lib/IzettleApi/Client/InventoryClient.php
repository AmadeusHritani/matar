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


use IzettleApi\Client\Inventory\LocationBuilder;
use IzettleApi\Exception\UnprocessableEntityException;
use IzettleApi\IzettleClientInterface;

final class InventoryClient
{
    const BASE_URL = 'https://inventory.izettle.com/organizations/%s';
    const GET_LOCATIONS = self::BASE_URL . '/locations';
    const POST_INVENTORY_BULK = self::BASE_URL . '/v2/inventory/bulk';
    const GET_INVENTORY_LOCATION = self::BASE_URL . '/inventory/locations/%s';
    const PUT_INVENTORY = self::BASE_URL . '/inventory';
    const GET_INVENTORY_PRODUCT = self::GET_INVENTORY_LOCATION . '/products/%s';

    private $client;
    private $organizationUuid = 'self';
    private $locationBuilder;
    //private $inventoryBuilder;

    public function __construct(
        IzettleClientInterface $client,
        $organizationUuid = 'self'
    ) {
        $this->client = $client;
        $this->organizationUuid = $organizationUuid;
        $this->locationBuilder = new LocationBuilder();
    }

    public function getLocations()//: array
    {
        $url = sprintf(self::GET_LOCATIONS, $this->organizationUuid);
        $json = $this->client->getJson($this->client->get($url));

        return $this->locationBuilder->buildFromJson($json);
    }

    /**
     * @throws UnprocessableEntityException
     */
    public function createProductInventory($productInventoryCreateObj)//: void
    {
        $url = sprintf(self::PUT_INVENTORY, $this->organizationUuid);

        $json = $this->client->getJson($this->client->post($url, $productInventoryCreateObj));

        return json_decode($json, true);
    }

    /**
     * @throws UnprocessableEntityException
     */
    public function createProductInventoryBulk($productChangeCollection)//: void
    {
        $url = sprintf(self::POST_INVENTORY_BULK, $this->organizationUuid);

        $json = $this->client->getJson($this->client->post($url, $productChangeCollection));

        return json_decode($json, true);
    }

    public function getInventory($locationUuid)//: array
    {
        $url = sprintf(self::GET_INVENTORY_LOCATION, $this->organizationUuid, $locationUuid);
        $json = $this->client->getJson($this->client->get($url));

        return json_decode($json, true);
    }

    public function getProductInventory($locationUuid, $productUuid)//: array
    {
        $url = sprintf(self::GET_INVENTORY_PRODUCT, $this->organizationUuid, $locationUuid, $productUuid);
        $json = $this->client->getJson($this->client->get($url));

        return json_decode($json, true);
    }

    public function updateInventory($productInventorySyncCollection)//: array
    {
        $url = sprintf(self::PUT_INVENTORY, $this->organizationUuid);
        $json = $this->client->getJson($this->client->put($url, $productInventorySyncCollection->getPostBodyData()));

        return json_decode($json, true);
    }
}