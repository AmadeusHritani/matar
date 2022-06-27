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

use \IzettleApi\Client\Image\ImageUrlUpload;

class ImageProcessAction extends IzettleAction
{
    protected function runInner($params = null)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }
        $this->refreshTask();
        $this->task->current_info = $this->module->l('Preparing data');
        $this->task->save();

        $context = Context::getContext();
        $imageAssociationList = $this->getImageAssociation();


        if (!$this->isKeepGoing()) {
            //stop running if cancelled or stopped
            return false;
        }
        $all = array();
        $data = array();
        $hash = array();

        $counter = 1;

        foreach ($imageAssociationList as $row) {
            $id_image = (int)$row['id_image'];

            if ($id_image == 0) {
                continue;
            }
            if (isset($data[$id_image])) {
                continue;
            }
            if (!isset($all[$id_image])) {
                $all[$id_image] = $id_image;
            }
            if ($row['processed']) {
                continue;
            }
//            if (IzettleImage::getItemByImageId($id_image)) {
//                continue;
//            }

            $this->refreshTask();
            $this->task->prepared_count = $counter++;
            $this->task->save();


            if (!$this->isKeepGoing()) {
                //stop running if cancelled or stopped
                return false;
            }


            if (!$row['processed']) {
                if (!isset($data[$id_image])) {
                    $url =
                        $context->link->getImageLink(
                            urlencode(utf8_decode($row['link_rewrite'])),
                            $id_image,
                            ImageType::getFormatedName('large')
                        );

                    $hash[md5($url)] = $id_image;

                    $data[$id_image] = array(
                        'item' => new ImageUrlUpload($url, "JPEG"),
                        'url' => $url,
                        'list' => array()
                    );
                }

                $data[$id_image]['list'][] = array(
                    'id_izettle_task_product' => $row['id_izettle_task_product'],
                    'id_product' => $row['id_product'],
                    'id_product_attribute' => $row['id_product_attribute'],

                );
            }
        }
        $previous_run_processed = count($all) - count($data);

        $this->refreshTask();
        $this->task->prepared_count = 0;
        $this->task->current_info = $this->module->l('Uploading images to iZettle');
        $this->task->total_count = count($hash) + $previous_run_processed;
        $this->task->save();

        return $this->bulkImagesUpload($data, $hash, $previous_run_processed);
    }
}
