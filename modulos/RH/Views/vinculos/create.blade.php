@extends('layouts.modulos.default')

@section('title')
    Vínculos
@stop

@section('subtitle')
    Cadastro de vínculos
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title m-0">Formulário de cadastro de vínculos</h3>
        </div>
        <div class="card-body">
            {!! Form::open(["route" => 'rh.vinculos.create', "method" => "POST", "id" => "form", "role" => "form", "class" => "d-flex w-100"]) !!}
            @include('RH::vinculos.includes.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@stop
