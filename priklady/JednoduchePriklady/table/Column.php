<?php

namespace TWA\JednoduchePriklady\table;

/**
 * Column class
 */
class Column
{

    private static $allowedTypes = ['Text', 'Numeric', 'Price', 'Mail', 'Color'];
    private $title;
    private $type;

    public function __construct(string $title, string $type = '')
    {
        $this->title = $title;
        $this->setType($type);
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType($type)
    {
        if (in_array($type, self::$allowedTypes)) {
            $this->type = $type;
        } else {
            $this->type = self::$allowedTypes[0];
        }
    }

    public function __toString()
    {
        return '<th>' . $this->title . '</th>';
    }
}
