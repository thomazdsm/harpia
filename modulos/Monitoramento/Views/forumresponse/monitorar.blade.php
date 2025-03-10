@extends('layouts.modulos.default')

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('/css/plugins/select2.css')}}">
    <link rel="stylesheet" href="{{asset('/css/plugins/datepicker3.css')}}">
@endsection

@section('title')
    Monitoramento de Respostas nos Fóruns
@stop

@section('subtitle')
    {{$ambiente->amb_nome}}
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title m-0">Visualização de dados do ambiente virtual</h3>
        </div>
        <div class="card-body">
            @include('Monitoramento::forumresponse.includes.formulario')
        </div>
        <div class="text-center margin" id="grafico"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline hidden" id="boxTutores">
                <!-- /.box-header -->
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@endsection
