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

namespace IzettleApi\API\Webhook;


use IzettleApi\API\Universal\IzettlePostable;

class Subscription extends IzettlePostable
{
    protected $uuid;
    protected $transportName;
    protected $eventNames;
    protected $destination;
    protected $contactEmail;

    public static function create(
        $uuid,
        $transportName,
        $eventNames,
        $destination,
        $contactEmail
    ) {
        return new self(
            $uuid,
            $transportName,
            $eventNames,
            $destination,
            $contactEmail
        );
    }


    /**
     * Subscription constructor.
     * @param $uuid
     * @param $transportName
     * @param $eventNames
     * @param $destination
     * @param $contactEmail
     */
    protected function __construct(
        $uuid,
        $transportName,
        $eventNames,
        $destination,
        $contactEmail
    ) {
        $this->uuid = $uuid;
        $this->transportName = $transportName;
        $this->eventNames = $eventNames;
        $this->destination = $destination;
        $this->contactEmail = $contactEmail;
    }


    /**
     * @return mixed
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return mixed
     */
    public function getTransportName()
    {
        return $this->transportName;
    }

    /**
     * @return mixed
     */
    public function getEventNames()
    {
        return $this->eventNames;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @return mixed
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }


}