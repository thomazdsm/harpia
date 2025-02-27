@extends('layouts.modulos.seguranca')

@section('title')
    Itens de Menu
@stop

@section('subtitle')
    Gerenciamento de itens
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
                <form method="GET" action="{{ route('seguranca.menuitens.index') }}" class="w-100 d-flex">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="mit_nome" id="mit_nome" value="{{Request::input('mit_nome')}}" placeholder="Nome">
                    </div>
                    <div class="col-md-3">
                        <select name="mit_mod_id" id="mit_mod_id" class="form-control">
                            <option value="">Selecione um módulo</option>
                            @foreach($modulos as $key => $value)
                                <option value="{{$key}}" @if($key == Request::input('mit_mod_id')) selected @endif>{{$value}}</option>
                            @endforeach
                        </select>
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