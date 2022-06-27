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

$( document ).ready(function() {
    updateUrlsForKCO();
    $( document ).on('click', '#cart div.cart-detailed-actions a', function(e) {e.preventDefault(); kcoRedirect();});
});

function kcoRedirect() {
    window.location.href = kco_checkout_url;
}
function updateUrlsForKCO() {
    $("#cart div.cart-actions a").attr("href", kco_checkout_url);
    $("#cart div.cart-detailed-actions a").attr("href", kco_checkout_url);    
}