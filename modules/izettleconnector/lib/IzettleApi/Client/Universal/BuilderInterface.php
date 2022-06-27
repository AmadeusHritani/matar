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

interface BuilderInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function buildFromArray($data);

    /**
     * @param $data
     * @return mixed
     */
    public function buildFromJson($json);
}
