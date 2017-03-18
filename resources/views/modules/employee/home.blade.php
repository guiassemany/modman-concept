@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <div class="row">
                            @if($createEmployee)
                                <div class="col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                Criar funcionário
                                            </div>
                                            <div class="panel-footer">
                                                <a href="{{route('employee.create')}}">Acessar <i class="glyphicon glyphicon-arrow-right"></i></a>
                                            </div>
                                        </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Funcionários</div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Matrícula</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <th scope="row">{{$employee->id}}</th>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->registration}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                Ações <span class="caret"></span></button>
                                            <ul class="dropdown-menu" role="menu">
                                                @if($editEmployee)
                                                    <li><a href="{{route('employee.edit', ['employee' => $employee->id])}}">Editar</a></li>
                                                @endif
                                                <li><a href="#">Excluir</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$employees->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
