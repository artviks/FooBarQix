<?php


namespace Test\Unit\Services;


use App\Models\Elements\ElementCollection;
use App\Models\Elements\Foo;
use App\Models\Elements\Inf;
use App\Models\Elements\Qix;
use App\Models\Input;
use App\Services\InfQixFooService;
use App\Services\MultiplierService;
use App\Services\OccurrenceService;
use PHPUnit\Framework\TestCase;

class InfQixFooServiceTest extends TestCase
{
    public function testExecute(): void
    {
        $inf = new Inf(8,8);
        $qix = new Qix(7,7);
        $foo = new Foo(3, 3);

        $MultiplierElements = new ElementCollection();
        $MultiplierElements->addMany([$inf, $qix, $foo]);
        $occurrenceElements = new ElementCollection();
        $occurrenceElements->addMany([$foo, $inf, $qix]);

        $multiplierService = new MultiplierService($MultiplierElements, '; ');
        $occurrenceService = new OccurrenceService($occurrenceElements);
        $service = new InfQixFooService($multiplierService, $occurrenceService, ' . ');

        $inputFoo = new Input('6');
        $inputInf = new Input('8');
        $inputQix = new Input('7');
        $inputInfQix = new Input('56');
        $inputInfQixFoo = new Input('168');
        $inputLarge = new Input('123456789');
        $input = new Input('2');

        self::assertEquals('Foo', $service->execute($inputFoo));
        self::assertEquals('Inf . Inf', $service->execute($inputInf));
        self::assertEquals('Qix . Qix', $service->execute($inputQix));
        self::assertEquals('Inf; Qix', $service->execute($inputInfQix));
        self::assertEquals('Foo; Bar; Qix . Inf', $service->execute($inputInfQixFoo));
        self::assertEquals('Foo . FooQixInf', $service->execute($inputLarge));
        self::assertEquals('2', $service->execute($input));
    }
}