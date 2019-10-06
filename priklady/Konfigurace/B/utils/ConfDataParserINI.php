<?php

namespace TWA\Konfigurace\B\Util;

class ConfDataParserINI extends ConfDataParser
{

    /**
     * Load file data to association array
     * @param \TWA\Konfigurace\B\Util\IData $dataStorage
     * @return \TWA\Konfigurace\B\Util\ConfDataParserINI
     * @throws \Exception
     */
    public function parse(IData $dataStorage)
    {
        $this->data = parse_ini_string($dataStorage->getContents());
        if (!is_array($this->data)) {
            throw new \Exception("Parsing INI problem.");
        }
        return $this;
    }
}
