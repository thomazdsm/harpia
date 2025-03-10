@extends('layouts.modulos.default')

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('/css/plugins/select2.css')}}">
    <link rel="stylesheet" href="{{asset('/css/plugins/datepicker3.css')}}">
@endsection

@section('title')
    Período Laboral
@stop

@section('subtitle')
    Edição de período laboral
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title m-0">Formulário de edição de períodos laborais</h3>
        </div>
        <div class="card-body">
            {!! Form::model($periodolaboral, ["route" => ['rh.periodoslaborais.edit',$periodolaboral->pel_id], "method" => "PUT", "id" => "form", "role" => "form", "class" => "d-flex w-100"]) !!}
                @include('RH::periodoslaborais.includes.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
