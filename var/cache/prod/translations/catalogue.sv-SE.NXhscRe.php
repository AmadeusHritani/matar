<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('sv-SE', array (
));

$catalogueSv = new MessageCatalogue('sv', array (
));
$catalogue->addFallbackCatalogue($catalogueSv);

return $catalogue;
