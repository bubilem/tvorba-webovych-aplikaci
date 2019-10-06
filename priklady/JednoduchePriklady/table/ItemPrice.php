<?php

namespace TWA\JednoduchePriklady\table;

class ItemPrice extends Item
{

    private $currency;

    public function __construct($value)
    {
        parent::__construct($value);
        $this->currency = 'CZK';
    }

    private function toFormatedString()
    {
        if ($this->value !== NULL) {
            return number_format($this->value, (($this->value - (int) $this->value != 0) ? 2 : 0), ',', '&nbsp;');
        } else {
            return '-';
        }
    }

    public function render(): string
    {
        return '<td class="price">' . $this->toFormatedString() . ' ' . $this->currency . '</td>';
    }
}
