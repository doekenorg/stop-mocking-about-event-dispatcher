<?php

namespace App\Tests\Service;

use App\Event\GetTitleEvent;
use App\EventListener\OverwriteTitleListener;
use App\Service\Importer;
use League\Event\EventDispatcher;
use PHPUnit\Framework\TestCase;

/**
 * Unit test that tests {@see Importer::getPostTitle()} with a real event dispatcher.
 */
final class ImporterTest extends TestCase
{
    public function testGetTitle(): void
    {
        $importer = new Importer(new EventDispatcher());

        self::assertSame('The title', $importer->getPostTitle(['title' => 'The title']));
    }

    public function testGetTitleWithListener(): void
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->subscribeTo(GetTitleEvent::class, new OverwriteTitleListener());
        $importer = new Importer($dispatcher);

        self::assertSame('Overwritten', $importer->getPostTitle(['title' => 'Some title']));
    }
}
