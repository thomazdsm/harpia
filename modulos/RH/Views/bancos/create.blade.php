@extends('layouts.modulos.default')

@section('title')
    Bancos
@stop

@section('subtitle')
    Cadastro de bancos
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title m-0">Formulário de cadastro de banco</h3>
        </div>
        <div class="card-body">
            {!! Form::open(["route" => 'rh.bancos.create', "method" => "POST", "id" => "form", "role" => "form", "class" => "d-flex w-100"]) !!}
            @include('RH::bancos.includes.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@stop
