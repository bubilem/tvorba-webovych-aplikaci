<?php

namespace TWA\JednoduchePriklady\table;

class ItemText extends Item
{

    public function render(): string
    {
        return '<td>' . $this->value . '</td>';
    }
}
