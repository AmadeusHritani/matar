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


use IzettleApi\Client\Universal\ImageBuilderInterface;
use IzettleApi\IzettleClientInterface;

final class AccountClient
{
    const BASE_URL = 'https://secure.izettle.com/api/resources/organizations/self';


    private $client;
    private $merchantAccountInformationBuilder;

    public function __construct(
         $client,
         $merchantAccountInformationBuilder
    ) {
        $this->client = $client;
        $this->merchantAccountInformationBuilder = $merchantAccountInformationBuilder;
    }


    public function getMerchantAccountInformation()//: MerchantAccountInformation
    {

        $json = $this->client->getJson($this->client->get(self::BASE_URL));

        return $this->merchantAccountInformationBuilder->buildFromJson($json);
    }
}