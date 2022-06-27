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

namespace IzettleApi\Client\ApiScope;


/**
 * @method static Rights read()
 * @method bool isRead()
 * @method static Rights write()
 * @method bool isWrite()
 */
final class Rights
{
    const READ = 'READ';
    const WRITE = 'WRITE';
}
