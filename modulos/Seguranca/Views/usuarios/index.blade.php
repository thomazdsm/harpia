@extends('layouts.modulos.default')

@section('title')
    Usuários
@stop

@section('subtitle')
    Gerenciamento de usuários
@stop

@section('actionButton')
    {!!ActionButton::render($actionButton)!!}
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="m-0"><i class="fa fa-filter"></i> Filtrar dados</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <form method="GET" action="{{ route('seguranca.usuarios.index') }}" class="w-100 d-flex">
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="pes_cpf" id="pes_cpf" value="{{Request::input('pes_cpf')}}" placeholder="CPF">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="pes_nome" id="pes_nome" value="{{Request::input('pes_nome')}}" placeholder="Nome">
                    </div>
                    <div class="col-md-3">
                        <input type="email" class="form-control" name="pes_email" id="pes_email" value="{{Request::input('pes_email')}}" placeholder="Email">
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