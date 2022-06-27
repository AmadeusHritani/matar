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

class AdminIzettleConnectorHistoryController extends ModuleAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->bootstrap = true;

        $this->table = 'izettle_task_history';
        $this->className = 'IzettleTaskHistory';
        $this->lang = false;
        $this->addRowAction('view');
        $this->addRowAction('undo');
        $this->addRowAction('continue');
        $this->explicitSelect = true;
        $this->allow_export = true;
        $this->deleted = false;
        $this->context = Context::getContext();
        $this->identifier = 'id_izettle_task';
        $this->_select = "
        a.id_izettle_task_state,
        processed_count,
        date_start,
        date_end,
        ts.name izettle_task_state,
        a.id_izettle_action_type,
        at.desc `desc`,
        at.name `name`,
        case a.id_izettle_task_state
          when 0 then '#aaaaaa'
          when 1 then '#5538ba'
          when 2 then '#5538ba'
          when 3 then '#aaaaaa'
          when 4 then '#FFFF00'
          when 5 then '#60cb83'
          when 6 then '#ff0000'
          when 7 then '#0f62de'
          when 8 then '#0f62de'
        end as izettle_color";

        $this->_join =
            'LEFT JOIN `'._DB_PREFIX_.'izettle_task_state` ts
                ON ts.`id_izettle_task_state` = a.`id_izettle_task_state`
             LEFT JOIN `'._DB_PREFIX_.'izettle_action_type` at
                ON at.`id_izettle_action_type` = a.`id_izettle_action_type`';

        $this->_orderBy = 'id_izettle_task';
        $this->_orderWay = 'DESC';

        $status_list = array(
            //0 => 'READY',
            //1 => 'RUNNING',
            //2 => 'RUNNING_ASYNC',
            3 => 'STOPPED',
            4 => 'CANCELLED',
            5 => 'FINISHED',
            6 => 'ERROR',
            8 => 'UNDONE',
        );

        $this->fields_list = array(
            'id_izettle_task' => array(
                'title' => $this->module->l('ID'),
                'align' => 'text-center',
                'class' => 'fixed-width-xs',
                'filter_key' => 'a!id_izettle_task',
                'filter_type' => 'int',
            ),
            'id_izettle_run' => array(
                'title' => $this->module->l('Group ID'),
                'filter_key' => 'a!id_izettle_run',
                'filter_type' => 'int',
            ),
            'name' => array(
                'title' => $this->module->l('Tag'),
                'filter_key' => 'at!name',
            ),
            'desc' => array(
                'title' => $this->module->l('Description'),
                'search' => false,
            ),
            'izettle_task_state' => array(
                'title' => $this->module->l('State'),
                'list'=> $status_list,
                'type' => 'select',
                'color' => 'izettle_color',
                'filter_key' => 'a!id_izettle_task_state',
                'filter_type' => 'int',
            ),
            'processed_count' => array(
                'title' => $this->module->l('Items processed'),
                'align' => 'text-center',
                'search' => false,
            ),
            'date_start' => array(
                'title' => $this->l('Date Start'),
                'align' => 'text-right',
                'type' => 'datetime',
                'filter_key' => 'a!date_start'
            )
        );
    }

//    public function displayContinueLink($token, $id)
//    {
//        $item = $this->getItem($id);
//        $state = $item['id_izettle_task_state'];
//        if ($this->module->isIzettleConnected()
//            && ($item['id_izettle_action_type'] == IzettleTask::CLEAR_ACTION
//                || $item['id_izettle_action_type'] == IzettleTask::IMPORT_ACTION
//                || $item['id_izettle_action_type'] == IzettleTask::IMAGE_ACTION
//                || $item['id_izettle_action_type'] == IzettleTask::STOCK_IMPORT_ACTION)
////            && $item['processed_count'] > 0
//            && ($state == IzettleTask::ERROR_STATE
//                || $state == IzettleTask::CANCELLED_STATE
//                || $state == IzettleTask::STOPPED_STATE)
//        ) {
//            $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/history/continue_button.tpl';
//            $this->context->smarty->assign(
//                array(
//                    'id_izettle_task' => $item['id_izettle_task'],
//                    'task_name' => $item['desc'],
//                    'inner_token' => $token,
//                )
//            );
//            $button = $this->context->smarty->fetch($tpl);
//            return $button;
//        }
//        return null;
//    }

    public function displayUndoLink($token, $id)
    {
        $item = $this->getItem($id);
        $state = $item['id_izettle_task_state'];
        if ($this->module->isIzettleConnected()
            && ($item['id_izettle_action_type'] == IzettleTask::CLEAR_ACTION
                || $item['id_izettle_action_type'] == IzettleTask::IMPORT_ACTION)
            && $item['processed_count'] < 0 // '< 0' for disabling undo button, replace with '> 0' to enable
            && $state != IzettleTask::UNDONE_STATE
            && $state != IzettleTask::UNDO_RUNNING_STATE
        ) {
            $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/history/undo_button.tpl';
            $this->context->smarty->assign(
                array(
                    'id_izettle_task' => $item['id_izettle_task'],
                    'task_name' => $item['desc'],
                    'inner_token' => $token,
                )
            );
            $button = $this->context->smarty->fetch($tpl);
            return $button;
        }
        return null;
    }


    private function getItem($id)
    {
        foreach ($this->_list as $tr) {
            if ($tr['id_izettle_task'] == $id) {
                return $tr;
            }
        }
    }

    public function renderList()
    {
        $widget = $this->module->getConnectorWidget();

        $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/history/header.tpl';
        $base_ajax_url =
            $this->context->link->getAdminLink('AdminIzettleConnectorRoot')
            ."&ajax=1&wizard=1";
        $query = array(
            'token' => Tools::getAdminToken(_COOKIE_KEY_),
            'wizard' => 1,
            'ajax' => 1,
        );
        $base_status_url = $this->context->link->getModuleLink($this->module->name, 'ajax', $query, true);
        $this->context->smarty->assign(
            array(
                'base_ajax_url' => $base_ajax_url,
                'base_status_url' => $base_status_url,
                'is_connected' => $this->module->isIzettleConnected()
            )
        );
        $header = $this->context->smarty->fetch($tpl);

        $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/history/footer.tpl';
        $footer = $this->context->smarty->fetch($tpl);

        return $this->module->getAdminTopMenu().$widget.$header.parent::renderList().$footer;
    }

    public function renderView()
    {
        $id_izettle_task = Tools::getValue('id_izettle_task');
        if (!$id_izettle_task) {
            return "Wrong task ID";
        }

        $task = new IzettleTaskHistory($id_izettle_task);

        $data = IzettleHelper::getTaskStatusInfo($id_izettle_task);

        if (count($data) < 1) {
            return "No data available";
        }

        $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/history/detail.tpl';

        $products = Db::getInstance()->executeS(
            'SELECT DISTINCT 
                 izettle_task_product.*,
                 pl.name
			 FROM `'._DB_PREFIX_.'izettle_task_product` izettle_task_product
			 LEFT JOIN `'._DB_PREFIX_.'izettle_configuration` izettle_configuration
			     ON izettle_task_product.id_product = izettle_configuration.id_product
			 LEFT JOIN `'._DB_PREFIX_.'product_lang` pl
			     ON pl.id_product = izettle_task_product.id_product
			        AND pl.id_lang = izettle_configuration.id_lang
			 WHERE izettle_task_product.id_izettle_task = '.(int) $id_izettle_task.'
			 UNION ALL
			 SELECT DISTINCT
                 izettle_task_product.*,
                 pl.name
			 FROM `'._DB_PREFIX_.'izettle_task_product_history` izettle_task_product
			 LEFT JOIN `'._DB_PREFIX_.'izettle_configuration` izettle_configuration
			     ON izettle_task_product.id_product = izettle_configuration.id_product
			 LEFT JOIN `'._DB_PREFIX_.'product_lang` pl
			     ON pl.id_product = izettle_task_product.id_product
			        AND pl.id_lang = izettle_configuration.id_lang
			 WHERE izettle_task_product.id_izettle_task = '.(int) $id_izettle_task
        );

        $show_product = true;
        $show_desc = true;

        switch ($task->id_izettle_action_type) {
            case IzettleTask::DISCOUNT_ACTION:
            case IzettleTask::PURCHASE_IMPORT_ACTION:
            case IzettleTask::DELETE_ACTION:
            case IzettleTask::CLEAR_ACTION:
                $show_product = false;
                break;
            //case IzettleTask::STOCK_EXPORT_ACTION:
            case IzettleTask::STOCK_IMPORT_ACTION:
            //case IzettleTask::IMAGE_ACTION:
            case IzettleTask::IMPORT_ACTION:
                $show_desc = false;
                break;
        }

        $this->context->smarty->assign(
            array(
                'item' => $data[0],
                'products' => $products,
                'show_product' => $show_product,
                'show_desc' => $show_desc,
            )
        );

        $details = $this->context->smarty->fetch($tpl);
        return $this->module->getAdminTopMenu().$details;
    }


    public function renderKpis()
    {
        if (Tools::getValue('id_izettle_task') > 0) {
            parent::renderKpis();
        }
    }

    public function initPageHeaderToolbar()
    {
        parent::initPageHeaderToolbar();
        if (Tools::getValue('id_izettle_task')) {
            $this->page_header_toolbar_btn['back '] = array(
                'href' => $this->context->link->getAdminLink('AdminIzettleConnectorHistory'),
                'desc' => $this->module->l('Back to task list'),
                'icon' => 'process-icon-back'
            );
        }
        unset($this->page_header_toolbar_btn['new_order']);
        $this->context->smarty->clearAssign('help_link');
    }

    public function initToolbar()
    {
        parent::initToolbar();

        if (Tools::getValue('id_izettle_task')) {
            $task = new IzettleTaskHistory(Tools::getValue('id_izettle_task'));
            $name = '';
            switch ($task->id_izettle_action_type) {
                case IzettleTask::CLEAR_ACTION:
                    $name = "CLEAR";
                    break;
                case IzettleTask::IMPORT_ACTION:
                    $name = "EXPORT";
                    break;
                case IzettleTask::CREATE_ACTION:
                    $name =  "CREATE";
                    break;
                case IzettleTask::UPDATE_ACTION:
                    $name =  "UPDATE";
                    break;
                case IzettleTask::DELETE_ACTION:
                    $name =  "DELETE";
                    break;
                case IzettleTask::IMAGE_ACTION:
                    $name =  "IMAGE";
                    break;
                case IzettleTask::STOCK_IMPORT_ACTION:
                    $name =  "STOCK_IMPORT";
                    break;
                case IzettleTask::STOCK_EXPORT_ACTION:
                    $name =  "STOCK_EXPORT";
                    break;
                case IzettleTask::STOCK_SYNC_ACTION:
                    $name = "STOCK_SYNC";
                    break;
                case IzettleTask::DISCOUNT_ACTION:
                    $name =  "DISCOUNT_SYNC";
                    break;
                case IzettleTask::PURCHASE_IMPORT_ACTION:
                    $name =  "PURCHASE_IMPORT";
                    break;
            }
            
            
            $this->toolbar_title =  $this->module->l('Task').' '. $name. " [ID=$task->id]" ;
        }
        unset($this->toolbar_btn['modules-list']);
        unset($this->toolbar_btn['new']);
    }
}
