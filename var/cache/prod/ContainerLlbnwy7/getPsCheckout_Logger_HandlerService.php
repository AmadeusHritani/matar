<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'ps_checkout.logger.handler' shared service.

return $this->services['ps_checkout.logger.handler'] = ${($_ = isset($this->services['ps_checkout.logger.handler.factory']) ? $this->services['ps_checkout.logger.handler.factory'] : $this->load('getPsCheckout_Logger_Handler_FactoryService.php')) && false ?: '_'}->build();
