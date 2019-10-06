<?php

namespace TWA\JednoduchePriklady\table;

/**
 * Table Row Class 
 */
class Row
{

    private $items;

    public function __construct(array $row, array $columns)
    {
        foreach ($columns as $key => $column) {
            $data = isset($row[$key]) ? $row[$key] : NULL;
            $className = 'TWA\JednoduchePriklady\table\Item' . $column->getType();
            $this->items[] = new $className($data);
        }
    }

    public function __toString()
    {
        return '<tr>' . implode('', $this->items) . '</tr>';
    }
}
