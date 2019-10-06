<?php

namespace TWA\Konfigurace\B\Util;

/**
 * Data storage interface
 */
interface IData
{

    /**
     * Get type of the source data (xml, csv, ini...)
     * @return string
     */
    public function getType(): string;

    /**
     * Get data content
     * @return string
     * @throws \Exception
     */
    public function getContents(): string;
}
