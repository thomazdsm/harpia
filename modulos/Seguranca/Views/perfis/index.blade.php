@extends('layouts.modulos.default')

@section('title')
    Perfis
@stop

@section('subtitle')
    Módulo de Segurança
@stop

@section('actionButton')
    {!!ActionButton::render($actionButton)!!}
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title m-0"><i class="fa fa-filter"></i> Filtrar dados</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <form method="GET" action="{{ route('seguranca.perfis.index') }}" class="w-100 d-flex">
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="prf_nome" id="prf_nome" value="{{Request::input('prf_nome')}}" placeholder="Nome do perfil">
                    </div>
                    <div class="col-md-3">
                        <input type="submit" class="form-control btn-primary" value="Buscar">
                    </div>
                </form>
            </div>
        </div>
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
