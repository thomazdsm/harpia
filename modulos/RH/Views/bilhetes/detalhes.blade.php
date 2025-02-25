@extends('layouts.modulos.rh')

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('/css/plugins/select2.css')}}">
    <link rel="stylesheet" href="{{asset('/css/plugins/datepicker3.css')}}">
@endsection

@section('title')
    Acesso por Funcionário
@stop

@section('subtitle')
    Gerenciamento de Bilhetes
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtros</h3>
                </div>
                <div class="box-body">
                    <form method="GET" action="{{ route('rh.bilhetes.detalhes') }}" class="form-horizontal">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="funcionario" class="col-sm-2 control-label">Funcionário:</label>
                                    <div class="col-sm-10">
                                        <select name="funcionario" id="funcionario" class="form-control select2">
                                            <option value="">Selecione um funcionário</option>
                                            @foreach($funcionarios as $funcionario)
                                                <option value="{{ $funcionario->COD_PESSOA }}" {{ request('funcionario') == $funcionario->COD_PESSOA ? 'selected' : '' }}>
                                                    {{ $funcionario->Nome }} ({{ $funcionario->COD_PESSOA }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data_inicio" class="col-sm-4 control-label">Data Início:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="data_inicio" id="data_inicio" class="form-control datepicker"
                                               value="{{ request('data_inicio') }}" placeholder="dd/mm/aaaa">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data_fim" class="col-sm-4 control-label">Data Fim:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="data_fim" id="data_fim" class="form-control datepicker"
                                               value="{{ request('data_fim') }}" placeholder="dd/mm/aaaa">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i> Filtrar
                                </button>
                                <a href="{{ route('rh.bilhetes.detalhes') }}" class="btn btn-default">
                                    <i class="fa fa-eraser"></i> Limpar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Bilhetes - Detalhes por Funcionário</h3>
                </div>
                @if($tabela)
                    <div class="box-body">
                        {!! $tabela->render() !!}
                    </div>
                    <div class="text-center">{!! $paginacao->links('pagination::bootstrap-4') !!}</div>
                @else
                    <div class="box-body">Sem registros para apresentar</div>
                @endif
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{asset('/js/plugins/select2.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/plugins/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/plugins/bootstrap-datepicker.pt-BR.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("select").select2();
        });
    </script>

    <script type="text/javascript">
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR'
        });
    </script>

@endsection