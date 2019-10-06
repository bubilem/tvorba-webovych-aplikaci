<?php

namespace TWA\NavrhoveVzory\Adapter\External;

/**
 * Adapee class
 */
class SomeButton
{

    /**
     * Caption of the button
     * @var string 
     */
    private $title;

    /**
     * Color of the button in decimal RGB string separated by coma
     * @var string 
     */
    private $decimalColor;

    public function __construct(string $title, string $decimalColor = '0,0,0')
    {
        $this->setTitle($title);
        $this->setColor($decimalColor);
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setColor($decimalColor)
    {
        $this->decimalColor = $decimalColor;
    }

    public function getColor(): string
    {
        return $this->decimalColor;
    }
}
