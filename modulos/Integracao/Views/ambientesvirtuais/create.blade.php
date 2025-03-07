@extends('layouts.modulos.default')

@section('title')
    Ambientes Virtuais
@stop

@section('subtitle')
    Cadastro de ambiente virtual
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Formulário de cadastro de ambientes virtuais</h3>
        </div>
        <div class="card-body">
            {!! Form::open(["route" => 'integracao.ambientesvirtuais.create', "method" => "POST", "id" => "form", "role" => "form"]) !!}
            @include('Integracao::ambientesvirtuais.includes.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@stop
