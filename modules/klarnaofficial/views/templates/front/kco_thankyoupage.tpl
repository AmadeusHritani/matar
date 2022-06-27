{**
* Prestaworks AB
*
* NOTICE OF LICENSE
*
* This source file is subject to the End User License Agreement(EULA)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://license.prestaworks.se/license.html
*
* @author    Prestaworks AB <info@prestaworks.se>
* @copyright Copyright Prestaworks AB (https://www.prestaworks.se/)
* @license   http://license.prestaworks.se/license.html
*}

{extends $layout}

{block name='content'}

{if isset($klarna_error)}
<div class="alert alert-warning">{$klarna_error|escape:'html':'UTF-8'}</div>
{else}
{$klarna_html nofilter}
{/if}
{if isset($HOOK_ORDER_CONFIRMATION)}
{$HOOK_ORDER_CONFIRMATION nofilter}
{/if}
{/block}