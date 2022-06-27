<?php
/**
 * 2007-2022 ETS-Soft
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 web site only.
 * If you want to use this file on more web sites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 * @author ETS-Soft <etssoft.jsc@gmail.com>
 * @copyright  2007-2022 ETS-Soft
 * @license    Valid for 1 web site (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once dirname(__FILE__) . '/classes/EtsSCCertification.php';

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

class Ets_securitycertification extends Module implements WidgetInterface
{
    protected $config_form = false;
    public $templateFile;

    public function __construct()
    {
        $this->name = 'ets_securitycertification';
        $this->tab = 'front_office_features';
        $this->version = '1.0.2';
        $this->author = 'ETS-Soft';
        $this->need_instance = 1;

        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Security Certification');
        $this->description = $this->l('Post safety/security certificate images on the website. Let the visitors know your site is safe and reliable.');
$this->refs = 'https://prestahero.com/';

        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);

        $this->templateFile = 'module:' . $this->name . '/views/templates/hook/certification.tpl';
    }

    public function install()
    {
        include(dirname(__FILE__) . '/sql/install.php');
        return parent::install() &&
            $this->registerHook('displayBackOfficeHeader') &&
            $this->registerHook('displayHeader') &&
            $this->registerHook('displayNav1') &&
            $this->registerHook('displayBanner') &&
            $this->registerHook('displayFooter') &&
            $this->registerHook('displayFooterAfter') &&
            $this->installConfigs();
    }

    public function uninstall()
    {
        include(dirname(__FILE__) . '/sql/uninstall.php');
        $this->cleanUploadImages();

        return parent::uninstall() && $this->uninstallConfigs();
    }

    const _ETS_IMG_DIR_ = ['uploads'];

    public function cleanUploadImages()
    {
        if (self::_ETS_IMG_DIR_) {
            foreach (self::_ETS_IMG_DIR_ as $dir) {
                $this->removeTree(_PS_IMG_DIR_ . $this->name . DIRECTORY_SEPARATOR . $dir);
            }
        }

        return true;
    }

    public function removeTree($dir)
    {
        if (@is_dir($dir)) {
            $files = array_diff(scandir($dir), array('.', '..'));
            foreach ($files as $file) {
                (is_dir(($each = $dir . DIRECTORY_SEPARATOR . $file))) ? $this->removeTree($each) : @unlink($each);
            }
            @rmdir($dir);
        }

        return true;
    }

    public function installConfigs()
    {
        if ($configs = $this->getConfigs()) {
            $languages = Language::getLanguages(false);
            foreach ($configs as $key => $config) {
                if (!isset($config['default']))
                    continue;
                if (isset($config['lang']) && $config['lang']) {
                    $values = [];
                    if ($languages) {
                        foreach ($languages as $l) {
                            $values[$l['id_lang']] = $config['default'];
                        }
                    }
                    Configuration::updateValue($key, $values, true);
                } else
                    Configuration::updateValue($key, $config['default'], true);
            }
        }

        return true;
    }

    public function uninstallConfigs()
    {
        if ($configs = $this->getConfigs()) {
            foreach ($configs as $key => $config) {
                Configuration::deleteByName($key);
                unset($config);
            }
        }

        return true;
    }

    static $cache_configs;

    public function getConfigs()
    {
        if (!self::$cache_configs) {

            $switch_values = array(
                array(
                    'id' => 'active_on',
                    'value' => true,
                    'label' => $this->l('Enabled')
                ),
                array(
                    'id' => 'active_off',
                    'value' => false,
                    'label' => $this->l('Disabled')
                )
            );

            $columns_width = [];
            for ($ik = 1; $ik <= 12; $ik++) {
                $columns_width[] = [
                    'id_column_width' => $ik,
                    'name' => $ik,
                ];
            }

            self::$cache_configs = [
                'ETS_SC_ENABLED' => array(
                    'label' => $this->l('Enabled'),
                    'name' => 'ETS_SC_ENABLED',
                    'type' => 'switch',
                    'is_bool' => true,
                    'values' => $switch_values,
                    'default' => 1,
                ),
                'ETS_SC_TITLE' => array(
                    'label' => $this->l('Block title'),
                    'name' => 'ETS_SC_TITLE',
                    'type' => 'text',
                    'lang' => true,
                    'validate' => 'isCleanHtml',
                    'default' => $this->l('Security certification')
                ),
                'ETS_SC_POSITION' => array(
                    'label' => $this->l('Display position'),
                    'name' => 'ETS_SC_POSITION',
                    'type' => 'radio',
                    'values' => [
                        [
                            'id' => 'position_banner',
                            'label' => $this->l('On top of web page'),
                            'value' => 'displayBanner'
                        ],
                        [
                            'id' => 'position_nav1',
                            'label' => $this->l('On the top navigation bar'),
                            'value' => 'displayNav1'
                        ],
                        [
                            'id' => 'position_footer',
                            'label' => $this->l('On the footer section'),
                            'value' => 'displayFooter'
                        ],
                        [
                            'id' => 'position_footer_after',
                            'label' => $this->l('On the bottom of footer section'),
                            'value' => 'displayFooterAfter'
                        ],
                    ],
                    'required' => true,
                    'default' => 'displayFooterAfter'
                ),
                'ETS_SC_COLUMN_WIDTH' => [
                    'label' => $this->l('Column width'),
                    'name' => 'ETS_SC_COLUMN_WIDTH',
                    'type' => 'select',
                    'desc' => $this->l('Specify the widths (and the number) of columns in a grid layout. For example: if you want to display 3 columns for 3 certifications, then create select column width value as 4/12.'),
                    'options' => array(
                        'query' => $columns_width,
                        'id' => 'id_column_width',
                        'name' => 'name',
                    ),
                    'default' => 12,
                    'validate' => 'isUnsignedInt',
                ],
                'ETS_SC_MAX_WIDTH' => array(
                    'label' => $this->l('Max width'),
                    'name' => 'ETS_SC_MAX_WIDTH',
                    'type' => 'text',
                    'col' => 3,
                    'suffix' => $this->l('px'),
                    'validate' => 'isUnsignedInt',
                ),
                'ETS_SC_MAX_HEIGHT' => array(
                    'label' => $this->l('Max height'),
                    'name' => 'ETS_SC_MAX_HEIGHT',
                    'type' => 'text',
                    'suffix' => $this->l('px'),
                    'col' => 3,
                    'validate' => 'isUnsignedInt',
                ),
                'ETS_SC_HIDE_ON_MOBILE' => array(
                    'label' => $this->l('Hide on mobile'),
                    'name' => 'ETS_SC_HIDE_ON_MOBILE',
                    'type' => 'switch',
                    'is_bool' => true,
                    'values' => $switch_values,
                    'default' => 0,
                ),
            ];
        }

        return self::$cache_configs;
    }

    public function getAssignConfigs(&$assign)
    {
        if ($configs = $this->getConfigs()) {
            foreach ($configs as $key => $config) {
                if (isset($config['lang']) && $config['lang'])
                    $assign[$key] = Configuration::get($key, $this->context->language->id);
                else
                    $assign[$key] = Configuration::get($key);
            }
        }
        return $assign;
    }

    public function getContent()
    {
        $this->postProcess();
        $this->setMedia();

        return $this->renderForm() . $this->displayIframe();
    }

    public function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'saveConfig';
        $helper->currentIndex = $this->currentIndex(0, false);
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues($helper->submit_action),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm())) . $this->renderList();
    }

    public function renderList()
    {
        $images = EtsSCCertification::getImages(0, $this->context);
        if ($images) {
            foreach ($images as &$image)
                $this->propertiesImage($image, true);
        }

        $this->smarty->assign([
            'action' => $this->currentIndex() . '&post_image',
            'images' => $images,
            'PS_ATTACHMENT_MAXIMUM_SIZE' => self::formatBytes(self::getPostMaxSizeBytes()),
        ]);

        Media::addJsDef([
            'ets_sc_confirm_deleted' => $this->l('Do you want to delete this item?')
        ]);

        return $this->display(__FILE__, 'admin-list-images.tpl');
    }

    public function renderListItem($id_ets_sc_certification)
    {
        if (!$id_ets_sc_certification || !Validate::isUnsignedInt($id_ets_sc_certification))
            return '';
        $image = EtsSCCertification::getImages($id_ets_sc_certification, $this->context);
        if ($image) {
            $this->propertiesImage($image, true);
            $this->smarty->assign([
                'action' => $this->currentIndex() . '&post_image',
                'image' => $image,
            ]);
            return $this->display(__FILE__, 'admin-post-form.tpl');
        }
    }

    public function propertiesImage(&$image, $has_delete_link = false)
    {
        if (is_array($image)) {
            $image['image_url'] = $this->context->link->getMediaLink(_PS_IMG_ . $this->name . '/uploads/' . $image['image']);
            $image['image'] = _PS_IMG_ . $this->name . '/uploads/' . $image['image'];
            if ($has_delete_link)
                $image['delete_url'] = $this->currentIndex() . '&delete_image&id_ets_sc_certification=' . $image['id_ets_sc_certification'];
        }

        return $image;
    }

    public function currentIndex($conf = 0, $token = true)
    {
        return $this->context->link->getAdminLink('AdminModules', $token) . ($conf > 0 ? '&conf=' . $conf : '') . '&configure=' . $this->name;
    }

    public function getConfigForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs',
                ),
                'input' => $this->getConfigs(),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    public function getConfigFormValues($submit)
    {
        $configs = $this->getConfigs();
        $fields = [];
        $languages = Language::getLanguages(false);
        if (Tools::isSubmit($submit)) {
            if ($configs) {
                foreach ($configs as $key => $config) {
                    if (isset($config['lang']) && $config['lang']) {
                        if ($languages)
                            foreach ($languages as $l)
                                $fields[$key][$l['id_lang']] = Tools::getValue($key . '_' . $l['id_lang']);
                    } elseif (isset($config['type']) && $config['type'] == 'switch') {
                        $fields[$key] = Tools::getValue($key) ? 1 : 0;
                    } else
                        $fields[$key] = Tools::getValue($key);
                }
            }
        } else {
            if ($configs) {
                foreach ($configs as $key => $config) {
                    if (isset($config['lang']) && $config['lang']) {
                        if ($languages)
                            foreach ($languages as $l)
                                $fields[$key][$l['id_lang']] = Configuration::get($key, $l['id_lang']);
                    } else
                        $fields[$key] = Configuration::get($key);
                }
            }
        }

        return $fields;
    }

    public function postProcess()
    {
        if (Tools::getValue('edit_image'))
            $this->editImage();
        if (Tools::isSubmit('delete_image'))
            $this->deleteImage();
        if (Tools::isSubmit('post_image'))
            $this->postImage();
        if (Tools::isSubmit('saveConfig'))
            $this->postConfig();
    }

    public function editImage()
    {
        $id = Tools::getValue('id');
        $image = EtsSCCertification::getImages($id, $this->context);
        if (!isset($image['id_ets_sc_certification']) || (int)$image['id_ets_sc_certification'] <= 0) {
            $this->_errors[] = $this->l('Image does not exist');
        } else
            $this->propertiesImage($image);
        $has_error = count($this->_errors) > 0;
        die(json_encode([
            'errors' => $has_error ? implode(PHP_EOL, $this->_errors) : false,
            'image' => $image,
        ]));
    }

    public function deleteImage()
    {
        $id = (int)Tools::getValue('id_ets_sc_certification');
        $cef = new EtsSCCertification($id);
        $image = $cef->id && trim($cef->image) !== '' ? _PS_IMG_DIR_ . $this->name . '/uploads/' . $cef->image : '';
        if (!$cef->delete()) {
            $this->_errors[] = $this->l('Deleting failed');
        } elseif (file_exists($image))
            @unlink($image);
        $has_error = count($this->_errors) > 0;
        die(json_encode([
            'errors' => $has_error ? implode(PHP_EOL, $this->_errors) : false,
            'msg' => !$has_error ? sprintf($this->l('#%s image deleted.'), $id) : '',
        ]));
    }

    public function postImage()
    {
        $id = (int)Tools::getValue('id_ets_sc_certification');
        $cef = new EtsSCCertification($id);

        $link = trim(Tools::getValue('link'));
        if ($link !== '' && !Validate::isAbsoluteUrl($link))
            $this->_errors[] = $this->l('Link is invalid');
        elseif (Tools::strlen($link) > EtsSCCertification::DEFAULT_MAX_TITLE)
            $this->_errors[] = sprintf($this->l('The link cannot exceed %s characters'), EtsSCCertification::DEFAULT_MAX_TITLE);
        $title = trim(Tools::getValue('title'));
        if ($title !== '' && !Validate::isCleanHtml($title))
            $this->_errors[] = $this->l('Title is required');
        elseif (Tools::strlen($title) > EtsSCCertification::DEFAULT_MAX_TITLE)
            $this->_errors[] = sprintf($this->l('Title cannot exceed %s characters'), EtsSCCertification::DEFAULT_MAX_TITLE);
        $alt = trim(Tools::getValue('alt'));
        if ($alt !== '' && !Validate::isCleanHtml($alt))
            $this->_errors[] = $this->l('Alt description is required');
        elseif (Tools::strlen($alt) > EtsSCCertification::DEFAULT_MAX_TITLE)
            $this->_errors[] = sprintf($this->l('Alt description cannot exceed %s character'), EtsSCCertification::DEFAULT_MAX_TITLE);

        $files = $this->processUploadImage('image', 'uploads', $this->_errors, true, $this->l('Image'), $cef);
        if (count($this->_errors) < 1) {

            $cef->link = $link;
            $cef->title = $title;
            $cef->alt = $alt;
            $cef->id_shop = $this->context->shop->id;
            $cef->active = 1;

            list($image, $file_dest, $file_name) = !empty($files) ? $files : ['', '', ''];
            $oldImage = $cef->id && trim($cef->image) !== '' ? $file_dest . $cef->image : '';
            if (trim($image) !== '' && file_exists($file_dest . $image))
                $cef->image = $image;

            if (!$cef->save()) {
                if (trim($image) !== '' && !@file_exists($file_name))
                    @unlink($file_name);
                $this->_errors[] = sprintf($this->l('Saving failed'));
            } elseif (trim($image) !== '' && @file_exists($oldImage)) {
                @unlink($oldImage);
            }
        }
        $has_error = count($this->_errors) > 0;
        die(json_encode([
            'errors' => $has_error ? implode(PHP_EOL, $this->_errors) : false,
            'image' => !$has_error ? $this->renderListItem($cef->id) : '',
            'msg' => !$has_error ? ($id > 0 ? $this->l('Saved') : $this->l('Add certification successfully')) : '',
            'id' => $cef->id,
        ]));
    }

    public function postConfig()
    {
        $configs = $this->getConfigs();
        $id_default_lang = Configuration::get('PS_LANG_DEFAULT');
        if ($configs) {
            foreach ($configs as $key => $config) {
                if (isset($config['lang']) && $config['lang']) {
                    if (isset($config['required']) && $config['required'] && trim(Tools::getValue($key . '_' . $id_default_lang)) == '')
                        $this->_errors[] = $config['label'] . ' ' . $this->l('is required');
                } else {
                    $field_value = Tools::getValue($key);
                    if (isset($config['required']) && $config['required'] && !is_array($field_value) && trim($field_value) == '') {
                        $this->_errors[] = $config['label'] . ' ' . $this->l('is required');
                    } elseif (isset($config['validate']) && $config['validate'] && $field_value) {
                        $validate = trim($config['validate']);
                        if (method_exists('Validate', $validate) && !Validate::$validate($field_value))
                            $this->_errors[] = $config['label'] . ' ' . $this->l('is invalid');
                    }
                }
            }
            if (count($this->_errors) < 1) {
                $languages = Language::getLanguages(false);
                foreach ($configs as $key => $config) {
                    if (isset($config['lang']) && $config['lang']) {
                        $values = [];
                        if ($languages) {
                            foreach ($languages as $l)
                                $values[$l['id_lang']] = Tools::getValue($key . '_' . $l['id_lang']);
                        }
                        Configuration::updateValue($key, $values, true);
                    } elseif (isset($config['type']) && $config['type'] == 'switch') {
                        Configuration::updateValue($key, Tools::getValue($key) ? 1 : 0);
                    } else
                        Configuration::updateValue($key, Tools::getValue($key));
                }
            }
        } else
            $this->_errors[] = $this->l('Unknown error.');

        if (count($this->_errors) < 1)
            Tools::redirect($this->currentIndex(4));

        $this->context->controller->errors = $this->_errors;
    }

    public static function formatFileName($file_name)
    {
        return preg_match('/[\_\(\)\s\%\+]+/', '-', $file_name);
    }

    public static function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    public static function getServerVars($var)
    {
        return isset($_SERVER[$var]) ? $_SERVER[$var] : '';
    }

    public static function getPostMaxSizeBytes()
    {
        $postMaxSizeList = array(@ini_get('post_max_size'), @ini_get('upload_max_filesize'), (int)Configuration::get('PS_ATTACHMENT_MAXIMUM_SIZE') . 'M');
        $ik = 0;
        foreach ($postMaxSizeList as &$max_size) {
            $bytes = (int)trim($max_size);
            $last = Tools::strtolower($max_size[Tools::strlen($max_size) - 1]);
            switch ($last) {
                case 'g':
                    $bytes *= 1024;
                case 'm':
                    $bytes *= 1024;
                case 'k':
                    $bytes *= 1024;
            }
            if ($bytes == '') {
                unset($postMaxSizeList[$ik]);
            } else
                $max_size = $bytes;
            $ik++;
        }

        return min($postMaxSizeList);
    }

    public function checkUploadError($error_code, $file_name)
    {
        switch ($error_code) {
            case 1:
                return sprintf($this->l('File "%1s" uploaded exceeds %2s'), $file_name, ini_get('upload_max_filesize'));
            case 2:
                return sprintf($this->l('The uploaded file exceeds %s'), ini_get('post_max_size'));
            case 3:
                return sprintf($this->l('Uploaded file "%s" was only partially uploaded'), $file_name);
            case 6:
                return $this->l('Missing temporary folder');
            case 7:
                return sprintf($this->l('Failed to write file "%s" to disk'), $file_name);
            case 8:
                return sprintf($this->l('A PHP extension stopped the file "%s" to upload'), $file_name);
        }
        return false;
    }

    const DEFAULT_MAX_SIZE = 104857600;

    public function processUploadImage($field, $folder, &$errors, $required = false, $label = null, $object = null)
    {
        if (count($errors) > 0)
            return [];
        $file_dest = _PS_IMG_DIR_ . $this->name . '/' . ($folder !== '' ? $folder : 'uploads') . '/';
        if (!is_dir($file_dest))
            @mkdir($file_dest, 0755, true);
        if (!is_dir($file_dest))
            $errors[] = sprintf($this->l('The directory "%s" does not exist.'), $file_dest);
        $post_content_size = self::getServerVars('CONTENT_LENGTH');
        if (($post_max_size = self::getPostMaxSizeBytes()) && ($post_content_size > $post_max_size)) {
            $errors[] = sprintf($this->l('The uploaded file(s) exceeds the post_max_size directive in php.ini (%s > %s)'), self::formatBytes($post_content_size), self::formatBytes($post_max_size));
        } elseif (!@is_writable($file_dest) && !empty($_FILES[$field]['name'])) {
            $errors[] = sprintf($this->l('The directory "%s" is not writable.'), $file_dest);
        } elseif (isset($_FILES[$field]) && !empty($_FILES[$field]['name'])) {
            if ($uploadError = $this->checkUploadError($_FILES[$field]['error'], $_FILES[$field]['name'])) {
                $errors[] = $uploadError;
            } elseif ($_FILES[$field]['size'] > $post_max_size) {
                $errors[] = sprintf($this->l('File is too large. Maximum size allowed: %sMb'), self::formatBytes($post_max_size));
            } elseif ($_FILES[$field]['size'] > self::DEFAULT_MAX_SIZE) {
                $errors[] = sprintf($this->l('File is too big. Current size is %1s, maximum size is %2s.'), $_FILES[$field]['size'], self::DEFAULT_MAX_SIZE);
            } else {
                $type = Tools::strtolower(Tools::substr(strrchr($_FILES[$field]['name'], '.'), 1));
                if (!in_array($type, array('jpg', 'gif', 'jpeg', 'png'))) {
                    $errors[] = sprintf($this->l('File "%s" type is not allowed'), $_FILES[$field]['name']);
                }
            }
        }
        if ($required && ($object == null || $object->id <= 0) && (isset($_FILES[$field]['name']) && empty($_FILES[$field]['name']))) {
            $errors[] = $label . ' ' . $this->l('is required');
        }
        if (!$errors && !empty($_FILES[$field]['name'])) {
            $salt = Tools::strtolower(Tools::passwdGen(20));
            $type = Tools::strtolower(Tools::substr(strrchr($_FILES[$field]['name'], '.'), 1));
            $image = $salt . '.' . $type;
            $file_name = $file_dest . $image;

            if (@file_exists($file_name)) {
                $errors[] = $this->l('File name already exists. Try to rename the file and upload again');
            } else {
                $image_size = @getimagesize($_FILES[$field]['tmp_name']);
                if (isset($_FILES[$field]) && !empty($_FILES[$field]['tmp_name']) && !empty($image_size) && in_array($type, array('jpg', 'gif', 'jpeg', 'png'))) {
                    if (!($temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS')) || !@move_uploaded_file($_FILES[$field]['tmp_name'], $temp_name)) {
                        $errors[] = $this->l('An error occurred while uploading the image.');
                    } elseif (!ImageManager::resize($temp_name, $file_name, null, null, $type))
                        $errors[] = sprintf($this->l('An error occurred while copying this image: %s'), Tools::stripslashes($image));
                }
                if (isset($temp_name))
                    @unlink($temp_name);
            }
            if (!$errors) {
                return [
                    $image,
                    $file_dest,
                    $file_name
                ];
            }
        }

        return [];
    }

    public function hookDisplayBackOfficeHeader()
    {

    }

    public function setMedia()
    {
        if (Tools::getValue('configure') == $this->name) {
            $this->context->controller->addJS($this->_path . 'views/js/back.js');
            $this->context->controller->addCSS($this->_path . 'views/css/back.css');
        }
    }

    public function hookDisplayHeader()
    {
        $this->context->controller->addJS($this->_path . '/views/js/front.js');
        $this->context->controller->addCSS($this->_path . '/views/css/front.css');
    }

    public function renderWidget($hookName = null, array $configuration = [])
    {
        if ($hookName == null || (int)Configuration::get('ETS_SC_ENABLED') < 1 || trim(Configuration::get('ETS_SC_POSITION')) !== $hookName)
            return '';

        if (!$this->isCached($this->templateFile, $this->getCacheId('certification'))) {
            $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        }

        return $this->fetch($this->templateFile, $this->getCacheId('certification'));
    }

    public function getWidgetVariables($hookName, array $configuration)
    {
        $configuration['positionAt'] = $hookName;
        if ($images = EtsSCCertification::getImages(0, $this->context)) {
            foreach ($images as &$image)
                $this->propertiesImage($image);
        }
        $configuration['images'] = $images;
        $this->getAssignConfigs($configuration);

        return $configuration;
    }

    public function displayIframe()
    {
        switch ($this->context->language->iso_code) {
            case 'en':
                $url = 'https://cdn.prestahero.com/prestahero-product-feed?utm_source=feed_' . $this->name . '&utm_medium=iframe';
                break;
            case 'it':
                $url = 'https://cdn.prestahero.com/it/prestahero-product-feed?utm_source=feed_' . $this->name . '&utm_medium=iframe';
                break;
            case 'fr':
                $url = 'https://cdn.prestahero.com/fr/prestahero-product-feed?utm_source=feed_' . $this->name . '&utm_medium=iframe';
                break;
            case 'es':
                $url = 'https://cdn.prestahero.com/es/prestahero-product-feed?utm_source=feed_' . $this->name . '&utm_medium=iframe';
                break;
            default:
                $url = 'https://cdn.prestahero.com/prestahero-product-feed?utm_source=feed_' . $this->name . '&utm_medium=iframe';
        }
        $this->smarty->assign(
            array(
                'url_iframe' => $url
            )
        );
        return $this->display(__FILE__, 'iframe.tpl');
    }
}
