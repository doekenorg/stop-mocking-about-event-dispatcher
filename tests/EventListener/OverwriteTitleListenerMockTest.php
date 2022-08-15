<?php

namespace App\Tests\EventListener;

use App\Event\GetTitleEvent;
use App\EventListener\OverwriteTitleListener;
use PHPUnit\Framework\TestCase;

/**
 * Unit test that tests {@see OverwriteTitleListener::class} through a mocked event.
 */
class OverwriteTitleListenerMockTest extends TestCase
{
    public function testInvoke(): void
    {
        $listener = new OverwriteTitleListener();
        $event = $this->createMock(GetTitleEvent::class);
        $event
            ->expects(self::once())
            ->method('setTitle')
            ->with('Overwritten');

        $listener($event);
    }
}
