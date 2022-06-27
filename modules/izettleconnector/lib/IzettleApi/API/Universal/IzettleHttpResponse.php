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

namespace IzettleApi\API\Universal;


class IzettleHttpResponse
{
    private $body;
    private $httpStatus;
    private $headers;

    public static function create($body, $httpStatus, $headers)
    {
        return new self(
            $body,
            $httpStatus,
            $headers
        );
    }

    /**
     * IzettleHttpResponse constructor.
     * @param $body
     * @param $httpStatus
     * @param $headers
     */
    public function __construct($body, $httpStatus, $headers)
    {
        $this->body = $body;
        $this->httpStatus = $httpStatus;
        $this->headers = $headers;
    }


    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return int
     */
    public function getHttpStatus()
    {
        return $this->httpStatus;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }




}