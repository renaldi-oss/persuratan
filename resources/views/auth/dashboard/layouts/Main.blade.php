@extends('layouts.app')

@section('main')

<main class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
        <div class="wrapper">
    
            @include('auth.dashboard.layouts.partials.Navbar')
        
            @include('auth.dashboard.layouts.partials.Sidebar')
    
            {{-- main content --}}
            <div class="content-wrapper">
                @yield('content')
            </div>
    
            @include('auth.dashboard.layouts.partials.Footer')
        </div>
    </main>


@endsection