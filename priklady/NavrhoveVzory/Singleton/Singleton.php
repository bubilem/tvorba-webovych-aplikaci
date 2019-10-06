<?php

namespace TWA\NavrhoveVzory\Singleton;

class Singleton
{

    private static $instance = NULL;

    private function __construct()
    { }

    public static function getInstance()
    {
        if (self::$instance === NULL) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}
