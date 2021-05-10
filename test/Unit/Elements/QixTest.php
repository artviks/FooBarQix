<?php

namespace Test\Unit\Elements;


use App\Models\Elements\Qix;
use App\Models\Input;
use PHPUnit\Framework\TestCase;

class QixTest extends TestCase
{
    public function testName(): void
    {
        $qix = new Qix;

        self::assertEquals('Qix', $qix->name());
    }

    public function testMultiplier(): void
    {
        $input = new Input('7');
        $falseInput = new Input('8');
        $qix = new Qix;

        self::assertTrue($qix->multiplier($input));
        self::assertNotTrue($qix->multiplier($falseInput));
    }

    public function testContains(): void
    {
        $input1 = new Input('27');
        $input2 = new Input('77');
        $falseInput = new Input('1');
        $qix = new Qix;

        self::assertEquals(1, $qix->contains($input1));
        self::assertEquals(2, $qix->contains($input2));
        self::assertEquals(0, $qix->contains($falseInput));
    }
}