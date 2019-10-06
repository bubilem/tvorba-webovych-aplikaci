<?php

/* Nastavení interního kódování na UTF-8 (Unicode) */
mb_internal_encoding("UTF-8");

/* Vložíme si třídu Loader */
require_once('core/utilities/Loader.php');
/* Zaregistrujeme si metodu Loader::loadClass jako metodu pro automatické načítání tříd.
  Více na: http://php.net/manual/en/function.spl-autoload-register.php */
try {
  spl_autoload_register('TWA\AutomatickeNacitaniTrid\core\Loader::loadClass', true);
} catch (Exception $exc) {
  echo 'Chyba při registraci automatické nahrávací funkce.';
  exit();
}
/* Rovnou můžeme zavolat metodu run třídy DemoController */
TWA\AutomatickeNacitaniTrid\core\PageController::create()->main();
