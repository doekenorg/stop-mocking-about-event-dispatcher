<?php

namespace App\Tests\EventListener;

use App\Event\GetTitleEvent;
use App\EventListener\OverwriteTitleListener;
use PHPUnit\Framework\TestCase;

/**
 * Unit test that tests {@see OverwriteTitleListener::class} through a real event.
 */
class OverwriteTitleListenerTest extends TestCase
{
    public function testInvoke(): void
    {
        $listener = new OverwriteTitleListener();
        $event = new GetTitleEvent('Some title');

        $listener($event);

        self::assertSame('Overwritten', $event->getTitle());
    }
}
