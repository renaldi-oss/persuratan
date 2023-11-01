<!-- Main Sidebar Container -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <img src="{{ asset('./dist/img/logo-white.png') }}" alt="Tekno Klop Indonesia" class="brand-image" style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
        <a href="#" class="nav-link">
            <img src="{{ asset('./assets/img/bruh.jpg') }}" class="img-circle elevation-2   nav-icon" alt="User Image">
            <p>
                Boi
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-solid fa-right-from-bracket"></i>
                  <p>Log Out</p>
                </a>
              </li>
            </ul>
        </li>
    </ul>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
            </a>
        </li>
        @hasrole('admin|manager')
        <li class="nav-item {{ request()->routeIs('manage-users') ? 'menu-open' : '' }}">
            <a href="{{ route("manage-users") }}" class="nav-link">
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

        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-comment-exclamation"></i>
            <p>
                Penawaran
            </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-solid fa-clipboard-list"></i>
            <p>
                Work Order
            </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-solid fa-money-check-dollar" style="color: #c2c7d0;"></i>
            <p>
                Administration & Finance
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                @hasrole('admin|manager')
                <li class="nav-item {{ request()->routeIs('operational') ? 'menu-open' : '' }}">
                    <a href="{{ route("operational") }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                    <p>
                        Operational Request
                        <span class="badge badge-info right"></span>
                    </p>
                    </a>
                </li>
                @endhasrole
                @hasrole('admin|manager')
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
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-solid fa-list"></i>
            <p>
                Summary
            </p>
            </a>
        </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
