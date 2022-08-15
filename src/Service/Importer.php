<?php

namespace App\Service;

use App\Event\GetTitleEvent;
use Psr\EventDispatcher\EventDispatcherInterface;

final class Importer
{
    public function __construct(private EventDispatcherInterface $dispatcher)
    {
    }

    public function getPostTitle(array $post): string
    {
        $title = $post['title'] ?? null;

        $event = new GetTitleEvent($title, $post);

        $event = $this->dispatcher->dispatch($event);

        return $event->getTitle();
    }
}
