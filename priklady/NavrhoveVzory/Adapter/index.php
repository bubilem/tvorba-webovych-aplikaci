<?php

use TWA\NavrhoveVzory\Adapter;

require 'IButton.php';
require 'Button.php';
require 'External/SomeButton.php';
require 'Buttons.php';

$saveBtn = new Adapter\External\SomeButton('Save');
$buttonAdapter = new Adapter\Button($saveBtn);
$buttonAdapter->setColor("#00FF00");
echo $buttonAdapter;

$loadBtn = new Adapter\External\SomeButton('Load', '0,0,255');
$buttons = new Adapter\Buttons();
$buttons->addButton(new Adapter\Button($saveBtn));
$buttons->addButton(new Adapter\Button($loadBtn));
echo $buttons;

$buttons->setLabel('Reset');
echo $buttons;
