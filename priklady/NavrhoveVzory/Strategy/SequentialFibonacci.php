<?php

namespace TWA\NavrhoveVzory\Strategy;

class SequentialFibonacci implements IStrategy
{

    public function fib(int $n): int
    {
        if ($n < 2) {
            return $n;
        } else {
            $beforePrevious = 0;
            $previous = 1;
            for ($i = 2; $i <= $n; $i++) {
                $fib = $previous + $beforePrevious;
                $beforePrevious = $previous;
                $previous = $fib;
            }
            return $fib;
        }
    }
}
