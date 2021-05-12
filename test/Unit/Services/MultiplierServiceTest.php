<?php


namespace Test\Unit\Services;


use App\Models\Elements\Bar;
use App\Models\Elements\ElementCollection;
use App\Models\Elements\Foo;
use App\Models\Elements\Qix;
use App\Models\Input;
use App\Services\MultiplierService;
use PHPUnit\Framework\TestCase;

class MultiplierServiceTest extends TestCase
{
    public function testExecute(): void
    {
        $elements = new ElementCollection();
        $elements->addMany([
            new Foo(3,3),
            new Bar(5,5),
            new Qix(7,7)
        ]);
        $separator = ', ';
        $service = new MultiplierService($elements, $separator);

        $inputFoo = new Input('6');
        $inputBar = new Input('5');
        $inputQix = new Input('7');
        $inputFooBar = new Input('15');
        $inputFooBarQix = new Input('105');
        $input = new Input('2');

        self::assertEquals('Foo', $service->execute($inputFoo));
        self::assertEquals('Bar', $service->execute($inputBar));
        self::assertEquals('Qix', $service->execute($inputQix));
        self::assertEquals('Foo, Bar', $service->execute($inputFooBar));
        self::assertEquals('Foo, Bar, Qix', $service->execute($inputFooBarQix));
        self::assertEquals('2', $service->execute($input));
    }
}