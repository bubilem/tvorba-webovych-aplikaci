<?php

namespace TWA\PraceSDatabazi\Database\MySQL;

use TWA\PraceSDatabazi\Database\IResult;
use TWA\PraceSDatabazi\Database\IDBDriver;

/**
 * MySQL PDO driver
 */
class DBDriver implements IDBDriver
{

    private $host;
    private $db;
    private $username;
    private $password;

    /**
     * Main connection link
     * @var type 
     */
    private $connection = null;

    /**
     * Basic configuration array
     * @var array 
     */
    private static $settings = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ];

    public function __construct($host, $db, $username, $password)
    {
        $this->host = $host;
        $this->db = $db;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Connect to MySQL
     * @throws DatabaseException
     */
    public function connect()
    {
        try {
            $this->connection = new \PDO("mysql:host=$this->host;dbname=$this->db", $this->username, $this->password, self::$settings);
        } catch (\PDOException $e) {
            throw DatabaseException::connectionWasNotEstablished('MySQL', $e->getMessage());
        }
    }

    /**
     * Close to MySQL
     * @throws DatabaseException
     */
    public function close()
    {
        $this->connection = NULL;
    }

    /**
     * Send query to database
     * @param string $queryString
     * @param array $queryArgs
     * @return IResult
     * @throws DatabaseException
     */
    public function query(string $queryString, array $queryArgs = []): IResult
    {
        if (!$this->connection instanceof \PDO) {
            throw DatabaseException::noConnection();
        }
        try {
            if (is_array($queryArgs) && !empty($queryArgs)) {
                $result = new Result($this->connection->prepare($queryString));
                $result->execute($queryArgs);
            } else {
                $result = new Result($this->connection->query($queryString));
            }
        } catch (\PDOException $e) {
            throw DatabaseException::queryError($e->getMessage());
        }
        if (!$result->isError()) {
            return $result;
        } else {
            throw DatabaseException::queryError($result->getErrorInfoMessage());
        }
    }

    /**
     * Insert row into table
     * @param string $table name of database table
     * @param array $values array of values (attribute values)
     * @return IResult
     * @throws DatabaseException
     */
    public function insert(string $table, array $values): IResult
    {
        if (is_array($values) && !empty($values)) {
            $colNames = implode(',', array_map(function ($v, $k) {
                return '`' . $k . '`';
            }, $values, array_keys($values)));
            $colValKeys = implode(',', array_map(function ($v, $k) {
                return ':' . $k;
            }, $values, array_keys($values)));
            return $this->query('INSERT INTO `' . $table . '` (' . $colNames . ') VALUES (' . $colValKeys . ')', $values);
        } else {
            throw DatabaseException::error("Bad args");
        }
    }
}
