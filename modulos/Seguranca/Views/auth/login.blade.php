@extends('layouts.site')

@section('content')
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center" style="background-color: #ECF0F5ff">
                <a href="{{url('/')}}" class="h1" style="text-decoration: none;">
                    <img src="{{ asset('img/logo_new.png') }}" alt="Harpia" style="max-width: 60%; height: auto;">
                    <h6 class="mt-1">Sistema de Gestão <b>Educacional</b></h6>
                </a>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops! </strong>Usuário e/ou senha incorreto(s).
                    </div>
                @endif
                <p class="login-box-msg" style="font-size: 14px">
                    Preencha os dados abaixo para acessar
                </p>
                <form action="{{url('/login')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        {!! Form::text('usr_usuario', old('usr_usuario'), [
                            'placeholder' => 'Usuario',
                            'class' => 'form-control ' . ($errors->has('usr_usuario') ? 'is-invalid' : '')
                        ]) !!}
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <span id="usr_usuario-error" class="error invalid-feedback">{{ $errors->first('usr_usuario') }}</span>
                    </div>

                    <div class="input-group mb-3">
                        {!! Form::password('usr_senha', [
                            'placeholder' => 'Senha',
                            'class' => 'form-control ' . ($errors->has('usr_senha') ? 'is-invalid' : '')
                        ]) !!}
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <span id="usr_senha-error" class="error invalid-feedback">{{ $errors->first('usr_senha') }}</span>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    Lembrar-me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Acessar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-right" style="background-color: white; border-top: 1px solid #f5f5f5;">
                <p class="mb-1">
                    <a href="{{url('/forget-password')}}">Esqueceu sua senha?</a>
                </p>
            </div>
        </div>
    </div>
@endsection