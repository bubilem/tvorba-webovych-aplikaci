<?php

namespace TWA\NavrhoveVzory\LazyLoading;

class ProductModel
{

    private $name;

    public function __construct()
    {
        $this->name = NULL;
    }

    public function getName()
    {
        if ($this->name === NULL) {
            $this->load();
        }
        return $this->name;
    }

    public function load()
    {
        /* loading code - file parsing, database... */
        $this->name = 1;
    }
}
