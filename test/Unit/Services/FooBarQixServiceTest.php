<?php


namespace Test\Unit\Services;


use App\Models\Elements\Bar;
use App\Models\Elements\ElementCollection;
use App\Models\Elements\Foo;
use App\Models\Elements\Qix;
use App\Models\Input;
use App\Services\FooBarQixService;
use App\Services\MultiplierService;
use App\Services\OccurrenceService;
use PHPUnit\Framework\TestCase;

class FooBarQixServiceTest extends TestCase
{
    public function testExecute(): void
    {
        $elements = new ElementCollection();
        $elements->addMany([
            new Foo(3,3),
            new Bar(5,5),
            new Qix(7,7)
        ]);
        $multiplierService = new MultiplierService($elements, ', ');
        $occurrenceService = new OccurrenceService($elements);
        $service = new FooBarQixService($multiplierService, $occurrenceService, ' . ');

        $inputFoo = new Input('6');
        $inputBar = new Input('5');
        $inputQix = new Input('7');
        $inputFooBar = new Input('15');
        $inputFooBarQix = new Input('105');
        $inputLarge = new Input('123456789');
        $input = new Input('2');

        self::assertEquals('Foo', $service->execute($inputFoo));
        self::assertEquals('Bar . Bar', $service->execute($inputBar));
        self::assertEquals('Qix . Qix', $service->execute($inputQix));
        self::assertEquals('Foo, Bar . Bar', $service->execute($inputFooBar));
        self::assertEquals('Foo, Bar, Qix . Bar', $service->execute($inputFooBarQix));
        self::assertEquals('Foo . FooBarQix', $service->execute($inputLarge));
        self::assertEquals('2', $service->execute($input));
    }
}