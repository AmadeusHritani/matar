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


class ImageBulkUrlUpload extends IzettlePostable
{
    /** @var Product[] */
    protected $imageUploads = [];

    public static function create($imageUploads) {
        return new self($imageUploads);
    }

    public function __construct($imageUploads = [])
    {
        $this->imageUploads = $imageUploads;
    }
}