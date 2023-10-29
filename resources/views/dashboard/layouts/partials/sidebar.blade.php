<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{-- MAIN LOGO --}}
    <a href="#" class="brand-link">
    <img src="{{ asset('./assets/img/LOGO1.png') }}" alt="Tekno Klop Indonesia" class="brand-image img-circle bg-light">
    <span class="brand-text font-weight-light">{{ config('app.name' , 'Tekno Klop Indonesia') }}</span>
    </a>

    <div class="sidebar">
    {{-- USER PANEL --}}
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ asset('./assets/img/bruh.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>
    {{-- LIST MENU SIDEBAR--}}
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item {{ request()->routeIs('home') ? 'menu-open' : '' }}">
            <a href="{{ route('home') }}" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
            </a>
        </li>

        @hasrole('admin|manager')
        <li class="nav-item {{ request()->routeIs('manage-user') ? 'menu-open' : '' }}">
            <a href="{{ route("manage-user") }}" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
                Users
                <span class="badge badge-info right"></span>
            </p>
            </a>
        </li>
        @endhasrole

        {{-- DIVIDER --}}
        <hr class="my-12 mx-1 bg-secondary" />

    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
