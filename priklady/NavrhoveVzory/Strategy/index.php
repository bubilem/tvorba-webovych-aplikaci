<?php

use TWA\NavrhoveVzory\Strategy;

require 'IStrategy.php';
require 'RecursiveFibonacci.php';
require 'SequentialFibonacci.php';
require 'Context.php';

$recursiveContext = new Strategy\Context(new Strategy\RecursiveFibonacci());
echo $recursiveContext->fib(7);
echo PHP_EOL;
$sequentialContext = new Strategy\Context(new Strategy\SequentialFibonacci());
echo $sequentialContext->fib(7);
