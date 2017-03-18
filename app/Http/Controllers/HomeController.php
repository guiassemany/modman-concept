<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modman\Parser;

class HomeController extends Controller
{

    private $parser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Parser $parser)
    {
        $this->middleware('auth');
        $this->parser = $parser;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeModule = $this->parser->getSystem()->selectModule('employee')->hasPermission();
        return view('home', compact('employeeModule'));
    }
}
