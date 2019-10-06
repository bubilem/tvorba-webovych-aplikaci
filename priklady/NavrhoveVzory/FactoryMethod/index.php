<?php

use TWA\NavrhoveVzory\Factory;

require 'Button.php';
require 'Factory.php';
require 'StaticFactory.php';

$btn = new Factory\Button("OK");
$btn->setColor("green");
echo $btn;

$factory = new Factory\Factory();
echo $factory->createOK();

echo Factory\StaticFactory::createOK();
