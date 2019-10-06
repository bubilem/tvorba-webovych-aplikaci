<?php

namespace TWA\AutomatickeNacitaniTrid\core;

/**
 * Automatické nahrání požadované třídy
 */
class Loader
{

    /**
     * Statické mapovací pole typu volaných tříd na názvy jejich složek
     * @var array
     */
    private static $classTypes = [
        'Controller' => 'controllers',
        'Model' => 'models'
    ];

    /**
     * Výchozí adresář pro ostatní třídy
     */
    const DEFAULT_CLASS_DIR = 'utilities';

    /**
     * Nahraje správný soubor třídy dle jména třídy
     * Tato metoda je určena pro spl_autoload_register()
     * Příklad 1: core\A\B nahraje soubor core/utilities/A/B.php
     * Příklad 2: core\DemoController nahraje soubor core/controllers/DemoController.php
     * Příklad 3: core\DemoModel nahraje soubor core/models/DemoModel.php
     * @param string $classFullName Název třídy
     * @return void
     */
    public static function loadClass($classFullName)
    {
        try {
            require_once self::getPath($classFullName);
        } catch (\Exception $exc) {
            echo $exc->getMessage();
            exit();
        }
        /* Volitelně můžeme nechat automaticky volat metodu init() */
        if (method_exists($classFullName, 'init')) {
            $classFullName::init();
        }
    }

    /**
     * Určení skutečné cesty souboru dle názvu třídy
     * @param string $classFullName Název třídy
     * @return string vygenerovaná cesta k souboru
     * @throws Exception
     */
    private static function getPath(string $classFullName): string
    {
        $classFullName = substr($classFullName, strlen("TWA\\AutomatickeNacitaniTrid\\")); //removing 'TWA\AutomatickeNacitaniTrid\'
        $classArray = explode('\\', $classFullName);
        if (!is_array($classArray) || count($classArray) < 2) {
            throw new \Exception("Nekompatibilní název třídy $classFullName.");
        }
        $path = array_shift($classArray) . '/' . self::detectClassTypeDir($classFullName) . '/';
        for ($i = 0; $i < count($classArray); $i++) {
            $path .= $classArray[$i] . ($i < count($classArray) - 1 ? '/' : '.php');
        }
        if (!file_exists($path)) {
            throw new \Exception("Nemohu určit cestu $classFullName.");
        }
        return $path;
    }

    /**
     * Z názvu třídy zjistí její typ a následně určí název adresáře
     * @param string $classFullName
     * @return string název adresáře
     */
    private static function detectClassTypeDir(string $classFullName): string
    {
        foreach (self::$classTypes as $classTypeName => $classTypeDirectory) {
            if (preg_match('~.*' . $classTypeName . '$~', $classFullName)) {
                return $classTypeDirectory;
            }
        }
        return self::DEFAULT_CLASS_DIR;
    }
}
