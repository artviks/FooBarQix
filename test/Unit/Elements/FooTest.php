<?php

namespace Test\Unit\Elements;


use App\Models\Elements\Foo;
use PHPUnit\Framework\TestCase;

class FooTest extends TestCase
{
    public function testGetters(): void
    {
        $foo = new Foo(3,3);

        self::assertEquals('Foo', $foo->name());
        self::assertEquals('3', $foo->contains());
        self::assertEquals('3', $foo->multiplier());
    }
}