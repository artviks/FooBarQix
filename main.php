<?php

use App\Models\App;
use App\Models\Elements\Bar;
use App\Models\Elements\ElementCollection;
use App\Models\Elements\Foo;
use App\Models\Input;

require "vendor/autoload.php";


$userInput = readline('Provide positive integer: ');


if ($userInput === '0' || ! ctype_digit($userInput) )
{
    exit('Input is not positive integer!');
}

$input = new Input($userInput);
$elements = new ElementCollection();
$elements->addMany([
    new Foo,
    new Bar()
]);

$app = new App($elements);
echo $app->execute($input);