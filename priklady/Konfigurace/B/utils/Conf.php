<?php

namespace TWA\Konfigurace\B\Util;

class Conf
{

    private $data;

    public function __construct(IData $dataStorage)
    {
        $this->data = array();
        $this->load($dataStorage);
    }

    public function get(string $name, $default = null): string
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        } else {
            return $default;
        }
    }

    private function load(IData $dataStorage)
    {
        $parser = null;
        try {
            switch ($dataStorage->getType()) {
                case 'ini':
                    $parser = new ConfDataParserINI();
                    break;
                case 'csv':
                    $parser = new ConfDataParserCSV();
                    break;
                case 'xml':
                    $parser = new ConfDataParserXML();
                    break;
            }
            if (is_object($parser)) {
                $this->data = $parser->parse($dataStorage)->get();
            }
        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }
}
