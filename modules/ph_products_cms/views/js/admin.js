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
    ph_pcms.searchProduct(); 
    $(document).on('click','.ph_pcms_product_item .ph_pcms_block_item_close',function(){
        var $ul = $(this).parents('ul.ph_pcms_products');
        var ids = '';
        $(this).parent().remove();
        if($ul.find('.ph_pcms_product_item').length)
        {
            $ul.find('.ph_pcms_product_item').each(function(){
                ids += $(this).attr('data-id')+',';
                
            });
        }
        $ul.prev('.ph_pcms_ids_product').val(ids.trim(',')); 
    });
    $(document).on('click','.ph-pcms-short-code',function(){
         $(this).select();
         document.execCommand("copy");
         $(this).next().addClass('copied');
         setTimeout(function() { $('.copied').removeClass('copied'); }, 2000);
    });
});
ph_pcms = {
    searchProduct : function() {
        if ($('.ph_pcms_ids_product').length > 0 && $('.ph_pcms_search_product').length > 0 && typeof ph_pcms_link_search_product !== "undefined")
        {
            var ph_pcms_autocomplete = $('.ph_pcms_search_product');
            ph_pcms_autocomplete.autocomplete(ph_pcms_link_search_product, {
                resultsClass: "ph_pcms_results",
                minChars: 1,
                delay: 300,
                appendTo: '.ph_pcms_search_product_form',
                autoFill: false,
                max: 20,
                matchContains: false,
                mustMatch: false,
                scroll: true,
                cacheLength: 100,
                scrollHeight: 180,
                formatItem: function (item) {
                    return '<span data-item-id="'+item[0]+'-'+item[1]+'" class="ph_pcms_item_title">' + (item[5] ? '<img src="'+item[5]+'" alt=""/> ' : '') + item[2] + (item[3]? item[3] : '') + (item[4] ? ' (Ref:' + item[4] + ')' : '') + '</span>';
                },
            }).result(function (event, data, formatted) {
                if (data)
                {
                    ph_pcms.addProduct(data);
                }
            });
        } 
    },
    addProduct: function(data)
    {
        var input_name = 'id_products' ;
        if ($('#block_search_'+input_name).length > 0 && $('#block_search_'+input_name+' .ph_pcms_product_item[data-id="'+data[0] + '-' + data[1]+'"]').length==0)
        {
            if ($('#block_search_'+input_name+' .ph_pcms_product_loading.active').length <=0)
            {
                $('#block_search_'+input_name+' .ph_pcms_product_loading').addClass('active');
                var row_html ='<li class="ph_pcms_product_item " data-id="'+data[0]+'-'+data[1]+'">';
                    row_html +='<a class="product_img_link" href="'+data[6]+'" target="_blank">';
                        row_html +='<img class="ph_pcms_product_image" src="'+data[5]+'" alt="'+data[2]+ (data[3] ? ' - '+data[3]:'')+'">';
                        row_html +='<div class="ph_pcms_product_info"><span class="product_name">'+data[2]+ (data[3] ? ' - '+data[3]:'')+'</span></div>';
                    row_html +='</a>';
                    row_html +='<div class="ph_pcms_block_item_close" title="'+Delete_text+'">';
                    row_html += '<i class="ets_svg_fill_lightgray"><svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1490 1322q0 40-28 68l-136 136q-28 28-68 28t-68-28l-294-294-294 294q-28 28-68 28t-68-28l-136-136q-28-28-28-68t28-68l294-294-294-294q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 294 294-294q28-28 68-28t68 28l136 136q28 28 28 68t-28 68l-294 294 294 294q28 28 28 68z"> </svg></i>';    
                    row_html +='</div>';
                row_html +='</li>';
                $('#block_search_'+input_name+' .ph_pcms_product_loading.active').before(row_html);
                $('#block_search_'+input_name+' .ph_pcms_product_loading').removeClass('active');
                if (!$('input[name="'+input_name+'"]').val()) 
                {
                    $('input[name="'+input_name+'"]').val(data[0] + '-' + data[1]);
                } 
                else 
                {
                    if ($('input[name="'+input_name+'"]').val().split(',').indexOf(data[0] + '-' + data[1]) == -1) 
                    {
                        $('input[name="'+input_name+'"]').val($('input[name="'+input_name+'"]').val() + ',' + data[0] + '-' + data[1]);

                    } 
                    else 
                    {
                        showErrorMessage(data[2].toString() + ' has been tagged.');
                    }
                }
            }
        }
        $('.ph_pcms_search_product').val('');
    }
}