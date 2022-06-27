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
    if($('.ph_pcms_product_list_wrapper.layout-slide:not(.slick-slider):not(.product_list_16)').length >0)
    {
        $('.ph_pcms_product_list_wrapper.layout-slide:not(.slick-slider):not(.product_list_16)').each(function(){
            var ph_pcms_nbItemsPerLine = $(this).data('desktop');
            var ph_pcms_nbItemsPerLineTablet = $(this).data('tablet');
            var ph_pcms_nbItemsPerLineMobile = $(this).data('mobile');
            $(this).slick({
              slidesToShow: ph_pcms_nbItemsPerLine,
              slidesToScroll: 1,
              arrows: true,
              responsive: [
                  {
                      breakpoint: 1199,
                      settings: {
                          slidesToShow: ph_pcms_nbItemsPerLineTablet
                      }
                  },
                  {
                      breakpoint: 992,
                      settings: {
                          slidesToShow: ph_pcms_nbItemsPerLineTablet
                      }
                  },
                  {
                      breakpoint: 768,
                      settings: {
                          slidesToShow: ph_pcms_nbItemsPerLineMobile
                      }
                  },
                  {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1
                      }
                  }
               ]
           });
        });
        
   }
   if($('.ph_pcms_product_list_wrapper.layout-slide.product_list_16:not(.slick-slider) .product_list').length >0)
   {
        $('.ph_pcms_product_list_wrapper.layout-slide.product_list_16:not(.slick-slider) .product_list').each(function(){
            var ph_pcms_nbItemsPerLine = $(this).parent().data('desktop');
            var ph_pcms_nbItemsPerLineTablet = $(this).parent().data('tablet');
            var ph_pcms_nbItemsPerLineMobile = $(this).parent().data('mobile');
            $(this).slick({
              slidesToShow: ph_pcms_nbItemsPerLine,
              slidesToScroll: 1,
              arrows: true,
              responsive: [
                  {
                      breakpoint: 1199,
                      settings: {
                          slidesToShow: ph_pcms_nbItemsPerLineTablet
                      }
                  },
                  {
                      breakpoint: 992,
                      settings: {
                          slidesToShow: ph_pcms_nbItemsPerLineTablet
                      }
                  },
                  {
                      breakpoint: 768,
                      settings: {
                          slidesToShow: ph_pcms_nbItemsPerLineMobile
                      }
                  },
                  {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1
                      }
                  }
               ]
           });
        });
   }
});