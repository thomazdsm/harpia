@extends('layouts.modulos.default')

@section('title')
    Áreas de Conhecimento
@stop

@section('subtitle')
    Edição de área de conhecimento
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title m-0">Formulário de edição de áreas de conhecimento</h3>
        </div>
        <div class="card-body">
            {!! Form::model($areaConhecimento, ["route" => ['rh.areasconhecimentos.edit',$areaConhecimento->arc_id], "method" => "PUT", "id" => "form", "role" => "form", "class" => "d-flex w-100"]) !!}
                @include('RH::areasconhecimentos.includes.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@stop
