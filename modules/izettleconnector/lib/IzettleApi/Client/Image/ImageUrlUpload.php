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

namespace IzettleApi\Client\Image;

use IzettleApi\API\Universal\IzettlePostable;

final class ImageUrlUpload extends IzettlePostable
{
    protected $imageUrl;
    protected $imageFormat;

    public function __construct($imageUrl, $imageFormat)
    {
        $this->imageUrl = $imageUrl;
        $this->imageFormat = $imageFormat;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @return mixed
     */
    public function getImageFormat()
    {
        return $this->imageFormat;
    }
}
