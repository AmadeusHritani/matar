{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

<div class="modal-body bootstrap">
    <div class="izettle">
        <div class="col-12">
            <button class="onboarding-button-next pull-right close" type="button">&times;</button>
            <h2 class="text-center text-md-center">{l s='Congratulations!' mod='izettleconnector'}</h2>
        </div>
        <div class="col-12">
            <p class="text-center text-md-center">
                {l s='You have successfully finished configuration process.' mod='izettleconnector'}<br/>
                {l s='You are ready to start product export.' mod='izettleconnector'}
            </p>
        </div>
        <div class="modal-footer">
            <div class="col-12">
                <div class="text-center text-md-center">
                    <button class="btn btn-primary onboarding-button-next"  {literal}onclick="setTimeout(function(){$('#smartwizard').hide().fadeIn(300);}, 800)" {/literal}>{l s='Let\'s start export' mod='izettleconnector'}</button>
                </div>
            </div>
        </div>
    </div>
</div>
