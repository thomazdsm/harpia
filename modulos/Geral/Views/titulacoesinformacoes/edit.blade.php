@extends('layouts.modulos.default')

@section('title')
    Titulacoes
@stop

@section('subtitle')
    Alterar titulação :: {{$titulacaoInfo->tin_titulo}}
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Formulário de Edição de Titulação</h3>
        </div>
        <div class="card-body">
            {!! Form::model($titulacaoInfo,["route" => ['geral.pessoas.titulacoesinformacoes.edit',$titulacaoInfo->tin_id], "method" => "PUT", "id" => "form", "role" => "form"]) !!}
            {{ Form::hidden('tin_pes_id', $pessoa) }}
            @include('Geral::titulacoesinformacoes.includes.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@stop