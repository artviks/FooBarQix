<?php

namespace Test\Unit\Elements;


use App\Models\Elements\Qix;
use PHPUnit\Framework\TestCase;

class QixTest extends TestCase
{
    public function testGetters(): void
    {
        $qix = new Qix(7,'7');

        self::assertEquals('Qix', $qix->name());
        self::assertEquals('7', $qix->contains());
        self::assertEquals(7, $qix->multiplier());
    }
}