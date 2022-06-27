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

class IzettleTask extends ObjectModel
{

    const CLEAR_ACTION = 10;
    const IMPORT_ACTION = 1;
    const CREATE_ACTION = 2;
    const UPDATE_ACTION = 3;
    const DELETE_ACTION = 4;
    const IMAGE_ACTION = 5;
    const STOCK_IMPORT_ACTION = 6;
    const STOCK_EXPORT_ACTION = 7;
    const STOCK_SYNC_ACTION = 8;
    const STOCK_STOP_ACTION = 11;
    const DISCOUNT_ACTION = 9;
    const PURCHASE_IMPORT_ACTION = 12;

    const READY_STATE = 0;
    const RUNNING_STATE = 1;
    const RUNNING_ASYNC_STATE = 2;
    const STOPPED_STATE = 3;
    const CANCELLED_STATE = 4;
    const FINISHED_STATE = 5;
    const ERROR_STATE = 6;
    const UNDO_RUNNING_STATE = 7;
    const UNDONE_STATE = 8;



    public $id;
    public $id_izettle_run;
    public $id_izettle_action_type;
    public $id_izettle_task_state;
    public $total_count;
    public $prepared_count;
    public $processed_count;
    public $current_info;
    public $date_start;
    public $date_end;
    public $date_add;
    public $date_upd;

    public static $definition = array(
        'table' => 'izettle_task',
        'primary' => 'id_izettle_task',
        'fields' => array(
            'id_izettle_run' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_izettle_action_type' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_izettle_task_state' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'total_count' => array('type' => self::TYPE_INT),
            'prepared_count' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'processed_count' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'current_info' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'date_start' => array('type' => self::TYPE_DATE),
            'date_end' => array('type' => self::TYPE_DATE),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );

    public function addProductList($products)
    {
        $data = array();
        foreach ($products as $product) {
            if (is_array($product)) {
                $row = array(
                    'id_izettle_task' => $this->id,
                    'date_add'        => date('Y-m-d H:i:s'),
                    'date_upd'        => date('Y-m-d H:i:s'),
                );
                if (isset($product['id_product'])) {
                    $row['id_product'] = $product['id_product'];
                } else {
                    $row['id_product'] = 0;
                }
                if (isset($product['id_product_attribute'])) {
                    $row['id_product_attribute'] = $product['id_product_attribute'];
                }
                if (isset($product['processed'])) {
                    $row['processed'] = $product['processed'];
                }
                if (isset($product['desc'])) {
                    $row['desc'] = pSQL($product['desc']);
                }
                if (isset($product['undone'])) {
                    $row['undone'] = $product['undone'];
                }
                if (isset($product['undo_json'])) {
                    $row['undo_json'] = pSQL($product['undo_json']);
                }

                $data[] = $row;
            } elseif ($product instanceof IzettleTaskProduct) {
                $data[] = array(
                    'id_izettle_task'      => $this->id,
                    'id_product'           => $product->id_product,
                    'id_product_attribute' => $product->id_product_attribute,
                    'processed'            => $product->processed,
                    'desc'                 => $product->desc,
                    'date_add'             => date('Y-m-d H:i:s'),
                    'date_upd'             => date('Y-m-d H:i:s'),
                );
            }
        }

        $res = (bool)Db::getInstance()->insert(
            'izettle_task_product',
            $data
        );

        return $res;
    }

    public function getProductList()
    {
        return Db::getInstance()->executeS(
            'SELECT *
			 FROM `'._DB_PREFIX_.'izettle_task_product` izettle_task_product
			 WHERE izettle_task_product.id_izettle_task = '.(int)$this->id.'
			 ORDER by izettle_task_product.date_add ASC, izettle_task_product.id_izettle_task_product ASC'
        );
    }
}
