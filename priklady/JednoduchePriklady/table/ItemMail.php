<?php

namespace TWA\JednoduchePriklady\table;

class ItemMail extends Item
{

    public function render(): string
    {
        return '<td><a href="mailto:' . $this->value . '">' . $this->value . '</a></td>';
    }
}
