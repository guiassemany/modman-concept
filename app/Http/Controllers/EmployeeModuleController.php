<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modman\Parser;
use App\Employee;
use Illuminate\Support\Facades\Validator;

class EmployeeModuleController extends Controller
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
        $createEmployee = $this->parser->getSystem()
            ->selectModule('employee')
            ->selectFunctionality('create_employee')
            ->hasPermission();

        $editEmployee = $this->parser->getSystem()
            ->selectModule('employee')
            ->selectFunctionality('edit_employee')
            ->hasPermission();

        $deleteEmployee = $this->parser->getSystem()
            ->selectModule('employee')
            ->selectFunctionality('delete_employee')
            ->hasPermission();

        $employees = Employee::paginate(15);

        return view('modules.employee.home', compact('createEmployee', 'editEmployee', 'deleteEmployee' ,'employees'));
    }

    public function create(){
        return view('modules.employee.create');
    }

    public function store(Request $request){
        $employee = Employee::create($request->all());
        if(!$employee){
            $request->session()->flash('message', 'Ocorreu um erro!');
            $request->session()->flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
        $request->session()->flash('message', 'Funcionário adicionado com sucesso!');
        $request->session()->flash('alert-class', 'alert-success');
        return redirect()->route('employee.home');
    }

    public function edit(Employee $employee){
        $alterEmployeeReg = $this->parser->getSystem()
            ->selectModule('employee')
            ->selectFunctionality('alter_employee_registration')
            ->hasPermission();
        return view('modules.employee.edit', compact('employee', 'alterEmployeeReg'));
    }

    public function update(Request $request, Employee $employee){
        if(!$employee->update($request->all())){
            $request->session()->flash('message', 'Ocorreu um erro!');
            $request->session()->flash('alert-class', 'alert-danger');
            return redirect()->back()->withErrors();
        }
        $request->session()->flash('message', 'Funcionário atualizado com sucesso!');
        $request->session()->flash('alert-class', 'alert-success');
        return redirect()->route('employee.home');
    }

    public function destroy(Request $request, Employee $employee){
        if(!$employee->delete()){
            $request->session()->flash('message', 'Ocorreu um erro!');
            $request->session()->flash('alert-class', 'alert-danger');
            return redirect()->back();
        }

        $request->session()->flash('message', 'Funcionário excluido com sucesso!');
        $request->session()->flash('alert-class', 'alert-success');
        return redirect()->route('employee.home');


    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:employees',
            'registration' => 'required|numeric|min:6',
        ]);
    }
}
