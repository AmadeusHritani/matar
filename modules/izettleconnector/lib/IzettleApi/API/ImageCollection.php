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

namespace IzettleApi\API;

final class ImageCollection
{
    /** @var Image[]  */
    private $collection = [];

    public function __construct(array $images = [])
    {
        foreach ($images as $image) {
            if ($image instanceof Image) {
                $this->add($image);
            }
        }
    }

    public function add(Image $image)//: void
    {
        $this->collection[$image->getFilename()] = $image;
    }

    public function remove(Image $image)//: void
    {
        unset($this->collection[$image->getFilename()]);
    }

    public function get(string $key)//: Image
    {
        return $this->collection[$key];
    }

    /** @return Image[] */
    public function getAll()//: array
    {
        return $this->collection;
    }

    public function getCreateDataArray()//: array
    {
        $data = [];
        foreach ($this->collection as $image) {
            $data[] = $image->getFilename();
        }

        return $data;
    }
}
