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

class RunManager
{

    const RUN_CUTOFF_TIME = 3600;//SECONDS


    public static function getRunObject($is_internal = false)
    {
        $runs = self::getCurrentRunObjects($is_internal);
        foreach ($runs as $run) {
            self::isCutoffCandidate($run);
//            if (self::checkAsync($run)) {
//                return $run;
//            }
        }

        self::createNewRunObject($is_internal);
    }

    public static function createNewRunObject($is_internal = false, $assign_ready_tasks = true)
    {
        $run = new IzettleRun();
        $run->active = true;
        $run->success = false;
        $run->id_izettle_initial_type = $is_internal
            ? IzettleRun::INTERNAL
            : IzettleRun::EXTERNAL;

        $default_params =
            '{"price": "yes","inventory": "both","tax_policy": "only-default","createWithDefaultTax": "1"}';
        $run->params = $default_params;

        $run->save();

        if ($assign_ready_tasks) {
            $ready_tasks = TaskManager::getReadyTasks();
            $run->addTaskList($ready_tasks);
        }

        return $run;
    }

    public static function getCurrentRunObjects($is_internal = false)
    {
        $id_izettle_initial_type = $is_internal
            ? IzettleRun::INTERNAL
            : IzettleRun::EXTERNAL;
        $ids = Db::getInstance()->executeS(
            'SELECT id_izettle_run
			 FROM `'._DB_PREFIX_.'izettle_run` izettle_run
			 WHERE izettle_run.active = 1 and id_izettle_initial_type = '.(int) $id_izettle_initial_type.'
			 ORDER by izettle_run.date_add desc'
        );

        $result = array();
        foreach ($ids as $row) {
            $run = new IzettleRun($row['id_izettle_run']);
            if (self::isCutoffCandidate($run)) {
                $run->active = false;
                $run->save();
            } else {
                $result[] = $run;
            }
        }
        return $result;
    }

    public static function lastRunObject($is_internal = false)
    {
        $id_izettle_initial_type = $is_internal
            ? IzettleRun::INTERNAL
            : IzettleRun::EXTERNAL;
        $ids = Db::getInstance()->getRow(
            'SELECT id_izettle_run
			 FROM `'._DB_PREFIX_.'izettle_run` izettle_run
			 WHERE izettle_run.active = 0
			 and id_izettle_initial_type = '.(int) $id_izettle_initial_type.'
			 ORDER by izettle_run.date_add desc'
        );

        $result = false;
        foreach ($ids as $row) {
            $result = new IzettleRun($row['id_izettle_run']);
        }
        return $result;
    }

    private static function isCutoffCandidate($run)
    {
        $now = new DateTime();
        $last_update_time = new DateTime($run->date_upd);

        $diff =
            date_diff(
                $last_update_time,
                $now
            );

        return $diff->days > 0 || $diff->h > 0 || $diff->i > 10;
    }

//    private static function checkAsync($run)
//    {
//        return false;
//    }
}
