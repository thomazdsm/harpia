@extends('layouts.modulos.default')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 50vh;">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <p class="login-box-msg"><b>Verificação Pessoa por CPF</b></p>
                    <div class="row">
                        <form id="dvCpf" method="POST" action="{{route('geral.pessoas.verificapessoa')}}" class="w-100">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group has-feedback @if ($errors->has('doc_conteudo')) has-error @endif">
                                    <input placeholder="Digite o CPF" class="form-control" name="doc_conteudo" id="doc_conteudo" type="text" value="{{old('doc_conteudo')}}">
                                    <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                                    @if ($errors->has('doc_conteudo')) <p class="help-block">{{ $errors->first('doc_conteudo') }}</p> @endif
                                </div>
                                <input type="hidden" value="{{isset($rota) ? $rota : old('rota')}}" name="rota">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat pull-right btn-localizar">Localizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
        Inputmask({"mask": "999.999.999-99", "removeMaskOnSubmit": true}).mask('#doc_conteudo');
    </script>
@stop