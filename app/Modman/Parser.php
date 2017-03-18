<?php

namespace App\Modman;

class Parser {

    private $system;

    function __construct($systemName)
    {
        $this->parseConfig($systemName);
    }

    /**
     * @return mixed
     */
    public function getSystem()
    {
        return $this->system;
    }

    private function parseConfig($systemName)
    {

        $systems = config('modman.systems');
        $system = $systems[$systemName];
        $this->system = new System($systemName, $system['key']);
        $modules = $systems[$systemName]['modules'];
        foreach ($modules as $moduleName => $module){
            $this->system->addModule(new Module($moduleName, $module['key']));
            $functionalities = $systems[$systemName]['modules'][$moduleName]['functionalities'];
            foreach($functionalities as $functionalityName => $functionality){
                $this->system->selectModule($moduleName)->addFunctionality(new Functionality($functionalityName, $functionality['key']));
            }
        }
    }

}