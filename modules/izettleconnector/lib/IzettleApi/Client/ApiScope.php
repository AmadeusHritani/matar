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

use IzettleApi\Client\ApiScope\Rights;

final class ApiScope
{
    const FINANCE = 'FINANCE';
    const PURCHASE = 'PURCHASE';
    const PRODUCT = 'PRODUCT';
    const INVENTORY = 'INVENTORY';
    const IMAGE = 'IMAGE';
    const USERINFO = 'USERINFO';


    private $finance;

    private $purchase;

    private $product;

    private $inventory;

    private $image;

    private $userInfo;

    /**
     * @param mixed $userInfo
     */
    public function setUserInfo($rights)
    {
        $this->userInfo = $rights;
    }

    public function setFinancesScope($rights)//: void
    {
        $this->finance = $rights;
    }

    public function setPurchaseScope($rights)//: void
    {
        $this->purchase = $rights;
    }

    public function setProductScope($rights)//: void
    {
        $this->product = $rights;
    }

    public function setInventoryScope($rights)//: void
    {
        $this->inventory = $rights;
    }

    public function setImageScope($rights)//: void
    {
        $this->image = $rights;
    }

    public function getUrlParameters()//: string
    {
        $scope = [];
        if ($this->finance !== null) {
            $scope[] = $this->finance . ':' . self::FINANCE;
            if ($this->finance == Rights::WRITE) {
                $scope[] = Rights::READ . ':' . self::FINANCE;
            }
        }

        if ($this->purchase !== null) {
            $scope[] = $this->purchase . ':' . self::PURCHASE;
            if ($this->purchase == Rights::WRITE) {
                $scope[] = Rights::READ . ':' . self::PURCHASE;
            }
        }

        if ($this->product !== null) {
            $scope[] = $this->product . ':' . self::PRODUCT;
            if ($this->product == Rights::WRITE) {
                $scope[] = Rights::READ . ':' . self::PRODUCT;
            }
        }

        if ($this->inventory !== null) {
            $scope[] = $this->inventory . ':' . self::INVENTORY;
            if ($this->inventory == Rights::WRITE) {
                $scope[] = Rights::READ . ':' . self::INVENTORY;
            }
        }

        if ($this->image !== null) {
            $scope[] = $this->image . ':' . self::IMAGE;
            if ($this->image == Rights::WRITE) {
                $scope[] = Rights::READ . ':' . self::IMAGE;
            }
        }

        if ($this->userInfo !== null) {
            $scope[] = $this->userInfo . ':' . self::USERINFO;
            if ($this->userInfo == Rights::WRITE) {
                $scope[] = Rights::READ . ':' . self::USERINFO;
            }
        }

        return implode(' ', $scope);
    }
}
