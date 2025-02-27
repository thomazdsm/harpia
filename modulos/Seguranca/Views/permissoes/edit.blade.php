@extends('layouts.modulos.default')

@section('title')
    Editar Permissão
@stop

@section('subtitle')
    {{$permissao->prm_nome}}
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Editar Permissão</h3>
        </div>
        <div class="card-body">
            {!! Form::model($permissao, ["route" => ['seguranca.permissoes.edit', $permissao->prm_id], "method" => "PUT", "id" => "form", "role" => "form"]) !!}
                @include('Seguranca::permissoes.includes.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@stop