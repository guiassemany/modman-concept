@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($employeeModule)
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        Funcionários
                                    </div>
                                    <div class="panel-footer">
                                        <a href="{{route('employee.home')}}">Acessar <i class="glyphicon glyphicon-arrow-right"></i></a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
