<?php

namespace TWA\BezpecnyPrenosDat\Util;

/**
 * Html util class
 */
class Html
{

    /**
     * Echo simple html table
     *
     * @param string $caption
     * @param array $data
     * @return void
     */
    public static function showTable(string $caption, array $data)
    {
        echo "<table><caption>$caption</caption>";
        foreach ($data as $key => $val) {
            echo "<tr><th>$key</th><td>$val</td></tr>";
        }
        echo "</table>";
    }

    /**
     * Echo html message
     *
     * @param string $text
     * @return void
     */
    public static function message(string $text)
    {
        echo "<p>$text</p>";
    }
}
