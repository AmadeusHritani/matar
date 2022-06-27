{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

<div class="onboarding-advancement" style="display: none">
  <div class="advancement-groups">
    {foreach from=$steps.groups item=group key=k}
      <div class="group group-{$k|escape:'javascript':'UTF-8'}" style="width: {math equation="(x / y) * 100" x=$group.steps|@count y=$totalSteps|escape:'javascript':'UTF-8'}%;">
        <div class="advancement" style="width: {$percent_real|escape:'javascript':'UTF-8'}%;"></div>
        <div class="id">{$k+1|escape:'javascript':'UTF-8'}</div>
      </div>
    {/foreach}
  </div>
  <div class="col-md-8">
    <h4 class="group-title"></h4>
    <div class="step-title step-title-1"></div>
    <div class="step-title step-title-2"></div>
  </div>
  <button class="btn btn-primary onboarding-button-next">{l s='Continue' mod='izettleconnector'}</button>
  <a class="onboarding-button-shut-down">{l s='Skip this tutorial' mod='izettleconnector'}</a>
</div>

<script type="text/javascript">

  function decodeHTMLEntities(text) {
    var entities = [
      ['amp', '&'],
      ['apos', '\''],
      ['#x27', '\''],
      ['#x2F', '/'],
      ['#39', '\''],
      ['#47', '/'],
      ['lt', '<'],
      ['gt', '>'],
      ['nbsp', ' '],
      ['quot', '"']
    ];

    for (var i = 0, max = entities.length; i < max; ++i)
      text = text.replace(new RegExp('&'+entities[i][0]+';', 'g'), entities[i][1]);

    return text;
  }

  var onBoarding;

  $(document).ready(function(){
    onBoarding = new IzettleOnBoarding({$currentStep|escape:'javascript':'UTF-8'}, JSON.parse(decodeHTMLEntities(`{$jsonSteps|escape:'html':'UTF-8'}`)), {$isShutDown|escape:'javascript':'UTF-8'}, "{$link|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&'), baseAdminDir);

    {foreach from=$templates item=template}
      onBoarding.addTemplate('{$template['name']|escape:'javascript':'UTF-8'}', decodeHTMLEntities('{$template['content']|escape:'javascript':'UTF-8'}'));
    {/foreach}

    onBoarding.showCurrentStep();

    var body = $("body");

    body.delegate(".onboarding-button-next", "click", function(){
      if ($(this).is('.with-spinner')) {
        if (!$(this).is('.animated')) {
          $(this).addClass('animated');
          onBoarding.gotoNextStep();
        }
      } else {
        onBoarding.gotoNextStep();
      }
    }).delegate(".onboarding-button-shut-down", "click", function(){
      onBoarding.setShutDown(true);
    }).delegate(".onboarding-button-resume", "click", function(){
      onBoarding.setShutDown(false);
    }).delegate(".onboarding-button-goto-current", "click", function(){
      onBoarding.gotoLastSavePoint();
    }).delegate(".onboarding-button-stop", "click", function(){
      onBoarding.stop();
    });

  });

</script>
