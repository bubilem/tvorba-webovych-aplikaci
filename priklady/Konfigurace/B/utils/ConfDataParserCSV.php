<?php

namespace TWA\Konfigurace\B\Util;

class ConfDataParserCSV extends ConfDataParser
{

    /**
     * Parse $dataStorage to $this->data
     * @param \TWA\Konfigurace\B\Util\IData $dataStorage
     * @return \TWA\Konfigurace\B\Util\ConfDataParserCSV
     * @throws \Exception
     */
    public function parse(IData $dataStorage)
    {
        $lines = explode("\n", $dataStorage->getContents());
        if (is_array($lines)) {
            $this->data = array();
            foreach ($lines as $line) {
                $rows = str_getcsv($line, ";");
                if (isset($rows[0]) && isset($rows[0])) {
                    $this->data[$rows[0]] = $rows[1];
                }
            }
        }
        if (!is_array($this->data)) {
            throw new \Exception("Parsing CSV problem.");
        }
        return $this;
    }
}
