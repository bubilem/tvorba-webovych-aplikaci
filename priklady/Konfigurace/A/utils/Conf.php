<?php

namespace TWA\Konfigurace\A\Util;

class Conf
{

    private static $data = [];

    public static function get(string $name, string $default = ''): string
    {
        if (isset(self::$data[$name])) {
            return self::$data[$name];
        } else if (defined($name)) {
            return constant($name);
        } else {
            return $default;
        }
    }

    public static function load(string $filename)
    {
        $loader = null;
        try {
            switch (File::getExtension($filename)) {
                case 'ini':
                    $loader = new ConfLoaderINI($filename);
                    break;
                case 'csv':
                    $loader = new ConfLoaderCSV($filename);
                    break;
                case 'xml':
                    $loader = new ConfLoaderXML($filename);
                    break;
            }
            if (is_object($loader)) {
                self::$data = array_merge(self::$data, $loader->load($filename));
            }
        } catch (\Exception $e) {
            echo $e->getMessage() . '<br>';
        }
    }
}
