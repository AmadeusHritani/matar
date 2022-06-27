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


class IzettlePostableJsonWrapper implements IzettlePostableInterface, \JsonSerializable
{
    private $json;

    /**
     * IzettlePostableStringWrapper constructor.
     * @param $json
     */
    public function __construct($json)
    {
        $this->json = $json;
    }

    /**
     * @return mixed
     */
    public function getJson()
    {
        return $this->json;
    }



    public function getPostBodyData()
    {
        return $this->json;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return $this->json;
    }
}