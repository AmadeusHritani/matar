{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

<div class="{if $is_connected}col-lg-12{else}col-lg-12{/if} col-md-12 izettle-light">
    <div style="display: none" class="run-container  col-lg-12 izettle">
        <div id='status-container' class='col-lg-12 center'></div>
        <div class='col-lg-3 center'></div>

    </div>

    <script>

        var global_izettle_undo_task_id = -1;
        var global_izettle_undo_task_name = -1;
        var wizard_refresh_timer_id;
        function izettleUndo(id, name) {

            if (global_izettle_undo_task_id > 0) {
                alert(`{l s='Rollback is running. Please wait.' mod='izettleconnector'}`);
                return;
            }

            var nameAndId = name + ' (ID='+id+')';
            if (!confirm(`{l s='Please confirm the undo for %s. Once the rollback is confirmed, it cannot be cancelled.' mod='izettleconnector'}`.replace("%s", nameAndId))) {
                return;
            }
            $('.run-container').css('display', 'inherit');
            global_izettle_undo_task_id = id;
            global_izettle_undo_task_name = name;
            $('#status-container').html(`{l s='Undo initialization' mod='izettleconnector'} ...`);
            var ajaxURL = '{$base_ajax_url|escape:'javascript':'UTF-8'}&action=startUndo&id_izettle_task='.replace(/&amp;/g, '&')  + global_izettle_undo_task_id;

            // Ajax call to fetch your content
            $.ajax({
                method: "GET",
                dataType: 'html',
                timeout: 0,
                async: true,
                cache: false,
                url: ajaxURL,

            }).done(function (res) {
                //alert('import done');
            }).fail(function (err) {

                //alert('import failed!');
            });

            wizard_refresh_timer_id = setTimeout(refreshRunStatus, 150);



        }

        var global_wizard_finish_counter = 0;

        function refreshRunStatus() {

            var ajaxURL = "{$base_status_url|escape:'javascript':'UTF-8'}".replace(/&amp;/g, '&')  + '&action=getUndoStatus&id_izettle_task=' + global_izettle_undo_task_id;

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

                if (res.is_all_finished) {
                    if (global_wizard_finish_counter < 2) {
                        global_wizard_finish_counter = global_wizard_finish_counter + 1;
                        wizard_refresh_timer_id = setTimeout(refreshRunStatus, 500);
                    } else {
                        if (res.is_continue_available) {
                            var continueButton = `<button id="continue-button" class="btn btn-primary" {literal}onclick="izettleUndo(${global_izettle_undo_task_id}, '${global_izettle_undo_task_name}')"{/literal}>{l s='Resume' mod='izettleconnector'}</button> `;
                            {literal}
                            var html = `<div  class='col-lg-12'>${continueButton}</div>`;
                            {/literal}
                            $('#status-container').html(html);

                        } else {
                            var html = `<div  class='col-lg-12 bold center'>{l s='Page is reloading after 5 seconds' mod='izettleconnector'} ...</div>`;
                            $('#status-container').html(html);
                            $('.run-container').append(html);
                            setTimeout(function () {
                                window.location.reload();
                            }, 5000)
                        }
                        global_izettle_undo_task_id = -1;
                    }



                } else {
                    $('#status-container').html("{l s='Rollback is running. Please wait.' mod='izettleconnector'}");
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

        function izettleContinue() {
            alert('TODO!');
        }

    </script>