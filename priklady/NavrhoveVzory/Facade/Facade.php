<?php

namespace TWA\NavrhoveVzory\Facade;

class Facade
{

    private $affix;
    private $strings;

    public function __construct()
    {
        $this->affix = new Affix();
        $this->strings = new Strings();
    }

    public function valuesToString(array $array, string $prefix, string $postfix): string
    {
        foreach ($array as $item) {
            $affixed = $this->affix->addPrefix($this->addPostfix($item, $postfix), $prefix);
            $this->strings->add($affixed);
        }
        return $this->strings->toString(',');
    }

    public function addPostfix(string $string, string $prefix): string
    {
        return $this->affix->addPostfix($string, $prefix);
    }
}
