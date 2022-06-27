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

namespace IzettleApi\API;


class MerchantAccountInformation
{
    /**
     * @var string
     */
    private $uuid;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $receiptName;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $zipCode;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $addressLine2;

    /**
     * @var string
     */
    private $legalName;

    /**
     * @var string
     */
    private $legalAddress;

    /**
     * @var string
     */
    private $legalZipCode;

    /**
     * @var string
     */
    private $legalCity;

    /**
     * @var string
     */
    private $legalState;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $contactEmail;

    /**
     * @var string
     */
    private $receiptEmail;

    /**
     * @var string
     */
    private $legalEntityType;

    /**
     * @var string
     */
    private $legalEntityNr;

    /**
     * @var float
     */
    private $vatPercentage;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $language;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $created;

    /**
     * @var string
     */
    private $ownerUuid;

    /**
     * @var string
     */
    private $organizationId;

    /**
     * @var string
     */
    private $customerStatus;

    /**
     * @var bool
     */
    private $usesVat;

    /**
     * @var string
     */
    private $customerType;

    /**
     * @var string
     */
    private $taxationType;

    /**
     * @var string
     */
    private $taxationMode;

    /**
     * @var string
     */
    private $timeZone;

    public static function create(
        $uuid,
        $name,
        $receiptName,
        $city,
        $zipCode,
        $address,
        $addressLine2,
        $legalName,
        $legalAddress,
        $legalZipCode,
        $legalCity,
        $legalState,
        $phoneNumber,
        $contactEmail,
        $receiptEmail,
        $legalEntityType,
        $legalEntityNr,
        $vatPercentage,
        $country,
        $language,
        $currency,
        $created,
        $ownerUuid,
        $organizationId,
        $customerStatus,
        $usesVat,
        $customerType,
        $taxationType,
        $taxationMode,
        $timeZone
    ) {
        return new self(
            $uuid,
            $name,
            $receiptName,
            $city,
            $zipCode,
            $address,
            $addressLine2,
            $legalName,
            $legalAddress,
            $legalZipCode,
            $legalCity,
            $legalState,
            $phoneNumber,
            $contactEmail,
            $receiptEmail,
            $legalEntityType,
            $legalEntityNr,
            $vatPercentage,
            $country,
            $language,
            $currency,
            $created,
            $ownerUuid,
            $organizationId,
            $customerStatus,
            $usesVat,
            $customerType,
            $taxationType,
            $taxationMode,
            $timeZone
        );
    }

    /**
     * MerchantAccountInformation constructor.
     * @param string $uuid
     * @param string $name
     * @param string $receiptName
     * @param string $city
     * @param string $zipCode
     * @param string $address
     * @param string $addressLine2
     * @param string $legalName
     * @param string $legalAddress
     * @param string $legalZipCode
     * @param string $legalCity
     * @param string $legalState
     * @param string $phoneNumber
     * @param string $contactEmail
     * @param string $receiptEmail
     * @param string $legalEntityType
     * @param string $legalEntityNr
     * @param float $vatPercentage
     * @param string $country
     * @param string $language
     * @param string $currency
     * @param string $created
     * @param string $ownerUuid
     * @param string $organizationId
     * @param string $customerStatus
     * @param bool $usesVat
     * @param string $customerType
     * @param string $taxationType
     * @param string $taxationMode
     * @param string $timeZone
     */
    public function __construct(
        $uuid,
        $name,
        $receiptName,
        $city,
        $zipCode,
        $address,
        $addressLine2,
        $legalName,
        $legalAddress,
        $legalZipCode,
        $legalCity,
        $legalState,
        $phoneNumber,
        $contactEmail,
        $receiptEmail,
        $legalEntityType,
        $legalEntityNr,
        $vatPercentage,
        $country,
        $language,
        $currency,
        $created,
        $ownerUuid,
        $organizationId,
        $customerStatus,
        $usesVat,
        $customerType,
        $taxationType,
        $taxationMode,
        $timeZone)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->receiptName = $receiptName;
        $this->city = $city;
        $this->zipCode = $zipCode;
        $this->address = $address;
        $this->addressLine2 = $addressLine2;
        $this->legalName = $legalName;
        $this->legalAddress = $legalAddress;
        $this->legalZipCode = $legalZipCode;
        $this->legalCity = $legalCity;
        $this->legalState = $legalState;
        $this->phoneNumber = $phoneNumber;
        $this->contactEmail = $contactEmail;
        $this->receiptEmail = $receiptEmail;
        $this->legalEntityType = $legalEntityType;
        $this->legalEntityNr = $legalEntityNr;
        $this->vatPercentage = $vatPercentage;
        $this->country = $country;
        $this->language = $language;
        $this->currency = $currency;
        $this->created = $created;
        $this->ownerUuid = $ownerUuid;
        $this->organizationId = $organizationId;
        $this->customerStatus = $customerStatus;
        $this->usesVat = $usesVat;
        $this->customerType = $customerType;
        $this->taxationType = $taxationType;
        $this->taxationMode = $taxationMode;
        $this->timeZone = $timeZone;
    }


    /**
     * @return string|null
     */
    public function getUuid()//: ?string
    {
        return $this->uuid;
    }

    /**
     * @param string|null $uuid
     *
     * @return MerchantAccountInformation
     */
    public function setUuid($uuid)//: MerchantAccountInformation
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName()//: ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return MerchantAccountInformation
     */
    public function setName($name)//: MerchantAccountInformation
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReceiptName()//: ?string
    {
        return $this->receiptName;
    }

    /**
     * @param string|null $receiptName
     *
     * @return MerchantAccountInformation
     */
    public function setReceiptName($receiptName)//: MerchantAccountInformation
    {
        $this->receiptName = $receiptName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity()//: ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     *
     * @return MerchantAccountInformation
     */
    public function setCity($city)//: MerchantAccountInformation
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getZipCode()//: ?string
    {
        return $this->zipCode;
    }

    /**
     * @param string|null $zipCode
     *
     * @return MerchantAccountInformation
     */
    public function setZipCode($zipCode)//: MerchantAccountInformation
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress()//: ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     *
     * @return MerchantAccountInformation
     */
    public function setAddress($address)//: MerchantAccountInformation
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddressLine2()//: ?string
    {
        return $this->addressLine2;
    }

    /**
     * @param string|null $addressLine2
     *
     * @return MerchantAccountInformation
     */
    public function setAddressLine2($addressLine2)//: MerchantAccountInformation
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLegalName()//: ?string
    {
        return $this->legalName;
    }

    /**
     * @param string|null $legalName
     *
     * @return MerchantAccountInformation
     */
    public function setLegalName($legalName)//: MerchantAccountInformation
    {
        $this->legalName = $legalName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLegalAddress()//: ?string
    {
        return $this->legalAddress;
    }

    /**
     * @param string|null $legalAddress
     *
     * @return MerchantAccountInformation
     */
    public function setLegalAddress($legalAddress)//: MerchantAccountInformation
    {
        $this->legalAddress = $legalAddress;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLegalZipCode()//: ?string
    {
        return $this->legalZipCode;
    }

    /**
     * @param string|null $legalZipCode
     *
     * @return MerchantAccountInformation
     */
    public function setLegalZipCode($legalZipCode)//: MerchantAccountInformation
    {
        $this->legalZipCode = $legalZipCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLegalCity()//: ?string
    {
        return $this->legalCity;
    }

    /**
     * @param string|null $legalCity
     *
     * @return MerchantAccountInformation
     */
    public function setLegalCity($legalCity)//: MerchantAccountInformation
    {
        $this->legalCity = $legalCity;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLegalState()//: ?string
    {
        return $this->legalState;
    }

    /**
     * @param string|null $legalState
     *
     * @return MerchantAccountInformation
     */
    public function setLegalState($legalState)//: MerchantAccountInformation
    {
        $this->legalState = $legalState;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber()//: ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string|null $phoneNumber
     *
     * @return MerchantAccountInformation
     */
    public function setPhoneNumber($phoneNumber)//: MerchantAccountInformation
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContactEmail()//: ?string
    {
        return $this->contactEmail;
    }

    /**
     * @param string|null $contactEmail
     *
     * @return MerchantAccountInformation
     */
    public function setContactEmail($contactEmail)//: MerchantAccountInformation
    {
        $this->contactEmail = $contactEmail;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReceiptEmail()//: ?string
    {
        return $this->receiptEmail;
    }

    /**
     * @param string|null $receiptEmail
     *
     * @return MerchantAccountInformation
     */
    public function setReceiptEmail($receiptEmail)//: MerchantAccountInformation
    {
        $this->receiptEmail = $receiptEmail;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLegalEntityType()//: ?string
    {
        return $this->legalEntityType;
    }

    /**
     * @param string|null $legalEntityType
     *
     * @return MerchantAccountInformation
     */
    public function setLegalEntityType($legalEntityType)//: MerchantAccountInformation
    {
        $this->legalEntityType = $legalEntityType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLegalEntityNr()//: ?string
    {
        return $this->legalEntityNr;
    }

    /**
     * @param string|null $legalEntityNr
     *
     * @return MerchantAccountInformation
     */
    public function setLegalEntityNr($legalEntityNr)//: MerchantAccountInformation
    {
        $this->legalEntityNr = $legalEntityNr;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getVatPercentage()//: ?float
    {
        return $this->vatPercentage;
    }

    /**
     * @param float|null $vatPercentage
     *
     * @return MerchantAccountInformation
     */
    public function setVatPercentage($vatPercentage)//: MerchantAccountInformation
    {
        $this->vatPercentage = $vatPercentage;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountry()//: ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     *
     * @return MerchantAccountInformation
     */
    public function setCountry($country)//: MerchantAccountInformation
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguage()//: ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     *
     * @return MerchantAccountInformation
     */
    public function setLanguage($language)//: MerchantAccountInformation
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurrency()//: ?string
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     *
     * @return MerchantAccountInformation
     */
    public function setCurrency($currency)//: MerchantAccountInformation
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreated()//: ?string
    {
        return $this->created;
    }

    /**
     * @param string|null $created
     *
     * @return MerchantAccountInformation
     */
    public function setCreated($created)//: MerchantAccountInformation
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOwnerUuid()//: ?string
    {
        return $this->ownerUuid;
    }

    /**
     * @param string|null $ownerUuid
     *
     * @return MerchantAccountInformation
     */
    public function setOwnerUuid($ownerUuid)//: MerchantAccountInformation
    {
        $this->ownerUuid = $ownerUuid;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOrganizationId()//: ?string
    {
        return $this->organizationId;
    }

    /**
     * @param string|null $organizationId
     *
     * @return MerchantAccountInformation
     */
    public function setOrganizationId($organizationId)//: MerchantAccountInformation
    {
        $this->organizationId = $organizationId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerStatus()//: ?string
    {
        return $this->customerStatus;
    }

    /**
     * @param string|null $customerStatus
     *
     * @return MerchantAccountInformation
     */
    public function setCustomerStatus($customerStatus)//: MerchantAccountInformation
    {
        $this->customerStatus = $customerStatus;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function isUsesVat()//: ?bool
    {
        return $this->usesVat;
    }

    /**
     * @param bool|null $usesVat
     *
     * @return MerchantAccountInformation
     */
    public function setUsesVat($usesVat)//: MerchantAccountInformation
    {
        $this->usesVat = $usesVat;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerType()//: ?string
    {
        return $this->customerType;
    }

    /**
     * @param string|null $customerType
     *
     * @return MerchantAccountInformation
     */
    public function setCustomerType($customerType)//: MerchantAccountInformation
    {
        $this->customerType = $customerType;

        return $this;
    }

    /**
     * @return string
     */
    public function getTaxationType()
    {
        return $this->taxationType;
    }

    /**
     * @param string $taxationType
     */
    public function setTaxationType($taxationType)
    {
        $this->taxationType = $taxationType;
    }

    /**
     * @return string
     */
    public function getTaxationMode()
    {
        return $this->taxationMode;
    }

    /**
     * @param string $taxationMode
     */
    public function setTaxationMode($taxationMode)
    {
        $this->taxationMode = $taxationMode;
    }



    /**
     * @return string|null
     */
    public function getTimeZone()//: ?string
    {
        return $this->timeZone;
    }

    /**
     * @param string|null $timeZone
     *
     * @return MerchantAccountInformation
     */
    public function setTimeZone($timeZone)//: MerchantAccountInformation
    {
        $this->timeZone = $timeZone;

        return $this;
    }


}

