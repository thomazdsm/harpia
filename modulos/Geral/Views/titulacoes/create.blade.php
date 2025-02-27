@extends('layouts.modulos.default')

@section('title')
    Titulações
@stop

@section('subtitle')
    Cadastro de titulações
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Formulário de cadastro de titulações</h3>
        </div>
        <div class="card-body">
            {!! Form::open(["route" => "geral.titulacoes.create", "method" => "POST", "id" => "form", "role" => "form"]) !!}
            @include('Geral::titulacoes.includes.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@stop
