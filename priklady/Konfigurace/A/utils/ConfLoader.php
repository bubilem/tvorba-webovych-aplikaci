<?php

namespace TWA\Konfigurace\A\Util;

abstract class ConfLoader
{

    protected $filename;

    public function __construct($filename)
    {
        if (File::exists($filename)) {
            $this->filename = $filename;
        } else {
            throw new \Exception("File $filename not found.");
        }
    }

    abstract public function load();
}
