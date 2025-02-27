@extends('layouts.modulos.seguranca')

@section('title')
    Perfis
@stop

@section('subtitle')
    Cadastro de perfil
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Formulário de cadastro de perfis</h3>
        </div>
        <div class="card-body">
            {!! Form::open(["route" => 'seguranca.perfis.create', "method" => "POST", "id" => "form", "role" => "form"]) !!}
            @include('Seguranca::perfis.includes.formulario_create')
            {!! Form::close() !!}
        </div>
    </div>
@stop