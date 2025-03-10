@extends('layouts.modulos.default')

@section('title')
    Colaboradores
@stop

@section('subtitle')
    Gerenciamento de colaboradores
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
                <form method="GET" action="{{ route('rh.colaboradores.index') }}" class="w-100 d-flex">
                    <div class="col-md-2">
                        <input type="text" class="form-control cpf-mask" name="pes_cpf" id="pes_cpf"
                               value="{{Request::input('pes_cpf')}}" placeholder="CPF">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="pes_nome" id="pes_nome"
                               value="{{Request::input('pes_nome')}}" placeholder="Nome">
                    </div>
                    <div class="col-md-2">
                        <input type="email" class="form-control" name="pes_email" id="pes_email"
                               value="{{Request::input('pes_email')}}" placeholder="Email">
                    </div>

                    <div class="form-group col-md-2">
                        {!! Form::select('cfn_set_id', $setores, [], ['class' => 'form-control', 'placeholder' => 'Selecione o setor']) !!}
                    </div>

                    <div class="form-group col-md-2">
                        {!! Form::select('funcoes[]', $funcoes, old('funcoes[]'), ['class' => 'form-control', 'multiple' => 'multiple']) !!}
                        @if ($errors->has('funcoes')) <p class="help-block">{{ $errors->first('funcoes') }}</p> @endif
                    </div>

                    <div class="col-md-1">
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
@endsection

