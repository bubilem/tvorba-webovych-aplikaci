<?php

namespace TWA\NavrhoveVzory\Adapter;

interface IButton
{

    /**
     * Label setter
     * @param string $label
     */
    public function setLabel(string $label);

    /**
     * Label getter
     * @return string
     */
    public function getLabel(): string;

    /**
     * Color setter
     * @param string $hexadecimalColor 6 hexadecimal characters + '#' for prefix (example: #00ff10)
     */
    public function setColor(string $hexadecimalColor);

    /**
     * Color getter
     * @return string 6 hexadecimal characters + '#' for prefix (example: #00ff10)
     */
    public function getColor(): string;

    /**
     * String representation of button
     * @return string
     */
    public function __toString(): string;
}
