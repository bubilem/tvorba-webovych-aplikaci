<?php

namespace TWA\NavrhoveVzory\Adapter;

/**
 * Adapter class
 */
class Button implements IButton
{

    private $button;

    public function __construct(External\SomeButton $button)
    {
        $this->button = $button;
    }

    /**
     * Label setter
     * @param string $label
     */
    public function setLabel(string $label)
    {
        $this->button->setTitle($label);
    }

    /**
     * Label getter
     * @return string
     */
    public function getLabel(): string
    {
        return $this->button->getTitle();
    }

    /**
     * Color setter
     * @param string $hexadecimalColor 6 hexadecimal characters + '#' for prefix (example: #00ff10)
     */
    public function setColor(string $hexadecimalColor)
    {
        list($r, $g, $b) = sscanf($hexadecimalColor, "#%02x%02x%02x");
        $this->button->setColor("$r,$g,$b");
    }

    /**
     * Color getter
     * @return string 6 hexadecimal characters + '#' for prefix (example: #00ff10)
     */
    public function getColor(): string
    {
        $tmp = array_map(function ($value) {
            return str_pad(dechex($value), 2, '0', STR_PAD_LEFT);
        }, explode(',', $this->button->getColor()));
        return "#$tmp[0]$tmp[1]$tmp[2]";
    }

    /**
     * String representation of button
     * @return string
     */
    public function __toString(): string
    {
        return $this->getLabel() . ' ' . $this->getColor() . ' button.' . PHP_EOL;
    }
}
