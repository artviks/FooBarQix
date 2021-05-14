<?php


namespace Test\Unit\Services;


use App\Models\Input;
use App\Services\InfQixFooService;
use PHPUnit\Framework\TestCase;

class InfQixFooServiceTest extends TestCase
{
    public function testExecute(): void
    {
        $container = require '../../../core/bootstrap.php';
        $service = $container->get(InfQixFooService::class);

        $inputInfInf = new Input('88');
        $inputInf = new Input('8');
        $inputQix = new Input('7');
        $inputInfQix = new Input('56');
        $inputInfQixFoo = new Input('168');
        $inputLarge = new Input('123456789');
        $input = new Input('2');

        self::assertEquals('Inf . InfInfInf', $service->execute($inputInfInf));
        self::assertEquals('Inf . InfInf', $service->execute($inputInf));
        self::assertEquals('Qix . Qix', $service->execute($inputQix));
        self::assertEquals('Inf; Qix', $service->execute($inputInfQix));
        self::assertEquals('Inf; Qix; Foo . Inf', $service->execute($inputInfQixFoo));
        self::assertEquals('Foo . FooQixInf', $service->execute($inputLarge));
        self::assertEquals('2', $service->execute($input));
    }
}