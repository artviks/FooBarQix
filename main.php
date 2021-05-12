<?php

require "vendor/autoload.php";


$serviceChoice = readline('Choose your service (Enter 0 for FooBarQix or 1 for InfQixFoo): ');
if ((int)$serviceChoice < 0 || (int)$serviceChoice > 1 || !ctype_digit($serviceChoice)) {
    exit('Invalid input!');
}

$userInput = readline('Provide positive integer: ');
if ($userInput === '0' || !ctype_digit($userInput)) {
    exit('Input is not positive integer!');
}

$input = new \App\Models\Input($userInput);
$services = [
    \App\Services\FooBarQixService::class,
    \App\Services\InfQixFooService::class
];

$container = require "core/bootstrap.php";
$service = $container->get($services[(int)$serviceChoice]);

echo $service->execute($input);