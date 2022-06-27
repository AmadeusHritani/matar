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

use IzettleApi\Client\ApiScope;
use IzettleApi\Client\ApiScope\Rights;
use IzettleApi\Client\ProductClient;
use IzettleApi\Utils\Cipher;

class AdminIzettleConnectorRootController extends ModuleAdminController
{
    const DAY_COUNT_LIMIT = 10000;

    public function __construct()
    {
        parent::__construct();
        $this->bootstrap = true;
    }


    public function initContent()
    {
        parent::initContent();

        $this->addJs(_PS_MODULE_DIR_.'izettleconnector/views/js/jquery.smartWizard.js');
        $this->addJqueryPlugin('fancybox');

        //add tree.js to controller
        $tmp = new HelperTreeCategories('tmp');
        $tmp->render();

        if (/*$this->ajax &&*/ Tools::getValue('wizard')) {
            $this->processWizardAction();
            return;
        }

        if (Tools::getValue('action') == 'getTaxList') {
            $id_product = Tools::getValue('id_product');
            if ($id_product) {
                $this->getTaxListForProduct($id_product);
            }
            die('');
        }


        if (Tools::getValue('disconnect') && $this->module->isIzettleConnected()) {
            IzettleHelper::deleteWebhook($this->module);
            $this->module->setIzettleConnected(false);
            $this->module->refreshTokenChanged("");
            $this->module->clearIzettleAccountInfo();
            Configuration::updateValue(
                IZETTLECONNECTOR_API_KEY,
                ''
            );
            Configuration::updateValue(
                IZETTLECONNECTOR_CLIENT_ID,
                ''
            );
            $this->module->dropTables();
            $this->module->createTables();
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminIzettleConnectorSettings'));
        }

        $widget = $this->module->getConnectorWidget(false);
        $is_notification_only = Tools::getValue('notif_only', false);
        if ($this->module->isIzettleConnected()) {
            $base_ajax_url = $this->context->link->getAdminLink('AdminIzettleConnectorRoot')."&ajax=1&wizard=1";

            $query = array(
                'token'  => Tools::getAdminToken(_COOKIE_KEY_),
                'wizard' => 1,
                'ajax'   => 1,
            );
            $base_status_url = $this->context->link->getModuleLink($this->module->name, 'ajax', $query, true);
            $history_url = $this->getHistoryUrl();

            $partial_sync_id = Configuration::get(IZETTLECONNECTOR_PARTIAL_SYNC);
            $error = false;
            $partial_sync = false;

            if (!$partial_sync_id) {
                $error = "no active partial sync";
            }

            if (!$error) {
                $partial_sync = new IzettlePartialSync($partial_sync_id);
                if (!$partial_sync->active) {
                    $error = "there is no active partial sync";
                }
            }

            if (Tools::getValue("partialSyncContinue")) {
                if (Tools::getValue("close")) {
                    Configuration::updateValue(IZETTLECONNECTOR_PARTIAL_SYNC, false);
                    if ($partial_sync->active) {
                        $partial_sync->active = false;
                        $partial_sync->save();
                    }
                }

                if (!$error) {
                    $valid = IzettleHelper::isPartialSyncReady($partial_sync);
                    if (!$valid) {
                        $error = "Last sync activity was $partial_sync->last_sync_date, please wait";
                    }
                }


                if ($error) {
                    $wizard = $error;
                } else {
                    $overview = $this->getOverviewForPartialSync($partial_sync);

                    $this->context->smarty->assign(
                        array(
                            'base_ajax_url'   => $base_ajax_url,
                            'base_status_url' => $base_status_url,
                            'history_url'     => $history_url,
                            'partial_sync'    => true
                        )
                    );
                    $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/sync/sync.tpl';
                    $info  = $this->context->smarty->fetch($tpl);

                    $wizard = $overview.$info;
                }
            } else {
                if ($partial_sync && $partial_sync->active) {
                    $overview = $this->getOverviewForPartialSync($partial_sync);
                    $base_url = $this->context->link->getAdminLink('AdminIzettleConnectorRoot');
                    $partial_sync_link = $base_url."&partialSyncContinue=1";
                    $partial_sync_close = $partial_sync_link."&close=1";
                    $is_partial_sync_valid = IzettleHelper::isPartialSyncReady($partial_sync);
                    $last_sync_time = $partial_sync->last_sync_date;
                    $this->context->smarty->assign(
                        array(
                            'is_partial_sync_valid' => $is_partial_sync_valid,
                            'partial_sync_link' => $partial_sync_link,
                            'partial_sync_close' => $partial_sync_close,
                            'is_partial_sync_panel' => true,
                            'last_sync_time' => $last_sync_time
                        )
                    );
                    $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/partial_sync.tpl';
                    $info = $this->context->smarty->fetch($tpl);

                    $wizard = $is_notification_only ? $info : $info.$overview;
                } else {
                    $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/wizard/wizard.tpl';
                    if (Configuration::get(IZETTLECONNECTOR_TAX_TYPE) == 'SALES_TAX') {
                        $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/wizard/wizard_tax.tpl';
                    }


                    $is_new_version = version_compare(_PS_VERSION_, '1.7.5', '>=');
                    if ($is_new_version && Configuration::get('PS_MULTISHOP_FEATURE_ACTIVE')) {
                        $base_status_url = Tools::str_replace_once(
                            $this->context->link->getBaseLink(),
                            $this->context->link->getAdminBaseLink(),
                            $base_status_url
                        );
                    }

                    $this->context->smarty->assign(
                        array(
                            'base_ajax_url'   => $base_ajax_url,
                            'base_status_url' => $base_status_url,
                            'history_url'     => $history_url,
                            'langs'           => LanguageCore::getLanguages(),
                            'default_lang'    => Configuration::get('PS_LANG_DEFAULT'),
                        )
                    );
                    $wizard = $this->context->smarty->fetch($tpl);
                }
            }
        } else {
            $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/wizard/wizard_not_connected.tpl';
            $wizard = $this->context->smarty->fetch($tpl);
        }

        $content = $this->content.$this->module->getAdminTopMenu().$widget.$wizard;


        if ($is_notification_only) {
            $content = $wizard;
            die($content);
        }

        $this->context->smarty->assign(
            array(
                'content' => $content,
            )
        );
    }

    private function processWizardAction()
    {
        $action = Tools::getValue('action');

        if ($action == 'getCategory') {
            $this->getCategoryDialog();
            return;
        }

        if ($action == 'overviewNewRun') {
            $html = $this->getOverviewNewRun();
            die($html);
            //return;
        }

        if ($action == 'prepareImport') {
            $data = $this->prepareImport();
            die(json_encode($data));
            //return;
        }

        if ($action == 'prepareContinuePartialSync') {
            $data = $this->prepareContinuePartialSync();
            die(json_encode($data));
            //return;
        }

        if ($action == 'prepareSync') {
            $this->prepareSync();
            return;
        }


        if ($action == 'startImport') {
            $this->startImport();
            return;
        }
        if ($action == 'continueImport') {
            $this->continueImport();
            return;
        }

        if ($action == 'continueTask') {
            $this->continueTask();
            return;
        }

        if ($action == 'loadTaxStep') {
            $this->getTaxStep();
            return;
        }

//        undo start

        if ($action == 'startUndo') {
            $this->startUndo();
            return;
        }
    }

    private function getCategoryDialog()
    {
        $tree = new HelperTreeCategories('categories-tree');
        $selected_category_id = Tools::getValue('getSelectedCategoryId', -1);
        if ($selected_category_id > 0) {
            $tree->setSelectedCategories(array($selected_category_id));
        }

        $html =
            $tree->setRootCategory((int)Category::getRootCategory()->id)
                 ->setUseSearch(true)
                 ->setNoJS(false)
                 ->setChildrenOnly(true)
                 ->render();

        $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/wizard/category_dialog_button.tpl';
        $script = $this->context->smarty->fetch($tpl);

        die($html.$script);
    }

    private function getOverviewNewRun()
    {
        $mode = Tools::getValue('mode');
        $id_lang = Tools::getValue('id_lang');
        $price_policy = Tools::getValue('price');
        $type = Tools::getValue('type');
        $cat_id = Tools::getValue('cat_id');
        $inventory_policy = Tools::getValue('inventory');
        $data = $this->getImportData($type, $cat_id);

        $product_counter = count($data);
        $variants = array();
        $images = array();

        foreach ($data as $data_item) {
            $variants = array_merge($variants, $data_item['variants']);
            $images = array_merge($images, $data_item['images']);
        }

        //$variants = array_unique($variants);
        $images = array_unique($images);

        $variant_counter = count($variants);
        $image_counter = count($images) - (in_array(0, $images) ? 1 : 0);


        $tasks = array();
        if ($mode == 'replace') {
            $tasks[] = array(
                'name' => $this->module->l('CLEAN'),
                'desc' => $this->module->l('Clear all iZettle entities'),
            );
        }

        $tasks[] = array(
            'name' => $this->module->l('IMAGE'),
            'desc' => $this->module->l('Upload images from Prestashop to iZettle'),
        );

        $tasks[] = array(
            'name' => $this->module->l('EXPORT'),
            'desc' => $this->module->l('Export products from PrestaShop to iZettle'),
        );

        $discount_counter = count(IzettleHelper::getReadyToSyncDiscounts());

        if ($discount_counter) {
            $tasks[] = array(
                'name' => $this->module->l('DISCOUNT'),
                'desc' => $this->module->l('Sync product price discount between PrestaShop and iZettle'),
            );
        }

        if ($inventory_policy != 'noinventory') {
            $tasks[] = array(
                'name' => $this->module->l('STOCK'),
                'desc' => $this->module->l('Product quantity export from PrestaShop and iZettle'),
            );
        }

        $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/wizard/overview.tpl';
        $language = new Language($id_lang);
        $show_pagination = $product_counter > self::DAY_COUNT_LIMIT;
        $pages = array();
        $saved_pages = array();
        $current_data_page = -1;
        $create_new_partial_sync = false;

        if ($show_pagination) {
            $partial_sync_id = Configuration::get(IZETTLECONNECTOR_PARTIAL_SYNC);
            $finished_pages = array();

            if ($partial_sync_id) {
                $partial_sync = new IzettlePartialSync($partial_sync_id);
                if ($partial_sync->active) {
                    try {
                        $finished_pages = json_decode($partial_sync->imported_info, true);
                        $saved_pages = json_decode($partial_sync->total_info, true);
                    } catch (Exception $e) {
                    }
                }
            } else {
                $create_new_partial_sync = true;
            }
            $portions = ceil(1.0 * $product_counter / self::DAY_COUNT_LIMIT);
            for ($i = 0; $i < $portions; $i++) {
                $page_label =
                    ($i*self::DAY_COUNT_LIMIT + 1).'-'.(min(($i + 1)*self::DAY_COUNT_LIMIT, $product_counter));
                $is_finished = in_array($i, $finished_pages);
                $pages[] = array(
                    'page' => $i,
                    'label' => $page_label,
                    'id_run' =>
                        (isset($saved_pages[$i]) && isset($saved_pages[$i]['id_run']))
                        ? $saved_pages[$i]['id_run']
                        : -1,
                );
                if (!$is_finished && $current_data_page < 0) {
                    $current_data_page = $i;
                }
            }
        }
        $history_url = $this->getHistoryUrl();

        $this->context->smarty->assign(
            array(
                'product_counter'         => $product_counter,
                'variant_counter'         => $variant_counter,
                'image_counter'           => $image_counter,
                'discount_counter'        => $discount_counter,
                'tasks'                   => $tasks,
                'lang'                    => $language->name,
                'inventory'               => $inventory_policy,
                'mode'                    => $mode,
                'price'                   => $price_policy,
                'show_pagination'         => $show_pagination,
                'current_data_page'       => $current_data_page,
                'day_count_limit'         => self::DAY_COUNT_LIMIT,
                'pages'                   => $pages,
                'json_pages'              => json_encode($pages),
                'create_new_partial_sync' => $create_new_partial_sync,
                'history_url'             => $history_url,
            )
        );

        if (Configuration::get(IZETTLECONNECTOR_TAX_TYPE) == 'SALES_TAX') {
            $tax_policy = Tools::getValue('tax_policy');
            $createWithDefaultTax = (bool) Tools::getValue('createWithDefaultTax');
            $taxmap = Tools::getValue('taxmap');
            $explicitDefaulTaxes = Tools::getValue('explicitDefaulTaxes');
            $labels = array();

            if ($tax_policy == 'custom' && (count($taxmap) || count($explicitDefaulTaxes))) {
                $prestashop_taxes = array();
                $product_ids = array_keys($this->getImportData($type, $cat_id));
                foreach (IzettleHelper::getProductsTaxes($product_ids) as $prestashop_tax) {
                    $prestashop_taxes[(int) $prestashop_tax['id_tax']] = $prestashop_tax['tax_name'];
                }

                $zettle_taxes = array();
                foreach (Db::getInstance()->executeS('SELECT *  FROM `'._DB_PREFIX_.'izettle_tax`') as $zettle_tax) {
                    $zettle_taxes[$zettle_tax['uuid']] = $zettle_tax['label'].' ('.$zettle_tax['percentage'].'%)';
                }


                foreach ($taxmap as $key => $value) {
                    $tax = array();
                    $tax['prestashop_label'] = $prestashop_taxes[(int) $key];
                    $tax['zettle_label'] = isset($zettle_taxes[$value]) ? $zettle_taxes[$value] : '-';
                    $tax['explicit'] = false;
                    $labels[] = $tax;
                }

                foreach ($explicitDefaulTaxes as $explicit_tax_uuid) {
                    if (isset($zettle_taxes[$explicit_tax_uuid])) {
                        $tax = array();
                        $tax['prestashop_label'] = "";
                        $tax['zettle_label'] = $zettle_taxes[$explicit_tax_uuid];
                        $tax['explicit'] = true;
                        $labels[] = $tax;
                    }
                }
            }

            $this->context->smarty->assign(
                array(
                    'use_tax'              => true,
                    'assign_tax'           => $tax_policy != 'no-taxes',
                    'tax_policy'           => $tax_policy,
                    'createWithDefaultTax' => $createWithDefaultTax,
                    'labels'               => $labels
                )
            );
        }

        $html = $this->context->smarty->fetch($tpl);
        return $html;
    }


    private function startUndo()
    {
        $is_indo = true;
        $this->runTaskHistory($is_indo);
    }

    private function continueTask()
    {
        $this->runTaskHistory();
    }

    private function runTaskHistory($is_indo = false)
    {
        $id_izettle_task = Tools::getValue('id_izettle_task', false);
        if (!$id_izettle_task) {
            die('broken task ID');
        }
        @ignore_user_abort(1);
        @set_time_limit(0);

        $task = new IzettleTaskHistory($id_izettle_task);
        $run = new IzettleRun($task->id_izettle_run);

        $params = json_decode($run->params, true);

        $action = ActionFactory::getAction($task);
        if ($is_indo) {
            $action->undo($params);
        } else {
            $action->run($params);
        }

        die("ok");
    }

    private function prepareContinuePartialSync()
    {
        $partial_sync_id = Configuration::get(IZETTLECONNECTOR_PARTIAL_SYNC);
        if (!$partial_sync_id) {
            die(json_encode(array("error" => "no active partial sync")));
        }

        $partial_sync = new IzettlePartialSync($partial_sync_id);
        if (!$partial_sync->active) {
            die(json_encode(array("error" => "no active partial sync")));
        }

        $valid = IzettleHelper::isPartialSyncReady($partial_sync);

        if (!$valid) {
            die(json_encode(array("error" => "Last sync activity was $partial_sync->last_sync_date, please wait")));
        }

        $saved_post = json_decode($partial_sync->params, true);
        $_POST = array_merge($_POST, $saved_post);

        $finished_pages = array_map('intval', json_decode($partial_sync->imported_info, true));
        $partial_sync_pages = json_decode($partial_sync->total_info, true);
        $current_page = -1;

        foreach ($partial_sync_pages as $page) {
            $i = (int) $page['page'];
            $is_finished = in_array($i, $finished_pages);
            if (!$is_finished) {
                $current_page = $i;
                break;
            }
        }

        if ($current_page < 0) {
            die(json_encode(array("error" => "all product from partial sync was imported")));
        }



        $finished_pages[] = $current_page;

        $partial_sync->imported_info = json_encode($finished_pages);
        $partial_sync->last_sync_date = date('Y-m-d H:i:s');

        if (count($finished_pages) == count($partial_sync_pages)) {
            $partial_sync->active = false;
            Configuration::updateValue(IZETTLECONNECTOR_PARTIAL_SYNC, false);
        }

        $partial_sync->save();

        $_POST['mode'] = 'add';
        $_POST['data_page'] = $current_page;
        $_POST['create_new_partial_sync'] = false;

        $data = $this->prepareImport();
        $partial_sync_pages[$current_page]['id_run'] = $data['id_run'];
        $partial_sync->total_info = json_encode($partial_sync_pages);
        $partial_sync->save();

        return $data;
    }


    private function prepareImport()
    {
        $type = Tools::getValue('type');
        $mode = Tools::getValue('mode');
        $cat_id = Tools::getValue('cat_id');
        $id_lang = Tools::getValue('id_lang');
        $price_policy = Tools::getValue('price');
        $inventory_policy = Tools::getValue('inventory');
        $data_page = (int) Tools::getValue('data_page', 0);

        $use_price = 1;
        $use_wholesale_price = 1;
        if ($price_policy == 'yes') {
            $use_price = 1;
            $use_wholesale_price = 1;
        } elseif ($price_policy == 'retail') {
            $use_price = 1;
            $use_wholesale_price = 0;
        } elseif ($price_policy == 'wholesale') {
            $use_price = 0;
            $use_wholesale_price = 1;
        } elseif ($price_policy == 'no') {
            $use_price = 0;
            $use_wholesale_price = 0;
        }


        $id_inventory_sync_policy = 0;
        if ($inventory_policy == 'both') {
            $id_inventory_sync_policy = IzettleConfiguration::INVENTORY_BOTH_POLICY;
        } elseif ($inventory_policy == 'ps') {
            $id_inventory_sync_policy = IzettleConfiguration::STOCK_IMPORT_POLICY;
        } elseif ($inventory_policy == 'iz') {
            $id_inventory_sync_policy = IzettleConfiguration::INVENTORY_TO_PS_POLICY;
        } elseif ($inventory_policy == 'noinventory') {
            $id_inventory_sync_policy = IzettleConfiguration::INVENTORY_DISABLE_POLICY;
        }

        $data = $this->getImportData($type, $cat_id, $data_page);

        $images = array();

        foreach ($data as $data_item) {
            $images = array_merge($images, $data_item['images']);
        }

        $images = array_unique($images);
        $image_counter = count($images) - (in_array(0, $images) ? 1 : 0);

        $is_internal = true;
        $runs = RunManager::getCurrentRunObjects($is_internal);

        if (count($runs)) {
            $run = $runs[0];
            die(json_encode(array("error" => "task [$run->id] is running, please try again")));
        }


        $run = RunManager::createNewRunObject($is_internal, false);
        $run->active = false;
        $run->params = json_encode($_POST);
        $run->save();

        if ($mode == 'replace') {
            $clear_task = new IzettleTask();
            $clear_task->id_izettle_task_state = IzettleTask::READY_STATE;
            $clear_task->id_izettle_action_type = IzettleTask::CLEAR_ACTION;
            $clear_task->id_izettle_run = $run->id;
            $clear_task->save();
        }

        //$context = Context::getContext();
        $candidates = array();

        foreach (array_keys($data) as $id_product) {
            $candidates[] = array('id_product' => $id_product);
        }

        $sql = 'SELECT id_product, custom_name, custom_barcode FROM '._DB_PREFIX_.'izettle_configuration';
        $rows = Db::getInstance()->executeS($sql);
        $old_configurations = array();

        foreach ($rows as $row) {
            $old_configurations[$row['id_product']] = $row;
        }


        $configurations = array();
        foreach ($candidates as $candidate) {
            $configurations[] = array(
                'id_product'               => $candidate['id_product'],
                'id_lang'                  => $id_lang,
                'id_inventory_sync_policy' => $id_inventory_sync_policy,
                'active'                   => 1,
                'custom_name'              => isset($old_configurations[$candidate['id_product']])
                    ? $old_configurations[$candidate['id_product']]['custom_name']
                    : '',
                'custom_barcode'           => isset($old_configurations[$candidate['id_product']])
                    ? $old_configurations[$candidate['id_product']]['custom_barcode']
                    : '',
                'use_price'                => $use_price,
                'use_wholesale_price'      => $use_wholesale_price,
                'date_add'                 => date('Y-m-d H:i:s'),
                'date_upd'                 => date('Y-m-d H:i:s'),

            );
        }

        Db::getInstance()->insert(
            'izettle_configuration',
            $configurations,
            false,
            true,
            Db::REPLACE
        );

        $image_upload_task = new IzettleTask();
        $image_upload_task->id_izettle_task_state = IzettleTask::READY_STATE;
        $image_upload_task->id_izettle_action_type = IzettleTask::IMAGE_ACTION;
        $image_upload_task->total_count = $image_counter;
        $image_upload_task->id_izettle_run = $run->id;
        $image_upload_task->save();
        $image_upload_task->addProductList($candidates);


        $count = count($candidates);

        $import_task = new IzettleTask();
        $import_task->id_izettle_task_state = IzettleTask::READY_STATE;
        $import_task->id_izettle_action_type = IzettleTask::IMPORT_ACTION;
        $import_task->id_izettle_run = $run->id;
        $import_task->total_count = $count;
        $import_task->save();
        $import_task->addProductList($candidates);

        $discount_counter = count(IzettleHelper::getReadyToSyncDiscounts());
        if ($discount_counter) {
            $discount_task = new IzettleTask();
            $discount_task->id_izettle_task_state = IzettleTask::READY_STATE;
            $discount_task->id_izettle_action_type = IzettleTask::DISCOUNT_ACTION;
            $discount_task->id_izettle_run = $run->id;
            $discount_task->total_count = $discount_counter;
            $discount_task->save();
        }

        if ($inventory_policy != 'noinventory') {
            $import_stock_task = new IzettleTask();
            $import_stock_task->id_izettle_task_state = IzettleTask::READY_STATE;
            $import_stock_task->id_izettle_action_type = IzettleTask::STOCK_IMPORT_ACTION;
            $import_stock_task->id_izettle_run = $run->id;
            $import_stock_task->total_count = $count;
            $import_stock_task->save();
            $import_stock_task->addProductList($candidates);
        }


        $create_new_partial_sync = Tools::getValue('create_new_partial_sync', false);
        $partial_sync_pages =
            Tools::getValue('partial_sync_pages', false) === 'false'
                ? false
                : Tools::getValue('partial_sync_pages', false);
        if ($create_new_partial_sync && $partial_sync_pages && is_array($partial_sync_pages)) {
            $finished_pages = array();
            $finished_pages[] = $data_page;
            $partial_sync = new IzettlePartialSync();
            $partial_sync->params = $run->params;
            $partial_sync->imported_info = json_encode($finished_pages);

            $partial_sync_pages[0]['id_run'] = $run->id;
            $partial_sync->total_info = json_encode($partial_sync_pages);

            $partial_sync->active = true;
            $partial_sync->hours_wait = 24;
            //$now = new DateTime();
            $partial_sync->last_sync_date = date('Y-m-d H:i:s');
            $partial_sync->save();
            Configuration::updateValue(IZETTLECONNECTOR_PARTIAL_SYNC, $partial_sync->id);
        }

//        die(
//            json_encode(
//                array(
//                    "id_run"             => $run->id,
//                    "cancellation_token" => md5(_COOKIE_KEY_.$run->id)
//                )
//            )
//        );
        return
            array(
                "id_run"             => $run->id,
                "cancellation_token" => md5(_COOKIE_KEY_.$run->id)
            );
    }

    private function continueImport()
    {
        $this->startImport(true);
    }


    private function startImport($is_continue = false)
    {
        $id_run = Tools::getValue('id_run', false);
        if (!$id_run) {
            die(json_encode(array("error" => "Data isn`t prepared, please try again")));
        }

        @ignore_user_abort(1);
        @set_time_limit(0);

        if ($is_continue) {
            $is_history = Db::getInstance()->getValue(
                'SELECT id_izettle_run
				 FROM `'._DB_PREFIX_.'izettle_run_history` izettle_run
				 WHERE id_izettle_run = '.(int)$id_run
            );
            $run = $is_history ? new IzettleRunHistory($id_run) : new IzettleRun($id_run);
        } else {
            $run = new IzettleRun($id_run);
        }

        $run->active = true;
        $run->save();
        $actions = $run->getActionList();
        $params = json_decode($run->params, true);

        try {
            $is_keep_going = true;
            $is_error = false;
            foreach ($actions as $action) {
                if ($is_error && !$is_keep_going) {
                    if ($action->getState() == IzettleTask::READY_STATE) {
                        $action->setState(
                            IzettleTask::STOPPED_STATE,
                            0
                        );
                    }
                }
                if ($is_keep_going) {
                    $is_keep_going &= $action->run($params);
                }
                if ($action->getState() == IzettleTask::ERROR_STATE) {
                    $is_error = true;
                    //$is_keep_going = false;
                }
                $action->archive();
            }
            $run->success = $is_keep_going;
            $run->active = false;
            $run->save();
            die('ok');
        } catch (Exception $e) {
            $run->active = false;
            $run->save();
            die($e->getMessage());
        }
    }

    private function prepareSync()
    {
        if (RunManager::getCurrentRunObjects()) {
            die(
                json_encode(
                    array(
                        "status" => 'failed',
                        "error"  => $this->module->l('external sync running')
                    )
                )
            );
        }

        if (RunManager::getCurrentRunObjects(true)) {
            die(
                json_encode(
                    array(
                        "status" => 'failed',
                        "error"  => $this->module->l('sync or import running')
                    )
                )
            );
        }

        $tasks = TaskManager::getReadyTasks();

        if (!$tasks) {
            die(
                json_encode(
                    array(
                        "status" => 'failed',
                        "error"  => $this->module->l('no items to sync')
                    )
                )
            );
        }

        $is_internal = true;
        $run = RunManager::createNewRunObject($is_internal);

        die(
            json_encode(
                array(
                    "id_run"             => $run->id,
                    "cancellation_token" => md5(_COOKIE_KEY_.$run->id)
                )
            )
        );
    }

    /**
     * @param $type
     * @param $cat_id
     * @return array
     * @throws PrestaShopDatabaseException
     */
    private function getImportData($type, $cat_id, $page = null)
    {
        $context = Context::getContext();
        $category = false;
        $all_shops = $context->shop->getContext() == Shop::CONTEXT_ALL ? true : false;

        if ($type == 'all') {
            if ($all_shops) {
                $rows = Db::getInstance()->executeS(
                    'SELECT
				    id_product,
				    id_product_attribute,
				    max(id_image) id_image,
				    max(id_image_attribute) id_image_attribute
				FROM (
                    SELECT DISTINCT
                        p.id_product,
                        IFNULL(product_attribute_shop.id_product_attribute, 0) AS id_product_attribute,
                         IFNULL(product_attribute_image.id_image, 0) AS id_image_attribute,
                         IFNULL(i.id_image, 0) AS id_image
                    FROM `'._DB_PREFIX_.'product_shop` p
                    LEFT JOIN `'._DB_PREFIX_.'image` i
                        ON i.`id_product` = p.`id_product` AND i.cover = 1
                    LEFT JOIN `'._DB_PREFIX_.'product_attribute_shop` product_attribute_shop
                        ON (p.`id_product` = product_attribute_shop.`id_product`)
                    LEFT JOIN `'._DB_PREFIX_.'product_attribute_image` product_attribute_image
                        ON product_attribute_shop.id_product_attribute = product_attribute_image.id_product_attribute 
                    WHERE  p.active = 1 
                    ORDER BY  p.id_product, product_attribute_shop.id_product_attribute
                    ) tmp
 
                GROUP BY id_product, id_product_attribute'
                );
            } else {
                $rows = Db::getInstance()->executeS(
                    'SELECT
				    id_product,
				    id_product_attribute,
				    max(id_image) id_image,
				    max(id_image_attribute) id_image_attribute
				FROM (
                    SELECT DISTINCT
                        p.id_product,
                        IFNULL(product_attribute_shop.id_product_attribute, 0) AS id_product_attribute,
                         IFNULL(product_attribute_image.id_image, 0) AS id_image_attribute,
                         IFNULL(i.id_image, 0) AS id_image
                    FROM `'._DB_PREFIX_.'product_shop` p
                    LEFT JOIN `'._DB_PREFIX_.'image` i
                        ON i.`id_product` = p.`id_product` AND i.cover = 1
                    LEFT JOIN `'._DB_PREFIX_.'product_attribute_shop` product_attribute_shop
                        ON (p.`id_product` = product_attribute_shop.`id_product`
                        AND product_attribute_shop.id_shop= '.(int)$context->shop->id.')
                    LEFT JOIN `'._DB_PREFIX_.'product_attribute_image` product_attribute_image
                        ON product_attribute_shop.id_product_attribute = product_attribute_image.id_product_attribute 
                    WHERE  p.active = 1 AND p.`id_shop` = '.(int)$context->shop->id.'
                    ORDER BY  p.id_product, product_attribute_shop.id_product_attribute
                    ) tmp
 
                GROUP BY id_product, id_product_attribute'
                );
            }
        } elseif ($cat_id > -1) {
            $category = new Category((int)$cat_id);

            if ($all_shops) {
                $rows = Db::getInstance()->executeS(
                    'SELECT
				     id_product,
				     id_product_attribute,
				     max(id_image) id_image,
				     max(id_image_attribute) id_image_attribute
				 FROM (
                     SELECT DISTINCT
                         p.id_product,
                         IFNULL(product_attribute_shop.id_product_attribute, 0) AS id_product_attribute,
                          IFNULL(product_attribute_image.id_image, 0) AS id_image_attribute,
                          IFNULL(i.id_image, 0) AS id_image
                     FROM `'._DB_PREFIX_.'category_product` cp
                     LEFT JOIN `'._DB_PREFIX_.'product_shop` p 
                         ON p.`id_product` = cp.`id_product`
                     LEFT JOIN `'._DB_PREFIX_.'image` i
                         ON i.`id_product` = cp.`id_product` AND i.cover = 1
                     LEFT JOIN `'._DB_PREFIX_.'product_shop` product_shop
                         ON product_shop.`id_product` = cp.`id_product`
                     LEFT JOIN `'._DB_PREFIX_.'product_attribute_shop` product_attribute_shop
                         ON (p.`id_product` = product_attribute_shop.`id_product`)
                     LEFT JOIN `'._DB_PREFIX_.'product_attribute_image` product_attribute_image
                         ON product_attribute_shop.id_product_attribute = product_attribute_image.id_product_attribute 
                     WHERE  p.active = 1 AND cp.`id_category` = '.(int)$category->id.'
                     ORDER BY  p.id_product, product_attribute_shop.id_product_attribute
                     ) tmp
  
                 GROUP BY id_product, id_product_attribute'
                );
            } else {
                $rows = Db::getInstance()->executeS(
                    'SELECT
				     id_product,
				     id_product_attribute,
				     max(id_image) id_image,
				     max(id_image_attribute) id_image_attribute
				 FROM (
                     SELECT DISTINCT
                         p.id_product,
                         IFNULL(product_attribute_shop.id_product_attribute, 0) AS id_product_attribute,
                          IFNULL(product_attribute_image.id_image, 0) AS id_image_attribute,
                          IFNULL(i.id_image, 0) AS id_image
                     FROM `'._DB_PREFIX_.'category_product` cp
                     LEFT JOIN `'._DB_PREFIX_.'product_shop` p 
                         ON p.`id_product` = cp.`id_product`
                     LEFT JOIN `'._DB_PREFIX_.'image` i
                         ON i.`id_product` = cp.`id_product` AND i.cover = 1
                     LEFT JOIN `'._DB_PREFIX_.'product_shop` product_shop
                         ON product_shop.`id_product` = cp.`id_product`
                     LEFT JOIN `'._DB_PREFIX_.'product_attribute_shop` product_attribute_shop
                         ON (p.`id_product` = product_attribute_shop.`id_product`
                         AND product_attribute_shop.id_shop= '.(int)$context->shop->id.')
                     LEFT JOIN `'._DB_PREFIX_.'product_attribute_image` product_attribute_image
                         ON product_attribute_shop.id_product_attribute = product_attribute_image.id_product_attribute 
                     WHERE  p.active = 1 AND product_shop.`id_shop` = '.(int)$context->shop->id.'
                           AND cp.`id_category` = '.(int)$category->id.'
                     ORDER BY  p.id_product, product_attribute_shop.id_product_attribute
                     ) tmp
  
                 GROUP BY id_product, id_product_attribute'
                );
            }
        } else {
            if (!$category) {
                die("no products");
            }
        }


        $data = array();

        foreach ($rows as $row) {
            $id_product = (int)$row['id_product'];
            if (!isset($data[$id_product])) {
                $data[$id_product] = array(
                    'variants' => array(),
                    'images'   => array(),
                );
            }

            if (!in_array(
                $row['id_product_attribute'],
                $data[$id_product]['variants']
            )) {
                $data[$id_product]['variants'][] = $row['id_product_attribute'];
            }

            $id_image_attribute = (int)$row['id_image_attribute'];
            if ($id_image_attribute && !in_array($id_image_attribute, $data[$id_product]['images'])) {
                $data[$id_product]['images'][] = $id_image_attribute;
            }

            $id_image = (int)$row['id_image'];
            if ($id_image && !in_array($id_image, $data[$id_product]['images'])) {
                $data[$id_product]['images'][] = $id_image;
            }
        }

        if (is_null($page)) {
            return $data;
        } else {
            return array_slice($data, $page*self::DAY_COUNT_LIMIT, self::DAY_COUNT_LIMIT, true);
        }
    }


    private function getTaxStep()
    {
        $type = Tools::getValue('type');
        $cat_id = Tools::getValue('cat_id');

        $product_ids = array_keys($this->getImportData($type, $cat_id));

        $prestashop_taxes = IzettleHelper::getProductsTaxes($product_ids);


        $client = $this->module->getIzettleProductClient();
        $taxes = $client->getTaxes();

        Db::getInstance()->delete('izettle_tax');
        Db::getInstance()->insert(
            'izettle_tax',
            array_map(
                function ($tax) {
                    return $tax->getAsArray();
                },
                $taxes
            ),
            false,
            true,
            Db::REPLACE
        );
        //$taxes = $tax_data->taxRates;
        $default_taxes = array();

        $rate_map = array();

        foreach ($taxes as $tax) {
            $index = (int) (1000 * $tax->getPercentage());
            $rate_map[$index] = $tax->getUuid();
            if ($tax->isDefault()) {
                $default_taxes[] = $tax;
            }
        }

        foreach ($prestashop_taxes as &$tax) {
            $index = (int) (1000 * $tax['rate']);
            if (isset($rate_map[$index])) {
                $tax['associated_zettle_uuid'] = $rate_map[$index];
            } else {
                $tax['associated_zettle_uuid'] = '';
            }
        }




        $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/wizard/tax_step.tpl';
        $this->context->smarty->assign(
            array(
                'prestashop_taxes'  => $prestashop_taxes,
                'zettle_taxes'  => $taxes,
                'default_taxes'  => $default_taxes,
                'is_default_exist' => count($default_taxes) > 0,
                'is_tax_exist' => count($taxes) > 0
            )
        );
        $html = $this->context->smarty->fetch($tpl);
        die($html);
    }

    private function getTaxListForProduct($id_product)
    {
        $taxes = array();
        $show_tax = Tools::strtolower(Configuration::get(IZETTLECONNECTOR_TAX_TYPE)) === 'sales_tax';
        if ($show_tax) {
            $zettleProduct = IzettleProduct::getItemByProductId($id_product);
            if ($zettleProduct->uuid) {
                $client = $this->module->getIzettleProductClient();
                $allTaxes = $client->getTaxes();
                $zettleProduct = $client->getProduct($zettleProduct->uuid);
                $zettleProductTaxes = $zettleProduct->getTaxRates();
                //$isUseDefault = $zettleProduct->

                foreach ($allTaxes as $tax) {
                    $currentTax = array(
                        'uuid' => $tax->getUuid(),
                        'label' => $tax->getLabel(),
                        'percentage' => $tax->getPercentage(),
                        'default' => $tax->isDefault(),
                        'checked' => in_array($tax->getUuid(), $zettleProductTaxes)
                    );

                    $taxes[] = $currentTax;
                }
            }
        }


        $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/tax_list.tpl';
        $this->context->smarty->assign(
            array(
                'taxes'  => $taxes
            )
        );
        $html = $this->context->smarty->fetch($tpl);
        die($html);
    }

    /**
     * @param IzettlePartialSync $partial_sync
     * @return string
     */
    public function getOverviewForPartialSync(IzettlePartialSync $partial_sync)
    {
        $saved_post = json_decode($partial_sync->params, true);
        $_POST = array_merge($_POST, $saved_post);
        $_POST['create_new_partial_sync'] = false;
        $_POST['mode'] = 'add';
        $this->context->smarty->assign(
            array(
                'panel' => true
            )
        );
        $overview = $this->getOverviewNewRun();
        return $overview;
    }

    /**
     * @return string
     *
     */
    private function getHistoryUrl()
    {
        $history_url = $this->context->link->getAdminLink('AdminIzettleConnectorHistory')
            .'&submitFilterizettle_task_history=1'
            .'&izettle_task_historyFilter_a!id_izettle_run=';
        return $history_url;
    }
}
