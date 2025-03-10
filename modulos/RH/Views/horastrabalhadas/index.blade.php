@extends('layouts.modulos.default')

@section('title')
    Horas Trabalhadas
@stop

@section('subtitle')
    Gerenciamento de Horas de Colaboradores
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title m-0"><i class="fa fa-filter"></i> Filtrar dados</h3>
        </div>
        <!-- /.box-header -->
        <div class="card-body">
            <div class="row">
                <form method="GET" action="{{ route('rh.horastrabalhadas.index') }}" class="col-lg-8 d-flex w-100">
                    <div class="form-group col-md-5">
                        {!! Form::select('htr_pel_id', $periodosLaborais, Request::input('htr_pel_id'), ['id' => 'htr_pel_id', 'class' => 'form-control', 'placeholder' => 'Selecione o período laboral']) !!}
                    </div>

                    <div class="form-group col-md-5">
                        {!! Form::select('cfn_set_id', $setores, Request::input('cfn_set_id'), ['class' => 'form-control', 'placeholder' => 'Selecione o setor']) !!}
                    </div>

                    <div class="col-md-2">
                        <input type="submit" class="form-control btn-primary" value="Buscar">
                    </div>

                </form>
                <div class="col-md-2">
                    {!! ActionButton::grid([
                        'type' => 'LINE',
                        'buttons' => [
                                [
                                    'classButton' => 'btn btn-success modal-update-polo',
                                    'icon' => 'fa fa-plus',
                                    'route' => 'academico.matricularalunocurso.edit',
                                    'parameters' => 1,
                                    'label' => ' Importar dados',
                                    'method' => 'get',
                                ],
                            ]
                        ])
                    !!}
                </div>
                <div class="col-md-2">
                    @if(!is_null($tabela))
                        <form id="exportPdf" target="_blank" method="post" action="{{ route('rh.horastrabalhadasdiarias.pdf') }}" class="w-100 d-flex">
                        {!! ActionButton::grid([
                                'type' => 'LINE',
                                'buttons' => [
                                    [
                                    'classButton' => 'btn btn-danger',
                                    'icon' => 'fa fa-file-pdf-o',
                                    'route' => 'rh.horastrabalhadasdiarias.pdf',
                                    'label' => 'Exportar para PDF',
                                    'method' => 'post',
                                    'id' => '',
                                    'attributes' => ['id' => 'formPdf']
                                    ]
                                ]
                        ]) !!}
                        <input type="hidden" name="pel_id" id="periodoLaboralId" value="{{ Request::input('htr_pel_id')}}">
                        <input type="hidden" name="set_id" id="setorId" value="{{ Request::input('cfn_set_id')}}">
                    </form>
                    @endif
                </div>

                <!-- Modal Mudança Polo/Grupo -->
                <div class="modal fade modalUpdatePolo">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                                <h4 class="modal-title">
                                    Importar dados
                                </h4>
                            </div>
                            <div class="modal-body">

                                {!! Form::model([],["route" => "rh.horastrabalhadasdiarias.import", "method" => "POST", "id" => "form", "role" => "form", "class" => "form-horizontal d-flex w-100", "enctype" => "multipart/form-data"]) !!}

                                <div class="form-group @if ($errors->has('csv_file')) has-error @endif">
                                    <div class="col-sm-9">
                                        {!! Form::file('csv_file', ['class' => 'form-control file']) !!}
                                        @if ($errors->has('csv_file')) <p class="help-block">{{ $errors->first('csv_file') }}</p> @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Importar dados</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}


                            </div>
                        </div>
                    </div>
                </div>

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
