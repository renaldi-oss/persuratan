<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('./assets/img/LOGO.png') }}" alt="Tekno Klop Indonesia" class="brand-image" style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/img/bruh.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

        <li class="nav-item">
            <a href="/" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
            </a>
        </li>
        @hasrole('finance|manager')
        <li class="nav-item {{ request()->routeIs('manage-users.index') ? 'menu-open' : '' }}">
            <a href="{{ route("manage-users.index") }}" class="nav-link {{ request()->routeIs('manage-users.index') ? 'active' : '' }}">
            <i class="nav-icon far fa-user"></i>
            <p>
                Users
                <span class="badge badge-info right"></span>
            </p>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('instansi') ? 'menu-open' : '' }}">
            <a href="{{ route("instansi.index") }}" class="nav-link {{ request()->routeIs('instansi.index') ? 'active' : '' }}">
            <i class="nav-icon far fa-building"></i>
            <p>
                Instansi
                <span class="badge badge-info right"></span>
                <span class="fa-duotone fa-spinner-third fa-spin"></span>
            </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
                Settings
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                @hasrole('finance|manager')
                <li class="nav-item">
            <a href="{{ route('kodeSurat.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                    <p>
                       Kode Surat
                        <span class="badge badge-info right"></span>
                    </p>
                    </a>
                </li>
                @endhasrole
             
                {{-- DIVIDER --}}
                <hr class="my-12 mx-1 bg-secondary" />
            </ul>
        </li>
        
        @endhasrole

        {{-- DIVIDER --}}
        <hr class="my-12 mx-1 bg-secondary" />

        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-solid fa-address-book"></i>
            <p>
                Administration & Finance
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                @hasrole('finance|manager')
                <li class="nav-item {{ request()->routeIs('operational') ? 'menu-open' : '' }}">
                    <a href="{{ route("operational") }}" class="nav-link {{ request()->routeIs('operational') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                    <p>
                        Operational Request
                        <span class="badge badge-info right"></span>
                    </p>
                    </a>
                </li>
                @endhasrole
                @hasrole('finance|manager')
                <li class="nav-item {{ request()->routeIs('purchase') ? 'menu-open' : '' }}">
                    <a href="{{ route("purchase") }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                    <p>
                        Purchase Order
                        <span class="badge badge-info right"></span>
                    </p>
                    </a>
                </li>
                @endhasrole
                {{-- DIVIDER --}}
                <hr class="my-12 mx-1 bg-secondary" />
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{ route('pekerjaan.index') }}" class="nav-link">
                <i class="nav-icon fas fa-solid fa-file-signature"></i>
                <p>
                    Pekerjaan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('workorder.index') }}" class="nav-link {{ request()->routeIs('workorder.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-solid fa-clipboard-list"></i>
                <p>
                    Work Order
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/summary" class="nav-link {{ request()->routeIs('summary') ? 'active' : '' }}">
                <i class="nav-icon fas fa-solid fa-list"></i>
                <p>
                    Summary
                </p>
            </a>
        </li>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
