<?php

namespace TWA\Konfigurace\A\Util;

class ConfLoaderINI extends ConfLoader
{

    /**
     * Load file data to association array
     * @return array 
     * @throws \Exception
     */
    public function load()
    {
        $fileData = parse_ini_file($this->filename);
        if (is_array($fileData)) {
            return $fileData;
        } else {
            throw new \Exception("Loading $this->filename problem.");
        }
    }
}
