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


use IzettleApi\API\Universal\IzettlePostable;
use IzettleApi\API\Universal\IzettlePostableInterface;

class Price  extends IzettlePostable
{
    /**
     * @var int
     */
    protected $amount;

    /**
     * @var string
     */
    protected $currencyId;

    public static function create($amount, $currencyId) {
        return new self($amount, $currencyId);
    }

    /**
     * Price constructor.
     * @param int $amount
     * @param string $currencyId
     */
    public function __construct($amount, $currencyId)
    {
        $this->amount = (int) round($amount*100);
        $this->currencyId = $currencyId;
    }


    /**
     * @return int|null
     */
    public function getAmount()//: ?int
    {
        return $this->amount;
    }

    /**
     * @param int|null $amount
     *
     * @return Price
     */
    public function setAmount($amount)//: Price
    {
        $this->amount = (int) round($amount*100);
    }

    /**
     * @return string|null
     */
    public function getCurrencyId()//: ?string
    {
        return $this->currencyId;
    }

    /**
     * @param string|null $currencyId
     *
     * @return Price
     */
    public function setCurrencyId($currencyId)//: Price
    {
        $this->currencyId = $currencyId;
    }

}