@extends('layouts.app')

@section('main')

<main class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
        <div class="wrapper">
    
            @include('dashboard.layouts.partials.navbar')
        
            @include('dashboard.layouts.partials.sidebar')
    
            {{-- main content --}}
            <div class="content-wrapper">
                @yield('content')
            </div>

            @include('dashboard.layouts.partials.footer')
        </div>
    </main>

@endsection
