<?php

use TWA\NavrhoveVzory\Singleton;

require 'Singleton.php';
$singleton = Singleton\Singleton::getInstance();
var_dump($singleton);
$nextSingleton = Singleton\Singleton::getInstance();
var_dump($nextSingleton);
