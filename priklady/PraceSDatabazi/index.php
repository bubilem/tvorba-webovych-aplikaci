<?php

use TWA\PraceSDatabazi\Database;

require 'database/DatabaseException.php';
require 'database/IResult.php';
require 'database/IDBDriver.php';
require 'database/Query.php';
require 'database/MySQL/Result.php';
require 'database/MySQL/DBDriver.php';


try {
    $db = new Database\MySQL\DBDriver('127.0.0.1', 'demo', 'root', '');
    $db->connect();
    try {
        //$db->insert('demo', array('name' => 'Item', 'date' => date('Y-m-d H:i:s')));
    } catch (Database\DatabaseException $e) {
        echo $e->getMessage();
    }
    $query = new Database\Query();
    $query->setSelect("id")->setFrom("demo")->setWhere("id > :val");
    $query->addSelect("name")->addWhere("name LIKE 'I%'");
    $query->setArgs(array(':val' => 1));
    $result = $db->query($query->render(), $query->getArgs())->toArray();
    var_dump($result);
    $db->close();
} catch (Database\DatabaseException $e) {
    echo $e->getMessage();
}
