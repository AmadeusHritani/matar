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

{if isset($klarna_onsite_messaging_url) && $klarna_onsite_messaging_url && isset($klarna_onsite_messaging_dci) && $klarna_onsite_messaging_dci}
    <script 
  async 
  src="{$klarna_onsite_messaging_url|escape:'htmlall':'UTF-8'}"
  data-client-id="{$klarna_onsite_messaging_dci|escape:'htmlall':'UTF-8'}"
></script>
{/if}
