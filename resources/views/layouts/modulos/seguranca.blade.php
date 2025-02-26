@extends('layouts.modulos.base')

@section('modulo-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                @yield('title')
                <small>@yield('subtitle')</small>
            </h1>
            <div class="actionbutton">
                @yield('actionButton')
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
    </div><!-- /.content-wrapper -->
@endsection
