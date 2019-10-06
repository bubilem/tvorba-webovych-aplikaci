<?php

namespace TWA\PraceSDatabazi\Database;

class Query
{

    /**
     * Parts of sql query
     * @var array 
     */
    private $query;

    /**
     * Data for the query
     * @var array 
     */
    private $args;

    /**
     * Static array for the generating the SELECT query
     * @var array 
     */
    private static $partsOfQuery = [
        'select' => 'SELECT',
        'from' => 'FROM',
        'where' => 'WHERE',
        'group' => 'GROUP BY',
        'having' => 'HAVING',
        'order' => 'ORDER BY',
        'limit' => 'LIMIT'
    ];

    /**
     * Initialization the query and arguments
     */
    public function __construct()
    {
        $this->query = $this->args = [];
    }

    public static function create(): Query
    {
        return new Query();
    }

    /**
     * Rendering the SELECT query to the string
     * @return string
     */
    public function render(): string
    {
        $str = '';
        foreach (self::$partsOfQuery as $key => $value) {
            if (!empty($this->query[$key])) {
                $str .= $value . ' ' . $this->query[$key] . ' ';
            }
        }
        return trim($str);
    }

    /**
     * Set the arguments
     * @param array $args Input array with arguments
     * @return \BUB\K5PR05\Database\Query
     */
    public function setArgs($args): Query
    {
        if (is_array($args) && !empty($args)) {
            $this->args = $args;
        }
        return $this;
    }

    /**
     * Add arguments to the existing array with arguments
     * @param array $args
     * @return \BUB\K5PR05\Database\Query
     */
    public function addArgs($args): Query
    {
        if (is_array($args) && !empty($args)) {
            $this->args += $args;
        }
        return $this;
    }

    /**
     * Get the whole array with arguments
     * @return array
     */
    public function getArgs(): array
    {
        return $this->args;
    }

    /**
     * Clear both arrays: query data and arguments
     * @return Query
     */
    public function clear(): Query
    {
        $this->query = array();
        $this->args = array();
        return $this;
    }

    /**
     * Render query to a string
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * Magic method for the all supported setters, getters and adders
     * @param string $name Name of the called function (setSelect, getWhere, addOrder...)
     * @param array $arguments Arguments of the called function
     * @return mixed Getters and Adders return part of query, setters return \BUB\K5PR05\Database\Query
     */
    public function __call($name, $arguments)
    {
        $typeOfMethod = strtolower(substr($name, 0, 3));
        if (in_array($typeOfMethod, array('set', 'add', 'get', 'clr'))) {
            $name = strtolower(substr($name, 3));
            if (array_key_exists($name, self::$partsOfQuery)) {
                switch ($name) {
                    case 'select':
                    case 'order':
                    case 'group':
                        $separator = ', ';
                        break;
                    case 'where':
                    case 'having':
                        $separator = ' AND ';
                        break;
                    case 'from':
                    default:
                        $separator = ' ';
                        break;
                }
                switch ($typeOfMethod) {
                    case 'set':
                        $value = implode($separator, $arguments);
                        if (!empty($value)) {
                            $this->query[$name] = $value;
                        }
                        break;
                    case 'add':
                        $value = implode($separator, $arguments);
                        if (!empty($value)) {
                            if (isset($this->query[$name]) && !empty($this->query[$name])) {
                                $value = $this->query[$name] . $separator . $value;
                            }
                            $this->query[$name] = $value;
                        }
                        break;
                    case 'get':
                        if (isset($this->query[$name])) {
                            return $this->query[$name];
                        } else {
                            return NULL;
                        }
                        break;
                    case 'clr':
                        if (isset($this->query[$name])) {
                            unset($this->query[$name]);
                        }
                        break;
                }
            }
        }
        return $this;
    }
}
