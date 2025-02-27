@extends('layouts.modulos.default')

@section('title')
    Editar Item de Menu
@stop

@section('subtitle')
    {{$itemMenu->mit_nome}}
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Formulário de Edição de Item de Menu</h3>
        </div>
        <div class="card-body">
            {!! Form::model($itemMenu, ["route" => ['seguranca.menuitens.edit', $itemMenu->mit_id], "method" => "PUT", "id" => "form", "role" => "form"]) !!}
                @include('Seguranca::menuitens.includes.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@stop