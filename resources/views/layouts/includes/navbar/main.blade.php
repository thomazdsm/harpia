<nav class="main-header navbar navbar-expand navbar-white navbar-harpia">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            @if($noaside)
                <img src="{{ asset('img/logo_new.png') }}" alt="Harpia" class="brand-image m-1">
            @else
                <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            @endif
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @include('layouts.includes.navbar.header_rightmenu')
    </ul>
</nav>