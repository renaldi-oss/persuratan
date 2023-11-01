<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
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
        @hasrole('finance|manager')
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
            <i class="nav-icon fas fa-building-columns"></i>
            <p>
                Administration & Finance
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                @hasrole('finance|manager')
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
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Order</p>
                </a>
              </li>
            </ul>
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
