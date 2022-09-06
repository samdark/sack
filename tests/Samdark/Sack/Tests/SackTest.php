<?php

namespace Samdark\Sack\Tests;

use PHPUnit\Framework\TestCase;
use Samdark\Sack\Item;
use Samdark\Sack\SackFiller;

final class SackTest extends TestCase
{
    public function testSeven(): void
    {
        $guitar = new Item('Guitar', 1, 1500);
        $player = new Item('Player', 4, 3000);
        $laptop = new Item('Laptop', 3, 2000);

        $items = [
            $guitar,
            $player,
            $laptop,
        ];

        $sackVolume = 7;
        $filler = new SackFiller($sackVolume);
        $result = $filler->fill($items);

        $this->assertSame(5000, $result->getValue());
        $this->assertSame([$laptop, $player], $result->getItems());
    }
}