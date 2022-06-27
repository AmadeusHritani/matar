<?php
/**
 * 2020 Zettle Prestashop Connector
 *  @author    : Zettle
 *  @copyright : 2020 Zettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : zettle.com
 *
 */

class AdminIzettleConnectorSyncController extends ModuleAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->bootstrap = true;
    }

    public function initContent()
    {
        parent::initContent();

        $widget = $this->module->getConnectorWidget(false);

        $sync_tpl_dir = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/sync';
        $settings_link = $this->context->link->getAdminLink('AdminIzettleConnectorSettings')."#cron";
        $cron_link =
            $this->context->link->getModuleLink(
                $this->module->name,
                'cron',
                array(
                    'token' => Configuration::get(IZETTLECONNECTOR_CRON_CODE)
                ),
                true
            );
        $query = array(
            'token'  => Tools::getAdminToken(_COOKIE_KEY_),
            'wizard' => 1,
            'ajax'   => 1,
        );
        $base_ajax_url = $this->context->link->getAdminLink('AdminIzettleConnectorRoot')."&ajax=1&wizard=1";
        $base_status_url = $this->context->link->getModuleLink($this->module->name, 'ajax', $query, true);
        $history_url = $this->context->link->getAdminLink('AdminIzettleConnectorHistory')
            .'&submitFilterizettle_task_history=1'
            .'&izettle_task_historyFilter_a!id_izettle_run=';

        if ($this->module->isIzettleConnected()) {
            $readyTasks = TaskManager::getReadyTasks();
            $discount_counter = count(IzettleHelper::getReadyToSyncDiscounts());
            if ($discount_counter) {
                $discount_task = new IzettleTask();
                $discount_task->id_izettle_task_state = IzettleTask::READY_STATE;
                $discount_task->id_izettle_action_type = IzettleTask::DISCOUNT_ACTION;
                $discount_task->id_izettle_run = 0;
                $discount_task->total_count = $discount_counter;
                $discount_task->save();
                $readyTasks = array_merge($readyTasks, array($discount_task));
            }
            $is_immediately_sync = Configuration::get(IZETTLECONNECTOR_SYNC) == IZETTLECONNECTOR_SYNC_NOW;
            if ($readyTasks) {
                $update_product_counter = 0;
                $update_stock_counter = 0;
                $delete_product_counter = 0;
                $image_counter = 0;
                $import_counter = 0;
                $stock_import_counter = 0;


                $tasks = array();
                foreach ($readyTasks as $task) {
                    switch ($task->id_izettle_action_type) {
                        case IzettleTask::UPDATE_ACTION:
                            $tasks[] = array(
                                'name' => $this->module->l('UPDATE'),
                                'desc' => $this->module->l('Export product changes to iZettle'),
                            );
                            $update_product_counter = count($task->getProductList());
                            break;
                        case IzettleTask::STOCK_SYNC_ACTION:
                            $tasks[] = array(
                                'name' => $this->module->l('STOCK_SYNC'),
                                'desc' => $this->module->l('Export product quantity to iZettle'),
                            );
                            $update_stock_counter = count($task->getProductList());
                            break;
                        case IzettleTask::DELETE_ACTION:
                            $tasks[] = array(
                                'name' => $this->module->l('DELETE'),
                                'desc' => $this->module->l('Delete products from iZettle'),
                            );
                            $delete_product_counter = count($task->getProductList());
                            break;
                        case IzettleTask::IMAGE_ACTION:
                            $tasks[] = array(
                                'name' => $this->module->l('IMAGE'),
                                'desc' => $this->module->l('Upload images from Prestashop to iZettle'),
                            );
                            $image_counter = count($task->getProductList());
                            break;
                        case IzettleTask::IMPORT_ACTION:
                            $tasks[] = array(
                                'name' => $this->module->l('EXPORT'),
                                'desc' => $this->module->l('Export products from PrestaShop to iZettle'),
                            );
                            $import_counter = count($task->getProductList());
                            break;
                        case IzettleTask::STOCK_IMPORT_ACTION:
                            $tasks[] = array(
                                'name' => $this->module->l('STOCK'),
                                'desc' => $this->module->l('Export product quantity to iZettle'),
                            );
                            $stock_import_counter = count($task->getProductList());
                            break;
                        case IzettleTask::DISCOUNT_ACTION:
                            $tasks[] = array(
                                'name' => $this->module->l('DISCOUNT'),
                                'desc' => $this->module->l('Sync product price discount between PrestaShop and iZettle')
                            );
                            break;
                    }
                }

                $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/sync/sync.tpl';

                $this->context->smarty->assign(
                    array(
                        'base_ajax_url'          => $base_ajax_url,
                        'base_status_url'        => $base_status_url,
                        'history_url'            => $history_url,
                        'langs'                  => LanguageCore::getLanguages(),
                        'default_lang'           => Configuration::get('PS_LANG_DEFAULT'),
                        'update_product_counter' => $update_product_counter,
                        'update_stock_counter'   => $update_stock_counter,
                        'delete_product_counter' => $delete_product_counter,
                        'image_counter'          => $image_counter,
                        'import_counter'         => $import_counter,
                        'stock_import_counter'   => $stock_import_counter,
                        'discount_counter'   => $discount_counter,
                        'tasks'                  => $tasks,
                        'settings_link'          => $settings_link,
                        'cron_link'              => $cron_link,
                        'sync_tpl_dir'           => $sync_tpl_dir,
                        'is_immediately_sync' => $is_immediately_sync
                    )
                );
            } else {
                $this->context->smarty->assign(
                    array(
                        'settings_link' => $settings_link,
                        'cron_link'     => $cron_link,
                        'sync_tpl_dir'  => $sync_tpl_dir,
                        'is_immediately_sync' => $is_immediately_sync
                    )
                );
                $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/sync/sync_no_items.tpl';
            }

//            if (Tools::getValue("partialSyncContinue")) {
//                $this->context->smarty->assign(
//                    array(
//                        'base_ajax_url'   => $base_ajax_url,
//                        'base_status_url' => $base_status_url,
//                        'history_url'     => $history_url,
//                        'settings_link'   => $settings_link,
//                        'cron_link'       => $cron_link,
//                        'sync_tpl_dir'    => $sync_tpl_dir,
//                        'partial_sync'    => true
//                    )
//                );
//                $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/sync/sync.tpl';
//            }
        } else {
            $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/sync/sync_not_connected.tpl';
        }

        $content = $this->context->smarty->fetch($tpl);

        $this->context->smarty->assign(
            array(
                'content' => $this->content.$this->module->getAdminTopMenu().$widget.$content,
            )
        );
    }
}
