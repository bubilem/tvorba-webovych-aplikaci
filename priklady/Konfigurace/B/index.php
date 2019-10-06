<?php
require 'utils/IData.php';
require 'utils/File.php';
require 'utils/ConfDataParser.php';
require 'utils/ConfDataParserINI.php';
require 'utils/ConfDataParserCSV.php';
require 'utils/ConfDataParserXML.php';
require 'utils/Conf.php';

use TWA\Konfigurace\B\Util;

/* INI config file */

$confINI = new Util\Conf(new Util\File("conf/conf.ini"));
echo $confINI->get('USERNAME', 'default') . PHP_EOL;
/* CSV config file */
$confCSV = new Util\Conf(new Util\File("conf/conf.csv"));
echo $confCSV->get('USERNAME', 'default') . PHP_EOL;
/* XML config file */
$confXML = new Util\Conf(new Util\File("conf/conf.xml"));
echo $confXML->get('USERNAME', 'default') . PHP_EOL;
