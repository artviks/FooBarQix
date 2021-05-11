<?php

use App\App;
use App\Models\Elements\Bar;
use App\Models\Elements\ElementCollection;
use App\Models\Elements\Foo;
use App\Models\Elements\Qix;
use App\Models\Input;
use App\Services\MultiplierService;
use App\Services\OccurrenceService;

require "vendor/autoload.php";


$userInput = readline('Provide positive integer: ');

if ($userInput === '0' || ! ctype_digit($userInput) )
{
    exit('Input is not positive integer!');
}

$input = new Input($userInput);
$elements = new ElementCollection();
$elements->addMany([
    new Foo(3,3),
    new Bar(5,5),
    new Qix(7,7)
]);
$multiplierService = new MultiplierService($elements);
$occurrenceService = new OccurrenceService($elements);

$app = new App($multiplierService, $occurrenceService);

echo $app->run($input);