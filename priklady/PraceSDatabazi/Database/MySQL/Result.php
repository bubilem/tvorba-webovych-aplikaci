<?php

namespace TWA\PraceSDatabazi\Database\MySQL;

use TWA\PraceSDatabazi\Database\IResult;

/**
 * MySQL result class
 */
class Result implements IResult
{

    /**
     * @var mixed
     */
    protected $result;

    public function __construct($result)
    {
        $this->result = $result;
    }

    /**
     * Encapsulated function PDOStatement::execute
     * @param string $queryArgs
     * @return bool
     * @throws DatabaseException
     */
    public function execute($queryArgs)
    {
        if ($this->result instanceof \PDOStatement) {
            try {
                return $this->result->execute($queryArgs);
            } catch (\PDOException $e) {
                throw DatabaseException::error($e->getMessage());
            }
        } else {
            throw DatabaseException::noResult(__METHOD__);
        }
    }

    /**
     * Fetch \PDOStatement to the array
     * @return array
     * @throws DatabaseException
     */
    public function toArray()
    {
        if ($this->result instanceof \PDOStatement) {
            try {
                return $this->result->fetchAll(\PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                throw DatabaseException::error($e->getMessage());
            }
        } else {
            throw DatabaseException::noResult(__METHOD__);
        }
    }

    /**
     * Returns the number of rows from the last result
     * Encapsulated function PDOStatement::rowCount
     * @return int
     * @throws DatabaseException
     */
    public function getRowCount()
    {
        if ($this->result instanceof \PDOStatement) {
            try {
                return $this->result->rowCount();
            } catch (\PDOException $e) {
                throw DatabaseException::error($e->getMessage());
            }
        } else {
            throw DatabaseException::noResult(__METHOD__);
        }
    }

    /**
     * Detects if the error occurred in the last result
     * @return bool
     * @throws DatabaseException
     */
    public function isError()
    {
        if ($this->result instanceof \PDOStatement) {
            try {
                $errInfo = $this->result->errorInfo();
                return (isset($errInfo[0]) && $errInfo[0] === '00000') ? FALSE : TRUE;
            } catch (\PDOException $e) {
                throw DatabaseException::error($e->getMessage());
            }
        } else {
            throw DatabaseException::noResult(__METHOD__);
        }
    }

    /**
     * Gets the error of the last result
     * @return string
     * @throws DatabaseException
     */
    public function getErrorInfoMessage()
    {
        if ($this->result instanceof \PDOStatement) {
            $errInfo = $this->result->errorInfo();
            return $errInfo[0] . (isset($errInfo[1]) ? ', ' . $errInfo[1] : '') . (isset($errInfo[2]) ? ' ,' . $errInfo[2] : '');
        } else {
            throw DatabaseException::noResult(__METHOD__);
        }
    }
}
