<?php

namespace TWA\AutomatickeNacitaniTrid\core;

use TWA\AutomatickeNacitaniTrid\core\group;
use TWA\AutomatickeNacitaniTrid\other;


/**
 * Demonstrativní Controller
 */
class PageController
{

    /**
     * @var PageModel 
     */
    private $page;

    /**
     * Inicializace Controlleru
     */
    public static function init()
    {
        echo 'Inicializace ' . __METHOD__ . PHP_EOL;
    }

    /**
     * Vytvoření nové instance PageControlleru pomocí statické metody
     * @return \core\PageController
     */
    public static function create(): PageController
    {
        return new PageController();
    }

    /**
     * Hlavní vykonávací metoda
     */
    public function main()
    {
        $this->page = new PageModel();
        $this->page->hello();
        group\UtilityOne::hello();
        other\UtilityTwo::hello();
    }
}
