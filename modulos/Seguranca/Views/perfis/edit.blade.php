@extends('layouts.modulos.default')

@section('title')
    Perfis
@stop

@section('subtitle')
    Alterar perfil :: {{$perfil->prf_nome}}
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="box-title">Formulário de edição de perfil</h5>
        </div>
        <div class="card-body">
            {!! Form::model($perfil,["route" => ['seguranca.perfis.edit', $perfil->prf_id], "method" => "PUT", "id" => "form", "role" => "form"]) !!}
                @include('Seguranca::perfis.includes.formulario_edit')
            {!! Form::close() !!}
        </div>
    </div>
@stop