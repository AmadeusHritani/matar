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

class GpsCoordinates extends IzettlePostable
{
    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var float
     */
    protected $latitude;

    /**
     * @var int
     */
    protected $accuracyMeters;

    /**
     * GpsCoordinates constructor.
     * @param float $longitude
     * @param float $latitude
     * @param int $accuracyMeters
     */
    public function __construct($longitude, $latitude, $accuracyMeters)
    {
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        $this->accuracyMeters = $accuracyMeters;
    }

    public static function create($longitude, $latitude, $accuracyMeters) {
        return new self($longitude, $latitude, $accuracyMeters);
    }


    /**
     * @return float|null
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float|null $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return float|null
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float|null $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return int|null
     */
    public function getAccuracyMeters()
    {
        return $this->accuracyMeters;
    }

    /**
     * @param int|null $accuracyMeters
     */
    public function setAccuracyMeters($accuracyMeters)
    {
        $this->accuracyMeters = $accuracyMeters;
    }
}