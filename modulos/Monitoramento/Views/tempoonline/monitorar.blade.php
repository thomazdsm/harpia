@extends('layouts.modulos.default')

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('/css/plugins/select2.css')}}">
    <link rel="stylesheet" href="{{asset('/css/plugins/datepicker3.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
@endsection

@section('title')
    Tempo Online
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
            {!! Form::open(["url" => url('/') . "/monitoramento/ambientesvirtuais/create", "method" => "POST", "id" => "form", "role" => "form" , "class" => "w-100 d-flex flex-wrap"]) !!}
            @include('Monitoramento::tempoonline.includes.formulario')
            {!! Form::close() !!}
        </div>
    </div>

    <div class="card card-primary card-outline">
        <div class="card-body">
            <div class="text-center margin" id="grafico"></div>
        </div>
    </div>
@stop

@section('scripts')
{{--    <script src="{{asset('/js/plugins/bootstrap-datepicker.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('/js/plugins/bootstrap-datepicker.pt-BR.js')}}" type="text/javascript"></script>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

    <script src="{{asset('/js/plugins/Chart.min.js')}}" type="text/javascript"></script>
@endsection
