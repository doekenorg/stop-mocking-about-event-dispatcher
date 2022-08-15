<?php

namespace App\Tests\Service;

use App\Event\GetTitleEvent;
use App\EventListener\OverwriteTitleListener;
use App\Service\Importer;
use PHPUnit\Framework\TestCase;
use Psr\EventDispatcher\EventDispatcherInterface;

class ImporterImplementationMockTest extends TestCase
{
    public function testGetTitle(): void
    {
        $dispatcher = $this->createMock(EventDispatcherInterface::class);
        $event = $this->createMock(GetTitleEvent::class);
        $dispatcher
            ->expects(self::once())
            ->method('dispatch')
            ->willReturn($event);

        $event
            ->expects(self::once())
            ->method('getTitle')
            ->willReturn('Overwritten');

        $importer = new Importer($dispatcher);
        self::assertSame('Overwritten', $importer->getPostTitle(['title' => 'some title']));
    }
}
