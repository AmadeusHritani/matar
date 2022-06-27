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


class Builder implements BuilderInterface
{

    public function buildFromArray($data)
    {
        throw new \Exception('buildFromArray not implemented');
    }

    public function buildFromJson($json)
    {
        throw new \Exception('buildFromJson not implemented');
    }
}