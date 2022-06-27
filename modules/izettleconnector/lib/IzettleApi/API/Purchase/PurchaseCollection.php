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

class PurchaseCollection extends IzettlePostable
{
    /**
     * @var array
     */
    protected $purchases;

    /**
     * @var string
     */
    protected $firstPurchaseHash;

    /**
     * @var string
     */
    protected $lastPurchaseHash;

    /**
     * @var array
     */
    protected $linkUrls;

    /**
     * PurchaseCollection constructor.
     * @param array $purchases
     * @param string $firstPurchaseHash
     * @param string $lastPurchaseHash
     * @param array $linkUrls
     */
    public function __construct(array $purchases, $firstPurchaseHash, $lastPurchaseHash, array $linkUrls)
    {
        $this->purchases = $purchases;
        $this->firstPurchaseHash = $firstPurchaseHash;
        $this->lastPurchaseHash = $lastPurchaseHash;
        $this->linkUrls = $linkUrls;
    }

    public static function create(array $purchases, $firstPurchaseHash, $lastPurchaseHash, array $linkUrls) {
        return new self($purchases, $firstPurchaseHash, $lastPurchaseHash, $linkUrls);
    }


    /**
     * @return array|null
     */
    public function getPurchases()
    {
        return $this->purchases;
    }

    /**
     * @param array|null $purchases
     */
    public function setPurchases($purchases)
    {
        $this->purchases = $purchases;
    }

    /**
     * @return string|null
     */
    public function getFirstPurchaseHash()
    {
        return $this->firstPurchaseHash;
    }

    /**
     * @param string|null $firstPurchaseHash
     */
    public function setFirstPurchaseHash($firstPurchaseHash)
    {
        $this->firstPurchaseHash = $firstPurchaseHash;
    }

    /**
     * @return string|null
     */
    public function getLastPurchaseHash()
    {
        return $this->lastPurchaseHash;
    }

    /**
     * @param string|null $lastPurchaseHash
     */
    public function setLastPurchaseHash($lastPurchaseHash)
    {
        $this->lastPurchaseHash = $lastPurchaseHash;
    }

    /**
     * @return array|null
     */
    public function getLinkUrls()
    {
        return $this->linkUrls;
    }

    /**
     * @param array|null $linkUrls
     */
    public function setLinkUrls($linkUrls)
    {
        $this->linkUrls = $linkUrls;
    }

}