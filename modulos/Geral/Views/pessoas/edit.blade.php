@extends('layouts.modulos.default')

@section('title')
    Pessoas
@stop

@section('subtitle')
    Alterar pessoa :: {{$pessoa->pes_nome}}
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Formulário de edição de pessoa</h3>
        </div>
        <div class="card-body">
            {!! Form::model($pessoa,["route" => ['geral.pessoas.edit',$pessoa->pes_id], "method" => "PUT", "id" => "form", "role" => "form"]) !!}
                @include('Geral::pessoas.includes.formulario')

                <div class="row">
                    <div class="form-group col-md-12">
                        {!! Form::submit('Salvar dados', ['class' => 'btn btn-primary pull-right']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop