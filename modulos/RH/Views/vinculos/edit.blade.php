@extends('layouts.modulos.default')

@section('title')
    Vínculos
@stop

@section('subtitle')
    Edição de vínculo
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title m-0">Formulário de edição de vínculo</h3>
        </div>
        <div class="card-body">
            {!! Form::model($vinculo, ["route" => ['rh.vinculos.edit',$vinculo->vin_id], "method" => "PUT", "id" => "form", "role" => "form", "class" => "d-flex w-100"]) !!}
                @include('RH::vinculos.includes.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@stop
