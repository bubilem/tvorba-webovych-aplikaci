<?php

namespace TWA\BezpecnyPrenosDat\Util;

/**
 * File util class
 */
class File
{

    /**
     * Base path part
     *
     * @var string
     */
    public static $path = 'data/';

    /**
     * Returns the file contents
     *
     * @param string $filename
     * @return string|boolean
     */
    public static function read(string $filename)
    {
        if (file_exists(self::$path . $filename)) {
            return trim(file_get_contents(self::$path . $filename));
        } else {
            return false;
        }
    }

    /**
     * Writes the data to file
     *
     * @param string $filename
     * @param string $data
     * @return void
     */
    public static function write(string $filename, string $data)
    {
        $fd = @fopen(self::$path . $filename, "w");
        if ($fd) {
            fwrite($fd, trim($data));
            fclose($fd);
        }
    }
}
