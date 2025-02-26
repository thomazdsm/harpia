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
                @if (isset($sent))
                    <div class="alert alert-success">
                        Nós lhe enviamos por email um link de redefinição de senha!
                    </div>
                @endif
                <p class="login-box-msg" style="font-size: 14px">
                    <b>Redefinição de Senha</b>
                </p>
                <form action="{{url('/reset-password')}}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->token }}">

                    <div class="input-group mb-3">
                        {!! Form::text('email', old('email'), [
                            'placeholder' => 'Confirme seu email',
                            'class' => 'form-control ' . ($errors->has('email') ? 'is-invalid' : '')
                        ]) !!}
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <span id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>
                    </div>

                    <div class="input-group mb-3">
                        {!! Form::password('password', [
                            'placeholder' => 'Nova Senha',
                            'class' => 'form-control ' . ($errors->has('password') ? 'is-invalid' : '')
                        ]) !!}
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <span id="password-error" class="error invalid-feedback">{{ $errors->first('password') }}</span>
                    </div>

                    <div class="input-group mb-3">
                        {!! Form::password('password_confirmation', [
                            'password_confirmation' => 'Confirme sua nova senha',
                            'class' => 'form-control ' . ($errors->has('password_confirmation') ? 'is-invalid' : '')
                        ]) !!}
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <span id="password_confirmation-error" class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <div class="card-footer text-right" style="background-color: white; border-top: 1px solid #f5f5f5;">
                <p class="mb-1">
                    <a href="{{url('/forget-password')}}">Esqueceu sua senha?</a>
                </p>
            </div>
        </div>
    </div>
@stop