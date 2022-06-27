{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

<div class="col-lg-12 col-md-12 ">
    <div id="smartwizard-bg" >
        <div id="smartwizard-container" class="izettle">
            <div id="smartwizard" class="panel">
                <ul class="nav">
                    <li>
                        <a class="nav-link" href="#step-1">
                            <small>{l s='Step 1' mod='izettleconnector'}</small><br>
                            <strong>{l s='Products' mod='izettleconnector'}</strong>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#step-2">
                            <small>{l s='Step 2' mod='izettleconnector'}</small><br>
                            <strong>{l s='Synchronization' mod='izettleconnector'}</strong>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#step-3">
                            <small>{l s='Step 3' mod='izettleconnector'}</small><br>
                            <strong>{l s='Taxes' mod='izettleconnector'}</strong>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#step-4">
                            <small>{l s='Step 4' mod='izettleconnector'}</small><br>
                            <strong>{l s='Price' mod='izettleconnector'}</strong>
                        </a>
                    </li>
                    {*                    <li>*}
                    {*                        <a class="nav-link" href="#step-4">*}
                    {*                            <small>{l s='Step 4' mod='izettleconnector'}</small><br>*}
                    {*                            <strong>{l s='Inventory' mod='izettleconnector'}</strong>*}
                    {*                        </a>*}
                    {*                    </li>*}
                    <li>
                        <a class="nav-link" href="#step-5">
                            <small>{l s='Step 5' mod='izettleconnector'}</small><br>
                            <strong>{l s='Language' mod='izettleconnector'}</strong>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#step-6">
                            <small>{l s='Step 6' mod='izettleconnector'}</small><br>
                            <strong>{l s='Confirm' mod='izettleconnector'}</strong>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#step-7">
                            <small>{l s='Sync' mod='izettleconnector'}</small><br>
                            <strong>{l s='Summary' mod='izettleconnector'}</strong>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="step-1" class="tab-pane" role="tabpanel">
                        <div class="customradiobutton-container">
                            <div class="option">
                                <input type="radio" checked="checked" name="producttoexport" id="all" value="all">
                                <label for="all" aria-label="All">
                                    <span></span>

                                    {l s='Sync all listed products with iZettle' mod='izettleconnector'}
                                    <small>{l s='Export all products' mod='izettleconnector'}</small>
                                </label>
                            </div>

                            <div class="option">
                                <input type="radio" name="producttoexport" id="category" value="category">
                                <label for="category" aria-label="Category">
                                    <span></span>

                                    {l s='Add category to the sync' mod='izettleconnector'}
                                    <div id="category-name-container" class="padding-top-2" style="display: none"><small style="display: inline">{l s='Selected category' mod='izettleconnector'}: </small><strong id="category-name-placeholder"></strong></div>
                                    <button class="btn btn-primary margin-top-2 margin-bottom-2" id="select-category" style="display: none"
                                            onclick="openCategorySelector()">{l s='Change category' mod='izettleconnector'}
                                    </button>
                                    <small>{l s='Export products from selected category' mod='izettleconnector'}</small>

                                </label>
                            </div>
                        </div>
                    </div>
                    <div id="step-2" class="tab-pane" role="tabpanel">
                        <div class="customradiobutton-container">
                            <div class="option">
                                <input type="radio" name="export-policy" id="replace" value="replace">
                                <label for="replace" aria-label="Replace">
                                    <span></span>
                                    {*                                    <i class="icon-warning-sign list-empty-icon"></i>*}
                                    {l s='Replace iZettle library' mod='izettleconnector'}

                                    <small>{l s='Your existing iZettle library will be deleted and replaced by this new sync.' mod='izettleconnector'}
                                    </small>


                                </label>
                            </div>

                            <div class="option">
                                <input type="radio" checked="checked" name="export-policy" id="add" value="add">
                                <label for="add" aria-label="Add">
                                    <span></span>
                                    {*                                    <i class="icon-plus"></i>*}
                                    {l s='Add products to iZettle library' mod='izettleconnector'}
                                    <small>
                                        {l s='The products will be added to your existing iZettle library' mod='izettleconnector'}
                                    </small>

                                </label>
                            </div>
                        </div>
                    </div>


                    <div id="step-3" class="tab-pane" role="tabpanel">
                        <div class="taxes-container" >

                        </div>
                    </div>




                    <div id="step-4" class="tab-pane" role="tabpanel">
                        <div class="customradiobutton-container">
                            <div class="option">
                                <input type="radio" name="price-policy" checked="checked" id="yes" value="yes">
                                <label for="yes" aria-label="With prices">
                                    <span></span>
                                    {*                                    <i class="icon-money"></i>*}
                                    {l s='Export prices' mod='izettleconnector'}
                                    <small>{l s='Export products with retail and wholesale prices' mod='izettleconnector'}
                                    </small>


                                </label>
                            </div>

                            <div class="option">
                                <input type="radio" name="price-policy"  id="retail" value="retail">
                                <label for="retail" aria-label="Retail prices">
                                    <span></span>
                                    {*                                    <i class="icon-money"></i>*}
                                    {l s='Export retail price only' mod='izettleconnector'}
                                    <small>{l s='Export products with retail price only' mod='izettleconnector'}
                                    </small>


                                </label>
                            </div>

                            <div class="option">
                                <input type="radio" name="price-policy"  id="wholesale" value="wholesale">
                                <label for="wholesale" aria-label="Wholesale prices">
                                    <span></span>
                                    {*                                    <i class="icon-money"></i>*}
                                    {l s='Export wholesale price only' mod='izettleconnector'}
                                    <small>{l s='Export products with wholesale price only' mod='izettleconnector'}
                                    </small>


                                </label>
                            </div>

                            <div class="option">
                                <input type="radio"  name="price-policy" id="no" value="no">
                                <label for="no" aria-label="Without prices">
                                    <span></span>
                                    {*                                    <i class="icon-ban"></i>*}
                                    {l s='Export without prices' mod='izettleconnector'}
                                    <small>
                                        {l s='Export products without prices' mod='izettleconnector'}
                                    </small>

                                </label>
                            </div>
                        </div>

                    </div>
                    {*                    <div id="step-4" class="tab-pane" role="tabpanel">*}
                    {*                        <div class="customradiobutton-container">*}
                    {*                            <div class="option">*}
                    {*                                <input type="radio" name="inventory-policy" checked="checked" id="both" value="both">*}
                    {*                                <label for="both" aria-label="Both">*}
                    {*                                    <span></span>*}
                    {*                                    <i class="icon-exchange"></i>*}
                    {*                                    {l s='Export product quantity' mod='izettleconnector'}*}

                    {*                                    <small>{l s='Product quantity exported from PrestaShop to iZettle' mod='izettleconnector'}*}
                    {*                                    </small>*}


                    {*                                </label>*}
                    {*                            </div>*}

                    {*                            <div class="option">*}
                    {*                                <input type="radio" name="inventory-policy" id="noinventory" value="noinventory">*}
                    {*                                <label for="noinventory" aria-label="No inventory">*}
                    {*                                    <span></span>*}
                    {*                                    <i class="icon-ban"></i>*}
                    {*                                    {l s='Export without product quantity' mod='izettleconnector'}*}

                    {*                                    <small>{l s='No product quantity exported' mod='izettleconnector'}*}
                    {*                                    </small>*}


                    {*                                </label>*}
                    {*                            </div>*}
                    {*                        </div>*}
                    {*                    </div>*}
                    <div id="step-5" class="tab-pane" role="tabpanel">
                        {foreach $langs as $languageItem}
                            <div class="customradiobutton-container">
                                <div class="option">
                                    <input type="radio" name="lang" {if $languageItem['id_lang'] == $default_lang}checked="checked"{/if} id="{$languageItem['iso_code']|escape:'javascript':'UTF-8'}" value="{$languageItem['id_lang']|escape:'javascript':'UTF-8'}">
                                    <label for="{$languageItem['iso_code']|escape:'javascript':'UTF-8'}" aria-label="{$languageItem['iso_code']|escape:'javascript':'UTF-8'}">
                                        <span></span>

                                        {$languageItem['iso_code']|upper|escape:'javascript':'UTF-8'}
                                        <small>{$languageItem['name']|escape:'javascript':'UTF-8'}
                                        </small>

                                    </label>
                                </div>


                            </div>
                        {/foreach}
                        <div class="text-center padding-4" style="width: 100%;">

                            <aside class="padding-top-4">
                                <p>
                                    <i class="icon-info-circle"></i> {l s='Select the product language you want to sync with your iZettle library.' mod='izettleconnector'}

                                </p>


                            </aside>
                        </div>

                    </div>

                    <div id="step-6" class="tab-pane" role="tabpanel">
                        <div class="overview-container row" style="min-height: 250px;">

                        </div>
                    </div>
                    <div id="step-7" class="tab-pane" role="tabpanel">
                        <div class="run-container  row" style="min-height: 250px">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function beforeUnloadFunc (e) {
        (e || window.event).returnValue = 'Configuration will be lost. Are you sure you want to leave?';
        return 'Configuration will be lost. Are you sure you want to leave?';
    }

    window.addEventListener("beforeunload", beforeUnloadFunc);

    window.location.hash = "";

    var wizard_root_path = (window.location.protocol + "//" + window.location.host + window.location.pathname).replace('index.php', "");

    var wizard_refresh_timer_id = undefined;

    var create_new_partial_sync = false;
    var partial_sync_pages = false;

    function taxStepFitHeight() {
        setTimeout(function () {
            let taxHeight = $('#tax-main-container').height();
            //console.log('#tax-main-container' + taxHeight);
            $('.taxes-container').height(taxHeight);
            let $tab = $('.tab-content');
            var containerHeight = $tab.height();
            //console.log('.tab-content' + containerHeight);
            if (containerHeight < taxHeight) {
                $tab.animate({literal}{height: taxHeight + 20}{/literal},200)
                }
            }, 50
        );
    }

    function loadTaxStep() {

        var data = {
            type: $('input[type=radio][name=producttoexport]:checked').val(),
            cat_id: global_wizard_category_id
        };

        var ajaxURL = "{$base_ajax_url|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&') + '&action=loadTaxStep';
        //$('#wizard-import-button').fadeIn(200);
        //$('.sw-btn-next').hide();
        // Ajax call to fetch your content


        $.ajax({
            method: "POST",
            dataType: 'html',
            data: data,
            async: true,
            cache: false,
            url: ajaxURL,
            beforeSend: function (xhr) {
                // Show the loader
                $('#smartwizard').smartWizard("loader", "show");
            }
        }).done(function (res) {

            let $taxes = $('.taxes-container');
            $taxes.html(res);
            $taxes.addClass('loaded');

            taxStepFitHeight();

            // Hide the loader
            $('#smartwizard').smartWizard("loader", "hide");

        }).fail(function (err) {

            $('.taxes-container').html("An error loading the resource");

            // Hide the loader
            $('#smartwizard').smartWizard("loader", "hide");
        });

    }

    $(document).ready(function () {

        $('[data-toggle="popover"]').popover();
        window.onbeforeunload = function (event) {
            window.location.hash = "";
        };

        var btnFinish = $('<button id="wizard-import-button" ></button>').html(`{l s='Start sync' mod='izettleconnector'}`)
            .addClass('btn btn-primary')
            .on('click', function(){ $('#smartwizard').smartWizard('goToStep', 6); });
        btnFinish.hide();
        // SmartWizard initialize
        $('#smartwizard').smartWizard(
            {
                selected: 0, // Initial selected step, 0 = first step
                //theme: 'arrows', // dots theme for the wizard, related css need to include for other than default theme
                transition: {
                    animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                    speed: '400', // Transion animation speed
                    easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
                },
                toolbarSettings: {
                    toolbarPosition: 'bottom', // none, top, bottom, both
                    toolbarButtonPosition: 'right', // left, right, center
                    showNextButton: true, // show/hide a Next button
                    showPreviousButton: true, // show/hide a Previous button
                    toolbarExtraButtons: [btnFinish] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
                },
                anchorSettings: {
                    anchorClickable: false, // Enable/Disable anchor navigation
                    enableAllAnchors: false, // Activates all anchors clickable all times
                    markDoneStep: false, // Add done css
                    markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                    enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                },
                lang: { // Language variables for button
                    next: `{l s='Next' mod='izettleconnector'}`,
                    previous: `{l s='Previous' mod='izettleconnector'}`
                },
            }
        );


        $("#smartwizard").on("showStep", function (e, anchorObject, stepIndex, stepDirection, stepPosition) {
            //window.location.hash = "";
            var data = {
                type: $('input[type=radio][name=producttoexport]:checked').val(),
                mode: $('input[type=radio][name=export-policy]:checked').val(),
                price: $('input[type=radio][name=price-policy]:checked').val(),
                inventory: "both",//$('input[type=radio][name=inventory-policy]:checked').val(),
                id_lang: $('input[type=radio][name=lang]:checked').val(),
                cat_id: global_wizard_category_id,
                create_new_partial_sync: create_new_partial_sync,
                partial_sync_pages: partial_sync_pages
            };

            if (stepIndex === 5 || stepIndex ===6) {
                data["tax_policy"] = $('input[type=radio][name=taxes]:checked').val();
                var addDefaultTax = $('input[type=radio][name=taxes]:checked').val() == 'only-default';
                data["createWithDefaultTax"] = addDefaultTax ? 1 : 0;

                var taxmap = {literal}{}{/literal};

                if (data["tax_policy"] == 'custom') {
                    $('.taxmap-selector').each(function () {
                        var $this = $(this);
                        var prestashopTaxId = $this.data('taxid') + "";
                        var zettleUuid = $this.find('option').filter(':selected').val()
                        taxmap[prestashopTaxId] = zettleUuid;
                    })
                }
                data["taxmap"] = taxmap;
                var explicitDefaulTaxes = [];

                $('input.custom-explicitly-defaul-tax[type=checkbox]').filter(':checked').each(function () {
                    explicitDefaulTaxes.push( $(this).data('uuid'))
                });

                data["explicitDefaulTaxes"] = explicitDefaulTaxes;



            }

            $('#wizard-import-button').hide();
            $('.sw-btn-next').fadeIn(0);


            if (stepIndex === 6) {
                $('#smartwizard .toolbar').hide();
                $('.run-container').html('');
                $('.run-container').append(`<div id='status-container' class='col-lg-12'>{l s='Initialization' mod='izettleconnector'} ...</div>`);
                $('#smartwizard').smartWizard("loader", "show");

                var ajaxURL = "{$base_ajax_url|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&')  + '&action=prepareImport';
                var data_page = 0;
                var $data_page_selector = $(".data-page-selector");
                if ($data_page_selector.length) {
                    // data_page = $data_page_selector.find('option').filter(':selected').val()
                    data_page = $data_page_selector.data('value');
                }
                data["data_page"] = data_page;
                $.ajax({
                    method: "POST",
                    dataType: 'json',
                    timeout: 0,
                    async: true,
                    data: data,
                    cache: false,
                    url: ajaxURL,

                }).done(function (res) {
                    if (res.error) {
                        $('#smartwizard').smartWizard("loader", "hide");
                        $('#smartwizard').smartWizard('goToStep', 5);
                        $('#smartwizard .toolbar').fadeIn(200);
                        alert(res.error);

                    } else {
                        if (res.id_run) {
                            global_wizard_run_id = res.id_run;
                            global_wizard_cancellation_token = res.cancellation_token;
                            var ajaxURL = "{$base_ajax_url|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&')  + '&action=startImport&id_run=' + global_wizard_run_id;

                            var xhr = $.ajax({
                                method: "GET",
                                dataType: 'html',
                                timeout: 0,
                                async: true,
                                data: data,
                                cache: false,
                                url: ajaxURL,

                            });
                            wizard_refresh_timer_id = setTimeout(refreshRunStatus, 100);

                        }
                    }
                }).fail(function (err) {
                    $('#smartwizard').smartWizard("loader", "hide");
                    $('#smartwizard').smartWizard('goToStep', 5);
                    $('#smartwizard .toolbar').fadeIn(200);
                    alert('Export failed!');
                });




            }

            if (stepIndex === 5) {

                var ajaxURL = "{$base_ajax_url|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&') + '&action=overviewNewRun';
                $('#wizard-import-button').fadeIn(200);
                $('.sw-btn-next').hide();
                // Ajax call to fetch your content
                $.ajax({
                    method: "POST",
                    dataType: 'html',
                    data: data,
                    async: true,
                    cache: false,
                    url: ajaxURL,
                    beforeSend: function (xhr) {
                        // Show the loader
                        $('#smartwizard').smartWizard("loader", "show");
                    }
                }).done(function (res) {
                    $('.overview-container').html(res);

                    // Hide the loader
                    $('#smartwizard').smartWizard("loader", "hide");

                    setTimeout(function () {
                            let overviewHeight = $('.overview-container').height();
                            //console.log('#tax-main-container' + taxHeight);
                            //$('.taxes-container').height(taxHeight);
                            let $tab = $('.tab-content');
                            var containerHeight = $tab.height();
                            //console.log('.tab-content' + containerHeight);
                            $tab.animate({literal}{height: overviewHeight + 20}{/literal},200)
                        }, 50
                    );

                }).fail(function (err) {

                    $('.overview-container').html("An error loading the resource");

                    // Hide the loader
                    $('#smartwizard').smartWizard("loader", "hide");
                });
            }

            if (stepIndex === 2) {
                if (!$('.taxes-container').hasClass('loaded')) {
                    loadTaxStep();
                }
                taxStepFitHeight();

            }


        });
        $('#smartwizard').smartWizard('goToStep', 0);

        $('input[type=radio][name=producttoexport]').change(function () {
            if (this.value === 'category') {
                if (global_wizard_category_id < 1) {
                    openCategorySelector();
                }
            } else {
                if ($('.taxes-container').hasClass('loaded')) {
                    loadTaxStep();
                }
            }
        });
        $('#categories-tree').find('.tree-selected input').change(function () {

        })

    });

    var global_wizard_category_id = -1;
    var global_wizard_run_id = -1;
    var global_wizard_cancellation_token = "";

    function setSelectedCategoryId() {
        if ($('#categories-tree').length) {
            var selected = [];
            $('#categories-tree').find('.tree-selected input').each(
                function () {
                    selected.push($(this).val());
                }
            );
            if (selected.length) {
                global_wizard_category_id = parseInt(selected[0]);
            }
            if ($('.taxes-container').hasClass('loaded')) {
                loadTaxStep();
            }
        }
    }

    function processCategoryDialog() {
        setSelectedCategoryId();
        var id = global_wizard_category_id;
        var elem = $('#categories-tree input[type=radio][value=' + id + ']');
        if (elem.length) {
            $("#processCategoryDialog")
            $('#category-name-placeholder').text(elem.parent().find('label').text());
        } else {
            $('#category-name-placeholder').text('');
        }

    }

    function openCategorySelector() {

        var url = '{$base_ajax_url|escape:'javascript':'UTF-8'}'.replace(/&amp;/g, '&') + '&action=getCategory&_='+Math.random();
        var id = global_wizard_category_id;

        if (id > 0) {
            url = url + '&getSelectedCategoryId=' + id;
        }
        if (!!$.prototype.fancybox) {
            $.fancybox.open({
                href: url,
                type: 'ajax',
                autoSize: false,
                wrapCSS: 'wizard padding20 bootstrap',
                width: '400',
                height: '500',
                hideOnContentClick: false,
                afterClose: function () {
                    closeCategorySelector();
                }
            });
        }
    }

    function closeCategorySelector() {
        var id = global_wizard_category_id;

        if (id > 0) {
            $('#category-name-container').css('display', 'inherit');
            $('#select-category').css('display', 'inherit');
            if ($('.taxes-container').hasClass('loaded')) {
                loadTaxStep();
            }

        } else {
            $('#select-category').css('display', 'none');
            $('#category-name-container').css('display', 'none');
            $('#category-name-placeholder').text('');
            $('input[type=radio][name=producttoexport][value=all]').prop('checked', true);
        }
        $.fancybox.close();
    }

    function continueRun(id_run, cancellation_token) {
        global_wizard_run_id = id_run;
        global_wizard_cancellation_token = cancellation_token;
        var ajaxURL = "{$base_ajax_url|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&') + '&action=continueImport&id_run=' + global_wizard_run_id;
        var data = {
            type: $('input[type=radio][name=producttoexport]:checked').val(),
            mode: $('input[type=radio][name=export-policy]:checked').val(),
            price: $('input[type=radio][name=price-policy]:checked').val(),
            inventory: "both",//$('input[type=radio][name=inventory-policy]:checked').val(),
            id_lang: $('input[type=radio][name=lang]:checked').val(),
            cat_id: global_wizard_category_id
        };
        var xhr = $.ajax({
            method: "GET",
            dataType: 'html',
            timeout: 0,
            async: true,
            data: data,
            cache: false,
            url: ajaxURL,

        });
        wizard_refresh_timer_id = setTimeout(refreshRunStatus, 100);
    }


    var global_wizard_finish_counter = 0;

    function refreshRunStatus() {

        var ajaxURL = "{$base_status_url|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&') + '&action=getImportStatus&id_run=' + global_wizard_run_id;

        $.ajax({
            method: "GET",
            dataType: 'json',
            cache: false,
            async: true,
            url: ajaxURL,
        }).done(function (res) {

            if (res.tasks) {
                $('#smartwizard').smartWizard("loader", "hide");
                $.each(res.tasks, function (index, item) {
                    updateTaskInfo(item);
                })
            }

            if (res.id_run) {
                global_wizard_run_id = res.id_run;
                if (!global_wizard_is_cancelling) {

                    var cancelButton = `<button id="cancel-button" class="btn btn-secondary margin-top-2 margin-bottom-2" {literal}onclick="cancelRun(${res.id_run})"{/literal}>{l s='Pause' mod='izettleconnector'}</button>`;

                    $('#status-container').html(cancelButton);
                }
            }

            if (res.is_all_finished) {

                if (global_wizard_finish_counter < 2) {
                    global_wizard_finish_counter = global_wizard_finish_counter + 1;
                    wizard_refresh_timer_id = setTimeout(refreshRunStatus, 500);
                } else {

                    {*var html = `<a target="_blank" href='{$history_url|escape:'javascript':'UTF-8'}{literal}${global_wizard_run_id}{/literal}'> {l s='Export successful - show details' mod='izettleconnector'}</a>`.replace(/&amp;/g, '&');*}
                    var html = `<a target="_blank" href='https://my.zettle.com/products?from=1&pageSize=50'> {l s='Export successful, show iZettle library' mod='izettleconnector'}</a>`;
                    if (res.is_continue_available) {
                        var continueButton = `<button id="continue-button" class="btn btn-primary margin-top-2 margin-bottom-2" {literal}onclick="continueRun(${res.id_run}, '${global_wizard_cancellation_token}')"{/literal}>{l s='Resume' mod='izettleconnector'}</button> `;
                        html = `<a target="_blank" href='{$history_url|escape:'javascript':'UTF-8'}{literal}${global_wizard_run_id}{/literal}'> {l s='Detailed information' mod='izettleconnector'}</a>`.replace(/&amp;/g, '&');
                        html = continueButton + '<br>' + html;
                    } else {
                        html = `<div><i class="icon-check" style="color: #60cb83; font-size: 35px"></i></div>` + '<br>' + html;
                        window.removeEventListener("beforeunload", beforeUnloadFunc);
                    }
                    {literal}
                    html = `<div  class='col-lg-12'>${html}</div>`;
                    {/literal}
                    $('#status-container').html(html);
                    //$('.run-container').append(html);
                    global_wizard_finish_counter = 0;
                    global_wizard_run_id = -1;
                    global_wizard_is_cancelling = false;

                }

            } else {
                if (global_wizard_is_cancelling) {
                    cancelRun(global_wizard_run_id);
                }
                wizard_refresh_timer_id = setTimeout(refreshRunStatus, 500);
            }


        }).fail(function (err) {

        });


    }

    function updateTaskInfo(item) {

        var id = "#task-" + item.id_izettle_task;
        var displayPrepared = item.prepared_count > 0 ? 'inline' : 'none';
        var itemElement = $(id);
        if (itemElement.length) {
            {literal}
            itemElement.removeClass(function (index, className) {
                return (className.match(/(^|\s)task-state-\S+/g) || []).join(' ');
            });
            itemElement.addClass('task-state-' + item.state_name);
            $(id + ' .progressbar').html(`<div style="width:${item.percent}%"></div>`);
            $(id + ' .task-progress-container').css('display', displayPrepared);
            for (var key in item) {
                var selector = id + ' .task-' + key;
                var currentElement = $(selector);
                if (currentElement.length) {
                    if (currentElement.text() != (item[key]).toString()) {
                        currentElement.text(item[key]);
                        if (key !== 'elapsed') {
                            currentElement.hide().fadeIn(200);
                        }
                    }
                }
            }
            $('#smartwizard .tab-content').css('height', $('.run-container').height() + 150 + 'px');
            {/literal}
        } else {

            var lastOperationStr = "{l s='Last operation' mod='izettleconnector'}";
            var statusStr = "{l s='Status' mod='izettleconnector'}";
            var totalStr = "{l s='Total' mod='izettleconnector'}";
            var processedStr = "{l s='Processed' mod='izettleconnector'}";
            var inProgressStr = "{l s='in progress' mod='izettleconnector'}";
            var elapsedStr = "{l s='Elapsed time' mod='izettleconnector'}";

            {literal}
            var html = `<div id="task-${item.id_izettle_task}"  class="col-lg-6 task-state-${item.state_name}">
                      <div class="col-lg-12 task-info finished">
                       <div class="col-lg-12">
                        <h3 class="task-action_desc">${item.action_desc}</h3>
                       </div>
                       <div class="col-lg-12">
                        <div class="col-lg-4 bold">${lastOperationStr}:</div>
                        <div class="col-lg-8 task-current_info"  title="${item.current_info}">${item.current_info}</div>
                       </div>
                       <div class="col-lg-12">
                        <div class="col-lg-4 bold">${statusStr}:</div>
                        <div class="col-lg-8 "><span class="task-state_name">${item.state_name}</span></div>
                       </div>
                       <div class="col-lg-12">
                        <div class="col-lg-4 bold">${totalStr}:</div>
                        <div class="col-lg-8 task-total_count">${item.total_count}</div>
                       </div>
                       <div class="col-lg-12">
                        <div class="col-lg-4 bold">${processedStr}:</div>
                        <div class="col-lg-8">
                         <span class="task-processed_count">${item.processed_count}</span>
                         <span style="display: ${displayPrepared}" class="task-progress-container">(${inProgressStr} <span class="task-prepared_count">${item.prepared_count}</span>)</span>
                        </div>
                       </div>
                       <div class="col-lg-12">
                        <div class="col-lg-4 bold">${elapsedStr}:</div>
                        <div class="col-lg-8 task-elapsed">${item.elapsed}</div>
                       </div>
                       <div class="col-lg-12 progressbar-container">
                        <div class="progressbar">
                         <div style="width:${item.percent}%"></div>
                        </div>
                       </div>
                      </div>
                     </div>`;
            $('.run-container').append(html);
            $('#smartwizard .tab-content').css('height', $('.run-container').height() + 150 + 'px');
            $(id).hide().fadeIn(200);
            {/literal}
        }

    }

    var global_wizard_is_cancelling = false;
    function cancelRun(id_run) {
        global_wizard_is_cancelling = true;
        var current_id_run = global_wizard_run_id;
        if (typeof(id_run) !== "undefined") {
            current_id_run = id_run;
        }

        var ajaxURL = "{$base_status_url|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&') + '&action=cancelImport&id_run=' + current_id_run + '&cancellation_token=' + global_wizard_cancellation_token;
        $('#status-container').html("{l s='cancelling' mod='izettleconnector'} ...");
        $.ajax({
            method: "GET",
            dataType: 'json',
            cache: false,
            async: true,
            url: ajaxURL,
        }).done(function (res) {
            $('#status-container').html("{l s='cancelling' mod='izettleconnector'} ...");
        }).fail(function (err) {
            if (global_wizard_run_id > 0) {

                var cancelButton = `{l s='Error while cancelling, please try again' mod='izettleconnector'} <button id="cancel-button" class="btn btn-secondary" onclick="cancelRun({literal}${global_wizard_run_id}{/literal})">{l s='Cancel' mod='izettleconnector'} / {l s='Pause' mod='izettleconnector'}</button>`;

                $('#status-container').html(cancelButton);
            }
        })

    }

</script>