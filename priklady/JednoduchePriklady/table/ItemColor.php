<?php

namespace TWA\JednoduchePriklady\table;

class ItemColor extends Item
{

    public function render(): string
    {
        return '<td class="color" style="background-color:' . $this->value . '"></td>';
    }
}
