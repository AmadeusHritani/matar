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

use DateTime;
use DateTimeImmutable;

final class AccessToken
{
    private $accessToken;
    private $expires;

    /**
     * Last time (in milliseconds) when access token was generated
     *
     * @var $tokenCreateTime
     */
    private $tokenCreateTime;

    /**
     * Seconds for with access token is valid
     *
     * @var $tokenExpiresIn
     */
    private $tokenExpiresIn;

    /**
     * @return mixed
     */
    public function getTokenCreateTime()
    {
        return $this->tokenCreateTime;
    }
    /**
     * @return mixed
     */
    public function getTokenExpiresIn()
    {
        return $this->tokenExpiresIn;
    }


    public function __construct($accessToken, $expiresIn, $tokenCreateTime = null)
    {
        $this->tokenCreateTime = $tokenCreateTime == null ? time() : $tokenCreateTime;
        $this->accessToken = $accessToken;
        $this->tokenExpiresIn = $expiresIn;
        $date = new DateTime();
        $date->setTimestamp($this->tokenCreateTime + $expiresIn);
        $this->expires = DateTimeImmutable::createFromMutable($date);//sprintf('+%d second', $expiresIn)
    }

    public function getToken()//: string
    {
        return $this->accessToken;
    }

    public function getExpires()//: DateTimeImmutable
    {
        return $this->expires;
    }

    public function isExpired()//: bool
    {
        return (new DateTime()) > $this->expires;
    }

}
