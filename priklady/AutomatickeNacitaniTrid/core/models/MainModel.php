<?php

namespace TWA\AutomatickeNacitaniTrid\core;

abstract class MainModel
{

    public static function init()
    {
        echo 'Inicializace ' . __METHOD__ . PHP_EOL;
    }

    abstract protected function hello();
}
