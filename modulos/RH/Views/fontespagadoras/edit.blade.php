@extends('layouts.modulos.default')

@section('title')
    Fontes Pagadoras
@stop

@section('subtitle')
    Edição de Fonte Pagadora
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title m-0">Formulário de edição de fonte pagadora</h3>
        </div>
        <div class="card-body">
            {!! Form::model($fontepagadora, ["route" => ['rh.fontespagadoras.edit',$fontepagadora->fpg_id], "method" => "PUT", "id" => "form", "role" => "form", "class" => "d-flex w-100"]) !!}
                @include('RH::fontespagadoras.includes.formulario')
            {!! Form::close() !!}

        </div>
    </div>
@stop
