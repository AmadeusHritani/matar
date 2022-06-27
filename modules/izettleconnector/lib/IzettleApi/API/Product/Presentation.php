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

namespace IzettleApi\API\Product;


use IzettleApi\API\Universal\IzettlePostable;
use IzettleApi\API\Universal\IzettlePostableInterface;

class Presentation extends IzettlePostable
{
    /**
     * @var string
     */
    protected $imageUrl;

    /**
     * @var string
     */
    protected $backgroundColor;

    /**
     * @var string
     */
    protected $textColor;

    public static function create($imageUrl, $backgroundColor, $textColor) {
        return new self($imageUrl, $backgroundColor, $textColor);
    }

    /**
     * Presentation constructor.
     * @param string $imageUrl
     * @param string $backgroundColor
     * @param string $textColor
     */
    public function __construct($imageUrl, $backgroundColor, $textColor)
    {
        $this->imageUrl = $imageUrl;
        $this->backgroundColor = $backgroundColor;
        $this->textColor = $textColor;
    }


    /**
     * @return string|null
     */
    public function getImageUrl()//: ?string
    {
        return $this->imageUrl;
    }

    /**
     * @param string|null $imageUrl
     *
     * @return \Presentation
     */
    public function setImageUrl($imageUrl)//: Presentation
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBackgroundColor()//: ?string
    {
        return $this->backgroundColor;
    }

    /**
     * @param string|null $backgroundColor
     *
     * @return Presentation
     */
    public function setBackgroundColor($backgroundColor)//: Presentation
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTextColor()//: ?string
    {
        return $this->textColor;
    }

    /**
     * @param string|null $textColor
     *
     * @return Presentation
     */
    public function setTextColor($textColor)//: Presentation
    {
        $this->textColor = $textColor;

        return $this;
    }


}
