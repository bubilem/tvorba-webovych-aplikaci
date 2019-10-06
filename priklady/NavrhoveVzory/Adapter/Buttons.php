<?php

namespace TWA\NavrhoveVzory\Adapter;

/**
 * Buttons class
 */
class Buttons
{

    private $buttons;

    public function __construct()
    {
        $this->buttons = [];
    }

    public function addButton(IButton $button)
    {
        $this->buttons[] = $button;
    }

    public function setLabel($label)
    {
        foreach ($this->buttons as $button) {
            $button->setLabel($label);
        }
    }

    public function __toString()
    {
        return implode('', $this->buttons);
    }
}
