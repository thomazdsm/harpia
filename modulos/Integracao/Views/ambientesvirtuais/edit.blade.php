@extends('layouts.modulos.default')

@section('title')
    Ambientes Virtuais
@stop

@section('subtitle')
    Edição de ambiente virtual
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Formulário de edição de ambientes virtuais</h3>
        </div>
        <div class="card-body">
            {!! Form::model($ambientevirtual, ["route" => ['integracao.ambientesvirtuais.edit',$ambientevirtual->amb_id], "method" => "PUT", "id" => "form", "role" => "form"]) !!}
                @include('Integracao::ambientesvirtuais.includes.formulario')
            {!! Form::close() !!}

        </div>
    </div>
@stop
