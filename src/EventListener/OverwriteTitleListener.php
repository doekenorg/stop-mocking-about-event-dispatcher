<?php

namespace App\EventListener;

use League\Event\Listener;

final class OverwriteTitleListener implements Listener
{
    public function __invoke(object $event): void
    {
        $event->setTitle('Overwritten');
    }
}
