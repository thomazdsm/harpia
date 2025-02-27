@extends('layouts.modulos.default')

@section('title')
    Titulações
@stop

@section('subtitle')
    Módulo Geral
@stop

@section('actionButton')
    {!!ActionButton::render($actionButton)!!}
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-filter"></i> Filtrar dados</h3>
        </div>
        <!-- /.box-header -->
        <div class="card-body">
            <div class="row">
                <form method="GET" action="{{ route('geral.titulacoes.index') }}" class="d-flex w-100">
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="tit_nome" id="tit_nome" value="{{Request::input('tit_nome')}}" placeholder="Nome da titulação">
                    </div>
                    <div class="col-md-3">
                        <input type="submit" class="form-control btn-primary" value="Buscar">
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="card card-primary card-outline">
        @if(!is_null($tabela))
            <div class="card-body p-0">
                {!! $tabela->render() !!}
            </div>
            <div class="card-footer clearfix">
                {!! $paginacao->links('pagination::bootstrap-4') !!}
            </div>
        @else
            <div class="card-body">
                Sem registros para apresentar
            </div>
        @endif
    </div>
@stop
