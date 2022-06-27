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

use IzettleApi\Utils\Cipher;

class AdminIzettleConnectorSettingsController extends ModuleAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->bootstrap = true;
        $this->name = $this->module->name;
    }

    public function postProcess()
    {
        if (Tools::getValue('action') == 'saveConfig') {
            $id_product = Tools::getValue('id_product');
            $active = Tools::getValue('active');
            $use_price = Tools::getValue('use_price');
            $use_wholesale_price = Tools::getValue('use_wholesale_price');
            $id_inventory_sync_policy = Tools::getValue('id_inventory_sync_policy');
            $id_lang = Tools::getValue('id_lang');
            $custom_name = Tools::getValue('custom_name');
            $custom_barcode = Tools::getValue('custom_barcode');
            $zettle_taxes = Tools::getValue('zettle_taxes', null);

            $isSaved =
                $this->module->bindWithIzettle(
                    $id_product,
                    $active,
                    $use_price,
                    $use_wholesale_price,
                    $id_inventory_sync_policy,
                    $id_lang,
                    $custom_name,
                    $custom_barcode,
                    $zettle_taxes
                );

            die(
                json_encode(
                    array(
                        'error' => false,
                        'saved' => $isSaved
                    )
                )
            );
        }

        if (Tools::isSubmit('submit'.$this->module->name)) {
            $is_updated = false;

            $is_sync_vouchers = Configuration::get(IZETTLECONNECTOR_SYNC_VOUCHER) ? true : false;
            $current_sync_vouchers = Tools::getValue(IZETTLECONNECTOR_SYNC_VOUCHER) == 'yes' ? true : false;
            if ($is_sync_vouchers != $current_sync_vouchers) {
                Configuration::updateValue(
                    IZETTLECONNECTOR_SYNC_VOUCHER,
                    $current_sync_vouchers
                );
                if ($current_sync_vouchers) {
                    $this->confirmations[] = "Vouchers sync is enabled";
                } else {
                    $this->confirmations[] = "Vouchers sync is disabled";
                }
                $is_updated = true;
            }

            $is_sync_purchses = Configuration::get(IZETTLECONNECTOR_USE_PURCHASES) ? true : false;
            $current_sync_purchses = Tools::getValue(IZETTLECONNECTOR_USE_PURCHASES) == 'yes' ? true : false;
            if ($is_sync_purchses != $current_sync_purchses) {
                Configuration::updateValue(
                    IZETTLECONNECTOR_USE_PURCHASES,
                    $current_sync_purchses
                );
                if ($current_sync_purchses) {
                    $this->confirmations[] = "purchses import is enabled";
                } else {
                    $this->confirmations[] = "purchses import is disabled";
                }
                $is_updated = true;
            }

            if (Configuration::get(IZETTLECONNECTOR_BARCODE_FIELD) != Tools::getValue(IZETTLECONNECTOR_BARCODE_FIELD)) {
                Configuration::updateValue(
                    IZETTLECONNECTOR_BARCODE_FIELD,
                    Tools::getValue(IZETTLECONNECTOR_BARCODE_FIELD)
                );

                $data = Db::getInstance()->executeS('SELECT id_product  FROM '._DB_PREFIX_.'izettle_product');

                if (count($data)) {
                    TaskManager::addItemsToActualTask(
                        $data,
                        IzettleTask::UPDATE_ACTION
                    );
                    $this->module->queueSyncIfNeeded();
                }


                $this->confirmations[] = "Barcode field was successfully updated ";
                $is_updated = true;
            }

            $email = Tools::getValue(IZETTLECONNECTOR_SYNC_EMAIL);
            if (Configuration::get(IZETTLECONNECTOR_SYNC_EMAIL) != $email) {
                if ($email && !Validate::isEmail($email)) {
                    $this->errors[] = "Invalid email, notification disabled";
                } else {
                    if ($email) {
                        $this->confirmations[] = "Notification email updated";
                    } else {
                        $this->confirmations[] = "Notification email disabled";
                        $this->warnings[] = "While notification disabled check logs more often";
                    }
                }
                Configuration::updateValue(
                    IZETTLECONNECTOR_SYNC_EMAIL,
                    $email
                );
                $is_updated = true;
            }

            $sync_mode = Tools::getValue(IZETTLECONNECTOR_SYNC);
            if (Configuration::get(IZETTLECONNECTOR_SYNC) != $sync_mode) {
                $allow = array(
                    IZETTLECONNECTOR_SYNC_NOW,
                    IZETTLECONNECTOR_SYNC_CRON,
                    IZETTLECONNECTOR_SYNC_MANUAL
                );
                if (!$sync_mode || !in_array($sync_mode, $allow)) {
                    $sync_mode = IZETTLECONNECTOR_SYNC_NOW;
                }

                Configuration::updateValue(
                    IZETTLECONNECTOR_SYNC,
                    $sync_mode
                );

                Configuration::updateValue(
                    IZETTLECONNECTOR_CRON_ALLOW,
                    true//$sync_mode != IZETTLECONNECTOR_SYNC_MANUAL
                );

                $this->confirmations[] = "Sync mode was successfully updated ";
                $is_updated = true;
            }

            if (Configuration::get(IZETTLECONNECTOR_CRON_CODE) != Tools::getValue(IZETTLECONNECTOR_CRON_CODE)) {
                $old = Configuration::get(IZETTLECONNECTOR_CRON_CODE);

                try {
                    Configuration::updateValue(
                        IZETTLECONNECTOR_CRON_CODE,
                        Tools::getValue(IZETTLECONNECTOR_CRON_CODE)
                    );
                    $recreate = true;
                    IzettleHelper::createWebhook($this->module, $recreate);
                    $this->confirmations[] = "Cron Jobs code was successfully updated ";
                    $this->informations[] = "Izettle pusher subscription was recreated due token changed";
                    $this->warnings[] = "if you use cron job please recreate it";
                    $is_updated = true;
                } catch (Exception $e) {
                    Configuration::updateValue(
                        IZETTLECONNECTOR_CRON_CODE,
                        $old
                    );
                    $msg = $e->getMessage();
                    $this->errors[] = "error while webhook recreating please retry, message: $msg";
                }
            }

//            if (Configuration::get(IZETTLECONNECTOR_MODE) != Tools::getValue(IZETTLECONNECTOR_MODE)) {
//                Configuration::updateValue(
//                    IZETTLECONNECTOR_MODE,
//                    Tools::getValue(IZETTLECONNECTOR_MODE)
//                );
//                $this->confirmations[] = "Auth mode was successfully updated ";
//                $this->module->setIzettleConnected(false);
//                $this->module->clearIzettleAccountInfo();
//                $is_updated = true;
//            }

            $api_key_mode = true;//Tools::getValue(IZETTLECONNECTOR_MODE) == IZETTLECONNECTOR_MODE_SECRET;

            $cipher = new Cipher(_COOKIE_KEY_);

            $api_key = Tools::getValue(IZETTLECONNECTOR_API_KEY);

            $old_api_key = Configuration::get(IZETTLECONNECTOR_API_KEY);

            if (($old_api_key != $api_key)
                || (!$this->module->isIzettleConnected() && $api_key_mode)
            ) {
                // clear locations
                Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'izettle_location`');
                Configuration::updateValue(IZETTLECONNECTOR_MODE, IZETTLECONNECTOR_MODE_SECRET);
                if (!$api_key) {
                    Configuration::updateValue(
                        IZETTLECONNECTOR_API_KEY,
                        ''
                    );
                    Configuration::updateValue(
                        IZETTLECONNECTOR_CLIENT_ID,
                        ''
                    );
                    if ($api_key_mode) {
                        $this->module->setIzettleConnected(false);
                        $this->module->clearIzettleAccountInfo();
                    }
                    $is_updated = true;
                } else {
                    if (IzettleHelper::validateApiKey($api_key)) {
                        Configuration::updateValue(
                            IZETTLECONNECTOR_API_KEY,
                            $cipher->encrypt($api_key)
                        );

                        $buff =
                            explode(
                                ".",
                                $api_key
                            );
                        $data = $buff[1];

                        $decodeStr = IzettleHelper::decodeStr($data);

                        $payload = json_decode($decodeStr, true);

                        switch (json_last_error()) {
                            case JSON_ERROR_DEPTH:
                                $error =  ' - Maximum stack depth exceeded';
                                break;
                            case JSON_ERROR_STATE_MISMATCH:
                                $error =  ' - Underflow or the modes mismatch';
                                break;
                            case JSON_ERROR_CTRL_CHAR:
                                $error =  ' - Unexpected control character found';
                                break;
                            case JSON_ERROR_SYNTAX:
                                $error =  ' - Syntax error, malformed JSON';
                                break;
                            case JSON_ERROR_UTF8:
                                $error =  ' - Malformed UTF-8 characters, possibly incorrectly encoded';
                                break;
                            default:
                                $error =  false;
                                break;
                        }

                        if ($error) {
                            $this->module->logger->debug("Json decode $error");
                        }


                        Configuration::updateValue(
                            IZETTLECONNECTOR_CLIENT_ID,
                            $payload['client_id']
                        );
                        $this->confirmations[] = "API key was successfully updated ";


                        $this->module->setIzettleConnected(true);
                        if ($this->module->setIzettleAccountInfo()) {
                            $this->confirmations[] = "iZettle API connected";
                        } else {
                            $this->module->setIzettleConnected(false);
                            $this->module->setIzettleAccountInfo();
                            $this->errors[] = "Not connected, please check data and retry";
                        }

                        $is_updated = true;
                    } else {
                        $this->errors[] = "Broken API key, please check data and retry";
                    }
                }
            }
            if (!$is_updated) {
                $this->informations[] = "No data updated";
            }
            if (!$this->module->onBoarding->isFinished()) {
                if ((int)Configuration::get('IZETTLEONBOARD_CURRENT_STEP') == 3) {
                    if (count($this->errors) || !Configuration::get(IZETTLECONNECTOR_API_KEY)) {
                        Configuration::updateValue('IZETTLEONBOARD_CURRENT_STEP', 2);
                    }
                }

                if ((int)Configuration::get('IZETTLEONBOARD_CURRENT_STEP') == 9) {
                    if (count($this->errors)) {
                        Configuration::updateValue('IZETTLEONBOARD_CURRENT_STEP', 4);
                    } else {
                        Tools::redirectAdmin($this->context->link->getAdminLink('AdminIzettleConnectorRoot'));
                    }
                }
            }

            if (!$this->module->isIzettleConnected()) {
                $this->warnings[] = "you are not connected to iZettle";
            }
        }

        parent::postProcess();
    }




    public function renderList()
    {

        $list_sync_mode = array();
        $list_sync_mode[] =
            array(
                'id'   => IZETTLECONNECTOR_SYNC_NOW,
                'name' => $this->module->l('Sync changes immediately')
            );
        $list_sync_mode[] =
            array(
                'id'   => IZETTLECONNECTOR_SYNC_CRON,
                'name' => $this->module->l('Sync changes by Cron job')
            );
        $list_sync_mode[] =
            array(
                'id'   => IZETTLECONNECTOR_SYNC_MANUAL,
                'name' => $this->module->l('Manual sync')
            );

        $list_yes_no = array();
        $list_yes_no[] =
            array(
                'id'   => 'yes',
                'name' => $this->module->l('Yes')
            );
        $list_yes_no[] =
            array(
                'id'   => 'no',
                'name' => $this->module->l('No')
            );


        $list_barcode_field = array();

        $list_barcode_field[] =
            array(
                'id'   => 'ean13',
                'name' => $this->module->l('EAN-13 barcode')
            );
        $list_barcode_field[] =
            array(
                'id'   => 'upc',
                'name' => $this->module->l('UPC barcode')
            );

        $is_new_version = version_compare(_PS_VERSION_, '1.7.0', '>=');

        if ($is_new_version) {
            $list_barcode_field[] =
                array(
                    'id'   => 'isbn',
                    'name' => $this->module->l('ISBN')
                );
            $list_barcode_field[] =
                array(
                    'id'   => 'mpn',
                    'name' => $this->module->l('MPN')
                );
        }

        $list_barcode_field[] =
            array(
                'id'   => 'reference',
                'name' => $this->module->l('Reference')
            );

        $this->addJqueryPlugin('cooki-plugin');

        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');

        $fields_form = array();

        $cron_link =
            $this->context->link->getModuleLink(
                $this->module->name,
                'cron',
                array(
                    'token' => Configuration::get(IZETTLECONNECTOR_CRON_CODE)
                ),
                true
            );

        $fields_form[0]['form'] = array(
            'tabs' => array(
                'api'  => $this->module->l('API Settings'),
                'cron' => $this->module->l('Advanced Settings'),
            ),
            'input'  => array(
                array(
                    'type'     => 'password',
                    'tab'      => 'api',
                    'class'    => 'fixed-width-500',
                    'label'    => $this->l('API Key'),
                    'name'     => IZETTLECONNECTOR_API_KEY,
                    'desc'     => $this->module->l('Please copy and paste API Key from iZettle'),
                    'size'     => 40,
                    'required' => true
                ),
                array(
                    'type'     => 'html',
                    'tab'      => 'api',
                    'label'    => '',
                    'name'     => 'IZETTLECONNECTOR_STATE',
                    'html_content' => $this->module->getStateWidget(),
                    'size'     => 40
                ),
                array(
                    'tab' => 'cron',
                    'name' => IZETTLECONNECTOR_SYNC,
                    'label' => $this->module->l('Sync mode'),
                    'type' => 'select',
                    'options' => array(
                        'query' => $list_sync_mode,
                        'id' => 'id',
                        'name' => 'name'
                    )
                ),
                array(
                    'tab' => 'cron',
                    'name' => IZETTLECONNECTOR_BARCODE_FIELD,
                    'label' => $this->module->l('Barcode'),
                    'desc' => $this->module->l('Select which product field you want to use as barcode while sync.'),
                    'type' => 'select',
                    'options' => array(
                        'query' => $list_barcode_field,
                        'id' => 'id',
                        'name' => 'name'
                    )
                ),

//                array(
//                    'type'     => 'switch',
//                    //$field_type,
//                    'label'    => $this->module->l('Allow external sync'),
//                    'name'     => IZETTLECONNECTOR_CRON_ALLOW,
//                    'tab'      => 'cron',
//                    'required' => false,
//                    'desc'     =>
//                        $this->l('External sync').
//                        ' '.$cron_link,
//                    'class'    => 't',
//                    'is_bool'  => true,
//                    'values'   => array(
//                        array(
//                            'id'    => IZETTLECONNECTOR_CRON_ALLOW.'_on',
//                            'value' => 1,
//                            'label' => $this->module->l('Yes')
//                        ),
//                        array(
//                            'id'    => IZETTLECONNECTOR_CRON_ALLOW.'_off',
//                            'value' => 0,
//                            'label' => $this->module->l('No')
//                        )
//                    ),
//                ),
                array(
                    'type'     => 'text',
                    'tab'      => 'cron',
                    'class'    => 'fixed-width-500',
                    'label'    => $this->module->l('Sync token'),
                    'name'     => IZETTLECONNECTOR_CRON_CODE,
                    'size'     => 20,
                    'desc' =>
                        $this->module->l('External sync').
                        ' '.$cron_link,
                ),
                array(
                    'type'     => 'text',
                    'tab'      => 'cron',
                    'class'    => 'fixed-width-500',
                    'label'    => $this->module->l('Notification email'),
                    'name'     => IZETTLECONNECTOR_SYNC_EMAIL,
                    'size'     => 20,
                    'desc' =>
                        $this->module->l('If while sync problem occured, notification will be sent on this email.')
                        .' '.$this->module->l('Keep empty to disable notification.')
                ),
                array(
                    'tab' => 'cron',
                    'name' => IZETTLECONNECTOR_SYNC_VOUCHER,
                    'label' => $this->module->l('Sync vouchers'),
                    'desc' => $this->module->l('Vouchers will be synchronized between PrestaShop and Zettle'),
                    'type' => 'select',
                    'options' => array(
                        'query' => $list_yes_no,
                        'id' => 'id',
                        'name' => 'name'
                    )
                ),
                array(
                    'tab' => 'cron',
                    'name' => IZETTLECONNECTOR_USE_PURCHASES,
                    'label' => $this->module->l('Import Zettle orders'),
                    'desc' => $this->module->l('Import new Zettle orders automatically to PrestaShop'),
                    'type' => 'select',
                    'options' => array(
                        'query' => $list_yes_no,
                        'id' => 'id',
                        'name' => 'name'
                    )
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-primary pull-right margin-top-2 padding-left-4 '
                    .'padding-right-4 padding-top-2 padding-bottom-2'
            )
        );
        $config_params = array();
        $config_params['tabs'] = $fields_form[0]['form']['tabs'];
        $config_params['is_connected'] = $this->module->isIzettleConnected();
        $helper = new HelperForm();
        $helper->tpl_vars = $config_params;
        $helper->module = $this;
        $helper->name_controller = $this->module->name;
        $helper->token = Tools::getAdminTokenLite('AdminIzettleConnectorSettings');
        $helper->currentIndex = AdminController::$currentIndex;
        $helper->default_form_language = $default_lang;
        $helper->allow_employee_form_lang = $default_lang;
//        $helper->title = $this->l('iZettle Connector');
        $helper->show_toolbar = true;
        $helper->toolbar_scroll = true;
        $helper->submit_action = 'submit'.$this->module->name;
        $helper->toolbar_btn = array(
            'save' => array(
                'desc' => $this->module->l('Save'),
                'href' => $this->context->link->getAdminLink('AdminIzettleConnectorSettings'),
            )
        );
//        $helper->fields_value[IZETTLECONNECTOR_MODE] = Configuration::get(IZETTLECONNECTOR_MODE);

        $helper->fields_value[IZETTLECONNECTOR_API_KEY] = Configuration::get(IZETTLECONNECTOR_API_KEY);

        $secret = Configuration::get(IZETTLECONNECTOR_API_KEY);
        if (!IzettleHelper::validateApiKey($secret)) {
            $cipher = new IzettleApi\Utils\Cipher(_COOKIE_KEY_);
            $secret = $cipher->decrypt($secret);
        }

        $helper->fields_value[IZETTLECONNECTOR_API_KEY] = $secret;

        $helper->fields_value[IZETTLECONNECTOR_BARCODE_FIELD] = Configuration::get(IZETTLECONNECTOR_BARCODE_FIELD);
        $helper->fields_value[IZETTLECONNECTOR_CRON_CODE] = Configuration::get(IZETTLECONNECTOR_CRON_CODE);
        //$helper->fields_value[IZETTLECONNECTOR_CRON_ALLOW] = Configuration::get(IZETTLECONNECTOR_CRON_ALLOW);
        $helper->fields_value[IZETTLECONNECTOR_SYNC] = Configuration::get(IZETTLECONNECTOR_SYNC);
        $helper->fields_value[IZETTLECONNECTOR_SYNC_EMAIL] = Configuration::get(IZETTLECONNECTOR_SYNC_EMAIL);
        $helper->fields_value[IZETTLECONNECTOR_SYNC_VOUCHER] =
            Configuration::get(IZETTLECONNECTOR_SYNC_VOUCHER)
                ? 'yes'
                : 'no';

        $helper->fields_value[IZETTLECONNECTOR_USE_PURCHASES] =
            Configuration::get(IZETTLECONNECTOR_USE_PURCHASES)
                ? 'yes'
                : 'no';

        $helper->base_folder = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/helper/';

        $widget = $this->module->getConnectorWidget();

        $output = "";
        foreach (array('errors', 'warnings', 'informations', 'confirmations') as $type) {
            if (!is_array($this->$type)) {
                $this->$type = (array)$this->$type;
            }
            foreach (array_unique($this->$type) as $msg) {
                $func = 'display'.rtrim(Tools::ucfirst($type), 's');
                $output .= $this->module->{$func}('['.$this->module->l($msg).']');
            }
            $this->$type = array();
        }

        return $this->module->getAdminTopMenu().$output.$widget.$helper->generateForm($fields_form);//.$js;
    }
}
