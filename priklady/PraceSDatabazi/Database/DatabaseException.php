<?php

namespace TWA\PraceSDatabazi\Database;

/**
 * Database exceptions
 */
class DatabaseException extends \Exception
{

    /**
     * Connection was not established
     * @param string $srbd
     * @param string $errMessage
     * @return \self
     */
    public static function connectionWasNotEstablished($srbd, $errMessage)
    {
        return new self(sprintf("The connection with %s was not established (%s).", $srbd, $errMessage));
    }

    /**
     * Connection does not exist
     * @return \self
     */
    public static function noConnection()
    {
        return new self(sprintf("No connection."));
    }

    /**
     * Result does not exist
     * @param string $demand
     * @return \self
     */
    public static function noResult($demand)
    {
        return new self(sprintf("%s: result does not exist.", $demand));
    }

    /**
     * Query error
     * @param string $message
     * @return \self
     */
    public static function queryError($message)
    {
        return new self(sprintf("Query error: '%s'.", $message));
    }

    /**
     * Other errors
     * @param string $message
     * @return \self
     */
    public static function error($message)
    {
        return new self(sprintf("Error: '%s'.", $message));
    }
}
