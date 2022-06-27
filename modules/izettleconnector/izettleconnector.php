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

if (!defined('IZETTLECONNECTOR_CLIENT_ID')) {
    define('IZETTLECONNECTOR_CLIENT_ID', 'IZETTLECONNECTOR_CLIENT_ID');
}

if (!defined('IZETTLECONNECTOR_DEFAULT_CLIENT_ID')) {
    define('IZETTLECONNECTOR_DEFAULT_CLIENT_ID', '407634d7-0b5b-49fa-908c-95b0d3af9847');
}


if (!defined('IZETTLECONNECTOR_API_KEY')) {
    define('IZETTLECONNECTOR_API_KEY', 'IZETTLECONNECTOR_API_KEY');
}


if (!defined('IZETTLECONNECTOR_DEFAULT_CLIENT_SECRET')) {
    define('IZETTLECONNECTOR_DEFAULT_CLIENT_SECRET', 'IZSEC00f01057');
}


if (!defined('IZETTLECONNECTOR_MODE')) {
    define('IZETTLECONNECTOR_MODE', 'IZETTLECONNECTOR_MODE');
}


if (!defined('IZETTLECONNECTOR_REDIRECT_URL')) {
    define('IZETTLECONNECTOR_REDIRECT_URL', 'https://izettle.terracode.de');
}


if (!defined('IZETTLECONNECTOR_MODE_CODE')) {
    define('IZETTLECONNECTOR_MODE_CODE', 'IZETTLECONNECTOR_MODE_CODE');
}


if (!defined('IZETTLECONNECTOR_MODE_SECRET')) {
    define('IZETTLECONNECTOR_MODE_SECRET', 'IZETTLECONNECTOR_MODE_SECRET');
}

if (!defined('IZETTLECONNECTOR_USER_UUID')) {
    define('IZETTLECONNECTOR_USER_UUID', 'IZETTLECONNECTOR_USER_UUID');
}


if (!defined('IZETTLECONNECTOR_USER_NAME')) {
    define('IZETTLECONNECTOR_USER_NAME', 'IZETTLECONNECTOR_USER_NAME');
}


if (!defined('IZETTLECONNECTOR_USER_EMAIL')) {
    define('IZETTLECONNECTOR_USER_EMAIL', 'IZETTLECONNECTOR_USER_EMAIL');
}

if (!defined('IZETTLECONNECTOR_STATUS')) {
    define('IZETTLECONNECTOR_STATUS', 'IZETTLECONNECTOR_STATUS');
}

if (!defined('IZETTLECONNECTOR_CONNECTED')) {
    define('IZETTLECONNECTOR_CONNECTED', 'IZETTLECONNECTOR_CONNECTED');
}

if (!defined('IZETTLECONNECTOR_DISCONNECTED')) {
    define('IZETTLECONNECTOR_DISCONNECTED', 'IZETTLECONNECTOR_DISCONNECTED');
}

if (!defined('IZETTLECONNECTOR_REFRESH_TOKEN')) {
    define('IZETTLECONNECTOR_REFRESH_TOKEN', 'IZETTLECONNECTOR_REFRESH_TOKEN');
}

if (!defined('IZETTLECONNECTOR_NAME')) {
    define('IZETTLECONNECTOR_NAME', 'izettleconnector');
}

if (!defined('IZETTLECONNECTOR_CRON_CODE')) {
    define('IZETTLECONNECTOR_CRON_CODE', 'IZETTLECONNECTOR_CRON_CODE');
}


if (!defined('IZETTLECONNECTOR_CRON_ALLOW')) {
    define('IZETTLECONNECTOR_CRON_ALLOW', 'IZETTLECONNECTOR_CRON_ALLOW');
}

if (!defined('IZETTLECONNECTOR_SYNC')) {
    define('IZETTLECONNECTOR_SYNC', 'IZETTLECONNECTOR_SYNC');
}


if (!defined('IZETTLECONNECTOR_SYNC_NOW')) {
    define('IZETTLECONNECTOR_SYNC_NOW', 'IZETTLECONNECTOR_SYNC_NOW');
}

if (!defined('IZETTLECONNECTOR_SYNC_CRON')) {
    define('IZETTLECONNECTOR_SYNC_CRON', 'IZETTLECONNECTOR_SYNC_CRON');
}


if (!defined('IZETTLECONNECTOR_SYNC_MANUAL')) {
    define('IZETTLECONNECTOR_SYNC_MANUAL', 'IZETTLECONNECTOR_SYNC_MANUAL');
}

if (!defined('IZETTLECONNECTOR_SYNC_EMAIL')) {
    define('IZETTLECONNECTOR_SYNC_EMAIL', 'IZETTLECONNECTOR_SYNC_EMAIL');
}


if (!defined('IZETTLECONNECTOR_DISABLE_PRICE')) {
    define('IZETTLECONNECTOR_DISABLE_PRICE', 'IZETTLECONNECTOR_DISABLE_PRICE');
}

if (!defined('IZETTLECONNECTOR_SYNC_VOUCHER')) {
    define('IZETTLECONNECTOR_SYNC_VOUCHER', 'IZETTLECONNECTOR_SYNC_VOUCHER');
}

if (!defined('IZETTLECONNECTOR_TAX_TYPE')) {
    define('IZETTLECONNECTOR_TAX_TYPE', 'IZETTLECONNECTOR_TAX_TYPE');
}

if (!defined('IZETTLECONNECTOR_BARCODE_FIELD')) {
    define('IZETTLECONNECTOR_BARCODE_FIELD', 'IZETTLECONNECTOR_BARCODE_FIELD');
}

if (!defined('IZETTLECONNECTOR_PARTIAL_SYNC')) {
    define('IZETTLECONNECTOR_PARTIAL_SYNC', 'IZETTLECONNECTOR_PARTIAL_SYNC');
}

if (!defined('IZETTLECONNECTOR_CARRIER_ID')) {
    define('IZETTLECONNECTOR_CARRIER_ID', 'IZETTLECONNECTOR_CARRIER_ID');
}

if (!defined('IZETTLECONNECTOR_USE_PURCHASES')) {
    define('IZETTLECONNECTOR_USE_PURCHASES', 'IZETTLECONNECTOR_USE_PURCHASES');
}

if (!defined('IZETTLECONNECTOR_ORDER_STATE')) {
    define('IZETTLECONNECTOR_ORDER_STATE', 'IZETTLECONNECTOR_ORDER_STATE');
}


include_once _PS_MODULE_DIR_.'izettleconnector/vendor/autoload.php';

class IzettleConnector extends Module implements IzettleApi\Utils\RefreshTokenStoreInterface
{
    private static $tab_names = array(
        array(
            'controller' => 'AdminIzettleConnectorSettings',
            'title'      => 'Settings'
        ),
        array(
            'controller' => 'AdminIzettleConnectorRoot',
            'title'      => 'Sync'
        ),
        array(
            'controller' => 'AdminIzettleConnectorSync',
            'title'      => 'Changes'
        ),
        array(
            'controller' => 'AdminIzettleConnectorProducts',
            'title'      => 'Products'
        ),
        array(
            'controller' => 'AdminIzettleConnectorHistory',
            'title'      => 'History'
        ),
        array(
            'controller' => 'AdminIzettleConnectorHelp',
            'title'      => 'FAQ'
        ),
    );

    private static $help_urls = array(
        'en' => 'https://www.zettle.com/gb/integrations/e-commerce/prestashop',
        'gb' => 'https://www.zettle.com/gb/integrations/e-commerce/prestashop',
        'fr' => 'https://www.zettle.com/fr/integrations/e-commerce/prestashop',
        'se' => 'https://www.zettle.com/se/integrationer/prestashop',
        'nl' => 'https://www.zettle.com/nl/koppelingen/prestashop',
        'de' => 'https://www.zettle.com/de/integrationen/e-commerce/prestashop',
        'br' => 'https://www.zettle.com/br/integrations/prestashop',
        'mx' => 'https://www.zettle.com/mx/integrations/prestashop',
        'it' => 'https://www.zettle.com/it/integrations/prestashop',
        'es' => 'https://www.zettle.com/es/integrations/prestashop'
    );

    protected static $enable_update_hook = true;

    public $logger;
    public $onBoarding;

    public function __construct()
    {
        $this->name = 'izettleconnector';
        $this->tab = 'payments_gateways';
        $this->module_key = 'd8ecf75090bdaa984b50a35af655b346';
        $this->version = '1.1.38';
        $this->author = 'Zettle';
        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('Zettle POS');
        $this->description = $this->l('Module enables synchronization of products between iZettle and PrestaShop');
        $this->ps_versions_compliancy = array('min' => '1.6.1', 'max' => _PS_VERSION_);

        $logPath = _PS_MODULE_DIR_.$this->name.DIRECTORY_SEPARATOR."var".DIRECTORY_SEPARATOR."izettle.log";
        $this->logger = new IzettleApi\Utils\IzettleLogger(__CLASS__, $logPath);
        $this->logger->setLoggingLevel('DEBUG');

        $this->onBoarding = new IzettleOnBoarding(
            $this->smarty,
            $this
        );
    }

    public function fetch($templatePath, $cache_id = null, $compile_id = null)
    {
        if ($cache_id !== null) {
            Tools::enableCache();
        }

        $template = $this->context->smarty->createTemplate(
            $templatePath,
            $cache_id,
            $compile_id,
            $this->smarty
        );

        if ($cache_id !== null) {
            Tools::restoreCacheSettings();
        }

        return $template->fetch();
    }

    public function install()
    {
        if (!(parent::install()
            && $this->registerHook('displayAdminProductsExtra')
            && $this->registerHook('displayBackOfficeHeader')
            && $this->registerHook('displayAdminAfterHeader')
            && $this->registerHook('actionObjectProductAddAfter')
            && $this->registerHook('actionProductUpdate')
            && $this->registerHook('actionProductDelete')
            && $this->registerHook('actionUpdateQuantity')
            && $this->registerHook('actionObjectSpecificPriceAddAfter')
            && $this->registerHook('actionObjectSpecificPriceUpdateAfter')
            && $this->registerHook('actionObjectSpecificPriceDeleteAfter')
            && $this->registerHook('actionObjectImageAddAfter')
            && $this->registerHook('actionObjectImageUpdateAfter')
            && $this->registerHook('actionObjectImageDeleteAfter')
            && $this->registerHook('updateCarrier')
            && Configuration::updateValue('IZETTLEONBOARD_CURRENT_STEP', 12)
            && Configuration::updateValue('IZETTLEONBOARD_SHUT_DOWN', true)
            && Configuration::updateValue(IZETTLECONNECTOR_SYNC_EMAIL, Configuration::get('PS_SHOP_EMAIL'))
            && Configuration::updateValue(IZETTLECONNECTOR_CLIENT_ID, '')
            && Configuration::updateValue(IZETTLECONNECTOR_API_KEY, '')
            && Configuration::updateValue(IZETTLECONNECTOR_SYNC, IZETTLECONNECTOR_SYNC_NOW)
            && Configuration::updateValue(IZETTLECONNECTOR_MODE, IZETTLECONNECTOR_MODE_SECRET)
            && Configuration::updateValue(IZETTLECONNECTOR_STATUS, IZETTLECONNECTOR_DISCONNECTED)
            && Configuration::updateValue(IZETTLECONNECTOR_CRON_CODE, md5(_COOKIE_KEY_))
            && Configuration::updateValue(IZETTLECONNECTOR_CRON_ALLOW, true)
            && Configuration::updateValue(IZETTLECONNECTOR_SYNC_VOUCHER, false)
            && Configuration::updateValue(IZETTLECONNECTOR_TAX_TYPE, 'VAT')
            && Configuration::updateValue(IZETTLECONNECTOR_BARCODE_FIELD, 'ean13')
            && Configuration::updateValue(IZETTLECONNECTOR_PARTIAL_SYNC, false)
            && Configuration::updateValue(IZETTLECONNECTOR_USE_PURCHASES, true)
        )) {
            return false;
        }

        if (!$this->createTables()) {
            return false;
        }
        if (!$this->createTabs()) {
            return false;
        }
        if (!$this->installCarrier()) {
            return false;
        }

        $this->createZettleOrderState();

        return true;
    }

    public function uninstall()
    {
        $parent_id = Tab::getIdFromClassName('AdminIzettleConnector');
        if ($parent_id) {
            $parentTab = new Tab($parent_id);
            $parentTab->delete();
        }
        foreach (self::$tab_names as $tab_name) {
            $tab_id = Tab::getIdFromClassName($tab_name['controller']);
            if ($tab_id) {
                $tab = new Tab($tab_id);
                $tab->delete();
            }
        }

        $tab_id = Tab::getIdFromClassName('AdminIzettleConnectorOnBoarding');
        $tab = new Tab($tab_id);
        $tab->delete();

        $this->dropTables();
        $this->uninstallCarrier();

        return parent::uninstall();
    }

    public function installCarrier()
    {
        $carrier = new Carrier();
        $carrier->name = 'Zettle POS';
        $carrier->active = false;//true; //to prevent showing in order steps
        $carrier->shipping_handling = false;
        $carrier->is_module = true;
        $carrier->shipping_external = true;
        $carrier->external_module_name = $this->name;
        $carrier->need_range = true;

        $config = array(
            'delay' => array(
                'en' => 'Pick up in-store',
                'de' => 'Abholung im Geschäft',
                'sv' => 'Hämtas i butik',
                'fr' => 'Retrait en magasin',
            )
        );

        $languages = Language::getLanguages(true);
        foreach ($languages as $language) {
            if (isset($config['delay'][$language['iso_code']])) {
                $carrier->delay[(int)$language['id_lang']] = $config['delay'][$language['iso_code']];
            } else {
                $carrier->delay[(int)$language['id_lang']] = $config['delay']['en'];
            }
        }

        if ($carrier->add()) {
            // Add carrier to all customers groups
            $groups = Group::getGroups(true);
            foreach ($groups as $group) {
                Db::getInstance()->insert(
                    'carrier_group',
                    array(
                        'id_carrier' => (int)($carrier->id),
                        'id_group'   => (int)($group['id_group'])
                    )
                );
            }

            $rangeWeight = new RangeWeight();
            $rangeWeight->id_carrier = $carrier->id;
            $rangeWeight->delimiter1 = '0';
            $rangeWeight->delimiter2 = '10000'; // dummy value
            $rangeWeight->add();


            foreach (Zone::getZones() as $zone) {
                $carrier->addZone((int) $zone['id_zone']);
            }

            // Copy Logo
            @copy(dirname(__FILE__).'/views/img/logo.jpg', _PS_SHIP_IMG_DIR_.'/'.(int)$carrier->id.'.jpg');

            Configuration::updateValue(IZETTLECONNECTOR_CARRIER_ID, $carrier->id);

            return (int)($carrier->id);
        }

        return 0;
    }

    public function uninstallCarrier()
    {
        if (!Configuration::get(IZETTLECONNECTOR_CARRIER_ID)) {
            return true;
        }

        $carrier = new Carrier((int)(Configuration::get(IZETTLECONNECTOR_CARRIER_ID)));

        // If one of our carriers is default, we will change it to other
        if (Configuration::get('PS_CARRIER_DEFAULT') == (int)($carrier->id)) {
            $carriers =
                Carrier::getCarriers(
                    $this->context->language->id,
                    true,
                    false,
                    false,
                    null,
                    PS_CARRIERS_AND_CARRIER_MODULES_NEED_RANGE
                );
            foreach ($carriers as $carrier) {
                if ($carrier['active'] && !$carrier['deleted'] && $carrier['external_module_name'] != $this->name) {
                    Configuration::updateValue('PS_CARRIER_DEFAULT', $carrier['id_carrier']);
                    break;
                }
            }
        }

        $carrier->deleted = 1;
        @unlink(_PS_SHIP_IMG_DIR_.'/'.(int)$carrier->id.'.jpg');
        if (!$carrier->update()) {
            return false;
        }
        Configuration::updateValue(IZETTLECONNECTOR_CARRIER_ID, 0);
        return true;
    }

    public function createZettleOrderState()
    {
        if (!Configuration::get(IZETTLECONNECTOR_ORDER_STATE)) {
            $order_state = new OrderState();
            $order_state->name = array();

            foreach (Language::getLanguages() as $language) {
                $order_state->name[$language['id_lang']] = 'Zettle POS (paid)';
            }

            $order_state->send_email = false;
            $order_state->color = '#785ddc';
            $order_state->hidden = false;
            $order_state->delivery = false;
            $order_state->logable = false;
            $order_state->invoice = true;
            $order_state->pdf_invoice = true;
            $order_state->paid = true;
            $order_state->add();
            Configuration::updateValue(IZETTLECONNECTOR_ORDER_STATE, (int)$order_state->id);
        }
    }

    public function createTables()
    {
        $res = (bool) Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_product`  (
			    `id_izettle_product` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`id_product` INT(11) NOT NULL,
				`uuid` char(36) NOT NULL,
				`date_add` datetime NOT NULL,
                `date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_izettle_product`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_variant`  (
			    `id_izettle_variant` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`id_product` INT(11) NOT NULL,
				`id_product_attribute` INT(11) NOT NULL,
				`uuid` char(36) NOT NULL,
				`date_add` datetime NOT NULL,
                `date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_izettle_variant`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_category`  (
			    `id_izettle_category` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`id_category` INT(11) NOT NULL,
				`uuid` char(36) NOT NULL,
				`date_add` datetime NOT NULL,
                `date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_izettle_category`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_image`  (
			    `id_izettle_image` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`id_image` INT(11) NOT NULL,
				`key` varchar(255) NOT NULL,
				`url` text NULL,
				`date_add` datetime NOT NULL,
                `date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_izettle_image`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_discount`  (
			    `id_izettle_discount` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`id_cart_rule` INT(11) NOT NULL,
				`uuid` char(36) NOT NULL,
				`date_add` datetime NOT NULL,
                `date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_izettle_discount`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_location`  (
			    `id_izettle_location` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`uuid` char(36) NOT NULL,
				`type` text NULL,
				`name` text NULL,
				`description` text NULL,
				`default` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				`date_add` datetime NOT NULL,
                `date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_izettle_location`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_configuration`  (
				`id_product` INT(11) NOT NULL,
				`id_lang` INT(11) NULL,
				`id_inventory_sync_policy` INT(11) NOT NULL DEFAULT 0,
				`active` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
				`use_price` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				`use_wholesale_price` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				`custom_name` text NULL,
				`custom_barcode` text NULL,
				`date_add` datetime NOT NULL,
                `date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_product`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'inventory_sync_policy`  (
				`id_inventory_sync_policy` int(10) unsigned NOT NULL,
                `name` varchar(255) NOT NULL,
                `desc` text NULL,
				PRIMARY KEY (`id_inventory_sync_policy`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_run`  (
				`id_izettle_run` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`id_izettle_initial_type` int(10) unsigned NOT NULL,
				`active` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				`success` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				`params` text NULL,
				`date_add` datetime NOT NULL,
                `date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_izettle_run`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_run_history`  (
				`id_izettle_run` int(10) unsigned NOT NULL,
				`id_izettle_initial_type` int(10) unsigned NOT NULL,
				`active` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				`success` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				`params` text NULL,
				`date_add` datetime NOT NULL,
                `date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_izettle_run`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_initial_type`  (
				`id_izettle_initial_type` int(10) unsigned NOT NULL,
                `name` varchar(255) NOT NULL,
                `desc` text NULL,
				PRIMARY KEY (`id_izettle_initial_type`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_task`  (
				`id_izettle_task` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`id_izettle_run` int(10) unsigned NULL,
				`id_izettle_action_type` int(10) unsigned NOT NULL,
				`id_izettle_task_state` int(10) unsigned NOT NULL,
				`total_count` int(10) unsigned NULL,
				`prepared_count` int(10) unsigned NULL,
				`processed_count` int(10) unsigned NULL,
				`current_info` text NULL,
				`date_start` datetime NULL,
				`date_end` datetime NULL,
				`date_add` datetime NOT NULL,
                `date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_izettle_task`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_task_history`  (
				`id_izettle_task` int(10) unsigned NOT NULL,
				`id_izettle_run` int(10) unsigned NULL,
				`id_izettle_action_type` int(10) unsigned NOT NULL,
				`id_izettle_task_state` int(10) unsigned NOT NULL,
				`total_count` int(10) unsigned NULL,
				`prepared_count` int(10) unsigned NULL,
				`processed_count` int(10) unsigned NULL,
				`current_info` text NULL,
				`date_start` datetime NULL,
				`date_end` datetime NULL,
				`date_add` datetime NOT NULL,
                `date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_izettle_task`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_action_type`  (
				`id_izettle_action_type` int(10) unsigned NOT NULL,
                `name` varchar(255) NOT NULL,
                `desc` text NULL,
				PRIMARY KEY (`id_izettle_action_type`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            '
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_task_state`  (
				`id_izettle_task_state` int(10) unsigned NOT NULL,
                `name` varchar(255) NOT NULL,
                `desc` text NULL,
				PRIMARY KEY (`id_izettle_task_state`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_task_product`  (
				`id_izettle_task_product` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`id_izettle_task` int(10) unsigned NULL,
				`id_product` INT(11) NULL,
				`id_product_attribute` INT(11) NULL,
				`processed` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				`undone` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				`undo_json` text NULL,
				`desc` text NULL,
				`date_add` datetime NOT NULL,
                `date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_izettle_task_product`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );


        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_task_product_history`  (
				`id_izettle_task_product` int(10) unsigned NOT NULL,
				`id_izettle_task` int(10) unsigned NULL,
				`id_product` INT(11) NULL,
				`id_product_attribute` INT(11) NULL,
				`processed` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				`undone` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				`undo_json` text NULL,
				`desc` text NULL,
				`date_add` datetime NOT NULL,
                `date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_izettle_task_product`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );


        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_import`  (
				`id_izettle_import` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`id_izettle_task` int(10) unsigned NULL,
				`uuid` varchar(36) NULL,
				`total_count` int(10) unsigned NULL,
				`imported_count` int(10) unsigned NULL,
				`active` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				`success` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				`date_add` datetime NOT NULL,
                `date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_izettle_import`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_inventory_sync`  (
				`uuid` varchar(36) NOT NULL,
				`date_add` datetime NOT NULL,
				PRIMARY KEY (`uuid`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_tax`  (
				`uuid` varchar(36) NOT NULL,
				`label` text NULL,
				`percentage` FLOAT NULL,
				`default` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				PRIMARY KEY (`uuid`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_webhook_subscription`  (
				`id_izettle_webhook_subscription` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`uuid` varchar(36) NOT NULL,
				`event_name` text NULL,
				`signing_key` text NULL,
				`destination` text NULL,
				PRIMARY KEY (`id_izettle_webhook_subscription`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_partial_sync`  (
			    `id_izettle_partial_sync` int(10) unsigned NOT NULL AUTO_INCREMENT,
			    `params` text NULL,
				`active` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				`imported_info` text NULL,
				`total_info` text NULL,
				`hours_wait` int(10) unsigned NOT NULL DEFAULT 24,
				`last_sync_date` datetime NOT NULL,
				`date_add` datetime NOT NULL,
                `date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_izettle_partial_sync`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );

        $res &= (bool)Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_purchase`  (
				`uuid` varchar(36) NOT NULL,
				`id_order` int(10) unsigned NOT NULL,
				`date_add` datetime NOT NULL,
				PRIMARY KEY (`uuid`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
        );


        $res &= (bool) Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'izettle_initial_type`');

        $res &= (bool) Db::getInstance()->insert(
            'izettle_initial_type',
            array(
                'id_izettle_initial_type' => IzettleRun::INTERNAL,
                'name'            => 'INTERNAL',
                'desc'            => pSQL($this->l('Process initialized by product synchronization wizard'))
            )
        );

        $res &= (bool) Db::getInstance()->insert(
            'izettle_initial_type',
            array(
                'id_izettle_initial_type' => IzettleRun::EXTERNAL,
                'name'    => 'EXTERNAL',
                'desc'    => pSQL($this->l('Process initialized by Cron Job or external link'))
            )
        );

        $res &= (bool)Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'izettle_action_type`');

        $res &= (bool)Db::getInstance()->insert(
            'izettle_action_type',
            array(
                'id_izettle_action_type' => IzettleTask::CLEAR_ACTION,
                'name'                   => 'CLEAR_IZETTLE',
                'desc'                   => pSQL($this->l('Clear all iZettle entities'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_action_type',
            array(
                'id_izettle_action_type' => IzettleTask::IMPORT_ACTION,
                'name'                   => 'PRODUCT_EXPORT',
                'desc'                   => pSQL($this->l('Export products from PrestaShop to iZettle'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_action_type',
            array(
                'id_izettle_action_type' => IzettleTask::CREATE_ACTION,
                'name'                   => 'CREATE',
                'desc'                   => pSQL($this->l('Push new products from Prestashop to iZettle'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_action_type',
            array(
                'id_izettle_action_type' => IzettleTask::UPDATE_ACTION,
                'name'                   => 'UPDATE',
                'desc'                   => pSQL($this->l('Product data send from PrestaShop to iZettle'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_action_type',
            array(
                'id_izettle_action_type' => IzettleTask::DELETE_ACTION,
                'name'                   => 'DELETE',
                'desc'                   => pSQL($this->l('Product data synchronization deleted products on iZettle'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_action_type',
            array(
                'id_izettle_action_type' => IzettleTask::IMAGE_ACTION,
                'name'                   => 'IMAGE',
                'desc'                   => pSQL($this->l('Export images from PrestaShop to iZettle'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_action_type',
            array(
                'id_izettle_action_type' => IzettleTask::STOCK_IMPORT_ACTION,
                'name'                   => 'STOCK_EXPORT',
                'desc'                   => pSQL($this->l('Export inventory from PrestaShop to iZettle'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_action_type',
            array(
                'id_izettle_action_type' => IzettleTask::STOCK_EXPORT_ACTION,
                'name'                   => 'STOCK_IMPORT',
                'desc'                   => pSQL($this->l('Import inventory from iZettle to PrestaShop'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_action_type',
            array(
                'id_izettle_action_type' => IzettleTask::STOCK_SYNC_ACTION,
                'name'                   => 'STOCK_SYNC',
                'desc'                   => pSQL($this->l('Sync inventory between PrestaShop and iZettle'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_action_type',
            array(
                'id_izettle_action_type' => IzettleTask::STOCK_STOP_ACTION,
                'name'                   => 'STOCK_STOP',
                'desc'                   => pSQL($this->l('Stop inventory sync between PrestaShop and iZettle'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_action_type',
            array(
                'id_izettle_action_type' => IzettleTask::DISCOUNT_ACTION,
                'name'                   => 'DISCOUNT',
                'desc'                   => pSQL($this->l('Sync product price discount between PrestaShop and iZettle'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_action_type',
            array(
                'id_izettle_action_type' => IzettleTask::PURCHASE_IMPORT_ACTION,
                'name'                   => 'PURCHASE_IMPORT',
                'desc'                   => pSQL($this->l('Import purchases from Zettle to Prestashop'))
            )
        );




        $res &= (bool)Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'izettle_task_state`');

        $res &= (bool)Db::getInstance()->insert(
            'izettle_task_state',
            array(
                'id_izettle_task_state' => IzettleTask::READY_STATE,
                'name'                  => 'READY',
                'desc'                  => pSQL($this->l('Task is ready for processing'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_task_state',
            array(
                'id_izettle_task_state' => IzettleTask::RUNNING_STATE,
                'name'                  => 'RUNNING',
                'desc'                  => pSQL($this->l('Task is running'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_task_state',
            array(
                'id_izettle_task_state' => IzettleTask::RUNNING_ASYNC_STATE,
                'name'                  => 'RUNNING_ASYNC',
                'desc'                  => pSQL($this->l('Task is running asynchronously'))
            )
        );


        $res &= (bool)Db::getInstance()->insert(
            'izettle_task_state',
            array(
                'id_izettle_task_state' => IzettleTask::STOPPED_STATE,
                'name'                  => 'STOPPED',
                'desc'                  => pSQL($this->l('Task is stopped'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_task_state',
            array(
                'id_izettle_task_state' => IzettleTask::CANCELLED_STATE,
                'name'                  => 'CANCELLED',
                'desc'                  => pSQL($this->l('Task is cancelled'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_task_state',
            array(
                'id_izettle_task_state' => IzettleTask::FINISHED_STATE,
                'name'                  => 'FINISHED',
                'desc'                  => pSQL($this->l('Task completed'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_task_state',
            array(
                'id_izettle_task_state' => IzettleTask::ERROR_STATE,
                'name'                  => 'ERROR',
                'desc'                  => pSQL($this->l('Task could not be completed. Error '))
            )
        );


        $res &= (bool)Db::getInstance()->insert(
            'izettle_task_state',
            array(
                'id_izettle_task_state' => IzettleTask::UNDO_RUNNING_STATE,
                'name'                  => 'UNDO_RUNNING',
                'desc'                  => pSQL($this->l('Rollback is running'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'izettle_task_state',
            array(
                'id_izettle_task_state' => IzettleTask::UNDONE_STATE,
                'name'                  => 'UNDONE',
                'desc'                  => pSQL($this->l('Rollback completed.'))
            )
        );

        $res &= (bool)Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'inventory_sync_policy`');

        $res &= (bool)Db::getInstance()->insert(
            'inventory_sync_policy',
            array(
                'id_inventory_sync_policy' => IzettleConfiguration::INVENTORY_DISABLE_POLICY,
                'name'                     => 'INVENTORY_DISABLE',
                'desc'                     => pSQL($this->l('Product quantity synchronization disabled'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'inventory_sync_policy',
            array(
                'id_inventory_sync_policy' => IzettleConfiguration::STOCK_IMPORT_POLICY,
                'name'                     => 'STOCK_IMPORT',
                'desc'                     => pSQL($this->l('Product quantity import from iZettle'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'inventory_sync_policy',
            array(
                'id_inventory_sync_policy' => IzettleConfiguration::INVENTORY_TO_PS_POLICY,
                'name'                     => 'INVENTORY_TO_PS',
                'desc'                     => pSQL($this->l('Product quantity export to iZettle'))
            )
        );

        $res &= (bool)Db::getInstance()->insert(
            'inventory_sync_policy',
            array(
                'id_inventory_sync_policy' => IzettleConfiguration::INVENTORY_BOTH_POLICY,
                'name'                     => 'INVENTORY_BOTH',
                'desc'                     => pSQL($this->l(
                    'Product quantity synchronization between PrestaShop and iZettle'
                ))
            )
        );

        return $res;
    }

    public function dropTables()
    {
        $sql = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_action_type;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_discount;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_category;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_configuration;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_image;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_location;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_import;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_initial_type;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_product;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_run;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_run_history;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_task;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_task_history;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_task_product;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_task_product_history;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_task_state;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_inventory_sync;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_webhook_subscription;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_tax;
                DROP TABLE IF EXISTS '._DB_PREFIX_.'izettle_variant;';
        Db::getInstance()->execute($sql);
    }

    private function createTabs()
    {
        $langs = Language::getLanguages();

        $parent = Tab::getIdFromClassName('AdminIzettleConnector');
        if ($parent) {
            $parentTab = new Tab($parent);
        } else {
            $parentTab = new Tab();
            $parentTab->active = 1;
            $parentTab->name = array();
            $parentTab->class_name = "AdminIzettleConnector";
            foreach (Language::getLanguages() as $lang) {
                $parentTab->name[$lang['id_lang']] = "Zettle";
            }
            $parentTab->id_parent = 0;
            $parentTab->module = $this->name;
            $parentTab->add();
        }

        foreach (self::$tab_names as $tab_name) {
            $tab = new Tab();
            $tab->active = 1;
            $tab->class_name = $tab_name['controller'];
            $tab->module = $this->name;
            if ($tab_name['controller'] == 'AdminIzettleConnectorSync') {
                $tab->id_parent = -1;
            } else {
                $tab->id_parent = $parentTab->id;
            }

            foreach ($langs as $l) {
                $tab->name[$l['id_lang']] = $this->l($tab_name['title']);
            }
            $tab->save();
        }

        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = 'AdminIzettleConnectorOnBoarding';
        $tab->module = $this->name;
        $tab->id_parent = -1;
        foreach (Language::getLanguages() as $l) {
            $tab->name[$l['id_lang']] = 'OnBoarding';
        }
        $tab->save();

        return true;
    }

    /**
     * Carrier ID will be changed after every update.
     */
    public function hookUpdateCarrier($params)
    {
        if (!Configuration::get(IZETTLECONNECTOR_CARRIER_ID)) {
            return;
        }

        $id_carrier_old = (int)($params['id_carrier']);
        $id_carrier_new = (int)($params['carrier']->id);


        if ($id_carrier_old == (int)(Configuration::get(IZETTLECONNECTOR_CARRIER_ID))) {
            Configuration::updateValue(IZETTLECONNECTOR_CARRIER_ID, $id_carrier_new);
        }
    }


    public function getIdZettleCarrier()
    {
        return (int)(Configuration::get(IZETTLECONNECTOR_CARRIER_ID));
    }

    public function getIdZettleOrderState()
    {
        return (int)(Configuration::get(IZETTLECONNECTOR_ORDER_STATE));
    }

    /**
     * Hook called after the header of the backoffice.
     */
    public function hookDisplayAdminAfterHeader()
    {
        $is_root = strpos($_SERVER['REQUEST_URI'], 'AdminIzettleConnectorRoot') > 0;

        $no_partial_sync =  Tools::getValue('no_partial_sync', false);

        if (!$is_root && !$no_partial_sync) {
            $partial_sync_id = Configuration::get(IZETTLECONNECTOR_PARTIAL_SYNC);
            if ($partial_sync_id) {
                $partial_sync = new IzettlePartialSync($partial_sync_id);
                if (!$partial_sync->active) {
                    return null;
                }

                $valid = IzettleHelper::isPartialSyncReady($partial_sync);
                if (!$valid) {
                    return null;
                }

                $tpl = _PS_MODULE_DIR_.$this->name.'/views/templates/admin/partial_notification.tpl';
                $base_ajax_url = $this->context->link->getAdminLink('AdminIzettleConnectorRoot');
                $this->context->smarty->assign(
                    array(
                        'notification_ajax_url' => $base_ajax_url
                    )
                );
                return $this->context->smarty->fetch($tpl);
            }
        }

        if ($this->isCurrentPageAssociatedWithIzettle()) {
            return $this->onBoarding->isFinished() ? null : $this->onBoarding->showModuleContent($this->context->link);
        }
        return null;
    }

    public function hookDisplayBackOfficeHeader()
    {
        $is_product = Context::getContext()->controller->controller_name == 'AdminProducts';
        $is_admin_form = strpos($_SERVER['REQUEST_URI'], '/product') > 0;

        $is_partial_sync = Configuration::get(IZETTLECONNECTOR_PARTIAL_SYNC);
        if ($is_partial_sync) {
            $this->context->controller->addJqueryPlugin('fancybox');
        }

        if ($is_product || $is_admin_form || $this->isCurrentPageAssociatedWithIzettle() || $is_partial_sync) {
            $this->context->controller->addCss($this->_path.'/views/css/radiobutton.css');
            $this->context->controller->addCss($this->_path.'/views/css/main.css');
        }

        if ($this->isCurrentPageAssociatedWithIzettle() || $is_partial_sync) {
            $this->context->controller->addCss($this->_path.'/views/css/smart-wizard.css');
            $this->context->controller->addCss($this->_path.'/views/css/wizard.css');
            $this->context->controller->addCss($this->_path.'/views/css/accordion.css');
            $this->context->controller->addCSS($this->_path.'/views/css/onboard.css', 'all');
            if (!$this->onBoarding->isFinished()) {
                $this->context->controller->addJS($this->_path.'/views/js/OnBoarding.js', 'all');
            }
            $this->context->controller->addJS($this->_path.'/views/js/popper.js', 'all');
        }
    }

    public function isCurrentPageAssociatedWithIzettle()
    {
        foreach (self::$tab_names as $tab) {
            if (strpos($_SERVER['QUERY_STRING'], $tab['controller']) > -1) {
                return true;
            }
        }
        return strpos($_SERVER['QUERY_STRING'], 'AdminIzettleConnectorSync') > -1;
    }

    public function onBoardingCall($action, $value)
    {
        switch ($action) {
            case 'setCurrentStep':
                if (!$this->onBoarding->setCurrentStep($value)) {
                    throw new Exception('The current step cannot be saved.');
                }
                break;
            case 'setShutDown':
                if (!$this->onBoarding->setShutDown($value)) {
                    throw new Exception('The shut down status cannot be saved.');
                }
                break;
        }
    }

    public function isProductExportedToIzettle($id_product)
    {
        $isExist =
            Db::getInstance()->getValue(
                'SELECT id_product
                     FROM '._DB_PREFIX_.'izettle_product
                     WHERE id_product = '.(int)$id_product
            );
        return $isExist;
    }

    public function getConfigAsArray($id_product)
    {
        $config = Db::getInstance()->getRow(
            'SELECT
                    id_product,
                    id_lang,
                    id_inventory_sync_policy,
                    active,
                    use_price,
                    use_wholesale_price,
                    custom_name, 
                    custom_barcode
                 FROM '._DB_PREFIX_.'izettle_configuration
                 WHERE id_product = '.(int)$id_product
        );

        return $config;
    }

    public function bindWithIzettle(
        $id_product,
        $active,
        $use_price,
        $use_wholesale_price,
        $id_inventory_sync_policy,
        $id_lang,
        $custom_name,
        $custom_barcode,
        $zettle_taxes = null
    ) {
        $config = $this->getConfigAsArray($id_product);
        $isExist = $this->isProductExportedToIzettle($id_product);

        $newConfig = array(
            'id_product'               => $id_product,
            'id_lang'                  => $id_lang,
            'id_inventory_sync_policy' => $id_inventory_sync_policy,
            'active'                   => $active,
            'custom_name'              => $custom_name,
            'custom_barcode'           => $custom_barcode,
            'use_price'                => $use_price,
            'use_wholesale_price'      => $use_wholesale_price,
        );

        $isSaved = !is_null($zettle_taxes);

        $diff =
            IzettleHelper::arrayRecursiveDiff(
                $newConfig,
                $config
            );
        if ((!$config && $active) || ($config && $diff)) {
            $newConfig['date_add'] = date('Y-m-d H:i:s');
            $newConfig['date_upd'] = date('Y-m-d H:i:s');
            Db::getInstance()->insert(
                'izettle_configuration',
                array($newConfig),
                false,
                true,
                Db::REPLACE
            );
            $isSaved = true;
        }

        if ($isSaved) {
            $data = array('id_product' => $id_product);
            if (!is_null($zettle_taxes) && is_array($zettle_taxes) && $zettle_taxes) {
                $data['undo_json'] = json_encode(array('zettle_taxes' => $zettle_taxes));
            }
            if (!$isExist && $active) {
                $this->innerHookUpdateProduct($data, IzettleTask::IMAGE_ACTION);
                $this->innerHookUpdateProduct($data, IzettleTask::IMPORT_ACTION);
                if (isset($diff['id_inventory_sync_policy']) && $diff['id_inventory_sync_policy'] > 0) {
                    $this->innerHookUpdateProduct($data, IzettleTask::STOCK_IMPORT_ACTION);
                }
            } elseif ($isExist && !$active) {
                $product = new Product($id_product);
                $data['desc'] = $product->name[$id_lang];
                $this->innerHookUpdateProduct($data, IzettleTask::STOCK_STOP_ACTION);
                $this->innerHookUpdateProduct($data, IzettleTask::DELETE_ACTION);
            } else {
                $need_sync = true;
                if (isset($diff['id_inventory_sync_policy'])
                    && $diff['id_inventory_sync_policy'] == IzettleConfiguration::INVENTORY_BOTH_POLICY) {
                    $this->innerHookUpdateProduct($data, IzettleTask::STOCK_IMPORT_ACTION);
                }

                if (isset($diff['id_inventory_sync_policy'])
                    && $diff['id_inventory_sync_policy'] == IzettleConfiguration::INVENTORY_DISABLE_POLICY) {
                    $this->innerHookUpdateProduct($data, IzettleTask::STOCK_STOP_ACTION);
                    $need_sync = false;
                }

                if (isset($diff['use_price']) && !$diff['use_price']) {
                    $data['desc'] = IZETTLECONNECTOR_DISABLE_PRICE;
                }

                if ($need_sync) {
                    //STOCK_SYNC_ACTION after STOCK_IMPORT_ACTION to prevent disable/enable issue
                    $this->innerHookUpdateProduct($data, IzettleTask::STOCK_SYNC_ACTION);
                }

                $this->innerHookUpdateProduct($data, IzettleTask::UPDATE_ACTION);
            }

            $this->queueSyncIfNeeded();
        }

        return $isSaved;
    }

    public function hookActionUpdateQuantity($params)
    {
        if (!self::$enable_update_hook) {
            return;
        }
        $this->innerHookUpdateProduct($params, IzettleTask::STOCK_SYNC_ACTION);
    }

    public function hookActionObjectProductAddAfter($params)
    {
        $product = $params['object'];
        $newConfig = array(
            'id_product'               => $product->id,
            'id_lang'                  => (int) Configuration::get('PS_LANG_DEFAULT'),
            'id_inventory_sync_policy' => IzettleConfiguration::INVENTORY_BOTH_POLICY,
            'active'                   => false,
            'custom_name'              => '',
            'custom_barcode'           => '',
            'use_price'                => true,
        );

        $newConfig['date_add'] = date('Y-m-d H:i:s');
        $newConfig['date_upd'] = date('Y-m-d H:i:s');
        Db::getInstance()->insert(
            'izettle_configuration',
            array($newConfig),
            false,
            true,
            Db::REPLACE
        );
    }

    public function hookActionProductUpdate($params)
    {
        if (!self::$enable_update_hook) {
            return;
        }
        $id_product = $params['id_product'];

        $config = $this->getConfigAsArray($id_product);

        if ($config) {
            $config = new IzettleConfiguration($id_product);
            $product = $params['product'];//new Product($id_product, true);
            $active = $product->active ? 1 : 0;
            $config_active = $config->active ? 1 : 0;

            if ($config_active != $active) {
                $this->bindWithIzettle(
                    $id_product,
                    $active,
                    $config->use_price,
                    $config->use_wholesale_price,
                    $config->id_inventory_sync_policy,
                    $config->id_lang,
                    $config->custom_name,
                    $config->custom_barcode
                );
            } else {
                $this->innerHookUpdateProduct($params, IzettleTask::UPDATE_ACTION);
            }
        }
    }

    public function hookActionProductDelete($params)
    {
        $product = $params['product'];
        $id_lang_default = (int) Configuration::get('PS_LANG_DEFAULT');
        $params['desc'] = $product->name[$id_lang_default];
        $this->innerHookUpdateProduct($params, IzettleTask::DELETE_ACTION);
    }

    public function hookActionObjectSpecificPriceAddAfter($params)
    {
        $this->innerHookSpecificPrice($params, IzettleTask::UPDATE_ACTION);
    }

    public function hookActionObjectSpecificPriceUpdateAfter($params)
    {
        $this->innerHookSpecificPrice($params, IzettleTask::UPDATE_ACTION);
    }

    public function hookActionObjectSpecificPriceDeleteAfter($params)
    {
        $this->innerHookSpecificPrice($params, IzettleTask::UPDATE_ACTION);
    }

    public function innerHookSpecificPrice($params)
    {
        $specificPrice = $params['object'];
        if ($specificPrice instanceof SpecificPrice) {
            $data =
                array(
                    'id_product' => $specificPrice->id_product
                );
            $this->innerHookUpdateProduct($data, IzettleTask::UPDATE_ACTION);
        }
    }

    public function hookActionObjectImageAddAfter($params)
    {
        $this->innerHookImage($params, IzettleTask::IMAGE_ACTION);
        $this->innerHookImage($params, IzettleTask::UPDATE_ACTION);
    }

    public function hookActionObjectImageUpdateAfter($params)
    {
        $this->innerHookImage($params, IzettleTask::IMAGE_ACTION);
        $this->innerHookImage($params, IzettleTask::UPDATE_ACTION);
    }

    public function hookActionObjectImageDeleteAfter($params)
    {
        $this->innerHookImage($params, IzettleTask::UPDATE_ACTION);
    }

    public function innerHookImage($params, $type)
    {
        $image = $params['object'];
        if ($image instanceof Image) {
            $data =
                array(
                    'id_product' => $image->id_product
                );
            $this->innerHookUpdateProduct($data, $type);
        }
    }

    public function innerHookUpdateProduct($params, $type)
    {
        $id_product = $params['id_product'];
        $canBeProcessed =
            $type == IzettleTask::IMPORT_ACTION
            || $type == IzettleTask::IMAGE_ACTION
            || $type == IzettleTask::STOCK_IMPORT_ACTION
            || $this->isProductExportedToIzettle($id_product);

        if ($canBeProcessed) {
            $config = new IzettleConfiguration($id_product);

            if ($config->active || $type == IzettleTask::DELETE_ACTION || $type == IzettleTask::IMPORT_ACTION) {
                $task = TaskManager::getActualTask($type);
                $contains = false;
                foreach ($task->getProductList() as $item) {
                    if ($id_product == $item['id_product']) {
                        $contains = true;
                        break;
                    }
                }

                if (!$contains) {
                    if ($type == IzettleTask::DELETE_ACTION) {
                        //todo prevent deleting STOCK_STOP_ACTION
                        Db::getInstance()->execute(
                            'DELETE FROM `'._DB_PREFIX_.'izettle_task_product`
				             WHERE id_product = '.(int) $id_product
                        );
                        $readyTasks = TaskManager::getReadyTasks();
                        foreach ($readyTasks as $task) {
                            if (count($task->getProductList()) == 0) {
                                $task->delete();
                            }
                        }

                        $config->active = false;
                        $config->save();
                    }

                    TaskManager::addItemsToActualTask(
                        array($params),
                        $type
                    );
                }

                $this->queueSyncIfNeeded();
            }
        }
    }

    public function hookDisplayAdminProductsExtra($params)
    {
        if (!$params['id_product']) {
            $id_product = Tools::getValue('id_product');
        } else {
            $id_product = $params['id_product'];
        }

        $bulk_mode = false;
        $uri = '';
        $post = array();

        if (is_array($params) && isset($params['bulk_mode']) && $params['bulk_mode']) {
            $bulk_mode = true;
            $uri = $params['REQUEST_URI'];
            $post = $params['POST'];
        }


        $id_config = $id_product;
        $config = Db::getInstance()->getRow(
            'SELECT *
             FROM '._DB_PREFIX_.'izettle_configuration
             WHERE id_product = '. (int) $id_product
        );

        $isExist =
            Db::getInstance()->getValue(
                'SELECT id_product
                 FROM '._DB_PREFIX_.'izettle_product
                 WHERE id_product = '. (int) $id_product
            );
        if ($config['active'] && !$isExist) {
            $data = array('id_product' => $id_product);
            $this->innerHookUpdateProduct($data, IzettleTask::IMAGE_ACTION);
            $this->innerHookUpdateProduct($data, IzettleTask::IMPORT_ACTION);
            if ($config['id_inventory_sync_policy'] > 0) {
                $this->innerHookUpdateProduct($data, IzettleTask::STOCK_IMPORT_ACTION);
            }
            $this->queueSyncIfNeeded();
        }

        if (!$config) {
            $id_config = false;
        }

        $default_lang = $id_config ? $config['id_lang'] : (int) Configuration::get('PS_LANG_DEFAULT');

        $tpl = _PS_MODULE_DIR_.$this->name.'/views/templates/admin/settings.tpl';

        $show_tax = Tools::strtolower(Configuration::get(IZETTLECONNECTOR_TAX_TYPE)) === 'sales_tax';

        $this->context->smarty->assign(
            array(
                'id_product'   => $id_product,
                'id_config'    => $id_config,
                'bulk_mode'    => $bulk_mode,
                'show_tax'     => $show_tax,
                'REQUEST_URI'  => $uri,
                'POST'         => $post,
                'config'       => $config,
                'langs'        => LanguageCore::getLanguages(),
                'default_lang' => $default_lang,
                'save_link'    => $this->context->link->getAdminLink('AdminIzettleConnectorSettings'),
                'sync_link'    => $this->context->link->getAdminLink('AdminIzettleConnectorSync'),
                'tax_link'    => $this->context->link->getAdminLink('AdminIzettleConnectorRoot'),
                'is_immediately_sync' => Configuration::get(IZETTLECONNECTOR_SYNC) == IZETTLECONNECTOR_SYNC_NOW
            )
        );
        return $this->context->smarty->fetch($tpl);
    }

    public function getContent()
    {
        Tools::redirectAdmin($this->context->link->getAdminLink('AdminIzettleConnectorSettings'));
    }


    public function getIzettleClient()
    {
        $client_id = IZETTLECONNECTOR_DEFAULT_CLIENT_ID;
        $secret = IZETTLECONNECTOR_DEFAULT_CLIENT_SECRET;
        $use_api_key = Configuration::get(IZETTLECONNECTOR_MODE) == IZETTLECONNECTOR_MODE_SECRET;
        $is_connected = $this->isIzettleConnected();
        if ($use_api_key) {
            //$client_id = Configuration::get(IZETTLECONNECTOR_CLIENT_ID);
            //since 17.06.2020 API key integration uses partner client_id
            $secret = Configuration::get(IZETTLECONNECTOR_API_KEY);
            if (!IzettleHelper::validateApiKey($secret)) {
                $cipher = new IzettleApi\Utils\Cipher(_COOKIE_KEY_);
                $secret = $cipher->decrypt($secret);
            }
        }
        $logPath = _PS_MODULE_DIR_.$this->name.DIRECTORY_SEPARATOR."var".DIRECTORY_SEPARATOR."izettle.log";
        $client = new IzettleApi\IzettleClient($client_id, $secret, $logPath);
        $client->setCachePath(_PS_MODULE_DIR_.$this->name.DIRECTORY_SEPARATOR."var".DIRECTORY_SEPARATOR."auth.cache");

        if ($use_api_key) {
            $client->setMode(IzettleApi\IzettleClient::MODE_API_KEY);
        } else {
            if ($is_connected) {
                //todo check is RefreshToken empty, if yes get new code on the fly (get request)
                $client->setRefreshToken($this->getStoredRefreshToken());
            }
            $client->setRefreshTokenStore($this);
        }

        return $client;
    }

    public function getIzettleAccountClient()
    {
        return IzettleApi\IzettleClientFactory::getAccountClient($this->getIzettleClient());
    }

    public function getIzettleImageClient()
    {
        return IzettleApi\IzettleClientFactory::getImageClient(
            $this->getIzettleClient(),
            Configuration::get(IZETTLECONNECTOR_USER_UUID)
        );
    }

    public function getIzettleProductClient()
    {
        return IzettleApi\IzettleClientFactory::getProductClient(
            $this->getIzettleClient(),
            Configuration::get(IZETTLECONNECTOR_USER_UUID)
        );
    }

    public function getIzettlePurchaseClient()
    {
        return IzettleApi\IzettleClientFactory::getPurchaseClient(
            $this->getIzettleClient()
        );
    }

    public function getIzettleInventoryClient()
    {
        return IzettleApi\IzettleClientFactory::getInventoryClient(
            $this->getIzettleClient(),
            Configuration::get(IZETTLECONNECTOR_USER_UUID)
        );
    }

    public function getIzettleWebhookClient()
    {
        return IzettleApi\IzettleClientFactory::getWebhookClient(
            $this->getIzettleClient(),
            Configuration::get(IZETTLECONNECTOR_USER_UUID)
        );
    }

    public function setIzettleAccountInfo($data = null)
    {
        if (empty($data)) {
            try {
                $account_client = $this->getIzettleAccountClient();
                $data = $account_client->getMerchantAccountInformation();
            } catch (Exception $e) {
                return false;
            }
        }

        try {
            Configuration::updateValue(
                IZETTLECONNECTOR_USER_UUID,
                $data->getUuid()
            );
            Configuration::updateValue(
                IZETTLECONNECTOR_USER_NAME,
                $data->getReceiptName()
            );
            Configuration::updateValue(
                IZETTLECONNECTOR_USER_EMAIL,
                $data->getContactEmail()
            );
            Configuration::updateValue(
                IZETTLECONNECTOR_TAX_TYPE,
                $data->getTaxationType()
            );

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function clearIzettleAccountInfo()
    {
        Configuration::updateValue(
            IZETTLECONNECTOR_USER_UUID,
            ''
        );
        Configuration::updateValue(
            IZETTLECONNECTOR_USER_NAME,
            ''
        );
        Configuration::updateValue(
            IZETTLECONNECTOR_USER_EMAIL,
            ''
        );
    }

    public function isIzettleConnected($api_test = false)
    {
        if ($api_test) {
            return false;
        }
        return Configuration::get(IZETTLECONNECTOR_STATUS) == IZETTLECONNECTOR_CONNECTED;
    }

    public function setIzettleConnected($is_connected)
    {
        Configuration::updateValue(
            IZETTLECONNECTOR_STATUS,
            $is_connected ? IZETTLECONNECTOR_CONNECTED : IZETTLECONNECTOR_DISCONNECTED
        );
    }


    public function refreshTokenChanged($newRefreshToken)
    {
        Configuration::updateValue(
            IZETTLECONNECTOR_REFRESH_TOKEN,
            $newRefreshToken
        );
    }

    public function getStoredRefreshToken()
    {
        return Configuration::get(IZETTLECONNECTOR_REFRESH_TOKEN);
    }

    public function getStateWidget()
    {
        $tpl = _PS_MODULE_DIR_.$this->name.'/views/templates/admin/state.tpl';

        $smartyVar = array(
            'is_connected'   => $this->isIzettleConnected(),
            'disconnect_url' => $this->context->link->getAdminLink('AdminIzettleConnectorRoot')."&disconnect=1"
        );


        $this->context->smarty->assign(
            $smartyVar
        );
        return $this->context->smarty->fetch($tpl);
    }

    public function getConnectorWidget($show_import = true)
    {
        $name = Configuration::get(IZETTLECONNECTOR_USER_NAME).' ('.Configuration::get(IZETTLECONNECTOR_USER_EMAIL).')';

        $tpl = _PS_MODULE_DIR_.$this->name.'/views/templates/admin/connector.tpl';

        $is_mac = strpos(Tools::strtolower($_SERVER['HTTP_USER_AGENT']), 'mac') > -1;

        $help_url = self::$help_urls['en'];
        $iso = Tools::strtolower($this->context->language->iso_code);
        if (isset(self::$help_urls[$iso])) {
            $help_url = self::$help_urls[$iso];
        }

        $smartyVar = array(
            'logo'           => '/modules/'.$this->name.'/views/img/logo.png',
            'is_mac'         => $is_mac,
            'help_url'         => $help_url,
            'is_connected'   => $this->isIzettleConnected(),
            'connect_url'    => $this->context->link->getAdminLink('AdminIzettleConnectorSettings')."#api",
            'display_name'   => $name,
            'disconnect_url' => $this->context->link->getAdminLink('AdminIzettleConnectorRoot')."&disconnect=1"
        );

        if (TaskManager::getReadyTasks()) {
            $import_url = $show_import ? $this->context->link->getAdminLink('AdminIzettleConnectorSync') : false;
            $smartyVar['sync_url'] = $import_url;
        } else {
            $import_url = $show_import ? $this->context->link->getAdminLink('AdminIzettleConnectorRoot') : false;
            $smartyVar['import_url'] = $import_url;
        }

        $this->context->smarty->assign(
            $smartyVar
        );
        return $this->context->smarty->fetch($tpl);
    }

    public function getAdminTopMenu()
    {
        $tabs = [];
        foreach (self::$tab_names as $tab) {
            if ($tab['controller'] != 'AdminIzettleConnectorSync'
                || Configuration::get(IZETTLECONNECTOR_SYNC) != IZETTLECONNECTOR_SYNC_NOW
            ) {
                $tabs[] = array(
                    'link' => $this->context->link->getAdminLink($tab['controller']),
                    'title' => $this->l($tab['title']),
                    'active' => strpos($_SERVER['QUERY_STRING'], $tab['controller']) > -1,
                    'controller' => $tab['controller']
                );
            }
        }

        $is_partial_sync = false;
        $is_partial_sync_valid = false;
        $base_url = $this->context->link->getAdminLink('AdminIzettleConnectorRoot');
        $partial_sync_link = $base_url."&partialSyncContinue=1";
        $partial_sync_close = $partial_sync_link."&close=1";

        $last_sync_time = false;

        if (strpos($_SERVER['QUERY_STRING'], 'AdminIzettleConnectorRoot') === false) {
            $partial_sync_id = Configuration::get(IZETTLECONNECTOR_PARTIAL_SYNC);
            if ($partial_sync_id) {
                $partial_sync = new IzettlePartialSync($partial_sync_id);
                if ($partial_sync->active) {
                    //$is_partial_sync = true;
                    $is_partial_sync_valid = IzettleHelper::isPartialSyncReady($partial_sync);
                    $last_sync_time = $partial_sync->last_sync_date;
                }
            }
        }

        $zettle_tpl_dir = _PS_MODULE_DIR_.$this->name.'/views/templates/admin';

        $this->context->smarty->assign(
            array(
                'urls' => $tabs,
                'onboard_link' => $this->context->link->getAdminLink('AdminIzettleConnectorOnBoarding'),
                'is_partial_sync' => $is_partial_sync,
                'is_partial_sync_valid' => $is_partial_sync_valid,
                'partial_sync_link' => $partial_sync_link,
                'partial_sync_close' => $partial_sync_close,
                'zettle_tpl_dir' => $zettle_tpl_dir,
                'last_sync_time' => $last_sync_time
            )
        );
        $tpl = _PS_MODULE_DIR_.$this->name.'/views/templates/admin/top_menu.tpl';
        return $this->context->smarty->fetch($tpl);
    }

    public static function enableUpdateHook()
    {
        self::$enable_update_hook = true;
    }

    public static function disableUpdateHook()
    {
        self::$enable_update_hook = false;
    }


    protected static $is_sync_pushed_to_queue = false;
    public function queueSyncIfNeeded($force = false)
    {
        try {
            if ((Configuration::get(IZETTLECONNECTOR_SYNC) == IZETTLECONNECTOR_SYNC_NOW || $force)
                && !self::$is_sync_pushed_to_queue
            ) {
                $cron_link_async =
                    $this->context->link->getModuleLink(
                        $this->name,
                        //'cronasync',
                        'cron',
                        array(
                            'token' => Configuration::get(IZETTLECONNECTOR_CRON_CODE)
                        ),
                        true
                    );

                register_shutdown_function(array($this, 'asyncSynchronization'), $cron_link_async);
                self::$is_sync_pushed_to_queue = true;
            }
        } catch (Exception $ignored) {
        }
    }

    public function asyncSynchronization($cron_link_async)
    {
        $start = microtime(true);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $cron_link_async);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
        $info = curl_version();
        $curl_version = $info["version"];
        if (version_compare($curl_version, '7.16.2', '>=')) {
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 160);
            curl_setopt($ch, CURLOPT_TIMEOUT_MS, 160);
        } else {
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 1);
            $this->logger->warning("CURL version is out of date (required at least 7.16.2, current $curl_version) ");
        }

        curl_exec($ch);
        curl_close($ch);

        $diff = (microtime(true) - $start);
        $this->logger->debug("Init Sync elapsed time: $diff sec, curl version $curl_version");
    }
}
