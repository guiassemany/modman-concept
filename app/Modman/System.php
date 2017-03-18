<?php

namespace App\Modman;

use App\Modman\CheckPermissionTrait;

class System
{

    use CheckPermissionTrait;

    private $name;
    private $key;
    private $modules;

    public function __construct($name, $key)
    {
        $this->name = $name;
        $this->key = $key;
        $this->modules = [];
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

    public function addModule(Module $module)
    {
        $this->modules[] = $module;
        return $this;
    }

    public function getModules()
    {
        return $this->modules;
    }

    /**
     * @param $moduleName
     * @return Module | Bool
     */
    public function selectModule($moduleName)
    {
        foreach ( $this->modules as $module) {
            if ( $moduleName == $module->getName() ) {
                return $module;
            }
        }
        throw new \Exception('No module with this name.');
    }

}