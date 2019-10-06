<?php

use TWA\NavrhoveVzory\PlynuleRozhrani;

require 'ProductModel.php';
$product = PlynuleRozhrani\ProductModel::create()->name("A")->code("1")->price(1.5);
echo $product;
