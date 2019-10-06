<?php

namespace TWA\JednoduchePriklady\breadcrumb;

class Breadcrumb
{

    private $items;

    public function __construct()
    {
        $this->clear();
    }

    public function clear()
    {
        $this->items = [];
    }

    public function addItem(Item $item)
    {
        array_push($this->items, $item);
    }

    public function goBack()
    {
        array_pop($this->items);
        $lastItem = end($this->items);
        $lastItem->setUrl('');
    }

    public function __toString()
    {
        return '<div class="breadcrumb">' . implode(' / ', $this->items) . '</div>';
    }
}
