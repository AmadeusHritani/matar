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
use IzettleApi\IzettleClientInterface;

final class WebhookClient
{
    const BASE_URL = 'https://pusher.izettle.com/organizations/%s';
    const POST_SUBSCRIPTION = self::BASE_URL . '/subscriptions';
    const GET_SUBSCRIPTIONS = self::POST_SUBSCRIPTION;
    const DELETE_SUBSCRIPTION = self::POST_SUBSCRIPTION . '/uuid/%s';
    private $client;
    private $organizationUuid = 'self';


    public function __construct(
        IzettleClientInterface $client,
        $organizationUuid = 'self'
    ) {
        $this->client = $client;
        $this->organizationUuid = $organizationUuid;
    }

    public function getSubscriptions()//: void
    {
        $url = sprintf(self::GET_SUBSCRIPTIONS, $this->organizationUuid);

        $json = $this->client->getJson($this->client->get($url));

        return json_decode($json, true);
    }

    public function createSubscription($subscription)//: void
    {
        $url = sprintf(self::POST_SUBSCRIPTION, $this->organizationUuid);

        $json = $this->client->getJson($this->client->post($url, $subscription));

        return json_decode($json, true);
    }

    public function deleteSubscription($uuid)//: void
    {
        $url = sprintf(self::DELETE_SUBSCRIPTION, $this->organizationUuid, $uuid);

        $this->client->delete($url);
    }

}