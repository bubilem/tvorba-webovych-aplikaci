<?php

namespace TWA\PraceSDatabazi\Database;

/**
 * Database result interface
 */
interface IResult
{

    /**
     * Converts the last result to the array
     */
    public function toArray();

    /**
     * Returns the number of rows from the last result
     */
    public function getRowCount();

    /**
     * Detects if the error occurred in the last result
     */
    public function isError();

    /**
     * Gets the error of the last result
     */
    public function getErrorInfoMessage();
}
