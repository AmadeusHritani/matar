/**
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
 */
$(document).ready(function(){
    $(document).on('click','.checkbox_all input',function(){
        if($(this).is(':checked'))
        {
            $(this).closest('.form-group').find('input').prop('checked',true);
        }
        else
        {
            $(this).closest('.form-group').find('input').prop('checked',false);
        }
    });
    $(document).on('click','.checkbox input',function(){
        if($(this).is(':checked'))
        {
            if($(this).closest('.form-group').find('input:checked').length==$(this).closest('.form-group').find('input').length-1)
                 $(this).closest('.form-group').find('.checkbox_all input').prop('checked',true);
        }
        else
        {
            $(this).closest('.form-group').find('.checkbox_all input').prop('checked',false);
        } 
    });
    if($('.short-code').length)
    {
        $(document).on('click','.short-code',function(){
            $('.ets-baw-text-copy').remove();
            $(this).select();
            document.execCommand("copy");
            var copy_text = $('<span class="ets-baw-text-copy">'+$(this).parent().data('copied')+'</span>');
            $(this).after(copy_text);
            setTimeout(function() { copy_text.remove(); }, 2000);
        });
    }
    if($('#list-banner').length && $('#list-banner .dragHandle').length)
    {
        var $mybanner = $("#list-banner");
    	$mybanner.sortable({
    		opacity: 0.6,
            handle: ".dragHandle",
    		update: function() {
    			var order = $(this).sortable("serialize") + "&action=updateBannerOrdering&display_position="+$('select[name="display_position"]').val();						
                $.ajax({
        			type: 'POST',
        			headers: { "cache-control": "no-cache" },
        			url: '',
        			async: true,
        			cache: false,
        			dataType : "json",
        			data:order,
        			success: function(jsonData)
        			{
        			     if(jsonData.success)
                         {
                            showSuccessMessage(jsonData.success);
                            var i=1;
                            $('.dragGroup span').each(function(){
                                $(this).html(i+(jsonData.page-1)*jsonData.limit);
                                i++;
                            });
                         }
                         if(jsonData.error)
                         {
                            showErrorMessage(jsonData.error);
                            $mybanner.sortable("cancel");
                         }
                    }
        		});
    		},
        	stop: function( event, ui ) {
       		}
    	});
    }
});