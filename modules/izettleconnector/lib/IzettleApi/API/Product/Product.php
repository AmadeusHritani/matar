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

namespace IzettleApi\API\Product;

use DateTime;
use IzettleApi\API\ImageCollection;
use IzettleApi\API\Universal\IzettlePostable;
use IzettleApi\API\Universal\IzettlePostableInterface;
use IzettleApi\Client\Exception\CantCreateProductException;


class Product extends IzettlePostable
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var array
     */
    protected $categories;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string[]
     */
    protected $imageLookupKeys;

    /**
     * @var Presentation
     */
    protected $presentation;

    /**
     * @var array
     */
    protected $variants;

    /**
     * @var string
     */
    protected $externalReference;

    /**
     * @var string
     */
    protected $unitName;

    /**
     * @var string
     */
    protected $vatPercentage;

    /**
     * @var VariantOptionDefinitionCollection
     */
    protected $variantOptionDefinitions;

    /**
     * @var string
     */
    protected $taxCode;

    protected $eTag;
    protected $taxRates;
    protected $taxExempt;
    protected $createWithDefaultTax;




    /**
     * @var Category
     */
    protected $category;

    public static function create(
        $uuid,
        $categories,
        $name,
        $description,
        $imageLookupKeys,
        $presentation,
        $variants,
        $externalReference,
        $unitName,
        $vatPercentage,
        $variantOptionDefinitions,
        $taxCode,
        $category,
        $taxRates,
        $taxExempt,
        $createWithDefaultTax
    ) {
        return new self(
            $uuid,
            $categories,
            $name,
            $description,
            $imageLookupKeys,
            $presentation,
            $variants,
            $externalReference,
            $unitName,
            $vatPercentage,
            $variantOptionDefinitions,
            $taxCode,
            $category,
            $taxRates,
            $taxExempt,
            $createWithDefaultTax
        );
    }


    /**
     * Product constructor.
     * @param string $uuid
     * @param array $categories
     * @param string $name
     * @param string $description
     * @param string[] $imageLookupKeys
     * @param Presentation $presentation
     * @param array $variants
     * @param string $externalReference
     * @param string $unitName
     * @param string $vatPercentage
     * @param VariantOptionDefinitionCollection $variantOptionDefinitions
     * @param string $taxCode
     * @param Category $category
     * @param $taxRates
     * @param $taxExempt
     * @param $createWithDefaultTax
     */
    public function __construct(
        $uuid,
        $categories,
        $name,
        $description,
        $imageLookupKeys,
        $presentation,
        $variants,
        $externalReference,
        $unitName,
        $vatPercentage,
        $variantOptionDefinitions,
        $taxCode,
        $category,
        $taxRates,
        $taxExempt,
        $createWithDefaultTax)
    {
        $this->uuid = $uuid;
        $this->categories = $categories;
        $this->name = $name;
        $this->description = $description;
        $this->imageLookupKeys = $imageLookupKeys;
        $this->presentation = $presentation;
        $this->variants = $variants;
        $this->externalReference = $externalReference;
        $this->unitName = $unitName;
        $this->vatPercentage = $vatPercentage;
        $this->variantOptionDefinitions = $variantOptionDefinitions;
        $this->taxCode = $taxCode;
        $this->category = $category;
        $this->taxRates = $taxRates;
        $this->taxExempt = $taxExempt;
        $this->createWithDefaultTax = $createWithDefaultTax;

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
     * @return void
     */
    public function setUuid($uuid)//: Product
    {
        $this->uuid = $uuid;

        
    }

    /**
     * @return array|null
     */
    public function getCategories()//: ?array
    {
        return $this->categories;
    }

    /**
     * @param array|null $categories
     *
     * @return void
     */
    public function setCategories($categories)//: Product
    {
        $this->categories = $categories;

        
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
     * @return void
     */
    public function setName($name)//: Product
    {
        $this->name = $name;

        
    }

    /**
     * @return string|null
     */
    public function getDescription()//: ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return void
     */
    public function setDescription($description)//: Product
    {
        $this->description = $description;

        
    }

    /**
     * @return string[]|null
     */
    public function getImageLookupKeys()//: ?string[]
    {
        return $this->imageLookupKeys;
    }

    /**
     * @param string[]|null $imageLookupKeys
     *
     * @return void
     */
    public function setImageLookupKeys($imageLookupKeys)//: Product
    {
        $this->imageLookupKeys = $imageLookupKeys;

        
    }

    /**
     * @return Presentation|null
     */
    public function getPresentation()//: ?Presentation
    {
        return $this->presentation;
    }

    /**
     * @param Presentation|null $presentation
     *
     * @return void
     */
    public function setPresentation($presentation)//: Product
    {
        $this->presentation = $presentation;

        
    }

    /**
     * @return Variants|null
     */
    public function getVariants()//: ?Variants
    {
        return $this->variants;
    }

    /**
     * @param Variants|null $variants
     *
     * @return void
     */
    public function setVariants($variants)//: Product
    {
        $this->variants = $variants;

        
    }

    /**
     * @return string|null
     */
    public function getExternalReference()//: ?string
    {
        return $this->externalReference;
    }

    /**
     * @param string|null $externalReference
     *
     * @return void
     */
    public function setExternalReference($externalReference)//: Product
    {
        $this->externalReference = $externalReference;

        
    }

    /**
     * @return string|null
     */
    public function getUnitName()//: ?string
    {
        return $this->unitName;
    }

    /**
     * @param string|null $unitName
     *
     * @return void
     */
    public function setUnitName($unitName)//: Product
    {
        $this->unitName = $unitName;
    }

    /**
     * @return string|null
     */
    public function getVatPercentage()//: ?string
    {
        return $this->vatPercentage;
    }

    /**
     * @param string|null $vatPercentage
     *
     * @return void
     */
    public function setVatPercentage($vatPercentage)//: Product
    {
        $this->vatPercentage = $vatPercentage;

        
    }

    /**
     * @return VariantOptionDefinitions|null
     */
    public function getVariantOptionDefinitions()//: ?VariantOptionDefinitions
    {
        return $this->variantOptionDefinitions;
    }

    /**
     * @param VariantOptionDefinitions|null $variantOptionDefinitions
     *
     * @return void
     */
    public function setVariantOptionDefinitions($variantOptionDefinitions)//: Product
    {
        $this->variantOptionDefinitions = $variantOptionDefinitions;

        
    }

    /**
     * @return string|null
     */
    public function getTaxCode()//: ?string
    {
        return $this->taxCode;
    }

    /**
     * @param string|null $taxCode
     *
     * @return void
     */
    public function setTaxCode($taxCode)//: Product
    {
        $this->taxCode = $taxCode;

        
    }

    /**
     * @return Category|null
     */
    public function getCategory()//: ?Category
    {
        return $this->category;
    }

    /**
     * @param Category|null $category
     *
     * @return void
     */
    public function setCategory($category)//: Product
    {
        $this->category = $category;

        
    }

    /**
     * @return mixed
     */
    public function getETag()
    {
        return $this->eTag;
    }

    /**
     * @param mixed $eTag
     */
    public function setETag($eTag)
    {
        $this->eTag = $eTag;
    }

    /**
     * @return mixed
     */
    public function getTaxRates()
    {
        return $this->taxRates;
    }

    /**
     * @param mixed $taxRates
     */
    public function setTaxRates($taxRates)
    {
        $this->taxRates = $taxRates;
    }

    /**
     * @return mixed
     */
    public function getTaxExempt()
    {
        return $this->taxExempt;
    }

    /**
     * @param mixed $taxExempt
     */
    public function setTaxExempt($taxExempt)
    {
        $this->taxExempt = $taxExempt;
    }

    /**
     * @return mixed
     */
    public function getCreateWithDefaultTax()
    {
        return $this->createWithDefaultTax;
    }

    /**
     * @param mixed $createWithDefaultTax
     */
    public function setCreateWithDefaultTax($createWithDefaultTax)
    {
        $this->createWithDefaultTax = $createWithDefaultTax;
    }



    /**
     * @throws CantCreateProductException
     */
    protected function validateMinimumVariants()//: void
    {
        if (count($this->variants) == 0) {
            throw new CantCreateProductException('A product should have at least one variant');
        }
    }

    public function getAsArray()
    {
        $data = parent::getAsArray(); // TODO: Change the autogenerated stub
        $data['metadata'] = [
            'inPos'  => true,
            'source' => [
                'name'     => 'prestashop',
                'external' => true,
            ]
        ];

        return $data;
    }


}

            