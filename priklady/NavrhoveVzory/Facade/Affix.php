<?php

namespace TWA\NavrhoveVzory\Facade;

class Affix
{

    public function addPrefix(string $string, string $prefix): string
    {
        return $prefix . $string;
    }

    public function addPostfix(string $string, string $postfix): string
    {
        return $string . $postfix;
    }
}
