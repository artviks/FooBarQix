<?php


namespace Test\Unit;


use App\Models\Elements\Bar;
use App\Models\Elements\ElementCollection;
use App\Models\Elements\Foo;
use App\Models\Elements\Qix;
use App\Models\Input;
use App\App;
use App\Services\MultiplierService;
use App\Services\OccurrenceService;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    public function testExecute(): void
    {
        $elements = new ElementCollection();
        $elements->addMany([
            new Foo(3,3),
            new Bar(5,5),
            new Qix(7,7)
        ]);
        $multiplierService = new MultiplierService($elements);
        $occurrenceService = new OccurrenceService($elements);

        $app = new App($multiplierService, $occurrenceService);

        $inputFoo = new Input('6');
        $inputBar = new Input('5');
        $inputQix = new Input('7');
        $inputFooBar = new Input('15');
        $inputFooBarQix = new Input('105');
        $inputLarge = new Input('123456789');
        $input = new Input('2');

        self::assertEquals('Foo', $app->run($inputFoo));
        self::assertEquals('Bar.Bar', $app->run($inputBar));
        self::assertEquals('Qix.Qix', $app->run($inputQix));
        self::assertEquals('FooBar.Bar', $app->run($inputFooBar));
        self::assertEquals('FooBarQix.Bar', $app->run($inputFooBarQix));
        self::assertEquals('Foo.FooBarQix', $app->run($inputLarge));
        self::assertEquals('2', $app->run($input));
    }
}