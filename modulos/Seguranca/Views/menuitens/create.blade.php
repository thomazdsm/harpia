@extends('layouts.modulos.default')

@section('title')
    Itens de Menu
@stop

@section('subtitle')
    Cadastro de itens
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Formulário de Cadastro de Itens de Menu</h3>
        </div>
        <div class="card-body">
            {!! Form::open(["route" => 'seguranca.menuitens.create', "method" => "POST", "id" => "form", "role" => "form"]) !!}
                @include('Seguranca::menuitens.includes.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@stop