<?php


namespace Test\Unit\Services;


use App\Models\Input;
use App\Services\FooBarQixService;
use PHPUnit\Framework\TestCase;

class FooBarQixServiceTest extends TestCase
{
    public function testExecute(): void
    {
        $container = require '../../../core/bootstrap.php';
        $service = $container->get(FooBarQixService::class);

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