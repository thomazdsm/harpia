@extends('layouts.modulos.default')

@section('title')
    Matrícula de Colaborador
@stop

@section('subtitle')
    Cadastro de Matrícula
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title m-0">Formulário de cadastro de matrícula</h3>
        </div>
        <div class="card-body">
            {!! Form::open(["route" => ['rh.colaboradores.matricula.create', 'id' => $colaborador->col_id], "method" => "POST", "id" => "form", "role" => "form"]) !!}
            @include('RH::colaboradores.includes.formulario_matricula')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
