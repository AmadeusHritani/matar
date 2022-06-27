<?php
/**
 * 2007-2022 ETS-Soft
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 wesite only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 *  @author ETS-Soft <etssoft.jsc@gmail.com>
 *  @copyright  2007-2022 ETS-Soft
 *  @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
*/

if (!defined('_PS_VERSION_'))
	exit;
class Ets_baw_obj extends ObjectModel 
{
    public function renderForm()
    {
        $this->fields = $this->getListFields();
        $helper = new HelperForm();
        $helper->module = Module::getInstanceByName('ets_banneranywhere');
        $configs = $this->fields['configs'];
        $fields_form = array();
        $fields_form['form'] = $this->fields['form'];               
        if($configs)
        {
            foreach($configs as $key => $config)
            {                
                if(isset($config['type']) && in_array($config['type'],array('sort_order')))
                    continue;
                $confFields = array(
                    'name' => $key,
                    'type' => $config['type'],
                    'class'=>isset($config['class'])?$config['class']:'',
                    'label' => $config['label'],
                    'desc' => isset($config['desc']) ? $config['desc'] : false,
                    'required' => isset($config['required']) && $config['required'] ? true : false,
                    'readonly' => isset($config['readonly']) ? $config['readonly'] : false,
                    'autoload_rte' => isset($config['autoload_rte']) && $config['autoload_rte'] ? true : false,
                    'options' => isset($config['options']) && $config['options'] ? $config['options'] : array(),
                    'suffix' => isset($config['suffix']) && $config['suffix'] ? $config['suffix']  : false,
                    'values' => isset($config['values']) ? $config['values'] : false,
                    'lang' => isset($config['lang']) ? $config['lang'] : false,
                    'showRequired' => isset($config['showRequired']) && $config['showRequired'],
                    'hide_delete' => isset($config['hide_delete']) ? $config['hide_delete'] : false,
                    'placeholder' => isset($config['placeholder']) ? $config['placeholder'] : false,
                    'display_img' => $this->id && isset($config['type']) && $config['type']=='file' && $this->$key!='' && @file_exists(_PS_ETS_BAW_IMG_DIR_.$this->$key) ? _PS_ETS_BAW_IMG_.$this->$key : false,
                    'img_del_link' => $this->id && isset($config['type']) && $config['type']=='file' && $this->$key!='' && @file_exists(_PS_ETS_BAW_IMG_DIR_.$this->$key) ? $this->context->link->getAdminBaseLink('AdminModules').'&configure='.$this->module->name.'&deleteimage='.$key.'&itemId='.(isset($this->id)?$this->id:'0').'&obj='.Tools::ucfirst($fields_form['form']['name']) : false,
                    'min' => isset($config['min']) ? $config['min'] : false,
                    'max' => isset($config['max']) ? $config['max'] : false, 
                    'data_suffix' => isset($config['data_suffix']) ? $config['data_suffix'] :'',
                    'data_suffixs' => isset($config['data_suffixs']) ? $config['data_suffixs'] :'',
                    'multiple' => isset($config['multiple']) ? $config['multiple']: false,
                    'tab' => isset($config['tab']) ? $config['tab']:false,
                    'html_content' => isset($config['html_content']) ? $config['html_content']:'',
                    'form_group_class' => isset($config['form_group_class']) ? $config['form_group_class']:'',
                );
                if(isset($config['col']) && $config['col'])
                    $confFields['col'] = $config['col'];
                if(isset($config['tree']) && $config['tree'])
                {
                    $confFields['tree'] = $config['tree'];
                    if(isset($config['tree']['use_checkbox']) && $config['tree']['use_checkbox'])
                        $confFields['tree']['selected_categories'] = explode(',',$this->$key);
                    else
                        $confFields['tree']['selected_categories'] = array($this->$key);
                }                    
                if(!$confFields['suffix'])
                    unset($confFields['suffix']);                
                $fields_form['form']['input'][] = $confFields;
            }
        }        
        $fields_form['form']['input'][] = array(
            'type' => 'hidden',
            'name' => $fields_form['form']['key'],
        );
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$this->fields_form = array();		
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'save_'.$this->fields['form']['name'];
		$helper->currentIndex = '';
		$language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $fields = array();        
        $languages = Language::getLanguages(false);
        $helper->override_folder = '/';        
        if($configs)
        {
            foreach($configs as $key => $config)
            {
                if($config['type']=='checkbox' || (isset($config['multiple']) && $config['multiple']))
                {
                    if(Tools::isSubmit($key))
                        $fields[$key] = Tools::getValue($key);
                    else
                        $fields[$key] = $this->id ? explode(',',$this->$key) : (isset($config['default']) && $config['default'] ? $config['default'] : array());
                }
                elseif(isset($config['lang']) && $config['lang'])
                {                    
                    foreach($languages as $l)
                    {
                        $temp = $this->$key;
                        if(Tools::isSubmit($key.'_'.$l['id_lang']))
                            $fields[$key][$l['id_lang']] = Tools::getValue($key.'_'.$l['id_lang']);
                        else
                            $fields[$key][$l['id_lang']] = $this->id ? $temp[$l['id_lang']] : (isset($config['default']) && $config['default'] ? $config['default'] : null);
                    }
                }
                elseif(isset($config['type']) && $config['type']=='file_lang')
                {
                    foreach($languages as $l)
                    {
                        $temp = $this->$key;
                        $fields[$key][$l['id_lang']] = $this->id ? $temp[$l['id_lang']] : (isset($config['default']) && $config['default'] ? $config['default'] : null);
                    }
                }
                elseif(!isset($config['tree']))
                {
                    if(Tools::isSubmit($key))
                        $fields[$key] = Tools::getValue($key);
                    else
                    {
                        $fields[$key] = $this->id ? $this->$key : (isset($config['default']) && $config['default'] ? $config['default'] : null);
                        if(isset($config['validate']) && ($config['validate']=='isUnsignedFloat' ||  $config['validate']=='isUnsignedInt') && $fields[$key]==0)
                            $fields[$key] =''; 
                        if(isset($config['validate']) && $config['validate']=='isDate' && $fields[$key]=='0000-00-00 00:00:00')
                            $fields[$key] =''; 
                    }
                     
                }    
                                        
            }
        }
        $fields[$fields_form['form']['key']] = $this->id;
        $helper->tpl_vars = array(
			'base_url' => Context::getContext()->shop->getBaseURL(),
			'language' => array(
				'id_lang' => $language->id,
				'iso_code' => $language->iso_code
			),
			'fields_value' => $fields,
			'languages' => Context::getContext()->controller->getLanguages(),
			'id_language' => Context::getContext()->language->id, 
            'key_name' => 'id_'.$fields_form['form']['name'],
            'item_id' => $this->id,  
            'list_item' => true,
            'image_baseurl' => _PS_ETS_BAW_IMG_, 
            'configTabs'=>  isset($this->fields['tabs']) ?  $this->fields['tabs']:false, 
            'name_controller' =>  isset($this->fields['name_controller']) ?  $this->fields['name_controller']:'', 
            'link'=> Context::getContext()->link,           
        );        
        return $helper->generateForm(array($fields_form));	
    }
    public function saveData()
    {
        $this->fields = $this->getListFields();
        $errors = array();
        $success = array();
        $languages = Language::getLanguages(false);
        $id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
        $parent= isset($this->fields['form']['parent'])? $this->fields['form']['parent']:'1';
        $configs = $this->fields['configs'];  
        $files = array();  
        $old_files = array(); 
        if(method_exists($this,'validateCustomField'))
            $this->validateCustomField($errors);  
        if($configs)
        {
            foreach($configs as $key => $config)
            {
                $value_key = Tools::getValue($key);
                if($config['type']=='sort_order' || $config['type']=='html')
                    continue;
                if(isset($config['lang']) && $config['lang'])
                {
                    $key_value_lang_default = trim(Tools::getValue($key.'_'.$id_lang_default));
                    if(isset($config['required']) && $config['required'] && $config['type']!='switch' && $key_value_lang_default == '')
                    {
                        $errors[] = sprintf($this->l('%s is required','ets_baw_obj'),$config['label']);
                    }
                    elseif($key_value_lang_default!='' && !is_array($key_value_lang_default) && isset($config['validate']) && method_exists('Validate',$config['validate']))
                    {
                        $validate = $config['validate'];
                        if(!Validate::$validate(trim($key_value_lang_default)))
                            $errors[] = sprintf($this->l('%s is not valid','ets_baw_obj'),$config['label']);
                        unset($validate);
                    }
                    elseif(!Validate::isCleanHtml($key_value_lang_default))
                        $errors[] = sprintf($this->l('%s is not valid','ets_baw_obj'),$config['label']);
                    else
                    {
                        foreach($languages as $language)
                        {
                            if($language['id_lang']!=$id_lang_default)
                            {
                                $value_lang = trim(Tools::getValue($key.'_'.$language['id_lang']));
                                if($value_lang!='' && !is_array($value_lang) && isset($config['validate']) && method_exists('Validate',$config['validate']))
                                {
                                    $validate = $config['validate'];
                                    if(!Validate::$validate(trim($value_lang)))
                                        $errors[] = sprintf($this->l('%s is not valid in %s','ets_baw_obj'),$config['label'],$language['iso_code']);
                                    unset($validate);
                                }
                                elseif(!Validate::isCleanHtml($value_lang))
                                    $errors[] = sprintf($this->l('%s is not valid in %s','ets_baw_obj'),$config['label'],$language['iso_code']);
                            }
                        }
                    }                    
                }
                elseif($config['type']=='file_lang')
                {
                    $files[$key] = array();
                    foreach($languages as $l)
                    {
                        $name = $key.'_'.$l['id_lang'];
                        if(isset($_FILES[$name]['tmp_name']) && isset($_FILES[$name]['name']) && $_FILES[$name]['name'])
                        {
                            $_FILES[$name]['name'] = str_replace(array(' ','(',')','!','@','#','+'),'_',$_FILES[$name]['name']);
                            $type = Tools::strtolower(Tools::substr(strrchr($_FILES[$name]['name'], '.'), 1));
                            $imageName = @file_exists(_PS_ETS_BAW_IMG_DIR_.Tools::strtolower($_FILES[$name]['name'])) ? Tools::passwdGen().'-'.Tools::strtolower($_FILES[$name]['name']) : Tools::strtolower($_FILES[$name]['name']);
                            $fileName = _PS_ETS_BAW_IMG_DIR_.$imageName;  
                            $max_file_size = Configuration::get('PS_ATTACHMENT_MAXIMUM_SIZE')*1024*1024;
                            if(!Validate::isFileName($_FILES[$name]['name']))
                                $errors[] = sprintf($this->l('%s is not valid','ets_baw_obj'),$config['label']);
                            elseif($_FILES[$name]['size'] > $max_file_size)
                                $errors[] = sprintf($this->l('%s file is too large','ets_baw_obj'),$config['label']);
                            elseif(file_exists($fileName))
                            {
                                $errors[] =sprintf($this->l('%s file already existed','ets_baw_obj'),$config['label']);
                            }
                            else
                            {                                    
                    			$imagesize = @getimagesize($_FILES[$name]['tmp_name']);                                    
                                if (!$errors && isset($_FILES[$name]) &&				
                    				!empty($_FILES[$name]['tmp_name']) &&
                    				!empty($imagesize) &&
                    				in_array($type, array('jpg', 'gif', 'jpeg', 'png'))
                    			)
                    			{
                    				$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');    				
                    				if ($error = ImageManager::validateUpload($_FILES[$name]))
                    					$errors[] = $error;
                    				elseif (!$temp_name || !move_uploaded_file($_FILES[$name]['tmp_name'], $temp_name))
                    					$errors[] = sprintf($this->l('%s cannot upload in %s','ets_baw_obj'),$config['label'],$l['iso_code']);
                    				elseif (!ImageManager::resize($temp_name, $fileName, null, null, $type))
                    					$errors[] = printf($this->l('%s An error occurred during the image upload process in %s','ets_baw_obj'),$config['label'],$l['iso_code']);
                    				if (isset($temp_name))
                    					@unlink($temp_name);
                                    if(!$errors)
                                    {
                                        $files[$key][$l['id_lang']] = $imageName;  
                                    }
                                }
                                else
                                    $errors[] = sprintf($this->l('%s file in %s is not in the correct format, accepted formats: jpg, gif, jpeg, png.','ets_baw_obj'),$config['label'],$l['iso_code']);
                            }
                        }
                    }
                }
                else
                {
                    if(isset($config['required']) && $config['required'] && isset($config['type']) && $config['type']=='file')
                    {
                        if($this->$key=='' && !isset($_FILES[$key]['size']))
                            $errors[] = sprintf($this->l('%s is required','ets_baw_obj'),$config['label']);
                        elseif(isset($_FILES[$key]['size']))
                        {
                            $fileSize = round((int)$_FILES[$key]['size'] / (1024 * 1024));
                			if($fileSize > 100)
                                $errors[] = sprintf($this->l('%s file is too large','ets_baw_obj'),$config['label']);
                        }   
                    }
                    else
                    {
                        if(isset($config['required']) && $config['required'] && $config['type']!='switch' && !is_array($value_key) && trim($value_key) == '')
                        {
                            $errors[] = sprintf($this->l('%s is required','ets_baw_obj'),$config['label']);
                        }
                        elseif($value_key!='' && !is_array($value_key) && isset($config['validate']) && method_exists('Validate',$config['validate']))
                        {
                            $validate = $config['validate'];
                            if(!Validate::$validate(trim($value_key)))
                                $errors[] = sprintf($this->l('%s is not valid','ets_baw_obj'),$config['label']);
                            unset($validate);
                        }
                        elseif($value_key!='' && !is_array($value_key)  && !Validate::isCleanHtml(trim($value_key)))
                        {
                            $errors[] = sprintf($this->l('%s is required','ets_baw_obj'),$config['label']);
                        } 
                    }                          
                }                    
            }
        }            
        if(!$errors)
        {            
            if($configs)
            {
                foreach($configs as $key => $config)
                {
                    if( $config['type']=='html')
                        continue;
                    $value_key = Tools::getValue($key);
                    if(isset($config['type']) && $config['type']=='sort_order')
                    {
                        if(!$this->id)
                        {
                            if(!isset($config['order_group'][$parent]) || isset($config['order_group'][$parent]) && !$config['order_group'][$parent])
                                $this->$key = $this->maxVal($key)+1;
                            else
                            {
                                $orderGroup = $config['order_group'][$parent];
                                $this->$key = $this->maxVal($key,$orderGroup,(int)$this->$orderGroup)+1;
                            }                                                         
                        }
                    }
                    elseif(isset($config['lang']) && $config['lang'])
                    {
                        $valules = array();
                        $key_value_lang_default = trim(Tools::getValue($key.'_'.$id_lang_default));
                        foreach($languages as $lang)
                        {
                            $key_value_lang = trim(Tools::getValue($key.'_'.$lang['id_lang']));
                            if($config['type']=='switch')                                                           
                                $valules[$lang['id_lang']] = (int)$key_value_lang ? 1 : 0;                                
                            elseif(Validate::isCleanHtml($key_value_lang))
                                $valules[$lang['id_lang']] = $key_value_lang ? : (Validate::isCleanHtml($key_value_lang_default) ? $key_value_lang_default:'');
                        }
                        $this->$key = $valules;
                    }
                    elseif($config['type']=='file_lang')
                    {
                        if(isset($files[$key]))
                        {
                            $valules = array();
                            $old_values = $this->$key;
                            $old_files[$key] = array();
                            foreach($languages as $lang)
                            {
                                if(isset($files[$key][$lang['id_lang']]) && $files[$key][$lang['id_lang']])
                                {
                                    $valules[$lang['id_lang']] = $files[$key][$lang['id_lang']];
                                    if($old_values[$lang['id_lang']])
                                        $old_files[$key][$lang['id_lang']] = $old_values[$lang['id_lang']];
                                }
                                elseif(!$old_values[$lang['id_lang']]  && isset($files[$key][$id_lang_default]) && $files[$key][$id_lang_default])
                                    $valules[$lang['id_lang']] = $files[$key][$id_lang_default];
                                else
                                    $valules[$lang['id_lang']] = $old_values[$lang['id_lang']];
                            }
                            $this->$key = $valules;
                        }
                    }
                    elseif($config['type']=='switch')
                    {                           
                        $this->$key = (int)$value_key ? 1 : 0;                                                      
                    }
                    elseif($config['type']=='categories' && is_array($value_key) && isset($config['tree']['use_checkbox']) && $config['tree']['use_checkbox'] || $config['type']=='checkbox')
                    {
                        if($value_key)
                        {
                            if(in_array('all',$value_key))
                                $this->$key = 'all';
                            else
                                $this->$key = implode(',',$value_key); 
                        }
                        else
                            $this->$key='';
                    }                                                  
                    elseif(Validate::isCleanHtml($value_key))
                        $this->$key = trim($value_key);   
                    }
                }
        }     
        if (!count($errors))
        { 
            $this->id_shop = Context::getContext()->shop->id;
            if($this->id && $this->update() || !$this->id && $this->add(true,true))
            {
                $success[] = $this->l('Saved successfully','ets_baw_obj');
                if($old_files)
                {
                    foreach($old_files as $key_file => $file)
                    {
                        if($file)
                        {
                            if(is_array($file))
                            {
                                foreach($file as $f)
                                {
                                    if(!in_array($f,$this->$key_file))
                                        @unlink(_PS_ETS_BAW_IMG_DIR_.$f);
                                }
                            }
                            else
                                @unlink(_PS_ETS_BAW_IMG_DIR_.$file);
                        }
                    }
                }
            }                
            else
            {
                if($files)
                {
                    foreach($files as $key_file => $file)
                    {
                        if($file)
                        {
                            if(is_array($file))
                            {
                                foreach($file as $f)
                                {
                                    @unlink(_PS_ETS_BAW_IMG_DIR_.$f); 
                                }
                            }
                            else
                                @unlink(_PS_ETS_BAW_IMG_DIR_.$file);
                        }
                    }
                }
                $errors[] = $this->l('Saving failed','ets_baw_obj');
            }
        }
        return array('errors' => $errors, 'success' => $success);  
    }
    public function maxVal() // $key,$group = false, $groupval=0
    {
        return true;
    }
}