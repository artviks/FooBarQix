<?php


namespace Test\Unit;


use App\Models\App;
use App\Models\Elements\Bar;
use App\Models\Elements\ElementCollection;
use App\Models\Elements\Foo;
use App\Models\Input;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    public function testExecute(): void
    {
        $elements = new ElementCollection();
        $elements->addMany([
            new Foo(),
            new Bar(),
        ]);
        $app = new App($elements);

        $inputFoo = new Input('3');
        $inputBar = new Input('5');
        $inputFooBar = new Input('15');
        $input = new Input('2');

        self::assertEquals('Foo', $app->execute($inputFoo));
        self::assertEquals('Bar', $app->execute($inputBar));
        self::assertEquals('FooBar', $app->execute($inputFooBar));
        self::assertEquals('2', $app->execute($input));
    }
}