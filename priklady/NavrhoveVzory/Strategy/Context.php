<?php

namespace TWA\NavrhoveVzory\Strategy;

class Context
{

    private $strategy;

    public function __construct(IStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function fib(int $n): int
    {
        return $this->strategy->fib($n);
    }
}
