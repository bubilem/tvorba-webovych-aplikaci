<?php

namespace TWA\NavrhoveVzory\Facade;

class Strings
{

    private $strings;

    public function __construct()
    {
        $this->strings = [];
    }

    public function add(string $value)
    {
        $this->strings[] = $value;
    }

    public function toString($separator): string
    {
        return implode($separator, $this->strings);
    }
}
