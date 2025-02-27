@extends('layouts.modulos.default')

@section('title')
    Titulações
@stop

@section('subtitle')
    Edição de titulações
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Formulário de edição de titulações</h3>
        </div>
        <div class="card-body">
            {!! Form::model($titulacao, ["route" => ['geral.titulacoes.edit',$titulacao->tit_id], "method" => "PUT", "id" => "form", "role" => "form"]) !!}
                @include('Geral::titulacoes.includes.formulario')
            {!! Form::close() !!}

        </div>
    </div>
@stop
