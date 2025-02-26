<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('scripts')
</head>

<body class="hold-transition skin-blue layout-top-nav">

    <div class="wrapper">

        <header>
            @include('layouts.includes.navbar.navbar')
        </header>

        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    {!! Flash::render() !!}

    @yield('scripts')
</body>
</html>