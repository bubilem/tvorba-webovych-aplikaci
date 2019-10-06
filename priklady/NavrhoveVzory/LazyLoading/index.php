<?php

use TWA\NavrhoveVzory\LazyLoading;

require 'ProductModel.php';
$product = new LazyLoading\ProductModel();
echo $product->getName();
