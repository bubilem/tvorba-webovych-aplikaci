<?php

namespace TWA\Konfigurace\B\Util;

abstract class ConfDataParser
{

    /**
     * Array configuration data
     * @var Array
     */
    protected $data;

    public function __construct()
    {
        $this->data = [];
    }

    /**
     * Parse $dataStorage to $this->data
     * @param \TWA\Konfigurace\B\Util\IData $dataStorage
     * @return \TWA\Konfigurace\B\Util\ConfDataParser
     * @throws \Exception
     */
    abstract public function parse(IData $dataStorage);

    /**
     * Return $this->data
     * @return array
     */
    public function get(): array
    {
        return $this->data;
    }
}
