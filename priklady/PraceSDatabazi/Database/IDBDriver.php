<?php

namespace TWA\PraceSDatabazi\Database;

/**
 * Database driver interface
 */
interface IDBDriver
{

    /**
     * Connect to DBMS
     * @throws DatabaseException
     */
    public function connect();

    /**
     * Close connection to DBMS     
     */
    public function close();

    /**
     * Send query to database
     * @param string $queryString
     * @param array $queryArgs
     * @return IResult
     * @throws DatabaseException
     */
    public function query(string $queryString, array $queryArgs = []): IResult;

    /**
     * Insert row into table
     * @param string $table
     * @param array $values
     * @return IResult
     * @throws DatabaseException
     */
    public function insert(string $table, array $values): IResult;
}
