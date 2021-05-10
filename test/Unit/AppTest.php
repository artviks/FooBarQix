<?php


namespace Test\Unit;


use App\Models\App;
use App\Models\Elements\Bar;
use App\Models\Elements\ElementCollection;
use App\Models\Elements\Foo;
use App\Models\Elements\Qix;
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
            new Qix()
        ]);
        $app = new App($elements);

        $inputFoo = new Input('3');
        $inputBar = new Input('5');
        $inputQix = new Input('7');
        $inputFooBar = new Input('15');
        $inputFooBarQix = new Input('105');
        $input = new Input('2');

        self::assertEquals('Foo', $app->execute($inputFoo));
        self::assertEquals('Bar', $app->execute($inputBar));
        self::assertEquals('Qix', $app->execute($inputQix));
        self::assertEquals('FooBar.Bar', $app->execute($inputFooBar));
        self::assertEquals('FooBarQix.Bar', $app->execute($inputFooBarQix));
        self::assertEquals('2', $app->execute($input));
    }
}