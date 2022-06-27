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

{if isset($klarna_placement)}
        {if isset($klarna_placement.id) && $klarna_placement.id}
           <klarna-placement
                data-key="{$klarna_placement.id|escape:'htmlall':'UTF-8'}"
                data-locale="{$klarna_placement.locale|escape:'htmlall':'UTF-8'}"
                {if "" != $klarna_placement.theme}data-theme="{$klarna_placement.theme|escape:'htmlall':'UTF-8'}"{/if}
                {if isset($klarna_placement.purchase_amount) && $klarna_placement.purchase_amount}data-purchase-amount="{$klarna_placement.purchase_amount|escape:'htmlall':'UTF-8'}"{/if}
            ></klarna-placement>
        {/if}
{/if}
