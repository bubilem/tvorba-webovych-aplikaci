<?php

namespace TWA\NavrhoveVzory\Strategy;

class RecursiveFibonacci implements IStrategy
{

    public function fib(int $n): int
    {
        if ($n < 2) {
            return $n;
        } else {
            return $this->fib($n - 1) + $this->fib($n - 2);
        }
    }
}
