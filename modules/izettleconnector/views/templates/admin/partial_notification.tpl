{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

<script>
    function openPartialSyncNotification() {
        var url = '{$notification_ajax_url|escape:'javascript':'UTF-8'}'.replace(/&amp;/g, '&') + '&no_partial_sync=1&notif_only=1&_='+Math.random();
        if (!!$.prototype.fancybox) {
            $.fancybox.open({
                href: url,
                type: 'ajax',
                autoSize: true,
                wrapCSS: 'wizard padding20 bootstrap',
                width: 'auto',
                height: 'auto',
            });
        }
    }

    $(document).ready(function () {
        openPartialSyncNotification();
    });
</script>