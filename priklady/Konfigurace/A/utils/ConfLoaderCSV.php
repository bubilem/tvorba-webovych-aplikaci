<?php

namespace TWA\Konfigurace\A\Util;

class ConfLoaderCSV extends ConfLoader
{

    /**
     * Load file data to association array
     * @return array 
     * @throws \Exception
     */
    public function load()
    {
        $lines = explode("\n", File::getContents($this->filename));
        if (is_array($lines)) {
            $data = array();
            foreach ($lines as $line) {
                $rows = str_getcsv($line, ";");
                if (isset($rows[0]) && isset($rows[0])) {
                    $data[$rows[0]] = $rows[1];
                }
            }
        }
        if (is_array($data)) {
            return $data;
        } else {
            throw new \Exception("Loading $this->filename problem.");
        }
    }
}
