<?php


namespace Test\Unit\Elements;


use App\Models\Elements\Foo;
use App\Models\Input;
use PHPUnit\Framework\TestCase;

class FooTest extends TestCase
{
    public function testName(): void
    {
        $input = new Input('3');
        $foo = new Foo();
        $foo->handle($input);

        self::assertEquals('Foo', $foo->name());
    }

    public function testNoName(): void
    {
        $input = new Input('2');
        $foo = new Foo();
        $foo->handle($input);

        self::assertEquals(null, $foo->name());
    }
}