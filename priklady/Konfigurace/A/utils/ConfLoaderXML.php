<?php

namespace TWA\Konfigurace\A\Util;

class ConfLoaderXML extends ConfLoader
{

    /**
     * Load file data to association array
     * @return array 
     * @throws \Exception
     */
    public function load()
    {
        $xml = simplexml_load_string(File::getContents($this->filename), "SimpleXMLElement", LIBXML_NOCDATA);
        $array = json_decode(json_encode($xml), TRUE);
        if (is_array($array['item'])) {
            $data = array();
            foreach ($array['item'] as $item) {
                if (!isset($item['@attributes']['name']) || !isset($item['@attributes']['value'])) {
                    continue;
                }
                $data[$item['@attributes']['name']] = $item['@attributes']['value'];
            }
        }
        if (is_array($data)) {
            return $data;
        } else {
            throw new \Exception("Loading $this->filename problem.");
        }
    }
}
