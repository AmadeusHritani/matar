{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

<div class="bootstrap izettle-settings panel" style="padding-left: 50px">
    {if !$bulk_mode}
        <input type="hidden" id="id-izettle-config" value="{$id_config|escape:'javascript':'UTF-8'}">
        <input type="hidden" id="id-izettle-product" value="{$id_product|escape:'javascript':'UTF-8'}">
    {/if}
    <div class="izettle ">

        <style>

            .status {
                width: 80px;
                height: 80px;
                position: absolute;
                left: 50%;
                top: 50%;
                margin: -40px 0 0 -40px;
            }

            .lds-dual-ring {
                display: inline-block;
                width: 80px;
                height: 80px;
            }

            .lds-dual-ring:after {
                content: " ";
                display: block;
                width: 64px;
                height: 64px;
                margin: 8px;
                border-radius: 50%;
                border: 6px solid #000;
                border-color: #000 transparent #000 transparent;
                animation: lds-dual-ring 1.2s linear infinite;
            }

            @keyframes lds-dual-ring {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
            }
        </style>
        {if $bulk_mode}
        <style>
            .preloader {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(255, 255, 255, 0.6);;
                z-index: 99999;
                height: 100%;
                width: 100%;
                overflow: hidden !important;
            }
        </style>
        <div class="preloader" style="display: none">
            <div class="status">
                <div class="lds-dual-ring"></div>
            </div>
        </div>
        <form action="{$REQUEST_URI|escape:'javascript':'UTF-8'}" method="post">
            {foreach $POST as $key => $value}
                {if is_array($value)}
                    {foreach $value as $val}
                        <input type="hidden" name="{$key|escape:'javascript':'UTF-8'}[]"
                               value="{$val|escape:'javascript':'UTF-8'}"/>
                    {/foreach}
                {/if}
            {/foreach}
            {/if}

            <div class="row">
                {if !$bulk_mode && $show_tax}
                <div class="col-md-6 col-sm-12 padding-bottom-4">
                    {/if}
                    <div class="col-sm-12 padding-bottom-4">
                        <div class="col-sm-12">
                            {l s='Sync product to iZettle' mod='izettleconnector'}
                        </div>
                        <div class="col-sm-6">
                            {assign var="is_useizettle" value=($bulk_mode || ($id_config && $config['active']))}
                            <span class="toggle-container">
                        <input id="useizettle-toggle-on" class="toggle toggle-left" name="useizettle" value="1"
                               type="radio" {if $is_useizettle}checked="checked"{/if}>
                        <label for="useizettle-toggle-on" class="btn-toggle">{l s='Yes' mod='izettleconnector'}</label>
                        <input id="useizettle-toggle-off" class="toggle toggle-right" name="useizettle" value="0"
                               type="radio" {if !$is_useizettle}checked="checked"{/if}>
                        <label for="useizettle-toggle-off" class="btn-toggle">{l s='No' mod='izettleconnector'}</label>
                    </span>

                        </div>
                    </div>

                    <div id="izettle-other-settings" {if !$bulk_mode && !$config['active']}style="display: none" {/if}>
                        <div class="col-sm-12 padding-bottom-4">
                            <div class="col-sm-12">
                                {l s='Sync price to iZettle' mod='izettleconnector'}
                            </div>
                            <div class="col-sm-12">

                                {assign var="is_useprice" value=( !$id_config || $config['use_price'])}
                                <span class="toggle-container">
                            <input id="useprice-toggle-on" class="toggle toggle-left" name="useprice" value="1"
                                   type="radio" {if $is_useprice}checked="checked"{/if}>
                            <label for="useprice-toggle-on"
                                   class="btn-toggle">{l s='Yes' mod='izettleconnector'}</label>
                            <input id="useprice-toggle-off" class="toggle toggle-right" name="useprice" value="0"
                                   type="radio" {if !$is_useprice}checked="checked"{/if}>
                            <label for="useprice-toggle-off"
                                   class="btn-toggle">{l s='No' mod='izettleconnector'}</label>
                        </span>
                            </div>
                        </div>

                        <div class="col-sm-12 padding-bottom-4">
                            <div class="col-sm-12">
                                {l s='Sync wholesale price to iZettle' mod='izettleconnector'}
                            </div>
                            <div class="col-sm-12">

                                {assign var="is_use_wholesale_price" value=( !$id_config || $config['use_wholesale_price'])}
                                <span class="toggle-container">
                            <input id="use_wholesale_price-toggle-on" class="toggle toggle-left"
                                   name="use_wholesale_price" value="1" type="radio"
                                   {if $is_use_wholesale_price}checked="checked"{/if}>
                            <label for="use_wholesale_price-toggle-on"
                                   class="btn-toggle">{l s='Yes' mod='izettleconnector'}</label>
                            <input id="use_wholesale_price-toggle-off" class="toggle toggle-right"
                                   name="use_wholesale_price" value="0" type="radio"
                                   {if !$is_use_wholesale_price}checked="checked"{/if}>
                            <label for="use_wholesale_price-toggle-off"
                                   class="btn-toggle">{l s='No' mod='izettleconnector'}</label>
                        </span>
                            </div>
                        </div>

                        <div class="col-sm-12 padding-bottom-4">
                            <div class="col-sm-12">
                                {l s='Sync inventory to iZettle' mod='izettleconnector'}
                            </div>
                            <div class="col-sm-12">

                                {assign var="is_usestock" value=(!$id_config || $config['id_inventory_sync_policy'] == 3)}
                                <span class="toggle-container">
                            {*!!! use value 3 to full inventory sync*}
                            <input id="usestock-toggle-on" class="toggle toggle-left" name="usestock" value="3"
                                   type="radio" {if $is_usestock}checked="checked"{/if}>
                            <label for="usestock-toggle-on"
                                   class="btn-toggle">{l s='Yes' mod='izettleconnector'}</label>
                            <input id="usestock-toggle-off" class="toggle toggle-right" name="usestock" value="0"
                                   type="radio" {if !$is_usestock}checked="checked"{/if}>
                            <label for="usestock-toggle-off"
                                   class="btn-toggle">{l s='No' mod='izettleconnector'}</label>
                        </span>
                            </div>
                        </div>

                        <div class="col-sm-12 padding-bottom-4">
                            <div class="col-sm-12">
                                {l s='Language' mod='izettleconnector'}
                            </div>
                            <div class="col-sm-6">
                                <div style="width: 200px">
                                    {foreach $langs as $languageItem}
                                        <div class="customradiobutton-container">
                                            <div class="option">
                                                <input type="radio" name="uselang" autocomplete="off"
                                                       {if $languageItem['id_lang'] == $default_lang}checked="checked"{/if}
                                                       id="{$languageItem['iso_code']|escape:'javascript':'UTF-8'}"
                                                       value="{$languageItem['id_lang']|escape:'javascript':'UTF-8'}">
                                                <label for="{$languageItem['iso_code']|escape:'javascript':'UTF-8'}"
                                                       aria-label="{$languageItem['iso_code']|escape:'javascript':'UTF-8'}">
                                                    <span></span>

                                                    {*                                        {$languageItem['iso_code']|upper|escape:'javascript':'UTF-8'}*}
                                                    {$languageItem['name']|escape:'javascript':'UTF-8'}
                                                    {*                                        <small>{$languageItem['name']|escape:'javascript':'UTF-8'}*}
                                                    {*                                        </small>*}

                                                </label>
                                            </div>
                                        </div>
                                    {/foreach}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 padding-bottom-4" {*if $bulk_mode*}style="display: none"{*/if*}>
                            <div class="col-sm-12">
                                {l s='Custom name' mod='izettleconnector'}
                            </div>
                            <div class="col-sm-12">
                                <input type="text" name="customname" id="customname"
                                       value="{if $id_config}{$config['custom_name']|escape:'javascript':'UTF-8'}{/if}"
                                       class="fixed-width-500" size="20">
                            </div>
                        </div>

                        <div class="col-sm-12 padding-bottom-4" {*if $bulk_mode*}style="display: none"{*/if*}>
                            <div class="col-sm-12">
                                {l s='Custom barcode' mod='izettleconnector'}
                            </div>
                            <div class="col-sm-12">
                                <input type="text" name="custombarcode" id="custombarcode"
                                       value="{if $id_config}{$config['custom_barcode']|escape:'javascript':'UTF-8'}{/if}"
                                       class="fixed-width-500" size="20">
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        var is_changed_tax_settings = false;
                        $(document).ready(function () {

                            $('input[name=useizettle]').on('change', function () {

                                if ($("input[type=radio][name=useizettle]:checked").val() > 0) {
                                    $('#izettle-other-settings').fadeIn(200);
                                    {if !$bulk_mode && $show_tax}
                                    $('.tax-container').fadeIn(200);
                                    {/if}

                                } else {
                                    $('#izettle-other-settings').hide();
                                    {if !$bulk_mode && $show_tax}
                                    $('.tax-container').hide(200);
                                    {/if}

                                }

                            });

                            // $('#submit').on('click', function () {
                            //     saveIzettleConfig();
                            // })

                        });

                        function saveIzettleConfig() {
                            var ajaxURL = "{$save_link|escape:'javascript':'UTF-8'}&action=saveConfig".replace(/&amp;/g, '&');
                            let active = $("input[type=radio][name=useizettle]:checked").val();
                            var data = {
                                id_product: $('#id-izettle-product').val(),
                                active: active,
                                use_price: $("input[type=radio][name=useprice]:checked").val(),
                                use_wholesale_price: $("input[type=radio][name=use_wholesale_price]:checked").val(),
                                id_inventory_sync_policy: $('input[type=radio][name=usestock]:checked').val(),
                                id_lang: $('input[type=radio][name=uselang]:checked').val(),
                                custom_name: $('#customname').val(),
                                custom_barcode: $('#custombarcode').val(),
                            };

                            {if !$bulk_mode && $show_tax}
                            if (active === "1") {
                                setTaxLoading();
                            } else {
                                $('.tax-container').css('display', 'none');
                            }

                            var taxes = $('.zettle-tax-checkbox[type=checkbox]');
                            if (is_changed_tax_settings && taxes.length) {
                                let zettle_taxes = [];
                                taxes.filter(':checked').each(function () {
                                    zettle_taxes.push($(this).data('uuid'))
                                });
                                data["zettle_taxes"] = zettle_taxes;
                            }

                            {/if}

                            $('#izettle-config-status').html("{l s='Saving' mod='izettleconnector'}...");
                            $("#izettle-save-button").prop("disabled", true);

                            $.ajax({
                                method: "POST",
                                dataType: 'json',
                                data: data,
                                async: true,
                                cache: false,
                                url: ajaxURL,
                            }).done(function (res) {
                                $("#izettle-save-button").prop("disabled", false);
                                if (res.error) {
                                    $('#izettle-config-status').html(res.error);
                                } else {
                                    if (res.saved) {
                                        var html = "{l s='Saved successfully' mod='izettleconnector'}.<br>";
                                        {if !$is_immediately_sync}
                                        html += "{l s='New data available and ready for the next automatic synchronization. You can also start synchronization manually' mod='izettleconnector'}.";
                                        var url = "{$sync_link|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&');
                                        html += " <a href='" + url + "'>[{l s='Sync' mod='izettleconnector'}]</a>";
                                        {/if}
                                        $('#izettle-config-status').html(html);
                                        {if !$bulk_mode && $show_tax}
                                        if (active === "1") {
                                            setTaxLoading();
                                            setTimeout(loadTaxes, 5000);
                                        }
                                        {/if}
                                    } else {
                                        $('#izettle-config-status').html("{l s='No synchronization necessary. Product data is up to date.' mod='izettleconnector'}");
                                    }

                                }

                            }).fail(function (err) {
                                $("#izettle-save-button").prop("disabled", false);
                                $('#izettle-config-status').html("{l s='Error while saving, try again' mod='izettleconnector'}");
                            });

                        }
                    </script>
                    {if !$bulk_mode && $show_tax}
                </div>
                <div class="col-md-6 col-sm-12 padding-bottom-4 tax-container"
                     style="display: {if $config['active']}block{else}none{/if}">
                    <style>
                        .preloader {
                            position: absolute;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            background-color: rgba(255, 255, 255, 0.6);;

                            height: 100%;
                            width: 100%;
                            overflow: hidden !important;
                        }
                    </style>
                    <script type="text/javascript">

                        function setTaxLoading() {
                            $('.tax-container').css('display', 'block');
                            var styles = {
                                width: "300"
                            };
                            $('.tax-container-inner').css(styles);
                            let $preloader = $('.preloader');
                            if ($preloader.length) {
                                $preloader.css('display', 'inherit');
                            }
                        }

                        function loadTaxes() {
                            setTaxLoading();

                            var getTaxAjaxURL = "{$tax_link|escape:'javascript':'UTF-8'}&action=getTaxList&id_product={$id_product|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&');
                            $.ajax({
                                method: "GET",
                                dataType: 'html',
                                async: true,
                                cache: false,
                                url: getTaxAjaxURL,
                            }).done(function (res) {

                                var styles = {
                                    width: "auto"
                                };
                                $('.tax-container-inner').css(styles);
                                $('.preloader').css('display', 'none');
                                let $zettle = $('.zettle-taxes');

                                $zettle.html(res);


                            }).fail(function (err) {
                                $('.preloader').css('display', 'none');

                                $('.zettle-taxes').text('Error occurs, reload the page');
                            });
                        }
                        {if $config['active']}
                        $(document).ready(function () {
                            loadTaxes();
                        });
                        {/if}

                    </script>
                    <div class="col-sm-12">{l s='Zettle taxes rules assigned to this product:' mod='izettleconnector'}</div>
                    <div class="col-sm-12 tax-container-inner" style="position: relative; min-height: 100px; width: 300px">
                        <div class="zettle-taxes">

                        </div>
                        <div class="preloader" style="display: {if $config['active']}inherit{else}none{/if}">
                            <div class="status">
                                <div class="lds-dual-ring"></div>
                            </div>
                        </div>

                    </div>
                </div>
                {/if}
            </div>


            {if $bulk_mode}


            <div class="row">
                <div class="col-sm-6" style="text-align: left">
                    <button type="submit" name="cancel" class="btn btn-secondary">
                        <i class="icon-remove"></i>
                        {l s='Cancel' mod='izettleconnector'}
                    </button>
                </div>
                <div class="col-sm-6" style="text-align: right">
                    <button type="submit" class="btn btn-primary" name="submitUpdateiZettleConfig"
                            onclick="$('.preloader').css('display', 'inherit'); return true;">
                        <i class="icon-check"></i>
                        {l s='Update iZettle configuration for selected products' mod='izettleconnector'}
                    </button>

                </div>
            </div>
        </form>
        {else}
        <div class="row">
            <div id="button-container" class="col-sm-12 padding-6" style="text-align: right">
                <span id="izettle-save-button" class="btn btn-primary"
                      onclick="saveIzettleConfig();"> {l s='Save iZettle settings for Product' mod='izettleconnector'}</span>
                <br><span id="izettle-config-status"></span>
            </div>


        </div>
        {/if}

    </div>
</div>

