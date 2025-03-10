@extends('layouts.modulos.default')

@section('title')
    Fontes Pagadoras
@stop

@section('subtitle')
    Módulo RH
@stop

@section('actionButton')
    {!!ActionButton::render($actionButton)!!}
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title m-0"><i class="fa fa-filter"></i> Filtrar dados</h3>
        </div>
        <!-- /.box-header -->
        <div class="card-body">
            <div class="row">
                <form method="GET" action="{{ route('rh.fontespagadoras.index') }}" class="d-flex w-100">
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="fpg_razao_social" id="fpg_razao_social" value="{{Request::input('fpg_razao_social')}}" placeholder="Razão social">
                    </div>
                    <div class="col-md-3">
                        <input type="submit" class="form-control btn-primary" value="Buscar">
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    @if(!is_null($tabela))
        <div class="card card-primary card-outline">
            <div class="card-body">
                {!! $tabela->render() !!}
            </div>
        </div>

        <div class="text-center">{!! $paginacao->links('pagination::bootstrap-4') !!}</div>

    @else
        <div class="card card-primary card-outline">
            <div class="card-body">Sem registros para apresentar</div>
        </div>
    @endif
@stop
