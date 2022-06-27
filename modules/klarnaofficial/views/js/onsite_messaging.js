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

$(document).ready(function () {
    prestashop.on(
        'updatedCart',
        function (event) {
            let textAmount = $('div.cart-total .value').text();
            console.log(textAmount);
            let purchaseAmount = textAmount.replace(/[^0-9$]/g, '');
            let totalCartAmount = parseFloat(purchaseAmount);

            $('klarna-placement').attr('data-purchase-amount', totalCartAmount);

            window.KlarnaOnsiteService = window.KlarnaOnsiteService || []
            window.KlarnaOnsiteService.push({ eventName: 'refresh-placements' })
        }
    );

    prestashop.on(
        'updatedProduct',
        function (event) {
            window.KlarnaOnsiteService = window.KlarnaOnsiteService || []
            window.KlarnaOnsiteService.push({ eventName: 'refresh-placements' })
        }
    );
});
