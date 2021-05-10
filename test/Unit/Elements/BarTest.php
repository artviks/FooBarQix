<?php

namespace Test\Unit\Elements;


use App\Models\Elements\Bar;
use App\Models\Input;
use PHPUnit\Framework\TestCase;

class BarTest extends TestCase
{
    public function testName(): void
    {
        $bar = new Bar;

        self::assertEquals('Bar', $bar->name());
    }

    public function testMultiplier(): void
    {
        $input = new Input('5');
        $falseInput = new Input('6');
        $bar = new Bar;

        self::assertTrue($bar->multiplier($input));
        self::assertNotTrue($bar->multiplier($falseInput));
    }

    public function testContains(): void
    {
        $input1 = new Input('25');
        $input2 = new Input('55');
        $falseInput = new Input('1');
        $bar = new Bar;

        self::assertEquals(1, $bar->contains($input1));
        self::assertEquals(2, $bar->contains($input2));
        self::assertEquals(0, $bar->contains($falseInput));
    }
}