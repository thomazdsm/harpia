@extends('layouts.modulos.default')

@section('title')
    Colaboradores
@stop

@section('subtitle')
    Gerenciamento de Horas Trabalhadas de Colaborador :: <b>{{$colaborador->pessoa->pes_nome}}</b>
@stop

@section('content')
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
@endsection

