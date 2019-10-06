<?php

namespace TWA\Konfigurace\A\Util;

/**
 * 
 */
class File
{

    /**
     * Checks whether a file exists
     * @param string $filename
     * @return bool
     */
    public static function exists(string $filename): bool
    {
        return file_exists($filename);
    }

    public static function getName(string $path): string
    {
        return strval(pathinfo($path, PATHINFO_FILENAME));
    }

    public static function getExtension(string $path): string
    {
        return strval(strtolower(pathinfo($path, PATHINFO_EXTENSION)));
    }

    public static function getDirName(string $path): string
    {
        return strval(pathinfo($path, PATHINFO_DIRNAME));
    }

    /**
     * Get file contents
     * @param string $filename
     * @return string
     * @throws \Exception
     */
    public static function getContents(string $filename): string
    {
        if (File::exists($filename)) {
            $contents = file_get_contents($filename);
        } else {
            throw new \Exception("File $filename not found.");
        }
        if ($contents !== FALSE) {
            return $contents;
        } else {
            throw new \Exception("File::getContents($filename) problem.");
        }
    }
}
