<?php

namespace Test\Unit\Elements;


use App\Models\Elements\Bar;
use PHPUnit\Framework\TestCase;

class BarTest extends TestCase
{
    public function testGetters(): void
    {
        $bar = new Bar(5,5);

        self::assertEquals('Bar', $bar->name());
        self::assertEquals('5', $bar->contains());
        self::assertEquals('5', $bar->multiplier());
    }
}