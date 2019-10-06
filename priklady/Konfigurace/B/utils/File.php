<?php

namespace TWA\Konfigurace\B\Util;

/**
 * File
 */
class File implements IData
{

    private $path;

    public function __construct($path)
    {
        $this->path = $path;
        if (!$this->exists()) {
            throw new \Exception("File $this->path not found.");
        }
    }

    /**
     * Checks whether a file exists
     * @param string $filename
     * @return bool
     */
    public function exists(): bool
    {
        return file_exists($this->path);
    }

    /**
     * Get type of the source data (xml, csv, ini...)
     * @return string
     */
    public function getType(): string
    {
        return strval(strtolower(pathinfo($this->path, PATHINFO_EXTENSION)));
    }

    /**
     * Get file content
     * @return string
     * @throws \Exception
     */
    public function getContents(): string
    {
        if ($this->exists()) {
            $contents = file_get_contents($this->path);
        } else {
            throw new \Exception("File $this->path not found.");
        }
        if ($contents !== FALSE) {
            return $contents;
        } else {
            throw new \Exception("File::getContents() problem.");
        }
    }
}
