<?php

namespace Test\Unit\Elements;


use App\Models\Elements\Foo;
use App\Models\Input;
use PHPUnit\Framework\TestCase;

class FooTest extends TestCase
{
    public function testName(): void
    {
        $foo = new Foo;

        self::assertEquals('Foo', $foo->name());
    }

    public function testMultiplier(): void
    {
        $input = new Input('3');
        $falseInput = new Input('4');
        $foo = new Foo;

        self::assertTrue($foo->multiplier($input));
        self::assertNotTrue($foo->multiplier($falseInput));
    }

    public function testContains(): void
    {
        $input1 = new Input('23');
        $input2 = new Input('33');
        $falseInput = new Input('1');
        $foo = new Foo;

        self::assertEquals(1, $foo->contains($input1));
        self::assertEquals(2, $foo->contains($input2));
        self::assertEquals(0, $foo->contains($falseInput));
    }
}