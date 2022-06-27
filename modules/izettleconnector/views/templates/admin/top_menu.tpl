{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

<div class="top-menu-izettleconnector">
    <div class="page-head-tabs" id="head_tabs">
        <ul class="nav nav-pills">
            {foreach $urls as $url}
                <li class="nav-item">
                    <a href="{$url['link']|escape:'javascript':'UTF-8'}"
                       class="nav-link tab {if $url['active']}active current{/if}">
                        {$url['title']|escape:'javascript':'UTF-8'}
                    </a>
                </li>
            {/foreach}
        </ul>
        <div id="clear-onboard" style="position: absolute;
right: 10px;
top: 10px;">
{*            <button onclick="clearOnBoarding();">restart onboarding</button>*}
            <script>
                function clearOnBoarding() {
                    $.ajax({
                        method: "POST",
                        url: "{$onboard_link|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&'),
                        data: {
                            action: 'setCurrentStep',
                            value: 0
                        }
                    }).done((result) => {
                        $.ajax({
                            method: "POST",
                            url: "{$onboard_link|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&'),
                            data: {
                                action: 'setShutDown',
                                value: 0
                            }
                        }).done((result) => {
                            document.location.reload();
                        }).fail(() => {
                            alert('ERROR, something went wrong');
                        });
                    }).fail(() => {
                        alert('ERROR, something went wrong');
                    });
                }
            </script>

            {if $is_partial_sync}
                {include file="$zettle_tpl_dir/partial_sync.tpl"}
            {/if}
        </div>
    </div>
</div>