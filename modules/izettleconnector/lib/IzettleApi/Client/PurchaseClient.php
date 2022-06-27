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

use IzettleApi\Client\Purchase\PurchaseBuilder;
use IzettleApi\IzettleClientInterface;


final class PurchaseClient
{
    const BASE_URL = 'https://purchase.izettle.com';

    const GET_LIST = self::BASE_URL . '/purchases/v2?limit=%s&descending=%s';
    const GET_PURCHASE = self::BASE_URL . ' /purchase/%s';

    private $client;
    private $purchaseBuilder;

    /**
     * PurchaseClient constructor.
     * @param $client
     * @param $purchaseBuilder
     */
    public function __construct(IzettleClientInterface $client)
    {
        $this->client = $client;
        $this->purchaseBuilder = new PurchaseBuilder();
    }

    public function getPurchaseList($limit = 50, $is_desc = true)//: array
    {
        $url = sprintf(self::GET_LIST, $limit, $is_desc ? 'true' : 'false');
        $json = $this->client->getJson($this->client->get($url));
        return $this->purchaseBuilder->buildFromJson($json);
    }

    public function getPurchase($purchaseUUID)//: array
    {
        $url = sprintf(self::GET_PURCHASE, $purchaseUUID);
        $json = $this->client->getJson($this->client->get($url));
        return $this->purchaseBuilder->buildFromJson($json);
    }

}