<?php

namespace TWA\NavrhoveVzory\Factory;

class Factory
{

    public function createOK(): Button
    {
        $btn = new Button('OK');
        $btn->setColor("green");
        return $btn;
    }
}
