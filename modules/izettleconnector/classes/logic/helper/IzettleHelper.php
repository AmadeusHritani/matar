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

use IzettleApi\API\Webhook\Subscription;

class IzettleHelper
{
    public static function colorInverse($color)
    {
        $color =
            str_replace(
                '#',
                '',
                $color
            );
        if (Tools::strlen($color) != 6) {
            return '000000';
        }
        $rgb = '';
        for ($x = 0; $x < 3; $x++) {
            $c =
                255 - hexdec(
                    Tools::substr(
                        $color,
                        (2 * $x),
                        2
                    )
                );
            $c = ($c < 0) ? 0 : dechex($c);
            $rgb .= (Tools::strlen($c) < 2) ? '0'.$c : $c;
        }
        return '#'.$rgb;
    }

    public static function getReadyToSyncDiscounts($id_lang = null)
    {
        if (!Configuration::get(IZETTLECONNECTOR_SYNC_VOUCHER)) {
            return array();
        }

        if (!$id_lang || !is_int($id_lang)) {
            $id_lang = (int)Configuration::get('PS_LANG_DEFAULT');//todo pull from settings
        }

        $sql = 'SELECT \'create\' `action`,
                    cr.id_cart_rule,
                    cr.description,
                    crl.`NAME` `name`,
                    cr.reduction_percent,
                    cr.reduction_amount,
                    cr.reduction_currency,
                    cr.date_upd,
                    id.id_izettle_discount,
                    id.`uuid`,
                    id.date_upd iz_date_update
                FROM '._DB_PREFIX_.'cart_rule cr
                JOIN '._DB_PREFIX_.'cart_rule_lang crl
                    ON cr.id_cart_rule = crl.id_cart_rule AND crl.id_lang = '.(int)$id_lang.'
                LEFT JOIN '._DB_PREFIX_.'izettle_discount id
                    ON cr.id_cart_rule = id.id_cart_rule
                WHERE cr.active = 1 AND id.date_upd IS NULL
                UNION ALL
                SELECT \'update\' `action`,
                    cr.id_cart_rule,
                    cr.description,
                    crl.`NAME` `name`,
                    cr.reduction_percent,
                    cr.reduction_amount,
                    cr.reduction_currency,
                    cr.date_upd,
                    id.id_izettle_discount,
                    id.`uuid`,
                    id.date_upd iz_date_update
                FROM '._DB_PREFIX_.'cart_rule cr
                JOIN '._DB_PREFIX_.'cart_rule_lang crl
                    ON cr.id_cart_rule = crl.id_cart_rule AND crl.id_lang = '.(int)$id_lang.'
                JOIN '._DB_PREFIX_.'izettle_discount id
                    ON cr.id_cart_rule = id.id_cart_rule
                WHERE cr.active = 1 AND id.date_upd < cr.date_upd
                UNION ALL
                SELECT \'delete\' `action`,
                    cr.id_cart_rule,
                    cr.description,
                    crl.`NAME` `name`,
                    cr.reduction_percent,
                    cr.reduction_amount,
                    cr.reduction_currency,
                    cr.date_upd,
                    id.id_izettle_discount,
                    id.`uuid`,
                    id.date_upd iz_date_update
                FROM '._DB_PREFIX_.'cart_rule cr
                JOIN '._DB_PREFIX_.'cart_rule_lang crl
                    ON cr.id_cart_rule = crl.id_cart_rule AND crl.id_lang = '.(int)$id_lang.'
                JOIN '._DB_PREFIX_.'izettle_discount id
                    ON cr.id_cart_rule = id.id_cart_rule
                WHERE cr.active = 0
                UNION ALL
                SELECT \'delete\' `action`,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    id.id_izettle_discount,
                    id.`uuid`,
                    id.date_upd iz_date_update
                FROM '._DB_PREFIX_.'izettle_discount id 
                WHERE id.id_cart_rule NOT IN (select id_cart_rule FROM '._DB_PREFIX_.'cart_rule)';

        return Db::getInstance()->executeS($sql);
    }

    public static function createWebhook($izettleconnector = null, $recreate = false)
    {
        $webhook = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'izettle_webhook_subscription`');
        if ($webhook && !$recreate) {
            return true;
        }

        if (!$izettleconnector) {
            $izettleconnector = Module::getInstanceByName('izettleconnector');
        }

        if (!$izettleconnector->isIzettleConnected()) {
            return false;
        }

        $client = $izettleconnector->getIzettleWebhookClient();

        $subscriptions = $client->getSubscriptions();
        foreach ($subscriptions as $subscription) {
            if (!$webhook || $webhook['uuid'] != $subscription['uuid'] || $recreate) {
                $client->deleteSubscription($subscription['uuid']);
            }
        }

        if ($webhook && $recreate) {
            Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'izettle_webhook_subscription`');
        }


        $context = Context::getContext();
        $cronLink = $context->link->getModuleLink(
            $izettleconnector->name,
            'webhook',
            array('token' => Configuration::get(IZETTLECONNECTOR_CRON_CODE)),
            true
        );

        $uuid = UUID::generateV1();
        $eventNames =
            array(
                'PurchaseCreated',
                'InventoryBalanceChanged',
                'InventoryTrackingStarted',
                'InventoryTrackingStopped'
            );
        $transport = 'WEBHOOK';
        $izettleWebhook = Subscription::create(
            $uuid,
            $transport,
            $eventNames,
            $cronLink,
            Configuration::get(IZETTLECONNECTOR_USER_EMAIL)
        );

        $response = $client->createSubscription($izettleWebhook);

        $data = array(
            'uuid'        => $uuid,
            'event_name'  => json_encode($eventNames),
            'signing_key' => $response['signingKey'],
            'destination' => $cronLink
        );

        Db::getInstance()->insert(
            'izettle_webhook_subscription',
            $data
        );
        return true;
    }

    public static function deleteWebhook($izettleconnector = null, $delete_all = false)
    {
        $webhook = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'izettle_webhook_subscription`');
        if (!$webhook && !$delete_all) {
            return true;
        }

        if (!$izettleconnector) {
            $izettleconnector = Module::getInstanceByName('izettleconnector');
        }

        if (!$izettleconnector->isIzettleConnected()) {
            return false;
        }

        $client = $izettleconnector->getIzettleWebhookClient();
        try {
            if ($delete_all) {
                $subscriptions = $client->getSubscriptions();
                foreach ($subscriptions as $subscription) {
                    $client->deleteSubscription($subscription['uuid']);
                    $izettleconnector->logger->debug('Subscription '.$subscription['uuid'].' deleted');
                }
            } else {
                $client->deleteSubscription($webhook['uuid']);
                $izettleconnector->logger->debug('Subscription '.$webhook['uuid'].' deleted');
            }
        } catch (Exception $e) {
            $izettleconnector->logger->error($e->getMessage());
        }

        Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'izettle_webhook_subscription`');

        return true;
    }

    public static function getTaskStatusInfo($id_izettle_task)
    {
        $data = Db::getInstance()->executeS(
            'SELECT
                 izettle_task.*,
                 izettle_action_type.name action_name,
                 izettle_task_state.name state_name,
                 izettle_action_type.desc action_desc,
                 izettle_task_state.desc state_desc
			 FROM `'._DB_PREFIX_.'izettle_task_history` izettle_task
			 left join `'._DB_PREFIX_.'izettle_action_type` izettle_action_type
			     on izettle_task.id_izettle_action_type = izettle_action_type.id_izettle_action_type
			 left join `'._DB_PREFIX_.'izettle_task_state` izettle_task_state
			     on izettle_task.id_izettle_task_state = izettle_task_state.id_izettle_task_state
			 WHERE izettle_task.id_izettle_task = '.(int) $id_izettle_task.'
			 UNION ALL
			 SELECT
                 izettle_task.*,
                 izettle_action_type.name action_name,
                 izettle_task_state.name state_name,
                 izettle_action_type.desc action_desc,
                 izettle_task_state.desc state_desc
			 FROM `'._DB_PREFIX_.'izettle_task` izettle_task
			 left join `'._DB_PREFIX_.'izettle_action_type` izettle_action_type
			     on izettle_task.id_izettle_action_type = izettle_action_type.id_izettle_action_type
			 left join `'._DB_PREFIX_.'izettle_task_state` izettle_task_state
			     on izettle_task.id_izettle_task_state = izettle_task_state.id_izettle_task_state
			 WHERE izettle_task.id_izettle_task = '.(int) $id_izettle_task
        );

        $data = IzettleHelper::prepareTaskStatusInfo($data);

        return $data;
    }

    public static function getRunStatusInfo($id_run)
    {
        $sql = 'SELECT * FROM (
                    SELECT
                        izettle_task.*,
                        izettle_action_type.name action_name,
                        izettle_task_state.name state_name,
                        izettle_action_type.desc action_desc,
                        izettle_task_state.desc state_desc
			        FROM `'._DB_PREFIX_.'izettle_task_history` izettle_task
			        left join `'._DB_PREFIX_.'izettle_action_type` izettle_action_type
			            on izettle_task.id_izettle_action_type = izettle_action_type.id_izettle_action_type
			        left join `'._DB_PREFIX_.'izettle_task_state` izettle_task_state
			            on izettle_task.id_izettle_task_state = izettle_task_state.id_izettle_task_state
			        WHERE izettle_task.id_izettle_run = '.(int) $id_run.'
			        UNION ALL
			        SELECT
                        izettle_task.*,
                        izettle_action_type.name action_name,
                        izettle_task_state.name state_name,
                        izettle_action_type.desc action_desc,
                        izettle_task_state.desc state_desc
			        FROM `'._DB_PREFIX_.'izettle_task` izettle_task
			        left join `'._DB_PREFIX_.'izettle_action_type` izettle_action_type
			            on izettle_task.id_izettle_action_type = izettle_action_type.id_izettle_action_type
			        left join `'._DB_PREFIX_.'izettle_task_state` izettle_task_state
			            on izettle_task.id_izettle_task_state = izettle_task_state.id_izettle_task_state
			        WHERE izettle_task.id_izettle_run = '.(int) $id_run.'
				) TMP
				ORDER by date_add ASC';
        $data = Db::getInstance()->executeS($sql);

        $data = IzettleHelper::prepareTaskStatusInfo($data);

        return $data;
    }

    /**
     * @param $data
     * @param $row
     * @return mixed
     * @throws Exception
     */
    public static function prepareTaskStatusInfo($data)
    {
//$is_all_finished = false;
        $counter = 1;
        foreach ($data as &$row) {
            $is_running_now = $row['id_izettle_task_state'] == IzettleTask::RUNNING_STATE
                || $row['id_izettle_task_state'] == IzettleTask::RUNNING_ASYNC_STATE
                || $row['id_izettle_task_state'] == IzettleTask::UNDO_RUNNING_STATE;

//            $is_ready = $row['id_izettle_task_state'] == IzettleTask::READY_STATE;

//            if ($row['id_izettle_action_type'] == IzettleTask::CLEAR_ACTION) {
//                $row['prepared_count'] = (int) $row['prepared_count'] - (int) $row['processed_count'];
//            }

            $total = (int)$row['total_count'];
            $processed = (int)$row['processed_count'];
            $row['percent'] = $total == 0 ? 0 : (int)round(100.0 * $processed / $total);

            if ($row['date_start']) {
                $start = new DateTime($row['date_start']);

                $end = $is_running_now ? new DateTime(date('Y-m-d H:i:s')) : new DateTime($row['date_end']);
                $diff =
                    date_diff(
                        $start,
                        $end
                    );

                $row['elapsed'] = $diff->format('%H:%I:%S');
            }

            $is_undo = $row['id_izettle_task_state'] == IzettleTask::UNDO_RUNNING_STATE
                || $row['id_izettle_task_state'] == IzettleTask::UNDONE_STATE;



            $row['action_desc'] = ($is_undo ? "[UNDO] " : "").$row['action_desc'];
            $counter++;

            $row['state_name'] = Tools::strtolower($row['state_name']);
            $row['state_name'] = Tools::strtolower($row['state_name'] == 'cancelled' ? 'paused' : $row['state_name']);

//            if (!$is_all_finished && !$is_ready) {
//                $is_all_finished = !$is_running_now;
//            }

            if ($total == 0
                && $processed == 0
                && $row['id_izettle_task_state'] == IzettleTask::FINISHED_STATE
            ) {
                $row['percent'] = 100;
            }
        }
        return $data;
    }

    public static function arrayRecursiveDiff($array1, $array2)
    {
        $difference = array();

        foreach ($array1 as $key => $value) {
            if (is_array($value)) {
                if (!isset($array2[$key])) {
                    $difference[$key] = $value;
                } elseif (!is_array($array2[$key])) {
                    $difference[$key] = $value;
                } else {
                    $new_diff =
                        self::arrayRecursiveDiff(
                            $value,
                            $array2[$key]
                        );
                    if ($new_diff != false) {
                        $difference[$key] = $new_diff;
                    }
                }
            } elseif ((!isset($array2[$key]) || $array2[$key] != $value)
                && !($array2[$key] === null && $value === null)
            ) {
                $difference[$key] = $value;
            }
        }
        return $difference;
    }

    public static function convertArrayToDotNotation($arr, $narr = array(), $nkey = '')
    {
        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                $narr =
                    array_merge(
                        $narr,
                        self::convertArrayToDotNotation(
                            $value,
                            $narr,
                            $nkey.$key.'.'
                        )
                    );
            } else {
                $narr[$nkey.$key] = $value;
            }
        }

        return $narr;
    }

    public static function decodeStr($input)
    {
        $strict = false;
        $inl = Tools::strlen($input);
        $in = unpack('C*', $input);
        $padding = 0;
        $inli = 1;
        $i = 0;
        $j = 0;
        $base64_pad = '=';
        $out = array();

        $base64_reverse_table = array(
            -2, -2, -2, -2, -2, -2, -2, -2, -2, -1, -1, -2, -2, -1, -2, -2,
            -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2,
            -1, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, 62, -2, -2, -2, 63,
            52, 53, 54, 55, 56, 57, 58, 59, 60, 61, -2, -2, -2, -2, -2, -2,
            -2,  0,  1,  2,  3,  4,  5,  6,  7,  8,  9, 10, 11, 12, 13, 14,
            15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, -2, -2, -2, -2, -2,
            -2, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40,
            41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, -2, -2, -2, -2, -2,
            -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2,
            -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2,
            -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2,
            -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2,
            -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2,
            -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2,
            -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2,
            -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2, -2
        );

        /* run through the whole string, converting as we go */
        while ($inl-- > 0) {
            $ch = $in[$inli++];
            if ($ch == $base64_pad) {
                $padding++;
                continue;
            }

            $ch = $base64_reverse_table[$ch];
            if (!$strict) {
                /* skip unknown characters and whitespace */
                if ($ch < 0) {
                    continue;
                }
            } else {
                /* skip whitespace */
                if ($ch == -1) {
                    continue;
                }
                /* fail on bad characters or if any data follows padding */
                if ($ch == -2 || $padding) {
                    //goto fail;
                    return false;
                }
            }

            switch ($i % 4) {
                case 0:
                    $out[$j] = $ch << 2;
                    break;
                case 1:
                    $out[$j++] |= $ch >> 4;
                    $out[$j] = ($ch & 0x0f) << 4;
                    break;
                case 2:
                    $out[$j++] |= $ch >>2;
                    $out[$j] = ($ch & 0x03) << 6;
                    break;
                case 3:
                    $out[$j++] |= $ch;
                    break;
            }
            $i++;
        }

        /* fail if the input is truncated (only one char in last group) */
        if ($strict && $i % 4 == 1) {
            return false;
        }

        /* fail if the padding length is wrong (not VV==, VVV=), but accept zero padding
        * RFC 4648: "In some circumstances, the use of padding [--] is not required" */
        if ($strict && $padding && ($padding > 2 || ($i + $padding) % 4 != 0)) {
            return false;
        }

        $out[$j] = '\0';

        $decoded =
            implode(
                array_map(
                    "chr",
                    $out
                )
            );

        for ($i = 0; $i <= 31; ++$i) {
            $decoded = str_replace(chr($i), "", $decoded);
        }
        $decoded = str_replace(chr(127), "", $decoded);

// This is the most common part
// Some file begins with 'efbbbf' to mark the beginning of the file. (binary level)
// here we detect it and we remove it, basically it's the first 3 characters
        if (0 === strpos(bin2hex($decoded), 'efbbbf')) {
            $decoded = Tools::substr($decoded, 3);
        }

        return $decoded;
    }

    public static function customHmac($algo, $data, $key, $raw_output = false)
    {
        $pack = 'H'.Tools::strlen(hash($algo, 'test'));
        $size = 64;
        if (Tools::strlen($key) > $size) {
            $key = pack($pack, hash($algo, $key));
        }
        $key = str_pad($key, $size, chr(0x00));
        $ipad = str_repeat(chr(0x36), $size);
        $opad = str_repeat(chr(0x5c), $size);
        $hmac = pack(
            $pack,
            hash(
                $algo,
                ($key ^ $opad).pack(
                    $pack,
                    hash(
                        $algo,
                        ($key ^ $ipad).$data
                    )
                )
            )
        );
        if ($raw_output) {
            return $hmac;
        }
        return bin2hex($hmac);
    }

    public static function validateApiKey($api_key)
    {
        $buff = explode(".", $api_key);

        if (count($buff) != 3) {
            return false;
        }

        $decodeStr = IzettleHelper::decodeStr($buff[1]);
        $data = json_decode($decodeStr, true);
        return isset($data['client_id']);
    }

    public static function getAttributesParams($id_product, $id_product_attribute, $id_lang)
    {
        if ($id_product_attribute == 0) {
            return [];
        }

        $result = Db::getInstance()->executeS(
            'SELECT
                a.`id_attribute`,
                a.`id_attribute_group`,
                al.`name`,
                agl.`name` as `group`
            FROM `' . _DB_PREFIX_ . 'attribute` a
            LEFT JOIN `' . _DB_PREFIX_ . 'attribute_lang` al
                ON (al.`id_attribute` = a.`id_attribute` AND al.`id_lang` = ' . (int) $id_lang . ')
            LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute_combination` pac
                ON (pac.`id_attribute` = a.`id_attribute`)
            LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute` pa
                ON (pa.`id_product_attribute` = pac.`id_product_attribute`)
            LEFT JOIN `' . _DB_PREFIX_ . 'attribute_group_lang` agl
                ON (a.`id_attribute_group` = agl.`id_attribute_group` AND agl.`id_lang` = ' . (int) $id_lang . ')
            WHERE pa.`id_product` = ' . (int) $id_product . '
                AND pac.`id_product_attribute` = ' . (int) $id_product_attribute . '
                AND agl.`id_lang` = ' . (int) $id_lang
        );

        return $result;
    }

    /**
     * @param $product_ids
     * @return array|false|mysqli_result|PDOStatement|resource|null
     * @throws PrestaShopDatabaseException
     */
    public static function getProductsTaxes($product_ids)
    {
        $context = Context::getContext();

//        $sql = 'SELECT DISTINCT trg.`id_tax_rules_group`,
//                                trg.name as tax_group_name,
//                                t.id_tax,
//                                tl.name as tax_name,
//                                t.rate
//                FROM `'._DB_PREFIX_.'product_shop` ps
//                LEFT JOIN `'._DB_PREFIX_.'tax_rule` tr
//                    on tr.id_tax_rules_group = ps.id_tax_rules_group
//                LEFT JOIN `'._DB_PREFIX_.'tax_rules_group` trg
//                    on trg.id_tax_rules_group = ps.id_tax_rules_group
//                LEFT JOIN `'._DB_PREFIX_.'tax` t
//                    on t.id_tax = tr.id_tax
//                LEFT JOIN `'._DB_PREFIX_.'tax_lang` tl
//                    on tl.id_tax = t.id_tax AND tl.id_lang = '.(int)$context->language->id.'
//                WHERE ps.`id_product` IN('.implode(',', array_map('intval', $product_ids)).')
//                       AND ps.id_shop = '.(int)$context->shop->id.'
//                       AND trg.deleted = 0
//                       AND trg.active = 1
//                       AND t.deleted = 0
//                       AND t.active = 1
//                 ORDER BY t.id_tax';

        $sql = 'SELECT DISTINCT t.id_tax,
                                tl.name as tax_name,
                                t.rate
                FROM `'._DB_PREFIX_.'product_shop` ps
                LEFT JOIN `'._DB_PREFIX_.'tax_rule` tr 
                    on tr.id_tax_rules_group = ps.id_tax_rules_group
                LEFT JOIN `'._DB_PREFIX_.'tax_rules_group` trg
                    on trg.id_tax_rules_group = ps.id_tax_rules_group
                LEFT JOIN `'._DB_PREFIX_.'tax` t
                    on t.id_tax = tr.id_tax
                LEFT JOIN `'._DB_PREFIX_.'tax_lang` tl
                    on tl.id_tax = t.id_tax AND tl.id_lang = '.(int)$context->language->id.'
                WHERE ps.`id_product` IN('.implode(',', array_map('intval', $product_ids)).') 
                       AND ps.id_shop = '.(int)$context->shop->id.'
                       AND trg.deleted = 0
                       AND trg.active = 1
                       AND t.deleted = 0
                       AND t.active = 1
                 ORDER BY t.id_tax';
        $prestashop_taxes = Db::getInstance()->executeS($sql);
        return $prestashop_taxes;
    }


    public static function isExternalChangesSource($externalUuid)
    {
        if (!$externalUuid) {
            return true;
        }

        $uuid = Db::getInstance()->getValue('SELECT `uuid`
                                             FROM `'._DB_PREFIX_.'izettle_inventory_sync`
                                             WHERE `uuid`=\''.pSQL($externalUuid).'\'');

        return $uuid ? false : true;
    }

    public static function isPurchaseImported($purchaseUUID)
    {
        if (!$purchaseUUID) {
            return false;
        }

        $uuid = Db::getInstance()->getValue('SELECT `uuid`
                                             FROM `'._DB_PREFIX_.'izettle_purchase`
                                             WHERE `uuid`=\''.pSQL($purchaseUUID).'\'');

        return $uuid ? true : false;
    }

    public static function isPartialSyncReady($partial_sync)
    {
        $last_update_time = new DateTime($partial_sync->last_sync_date);

        $now = new DateTime();

        $diff =
            date_diff(
                $last_update_time,
                $now
            );

        $valid = $diff->days > 0
            || $diff->m > 0
            || $diff->y > 0;

//        $valid = $diff->i > 3
//            || $diff->h > 0
//            || $diff->days > 0
//            || $diff->m > 0
//            || $diff->y > 0;

        return $valid;
    }
}
