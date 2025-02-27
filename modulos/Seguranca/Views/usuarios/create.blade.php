@extends('layouts.modulos.seguranca')

@section('title')
    Usuários
@stop

@section('subtitle')
    Cadastro de usuários
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Formulário de Cadastro de Usuários</h3>
        </div>
        <div class="card-body">
            {!! Form::open(["route" => 'seguranca.usuarios.create', "method" => "POST", "id" => "form", "role" => "form"]) !!}
            <h4 class="box-title">
                Dados de Usuário
            </h4>
            @include('Seguranca::usuarios.includes.formulario')

            <hr>
            <h4 class="box-title">
                Dados de Pessoa
            </h4>
            @include('Geral::pessoas.includes.formulario', ['pessoa' => $pessoa])

            <div class="row">
                <div class="form-group col-md-12">
                    {!! Form::submit('Salvar dados', ['class' => 'btn btn-primary pull-right']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop