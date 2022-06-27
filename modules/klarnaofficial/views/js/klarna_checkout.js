/**
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
 */

$(document).ready(function()
{
    prestashop.on(
      'updateCart',
      function (event) {
          if (typeof event.reason !== 'undefined' && event.reason != "KCOorderChange") {
                updateKCOV3();
          } else if (typeof event.resp !== 'undefined' && event.resp != "KCOorderChange") {
                updateKCOV3();
          }
      }
    );
});

$(document).ready(function(){
    if(isv3) {
        loadIframe(true);
    }
    $('.kco-trigger').each(function(){
        var el = $(this);
        var elTarget = el.parent().parent().find('.kco-target');
        el.click(function(){
            el.toggleClass('kco-trigger--inactive');
            elTarget.fadeToggle(150);
        });
    });
    $('.kco-sel-list__item').each(function(){
        var el = $(this);
        el.click(function(){
            el.siblings().removeClass('selected');
            el.addClass('selected');
        });
    });
});

function updateKCOV3()
{
    if (typeof window._klarnaCheckout !== 'undefined') {
        window._klarnaCheckout(function (api) {
            api.suspend();
        });
    }

    if (loadIframe(false)) {
        if (typeof window._klarnaCheckout !== 'undefined') {
            window._klarnaCheckout(function (api) {
              api.resume();
            });
        }
    }
}

function loadIframe(init)
{
    $.ajax({
		type: 'GET',
		url: kcourl,
		async: false,
		cache: false,
		data: 'kco_update=1',
		success: function(jsonData)
		{
            if ('error' == jsonData) {
                location.href = kcocarturl;
            }
            if (true == init) {
                $("#checkoutdiv").html(jsonData);
                if (typeof window._klarnaCheckout !== "undefined") { 
                    window._klarnaCheckout(function(api) {
                        api.on({
                            'order_total_change': function(data) {
                                prestashop.emit('updateCart', {reason: 'KCOorderChange'});
                            }
                        });
                    });
                } else {
                    return false;
                }
            }
            return true;
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert(jsonData);
            return false;
		}
    });
}
