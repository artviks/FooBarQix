<?php

use App\Models\Elements\Bar;
use App\Models\Elements\ElementCollection;
use App\Models\Elements\Foo;
use App\Models\Elements\Inf;
use App\Models\Elements\Qix;
use App\Services\FooBarQixService;
use App\Services\InfQixFooService;
use App\Services\MultiplierService;
use App\Services\OccurrenceService;
use League\Container\Container;


$fooBarQixMultiplierSeparator = ', ';
$infQixFooMultiplierSeparator = '; ';
$mainSeparator = ' . ';

$inf = new Inf(8,'8', 8);
$qix = new Qix(7,'7');
$foo = new Foo(3, '3');
$bar = new Bar(5,'5');

$elementsFooBarQix = new ElementCollection();
$elementsFooBarQix->addMany([$foo, $bar, $qix]);

$infMultiplierElements = new ElementCollection();
$infMultiplierElements->addMany([$inf, $qix, $foo]);
$infOccurrenceElements = new ElementCollection();
$infOccurrenceElements->addMany([$foo, $inf, $qix]);


$container = new Container;

$container->add('FooBarQixMultiplier', MultiplierService::class)
    ->addArguments([
        $elementsFooBarQix,
        $fooBarQixMultiplierSeparator
    ]);
$container->add('FooBarQixOccurrences', OccurrenceService::class)
    ->addArgument($elementsFooBarQix);

$container->add('InfQixFooMultiplier', MultiplierService::class)
    ->addArguments([
        $infMultiplierElements,
        $infQixFooMultiplierSeparator,
        $inf
    ]);
$container->add('InfQixFooOccurrences', OccurrenceService::class)
    ->addArgument($infOccurrenceElements);


$container->add(FooBarQixService::class, FooBarQixService::class)
    ->addArguments([
        'FooBarQixMultiplier',
        'FooBarQixOccurrences',
        $mainSeparator
    ]);
$container->add(InfQixFooService::class, InfQixFooService::class)
    ->addArguments([
        'InfQixFooMultiplier',
        'InfQixFooOccurrences',
        $mainSeparator
    ]);

return $container;