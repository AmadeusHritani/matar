{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

<div class="col-lg-12 col-md-12 izettle izettle-settings">
    <div class="run-container panel overview-container row" style="min-height: 250px">

        {if isset($partial_sync) && $partial_sync}
            <div id='status-container' class='col-lg-12'>{l s='Initialization' mod='izettleconnector'} ...</div>
        <script>
            $(document).ready(function () {
                startContinuePartialSync();
            });
        </script>
        {else}
            <div class="row" style="text-align: center;">
                <div class="padding-top-4">
                    <p>
                        {if $is_immediately_sync}
                            <i class="icon-info-circle"></i>
                            {l s='Product data changes for synchronization are collected and propagated automatically.' mod='izettleconnector'}
                        {else}
                            <i class="icon-info-circle"></i>
                            {l s='Product data changes for synchronization are collected automatically.' mod='izettleconnector'}
                        {/if}

                    </p>
                </div>
            </div>
            <div class="row" style="text-align: left;">

                <div class="col-lg-6">
                    <div style="padding: 10px;">
                        <strong>{l s='Total' mod='izettleconnector'}:</strong>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>{l s='Sync Type' mod='izettleconnector'}</th>
                                <th>{l s='Count' mod='izettleconnector'}</th>
                            </tr>
                            </thead>
                            <tbody>

                            {if $update_product_counter}
                                <tr>
                                    <td>{l s='Update Product' mod='izettleconnector'}</td>
                                    <td><strong>{$update_product_counter|escape:'javascript':'UTF-8'}</strong></td>
                                </tr>
                            {/if}
                            {if $update_stock_counter}
                                <tr>
                                    <td>{l s='Update Stock' mod='izettleconnector'}</td>
                                    <td><strong>{$update_stock_counter|escape:'javascript':'UTF-8'}</strong></td>
                                </tr>
                            {/if}
                            {if $delete_product_counter}
                                <tr>
                                    <td>{l s='Delete Product' mod='izettleconnector'}</td>
                                    <td><strong>{$delete_product_counter|escape:'javascript':'UTF-8'}</strong></td>
                                </tr>
                            {/if}



                            {if $image_counter}
                                <tr>
                                    <td>{l s='Images' mod='izettleconnector'}</td>
                                    <td><strong>{$image_counter|escape:'javascript':'UTF-8'}</strong></td>
                                </tr>
                            {/if}

                            {if $import_counter}
                                <tr>
                                    <td>{l s='Export' mod='izettleconnector'}</td>
                                    <td><strong>{$import_counter|escape:'javascript':'UTF-8'}</strong></td>
                                </tr>
                            {/if}

                            {if $stock_import_counter}
                                <tr>
                                    <td>{l s='Export product quatities' mod='izettleconnector'}</td>
                                    <td><strong>{$stock_import_counter|escape:'javascript':'UTF-8'}</strong></td>
                                </tr>
                            {/if}

                            {if $discount_counter}
                                <tr>
                                    <td>{l s='Discounts' mod='izettleconnector'}</td>
                                    <td><strong>{$discount_counter|escape:'javascript':'UTF-8'}</strong></td>
                                </tr>
                            {/if}


                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div style="padding: 10px;">
                        <strong>{l s='Sync summary' mod='izettleconnector'}:</strong>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{l s='Tasks' mod='izettleconnector'}</th>
                                <th>{l s='Description' mod='izettleconnector'}</th>
                            </tr>
                            </thead>
                            <tbody>

                            {foreach $tasks as $task}
                                <tr>
                                    <td>{$task['name']|escape:'javascript':'UTF-8'}</td>
                                    <td>{$task['desc']|escape:'javascript':'UTF-8'}</td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-12 button-sync-container" style="text-align: center">
                    <button id="sync-button" class="btn btn-primary padding-left-4 padding-right-4"
                            onclick="startSync();">
                        <i class="icon-refresh"></i> {l s='Start sync now' mod='izettleconnector'}
                    </button>
                </div>

            </div>
            {if !$is_immediately_sync}
                {include file="$sync_tpl_dir/warning.tpl"}
            {/if}

        {/if}


    </div>


</div>

<script>

    var wizard_refresh_timer_id = undefined;



    function startContinuePartialSync() {

        var ajaxURL = "{$base_ajax_url|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&') + '&action=prepareContinuePartialSync';
        $.ajax({
            method: "GET",
            dataType: 'json',
            timeout: 0,
            async: true,
            cache: false,
            url: ajaxURL,
        }).done(function (res) {
            if (res.error) {

                alert(res.error);
                window.location.reload();

            } else {
                if (res.id_run) {
                    global_wizard_run_id = res.id_run;
                    global_wizard_cancellation_token = res.cancellation_token;
                    var ajaxURL = "{$base_ajax_url|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&') + '&action=startImport&id_run=' + global_wizard_run_id;

                    var xhr = $.ajax({
                        method: "GET",
                        dataType: 'html',
                        timeout: 0,
                        async: true,
                        cache: false,
                        url: ajaxURL,

                    });
                    wizard_refresh_timer_id = setTimeout(refreshRunStatus, 100);

                }
            }
        }).fail(function (err) {

            alert('sync failed!');
        });


    }

    function startSync() {
        $('.button-sync-container').hide();
        $('.run-container').html(`<div id='status-container' class='col-lg-12'>{l s='Initialization' mod='izettleconnector'} ...</div>`);

        var ajaxURL = "{$base_ajax_url|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&') + '&action=prepareSync';
        $.ajax({
            method: "GET",
            dataType: 'json',
            timeout: 0,
            async: true,
            cache: false,
            url: ajaxURL,
        }).done(function (res) {
            if (res.error) {

                alert(res.error);
                window.location.reload();

            } else {
                if (res.id_run) {
                    global_wizard_run_id = res.id_run;
                    global_wizard_cancellation_token = res.cancellation_token;
                    var ajaxURL = "{$base_ajax_url|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&') + '&action=startImport&id_run=' + global_wizard_run_id;

                    var xhr = $.ajax({
                        method: "GET",
                        dataType: 'html',
                        timeout: 0,
                        async: true,
                        cache: false,
                        url: ajaxURL,

                    });
                    wizard_refresh_timer_id = setTimeout(refreshRunStatus, 100);

                }
            }
        }).fail(function (err) {

            alert('sync failed!');
        });


    }


    var global_wizard_run_id = -1;
    var global_wizard_cancellation_token = "";


    function continueRun(id_run, cancellation_token) {
        global_wizard_run_id = id_run;
        global_wizard_cancellation_token = cancellation_token;
        var ajaxURL = "{$base_ajax_url|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&') + '&action=continueImport&id_run=' + global_wizard_run_id;

        var xhr = $.ajax({
            method: "GET",
            dataType: 'html',
            timeout: 0,
            async: true,
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

                $.each(res.tasks, function (index, item) {
                    updateTaskInfo(item);
                })
            }

            if (res.id_run) {
                global_wizard_run_id = res.id_run;
                if (!global_wizard_is_cancelling) {

                    var cancelButton = `<button id="cancel-button" class="btn btn-secondary" {literal}onclick="cancelRun(${res.id_run})"{/literal}>{l s='Cancel' mod='izettleconnector'}</button>`;

                    $('#status-container').html(cancelButton);
                }
            }

            if (res.is_all_finished) {

                if (global_wizard_finish_counter < 2) {
                    global_wizard_finish_counter = global_wizard_finish_counter + 1;
                    wizard_refresh_timer_id = setTimeout(refreshRunStatus, 500);
                } else {


                    var html = `<a target="_blank" href='{$history_url|escape:'javascript':'UTF-8'}{literal}${global_wizard_run_id}{/literal}'> {l s='Detailed information' mod='izettleconnector'}</a>`;
                    if (res.is_continue_available) {
                        var continueButton = `<button id="continue-button" class="btn btn-primary" {literal}onclick="continueRun(${res.id_run}, '${global_wizard_cancellation_token}')"{/literal}>{l s='Resume' mod='izettleconnector'}</button> `;

                        html = continueButton + '<br>' + html;
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

            $(id).hide().fadeIn(200);
            {/literal}
        }

    }

    var global_wizard_is_cancelling = false;

    function cancelRun(id_run) {
        global_wizard_is_cancelling = true;
        var current_id_run = global_wizard_run_id;
        if (typeof (id_run) !== "undefined") {
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

                var cancelButton = `{l s='Error while cancelling, please try again' mod='izettleconnector'} <button id="cancel-button" class="btn btn-secondary" onclick="cancelRun({literal}${global_wizard_run_id}{/literal})">{l s='Cancel' mod='izettleconnector'}</button>`;

                $('#status-container').html(cancelButton);
            }
        })

    }


</script>