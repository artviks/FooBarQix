<?php


namespace Test\Unit\Elements;


use App\Models\Elements\Inf;
use PHPUnit\Framework\TestCase;

class InfTest extends TestCase
{
    public function testGetters(): void
    {
        $inf = new Inf(8,'8', 8);

        self::assertEquals('Inf', $inf->name());
        self::assertEquals('8', $inf->contains());
        self::assertEquals(8, $inf->multiplier());
        self::assertEquals(8, $inf->sumMultiplier());
    }
}