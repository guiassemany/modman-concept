<?php

namespace App\Modman;

use App\Modman\CheckPermissionTrait;

class Module
{

    use CheckPermissionTrait;

    private $name;
    private $key;
    private $functionalities;

    public function __construct($name, $key)
    {
        $this->name = $name;
        $this->key = $key;
        $this->functionalities = [];
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param Functionality $functionality
     */
    public function addFunctionality(Functionality $functionality)
    {
        $this->functionalities[] = $functionality;
    }

    /**
     * @param $funcName
     * @return Functionality
     */
    public function selectFunctionality($funcName)
    {
        foreach ( $this->functionalities as $functionality) {
            if ( $funcName == $functionality->getName() ) {
                return $functionality;
            }
        }
        throw new \Exception('No functionality with this name.');
    }

}