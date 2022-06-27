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

namespace IzettleApi\Client\Universal;

use IzettleApi\API\Image;
use IzettleApi\API\ImageCollection;

final class ImageBuilder extends Builder
{
    public function buildFromJson($json)//: Image
    {
        $data = json_decode($json, true);

        return new Image($data['imageLookupKey'], $data['imageUrls']);
    }

    public function buildFromArray($images)//: ImageCollection
    {
        $collection = new ImageCollection();

        foreach ($images as $image) {
            $collection->add($this->build($image));
        }

        return $collection;
    }

    private function build($data)//: Image
    {
        return new Image($data);
    }
}
