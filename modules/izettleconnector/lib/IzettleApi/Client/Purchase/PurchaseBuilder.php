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

namespace IzettleApi\Client\Purchase;

use IzettleApi\API\Purchase\GpsCoordinates;
use IzettleApi\API\Purchase\Payment;
use IzettleApi\API\Purchase\Purchase;
use IzettleApi\API\Purchase\PurchaseProduct;
use IzettleApi\API\Purchase\PurchaseCollection;
use IzettleApi\Client\Universal\Builder;

class PurchaseBuilder extends Builder
{
    /**
     * @param $json
     * @return Purchase
     */
    public function buildFromJson($json)//: array
    {
        $data = json_decode($json, true);

        if (isset($data['purchaseUuid']) && isset($data['amount'])) {
            return $this->build($data);
        }

        $purchases = [];

        foreach ($data['purchases'] as $item) {
            $purchases[] = $this->build($item);
        }

        return PurchaseCollection::create($purchases, $data['firstPurchaseHash'], $data['lastPurchaseHash'], $data['linkUrls']);
    }


    private function build(array $data)//: Product
    {
        $gpsCoordinates = null;
        if (isset($data['gpsCoordinates'])) {
            $gpsCoordinatesData = $data['gpsCoordinates'];
            $gpsCoordinates =
                GpsCoordinates::create(
                    floatval($gpsCoordinatesData['longitude']),
                    floatval($gpsCoordinatesData['latitude']),
                    floatval($gpsCoordinatesData['accuracyMeters'])
                );


        }

        $products = array();
        if (isset($data['products'])) {
            foreach ($data['products'] as $purchase_product_data) {

                $costPrice = isset($purchase_product_data['costPrice'])
                    ? (((int)$purchase_product_data['costPrice']) * 0.01)
                    : null;
                $discount = false;
                if (isset($purchase_product_data['discount'])) {
                    $discount = $purchase_product_data['discount'];
                }
                $products[] = \IzettleApi\API\Purchase\PurchaseProduct::create(
                    $purchase_product_data['productUuid'],
                    $purchase_product_data['variantUuid'],
                    $purchase_product_data['name'],
                    $purchase_product_data['variantName'],
                    $purchase_product_data['sku'],
                    ((int)$purchase_product_data['unitPrice']) * 0.01,
                    $costPrice,
                    (int)$purchase_product_data['quantity'],
                    $purchase_product_data['vatPercentage'],
                    $purchase_product_data['taxRates'],
                    $purchase_product_data['taxExempt'],
                    $purchase_product_data['taxCode'],
                    $purchase_product_data['type'],
                    $discount
                );
            }
        }


        $payments = array();
        if (isset($data['payments'])) {
            foreach ($data['payments'] as $purchase_payment_data) {

                $references = isset($purchase_payment_data['references']) ? $purchase_payment_data['references'] : array();
                $attributes = isset($purchase_payment_data['attributes']) ? $purchase_payment_data['attributes'] : array();
                $payments[] = Payment::create(
                    $purchase_payment_data['uuid'],
                    ((int) $purchase_payment_data['amount'])*0.01,
                    $purchase_payment_data['type'],
                    is_null($references) ? array() : $references,
                    is_null($attributes) ? array() : $attributes
                );
            }
        }

        $discounts = array();
        if (isset($data['discounts'])) {
            $discounts = $data['discounts'];
        }

        $is_refund = isset($data['refund']) ? ((bool) $data['refund']) : false;


        return Purchase::create(
            $data['purchaseUuid'],
            $data['source'],
            $data['userUuid'],
            $data['currency'],
            $data['country'],
            ((int) $data['amount'])*0.01,
            ((int) $data['vatAmount'])*0.01,
            $data['timestamp'],
            $data['created'],
            $gpsCoordinates,
            $data['purchaseNumber'],
            $data['userDisplayName'],
            $data['udid'],
            $data['organizationUuid'],
            $products,
            $discounts,
            $payments,
            $data['references'],
            $data['taxationMode'],
            $data['taxationType'],
            $is_refund
        );
    }
}