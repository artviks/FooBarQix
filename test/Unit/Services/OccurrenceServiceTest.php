<?php


namespace Test\Unit\Services;


use App\Models\Elements\Bar;
use App\Models\Elements\ElementCollection;
use App\Models\Elements\Foo;
use App\Models\Elements\Qix;
use App\Models\Input;
use App\Services\OccurrenceService;
use PHPUnit\Framework\TestCase;

class OccurrenceServiceTest extends TestCase
{
    public function testExecute(): void
    {
        $elements = new ElementCollection();
        $elements->addMany([
            new Foo(3,3),
            new Bar(5,5),
            new Qix(7,7)
        ]);
        $service = new OccurrenceService($elements);

        $inputFoo = new Input('3');
        $inputBar = new Input('5');
        $inputQix = new Input('7');
        $inputQixBar = new Input('75');
        $inputFooBarQix = new Input('123456789');
        $input = new Input('10');

        self::assertEquals('Foo', $service->execute($inputFoo));
        self::assertEquals('Bar', $service->execute($inputBar));
        self::assertEquals('Qix', $service->execute($inputQix));
        self::assertEquals('QixBar', $service->execute($inputQixBar));
        self::assertEquals('FooBarQix', $service->execute($inputFooBarQix));
        self::assertEquals('', $service->execute($input));
    }
}