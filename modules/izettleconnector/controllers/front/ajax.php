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

use IzettleApi\API\Product\VariantOptionDefinitionProperty;
use \IzettleApi\API\Product\Presentation;
use \IzettleApi\API\Product\Variant;
use \IzettleApi\API\Product\Price;
use \IzettleApi\API\Product\VariantOption;
use \IzettleApi\API\Product\VariantOptionDefinition;
use \IzettleApi\API\Product\VariantOptionDefinitionCollection;
use IzettleApi\Client\Exception\ImportException;
use IzettleApi\Client\ProductClient;

class IzettleConnectorAjaxModuleFrontController extends ModuleFrontController
{

    private function cancelImport()
    {
        $id_run = Tools::getValue('id_run', false);

        if (!$id_run) {
            die(json_encode(array('staus' => 'no run information')));
        }

        $cancellation_token = Tools::getValue('cancellation_token', false);

        if (!$cancellation_token || md5(_COOKIE_KEY_.$id_run) != $cancellation_token) {
            die("cancellation token is broken");
        }

        $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task`
                SET `id_izettle_task_state` = '. (int) IzettleTask::CANCELLED_STATE.'
                WHERE `id_izettle_task_state` <> '. (int) IzettleTask::FINISHED_STATE.'
                       AND `id_izettle_task_state` <> '. (int) IzettleTask::ERROR_STATE.'
                       AND `id_izettle_run` = '. (int) $id_run;
        Db::getInstance()->execute($sql);

        $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task_history`
                SET `id_izettle_task_state` = '. (int) IzettleTask::CANCELLED_STATE.'
                WHERE `id_izettle_task_state` <> '. (int) IzettleTask::FINISHED_STATE.'
                       AND `id_izettle_task_state` <> '. (int) IzettleTask::ERROR_STATE.'
                       AND `id_izettle_run` = '. (int) $id_run;
        Db::getInstance()->execute($sql);

        die(json_encode(array('staus' => 'ok')));
    }

    private function getImportStatus()
    {
        $is_internal = true;

        $id_run = Tools::getValue('id_run', false);

        if (!$id_run || $id_run <= 0) {
            $runs = RunManager::getCurrentRunObjects($is_internal);
            if (count($runs) < 1) {
                die(json_encode(array("error" => 'no import running')));
            } else {
                $run = $runs[0];
                $id_run = $run->id;
            }
        } else {
            $is_history = Db::getInstance()->getValue(
                'SELECT id_izettle_run
				 FROM `'._DB_PREFIX_.'izettle_run_history` izettle_run
				 WHERE id_izettle_run = '.(int) $id_run
            );
            $run = $is_history ? new IzettleRunHistory($id_run) : new IzettleRun($id_run);
        }

        $data = IzettleHelper::getRunStatusInfo($id_run);

        $wrapper = array(
            'tasks' => $data,
            'id_run' => (int) $id_run,
            'is_all_finished' => !$run->active,//$is_all_finished
            'is_continue_available' => !$run->success//$is_all_finished
        );

        die(json_encode($wrapper));
    }


    private function getUndoStatus()
    {
        $id_izettle_task = Tools::getValue('id_izettle_task', false);
        if (!$id_izettle_task) {
            die('broken task ID');
        }

        $data = IzettleHelper::getTaskStatusInfo($id_izettle_task);

        $wrapper = array(
            'tasks' => $data,
            'is_all_finished' => $data[0]['id_izettle_task_state'] == IzettleTask::UNDONE_STATE
                                 || $data[0]['id_izettle_task_state'] == IzettleTask::ERROR_STATE
                                 || $data[0]['id_izettle_task_state'] == IzettleTask::CANCELLED_STATE,
            'is_continue_available' => $data[0]['id_izettle_task_state'] == IzettleTask::ERROR_STATE
                                       || $data[0]['id_izettle_task_state'] == IzettleTask::CANCELLED_STATE,

        );

        die(json_encode($wrapper));
    }

    private function processWizardAction()
    {
        $action = Tools::getValue('action');

        if ($action == 'getImportStatus') {
            $this->getImportStatus();
            return;
        }

        if ($action == 'getUndoStatus') {
            $this->getUndoStatus();
            return;
        }

        if ($action == 'cancelImport') {
            $this->cancelImport();
            return;
        }
    }

    public function initContent()
    {
        '{"purchaseUuid":"1689721a-ba3f-11ec-953b-30d6d217b0d5","source":"POS","userUuid":"8d1b17a2-aa9b-11ec-92e9-361bc809d65a","currency":"EUR","country":"FR","amount":4400,"vatAmount":733,"timestamp":1649754072604,"created":"2022-04-12T09:01:12.604+0000","gpsCoordinates":{"longitude":5.682769786058207,"latitude":43.447418212890625,"accuracyMeters":21.000980761862593},"purchaseNumber":20,"userDisplayName":"Michael Palm","udid":"26e01d25e74d2348492f9787e770335f5af1f7ed","organizationUuid":"8d17aab8-aa9b-11ec-87d6-2d00e0aa3029","products":[{"id":"0","productUuid":"3b45fb80-ae98-11ec-aea7-3530494c5737","variantUuid":"3b457d4a-ae98-11ec-aee3-3530494c5737","name":"Coffret "Glow"","variantName":"","sku":"COFFGLOW","unitPrice":3200,"costPrice":0,"quantity":"1","vatPercentage":20,"taxRates":[{"percentage":20}],"taxExempt":false,"taxCode":"20%","category":{"uuid":"0c96a7e6-ae7d-11ec-949e-3530494c5737","name":"Coffrets"},"fromLocationUuid":"3e9eb2b9-ae7a-11ec-a7a5-5affd755dc8b","toLocationUuid":"3e9eb2d2-ae7a-11ec-9fa7-d3cb8861fb15","autoGenerated":false,"type":"PRODUCT","details":[]},{"id":"1","name":"Chutes","unitPrice":1200,"quantity":"1","vatPercentage":20,"taxRates":[{"percentage":20}],"taxExempt":false,"fromLocationUuid":"3e9eb2b9-ae7a-11ec-a7a5-5affd755dc8b","toLocationUuid":"3e9eb2d2-ae7a-11ec-9fa7-d3cb8861fb15","autoGenerated":false,"type":"CUSTOM_AMOUNT","details":[]}],"discounts":[],"payments":[{"uuid":"1a0331ce-ba3f-11ec-943a-31d7d316b1d4","amount":4400,"type":"IZETTLE_CASH","country":"FR","attributes":{"changeAmount":0,"handedAmount":4400}}],"references":{"checkoutUUID":"1689721a-ba3f-11ec-943a-31d7d316b1d4"},"taxationMode":"INCLUSIVE","taxationType":"VAT"}';
        if (Tools::getValue('wizard')) {
            if (Tools::getAdminToken(_COOKIE_KEY_) != Tools::getValue('token')) {
                die($this->module->l($this->module->displayName.' Error: invalid token'));
            }
            $this->processWizardAction();
            return;
        }

        die();
    }
}
