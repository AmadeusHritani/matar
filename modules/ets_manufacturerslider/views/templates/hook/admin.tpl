{**
* 2007-2022 ETS-Soft
*
* NOTICE OF LICENSE
*
* This file is not open source! Each license that you purchased is only available for 1 wesite only.
* If you want to use this file on more websites (or projects), you need to purchase additional licenses.
* You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please contact us for extra customization service at an affordable price
*
*  @author ETS-Soft <etssoft.jsc@gmail.com>
*  @copyright  2007-2022 ETS-Soft
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of ETS-Soft
*}
<script type="text/javascript">
$(document).ready(function(){
    if($('select[name="YBC_MF_MANUFACTURERS[]"] option[value="0"]').attr('selected')=='selected')
        $('select[name="YBC_MF_MANUFACTURERS[]"] option').prop('selected', true);
    $('select[name="YBC_MF_MANUFACTURERS[]"] option').click(function(){
        if($(this).attr('value')==0 && $(this).attr('selected')=='selected')
        {
            $('select[name="YBC_MF_MANUFACTURERS[]"] option').prop('selected', true);
        }
        $('select[name="YBC_MF_MANUFACTURERS[]"] option').each(function(){
            if($(this).attr('selected')!='selected')
                $('select[name="YBC_MF_MANUFACTURERS[]"] option[value="0"]').prop('selected', false);
        });
    });
    if($('select[name="YBC_MF_MANUFACTURER_HOOK"]').val()=='default')
        $('select[name="YBC_MF_MANUFACTURER_HOOK"]').next('.help-block').hide();
    $('select[name="YBC_MF_MANUFACTURER_HOOK"]').change(function(){
        if($('select[name="YBC_MF_MANUFACTURER_HOOK"]').val()=='default')
            $('select[name="YBC_MF_MANUFACTURER_HOOK"]').next('.help-block').hide();
        else
            $('select[name="YBC_MF_MANUFACTURER_HOOK"]').next('.help-block').show();
    });
    
});
</script>
<style>
select[multiple]{
    height: 115px !important;
}
</style>