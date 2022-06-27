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

interface ActionInterface
{
    public function run($params = null);
    public function undo($params = null);
    public function setState($state_id, $processed_count = null);
    public function getState();
    public function archive();
}
