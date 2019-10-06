<?php

namespace TWA\Konfigurace\B\Util;

class ConfDataParserXML extends ConfDataParser
{

    /**
     * * Load xml file data to association array
     * @param \TWA\Konfigurace\B\Util\IData $dataStorage
     * @return \TWA\Konfigurace\B\Util\ConfDataParserXML
     * @throws \Exception
     */
    public function parse(IData $dataStorage)
    {
        $xml = simplexml_load_string($dataStorage->getContents(), "SimpleXMLElement", LIBXML_NOCDATA);
        $array = json_decode(json_encode($xml), TRUE);
        if (is_array($array['item'])) {
            $this->data = array();
            foreach ($array['item'] as $item) {
                if (!isset($item['@attributes']['name']) || !isset($item['@attributes']['value'])) {
                    continue;
                }
                $this->data[$item['@attributes']['name']] = $item['@attributes']['value'];
            }
        }
        if (!is_array($this->data)) {
            throw new \Exception("Parsing XML problem.");
        }
        return $this;
    }
}
