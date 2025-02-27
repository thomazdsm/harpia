@extends('layouts.modulos.seguranca')

@section('title')
    Permissoes
@stop

@section('subtitle')
    Cadastro de permissao
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Formulário de cadastro de permissoes</h3>
        </div>
        <div class="card-body">
            {!! Form::open(["route" => 'seguranca.permissoes.create', "method" => "POST", "id" => "form", "role" => "form"]) !!}
                @include('Seguranca::permissoes.includes.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@stop