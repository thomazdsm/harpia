<nav class="main-header navbar navbar-expand navbar-white navbar-harpia">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        @if($noaside)
            <li class="nav-item">
                <img src="{{ asset('img/logo_new.png') }}" alt="Harpia" class="brand-image m-1">
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
                <span class="nav-link text-white" style="font-weight: bold">
                    {{ Cache::get('MENU_' . Auth::user()->usr_id)[explode('.', Request::route()->getName())[0]]->getRoot()->getName() }}
                </span>
            </li>
        @endif
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @include('layouts.includes.navbar.header_rightmenu')
    </ul>
</nav>