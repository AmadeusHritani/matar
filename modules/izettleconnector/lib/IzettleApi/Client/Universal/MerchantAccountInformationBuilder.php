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

namespace IzettleApi\Client\Universal;


use IzettleApi\API\MerchantAccountInformation;

class MerchantAccountInformationBuilder extends Builder
{

    public function buildFromJson($json)
    {
        $data = json_decode($json, true);

        return $this->build($data);
    }

    private function build($data)
    {
        $usesVat = (bool)$data['usesVat'];
        return MerchantAccountInformation::create(
            $data['uuid'],
            $data['name'],
            $data['receiptName'],
            $data['city'],
            $data['zipCode'],
            $data['address'],
            $data['addressLine2'],
            $data['legalName'],
            $data['legalAddress'],
            $data['legalZipCode'],
            $data['legalCity'],
            $data['legalState'],
            $data['phoneNumber'],
            $data['contactEmail'],
            $data['receiptEmail'],
            $data['legalEntityType'],
            $data['legalEntityNr'],
            (float) $data['vatPercentage'],
            $data['country'],
            $data['language'],
            $data['currency'],
            $data['created'],
            $data['ownerUuid'],
            $data['organizationId'],
            $data['customerStatus'],
            $usesVat,
            $data['customerType'],
            isset($data['taxationType']) ? $data['taxationType'] : ($usesVat ? 'VAT' : 'NONE'),
            isset($data['taxationMode']) ? $data['taxationMode'] : 'EXCLUSIVE',
            $data['timeZone']
        );
    }
}