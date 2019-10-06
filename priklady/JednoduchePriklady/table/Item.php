<?php

namespace TWA\JednoduchePriklady\table;

/**
 * Table item class
 */
abstract class Item
{

    protected $value;
    protected $type;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    abstract public function render(): string;

    public function __toString()
    {
        return $this->render();
    }
}
