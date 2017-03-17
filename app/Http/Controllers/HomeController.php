<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $key = config('modman.modules.cadastro_funcionario');
        return $key;
    }
}
