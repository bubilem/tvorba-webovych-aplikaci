<?php

namespace TWA\JednoduchePriklady\table;

class ItemNumeric extends Item
{

    public function render(): string
    {
        return '<td class="numeric">' . $this->value . '</td>';
    }
}
