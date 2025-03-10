@extends('layouts.modulos.default')

@section('title')
    Setores
@stop

@section('subtitle')
    Edição de setor
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title m-0">Formulário de edição de setor</h3>
        </div>
        <div class="card-body">
            {!! Form::model($setor, ["route" => ['rh.setores.edit',$setor->set_id], "method" => "PUT", "id" => "form", "role" => "form", "class" => "w-100 d-flex"]) !!}
                @include('RH::setores.includes.formulario')
            {!! Form::close() !!}

        </div>
    </div>
@stop
