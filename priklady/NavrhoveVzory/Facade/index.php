<?php

use TWA\NavrhoveVzory\Facade;

require 'Affix.php';
require 'Strings.php';
require 'Facade.php';

$facade = new Facade\Facade();
echo $facade->valuesToString([24, 15, 7, 40], "'-", "'");
echo PHP_EOL;
echo $facade->addPostfix("19", " °C");
