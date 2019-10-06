<?php

namespace TWA\JednoduchePriklady\table;

/**
 * Table class
 */
class Table
{

    private $name;
    private $columns;
    private $rows;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->columns = [];
        $this->rows = [];
    }

    public function addColumn(Column $column): Table
    {
        $this->columns[] = $column;
        return $this;
    }

    public function addRowData(array $rowData): Table
    {
        $this->rows[] = new Row($rowData, $this->columns);
        return $this;
    }

    private function renderCaption(): string
    {
        return '<caption>Tabulka: ' . $this->name . '</caption>';
    }

    private function renderHead(): string
    {
        return '<thead>' . implode('', $this->columns) . '<thead>';
    }

    private function renderBody(): string
    {
        return '<tbody>' . implode('', $this->rows) . '<tbody>';
    }

    public function __toString(): string
    {
        return '<table>' . $this->renderCaption() . $this->renderHead() . $this->renderBody() . '</table>';
    }
}
