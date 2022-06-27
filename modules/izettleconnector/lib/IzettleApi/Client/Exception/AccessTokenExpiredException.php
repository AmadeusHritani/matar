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

namespace IzettleApi\Client\Exception;

use Exception;
use IzettleApi\Exception\IzettleApiException;

final class AccessTokenExpiredException extends Exception implements IzettleApiException
{
}
