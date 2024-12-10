@extends('layouts.modulos.rh')

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('/css/plugins/select2.css')}}">
    <link rel="stylesheet" href="{{asset('/css/plugins/datepicker3.css')}}">
@endsection

@section('title')
    Horas Trabalhadas
@stop

@section('subtitle')
    Gerenciamento de Horas de Colaboradores
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-filter"></i> Filtrar dados</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <form method="GET" action="{{ route('rh.horastrabalhadas.index') }}">
{{--                    TODO: Corrigir o layout dos dropdowns--}}
                    <div class="form-group col-md-2">
                        {!! Form::select('htr_pel_id', $periodosLaborais, Request::input('htr_pel_id'), ['id' => 'htr_pel_id', 'class' => 'form-control', 'placeholder' => 'Selecione o período laboral', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-md-2">
                        {!! Form::select('cfn_set_id', $setores, Request::input('cfn_set_id'), ['class' => 'form-control', 'placeholder' => 'Selecione o setor']) !!}
                    </div>

                    <div class="form-group col-md-3">
                        {!! Form::text('pes_nome', Request::input('pes_nome'), ['class' => 'form-control', 'placeholder' => 'Nome do Colaborador']) !!}
                    </div>

                    <div class="col-md-2">
                        <input type="submit" class="form-control btn-primary" value="Buscar">
                    </div>

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
                </form>

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

                                {!! Form::model([],["route" => "rh.horastrabalhadasdiarias.import", "method" => "POST", "id" => "form", "role" => "form", "class" => "form-horizontal", "enctype" => "multipart/form-data"]) !!}

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
        <div class="box box-primary">
            <div class="box-header">
                <div class="row" style="align-items: right">
                    <div class="col-md-2" style="float: right;">
                        <form id="exportPdf" target="_blank" method="post" action="{{ route('rh.horastrabalhadasdiarias.pdf') }}">
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
                    </div>
                </div>
            </div>

            <div class="box-body">
                {!! $tabela->render() !!}
            </div>
        </div>

        <div class="text-center">{!! $paginacao->links('pagination::bootstrap-4') !!}</div>
    @else
        <div class="box box-primary">
            <div class="box-body">Sem registros para apresentar</div>
        </div>
    @endif
@stop



@section('scripts')
    <script src="{{asset('/js/plugins/select2.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/plugins/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/plugins/bootstrap-datepicker.pt-BR.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("select").select2({
            });
        });
    </script>

    <script type="text/javascript">
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR'
        });
    </script>

@endsection
