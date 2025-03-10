@extends('layouts.modulos.default')

@section('title')
    Funções
@stop

@section('subtitle')
    Edição de função
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title m-0">Formulário de edição de função</h3>
        </div>
        <div class="card-body">
            {!! Form::model($funcao, ["route" => ['rh.funcoes.edit',$funcao->fun_id], "method" => "PUT", "id" => "form", "role" => "form", "class" => "d-flex w-100"]) !!}
                @include('RH::funcoes.includes.formulario')
            {!! Form::close() !!}

        </div>
    </div>
@stop
