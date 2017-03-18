<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modman\Parser;

class HomeController extends Controller
{
    private $modmanParser;

    public function __construct(Parser $modmanParser)
    {
        $this->modmanParser = $modmanParser;
    }

    public function index()
    {
        $a = $this->modmanParser
            ->getSystem()
            ->selectModule('funcionario')
            ->selectFuncionality('alter_employee_registration')
            ->hasPermission();
        dd($a);
    }

}
