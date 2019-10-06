<?php

namespace TWA\NavrhoveVzory\Factory;

class Button
{

    private $label;
    private $color;

    public function __construct(string $label)
    {
        $this->label = $label;
        $this->setColor('black');
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function __toString()
    {
        return $this->label . ' ' . $this->color . ' button.' . PHP_EOL;
    }
}
