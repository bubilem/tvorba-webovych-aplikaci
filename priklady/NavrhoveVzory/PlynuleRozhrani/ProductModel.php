<?php

namespace TWA\NavrhoveVzory\PlynuleRozhrani;

class ProductModel
{

    private $name;
    private $code;
    private $price;

    public static function create(): ProductModel
    {
        return new ProductModel();
    }

    public function name(string $value): ProductModel
    {
        $this->name = $value;
        return $this;
    }

    public function code(string $value): ProductModel
    {
        $this->code = $value;
        return $this;
    }

    public function price(float $value): ProductModel
    {
        $this->price = $value;
        return $this;
    }

    public function __toString()
    {
        return 'n:' . $this->name . ', c:' . $this->code . ', p:' . $this->price . PHP_EOL;
    }
}
