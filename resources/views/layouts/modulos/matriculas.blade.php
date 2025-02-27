@extends('layouts.modulos.base')

@section('modulo-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header pb-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <span class="h2 m-0">@yield('title')</span> <span>@yield('subtitle')</span>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="float-sm-right">
                            @yield('actionButton')
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
    </div><!-- /.content-wrapper -->
@endsection