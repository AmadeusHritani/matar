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

namespace IzettleApi\API\Purchase;


use IzettleApi\API\Universal\IzettlePostable;

class Purchase extends IzettlePostable
{
    /**
     * @var string
     */
    protected $purchaseUuid;

    /**
     * @var string
     */
    protected $source;

    /**
     * @var string
     */
    protected $userUuid;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var int
     */
    protected $amount;

    /**
     * @var int
     */
    protected $vatAmount;

    /**
     * @var int
     */
    protected $timestamp;

    /**
     * @var string
     */
    protected $created;

    /**
     * @var GpsCoordinates
     */
    protected $gpsCoordinates;

    /**
     * @var int
     */
    protected $purchaseNumber;

    /**
     * @var string
     */
    protected $userDisplayName;

    /**
     * @var string
     */
    protected $udid;

    /**
     * @var string
     */
    protected $organizationUuid;

    /**
     * @var array
     */
    protected $products;

    /**
     * @var array
     */
    protected $discounts;

    /**
     * @var array
     */
    protected $payments;

    /**
     * @var array
     */
    protected $references;

    /**
     * @var string
     */
    protected $taxationMode;

    /**
     * @var string
     */
    protected $taxationType;

    /**
     * @var bool
     */
    protected $refund;

    public static function create(
        $purchaseUuid,
        $source,
        $userUuid,
        $currency,
        $country,
        $amount,
        $vatAmount,
        $timestamp,
        $created,
        $gpsCoordinates,
        $purchaseNumber,
        $userDisplayName,
        $udid,
        $organizationUuid,
        array $products,
        array $discounts,
        array $payments,
        $references,
        $taxationMode,
        $taxationType,
    $refund
    ) {
        return new self(
            $purchaseUuid,
            $source,
            $userUuid,
            $currency,
            $country,
            $amount,
            $vatAmount,
            $timestamp,
            $created,
            $gpsCoordinates,
            $purchaseNumber,
            $userDisplayName,
            $udid,
            $organizationUuid,
            $products,
            $discounts,
            $payments,
            $references,
            $taxationMode,
            $taxationType,
            $refund
        );
    }

    /**
     * Purchase constructor.
     * @param string $purchaseUuid
     * @param string $source
     * @param string $userUuid
     * @param string $currency
     * @param string $country
     * @param int $amount
     * @param int $vatAmount
     * @param int $timestamp
     * @param string $created
     * @param GpsCoordinates $gpsCoordinates
     * @param int $purchaseNumber
     * @param string $userDisplayName
     * @param string $udid
     * @param string $organizationUuid
     * @param array $products
     * @param array $discounts
     * @param array $payments
     * @param array $references
     * @param string $taxationMode
     * @param string $taxationType
     * @param bool $refund
     */
    public function __construct(
        $purchaseUuid,
        $source,
        $userUuid,
        $currency,
        $country,
        $amount,
        $vatAmount,
        $timestamp,
        $created,
        $gpsCoordinates,
        $purchaseNumber,
        $userDisplayName,
        $udid,
        $organizationUuid,
        array $products,
        array $discounts,
        array $payments,
        $references,
        $taxationMode,
        $taxationType,
        $refund
    ) {
        $this->purchaseUuid = $purchaseUuid;
        $this->source = $source;
        $this->userUuid = $userUuid;
        $this->currency = $currency;
        $this->country = $country;
        $this->amount = $amount;
        $this->vatAmount = $vatAmount;
        $this->timestamp = $timestamp;
        $this->created = $created;
        $this->gpsCoordinates = $gpsCoordinates;
        $this->purchaseNumber = $purchaseNumber;
        $this->userDisplayName = $userDisplayName;
        $this->udid = $udid;
        $this->organizationUuid = $organizationUuid;
        $this->products = $products;
        $this->discounts = $discounts;
        $this->payments = $payments;
        $this->references = $references;
        $this->taxationMode = $taxationMode;
        $this->taxationType = $taxationType;
        $this->refund = $refund;
    }


    /**
     * @return string|null
     */
    public function getPurchaseUuid()
    {
        return $this->purchaseUuid;
    }

    /**
     * @param string|null $purchaseUuid
     */
    public function setPurchaseUuid($purchaseUuid)
    {
        $this->purchaseUuid = $purchaseUuid;
    }

    /**
     * @return string|null
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string|null $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return string|null
     */
    public function getUserUuid()
    {
        return $this->userUuid;
    }

    /**
     * @param string|null $userUuid
     */
    public function setUserUuid($userUuid)
    {
        $this->userUuid = $userUuid;
    }

    /**
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return int|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int|null $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return int|null
     */
    public function getVatAmount()
    {
        return $this->vatAmount;
    }

    /**
     * @param int|null $vatAmount
     */
    public function setVatAmount($vatAmount)
    {
        $this->vatAmount = $vatAmount;
    }

    /**
     * @return int|null
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param int|null $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return string|null
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param string|null $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return GpsCoordinates|null
     */
    public function getGpsCoordinates()
    {
        return $this->gpsCoordinates;
    }

    /**
     * @param GpsCoordinates|null $gpsCoordinates
     */
    public function setGpsCoordinates($gpsCoordinates)
    {
        $this->gpsCoordinates = $gpsCoordinates;
    }

    /**
     * @return int|null
     */
    public function getPurchaseNumber()
    {
        return $this->purchaseNumber;
    }

    /**
     * @param int|null $purchaseNumber
     */
    public function setPurchaseNumber($purchaseNumber)
    {
        $this->purchaseNumber = $purchaseNumber;
    }

    /**
     * @return string|null
     */
    public function getUserDisplayName()
    {
        return $this->userDisplayName;
    }

    /**
     * @param string|null $userDisplayName
     */
    public function setUserDisplayName($userDisplayName)
    {
        $this->userDisplayName = $userDisplayName;
    }

    /**
     * @return string|null
     */
    public function getUdid()
    {
        return $this->udid;
    }

    /**
     * @param string|null $udid
     */
    public function setUdid($udid)
    {
        $this->udid = $udid;
    }

    /**
     * @return string|null
     */
    public function getOrganizationUuid()
    {
        return $this->organizationUuid;
    }

    /**
     * @param string|null $organizationUuid
     */
    public function setOrganizationUuid($organizationUuid)
    {
        $this->organizationUuid = $organizationUuid;
    }

    /**
     * @return array|null
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param array|null $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * @return array|null
     */
    public function getDiscounts()
    {
        return $this->discounts;
    }

    /**
     * @param array|null $discounts
     */
    public function setDiscounts($discounts)
    {
        $this->discounts = $discounts;
    }

    /**
     * @return array|null
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @param array|null $payments
     */
    public function setPayments($payments)
    {
        $this->payments = $payments;
    }

    /**
     * @return array|null
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * @param array|null $references
     */
    public function setReferences($references)
    {
        $this->references = $references;
    }

    /**
     * @return string|null
     */
    public function getTaxationMode()
    {
        return $this->taxationMode;
    }

    /**
     * @param string|null $taxationMode
     */
    public function setTaxationMode($taxationMode)
    {
        $this->taxationMode = $taxationMode;
    }

    /**
     * @return string|null
     */
    public function getTaxationType()
    {
        return $this->taxationType;
    }

    /**
     * @param string|null $taxationType
     */
    public function setTaxationType($taxationType)
    {
        $this->taxationType = $taxationType;
    }

    /**
     * @return bool
     */
    public function isRefund()
    {
        return $this->refund;
    }

    /**
     * @param bool $refund
     */
    public function setRefund($refund)
    {
        $this->refund = $refund;
    }


}