@extends('layouts.modulos.default')

@section('title')
    Bancos
@stop

@section('subtitle')
    Edição de banco
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title m-0">Formulário de edição de banco</h3>
        </div>
        <div class="card-body">
            {!! Form::model($banco, ["route" => ['rh.bancos.edit',$banco->ban_id], "method" => "PUT", "id" => "form", "role" => "form", "class" => "d-flex w-100"]) !!}
                @include('RH::bancos.includes.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@stop
