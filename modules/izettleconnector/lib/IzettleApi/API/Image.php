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

final class Image
{
    const BASE_URL = 'https://image.izettle.com/productimage/';

    private $filename;

    private $urls;



    public function __construct($filename, $urls = null)
    {
        $this->filename = $filename;
        $this->urls = $urls;
    }
    /**
     * @return array
     */
    public function getUrls()
    {
        return $this->urls;
    }
    public function getFilename()//: string
    {
        return $this->filename;
    }

    public function getSmallImageUrl()//: string
    {
        return self::BASE_URL . 'L/' . $this->getFilename();
    }

    public function getLargeImageUrl()//: string
    {
        return self::BASE_URL . 'o/' . $this->getFilename();
    }
}
