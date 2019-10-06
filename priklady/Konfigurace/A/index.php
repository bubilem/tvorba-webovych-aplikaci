<?php
require 'utils/File.php';
require 'utils/ConfLoader.php';
require 'utils/Conf.php';
require 'utils/ConfLoaderINI.php';
require 'utils/ConfLoaderCSV.php';
require 'utils/ConfLoaderXML.php';

use TWA\Konfigurace\A\Util\Conf;

/* PHP config file */

require 'conf/conf.php';
echo Conf::get('USERNAME') . PHP_EOL;
/* INI config file */
Conf::load("conf/conf.ini");
echo Conf::get('USER', 'Michal') . PHP_EOL;
echo Conf::get('USERNAME') . PHP_EOL;
/* CSV config file */
Conf::load("conf/conf.csv");
echo Conf::get('USERNAME') . PHP_EOL;
/* XML config file */
Conf::load("conf/conf.xml");
echo Conf::get('USERNAME') . PHP_EOL;
