<?php

namespace TWA\NavrhoveVzory\Factory;

class StaticFactory
{

    public static function createOK(): Button
    {
        $btn = new Button('OK');
        $btn->setColor("green");
        return $btn;
    }
}
