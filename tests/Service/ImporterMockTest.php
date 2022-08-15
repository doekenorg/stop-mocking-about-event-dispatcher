<?php

namespace App\Tests\Service;

use App\Event\GetTitleEvent;
use App\Service\Importer;
use PHPUnit\Framework\TestCase;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * Unit test that tests {@see Importer::getPostTitle()} with a mocked event dispatcher.
 */
final class ImporterMockTest extends TestCase
{
    public function testGetPostTitle(): void
    {
        $dispatcher = $this->createMock(EventDispatcherInterface::class);
        $importer = new Importer($dispatcher);

        $dispatcher
            ->expects(self::once())
            ->method('dispatch')
            ->with($event = new GetTitleEvent('The title'))
            ->willReturn($event);

        self::assertSame('The title', $importer->getPostTitle(['title' => 'The title']));
    }
}
