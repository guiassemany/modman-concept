<?php

namespace App\Modman;

use App\Modman\CheckPermissionTrait;

class Functionality
{

    use CheckPermissionTrait;

    private $name;
    private $key;

    public function __construct($name, $key)
    {
        $this->name = $name;
        $this->key = $key;
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

}