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


class IzettlePostable implements IzettlePostableInterface
{

    public function getAsArray()
    {
        $objectArray = [];
        foreach($this as $key => $value) {
            if ($key == 'variantOptionDefinitions'
//                || $key == 'price'
//                || $key == 'costPrice'
                || $key == 'unitName'
                || !is_null($value)
            ) {
                //TODO check other values need to be nullable or inverse logic
                //!IMPORTANT if logics will be inversed regression testing MUST start for every user flow
                if (is_array($value)) {
                    $objectArray[$key] = array_map(
                        'IzettleApi\API\Universal\IzettlePostable::getData',
                        $value
                    );
                } else {
                    $objectArray[$key] = self::getData($value);
                }

            }
        }
        return $objectArray;
    }

    protected static function getData($value) {
        return $value instanceof IzettlePostable ? $value->getAsArray() : $value;
    }

    public function getPostBodyData()
    {
        return json_encode($this->getAsArray(), JSON_UNESCAPED_SLASHES);
    }

}