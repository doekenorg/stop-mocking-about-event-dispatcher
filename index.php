<?php

use App\Event\GetTitleEvent;
use App\EventListener\OverwriteTitleListener;
use App\Service\Importer;
use League\Event\EventDispatcher;

require_once 'vendor/autoload.php';

$dispatcher = new EventDispatcher();
$listener = new OverwriteTitleListener();
$importer = new Importer($dispatcher);

$dispatcher->subscribeTo(GetTitleEvent::class, $listener);

echo $importer->getPostTitle(['title' => 'some title']); // should echo "Overwritten"
