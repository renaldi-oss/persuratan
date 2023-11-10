<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role=button><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block" style="font-weight: bold;">
            <a class="nav-link" id="currentDateTimeLink" >Waktu Saat Ini</a>
        </li>
    </ul>

    {{-- btn keluar --}}
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('logout') }}" role=button onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->


@push('script')
<script>
    // JavaScript to update the date and time in the "Current DateTime" link
    function updateCurrentDateTimeLink() {
        const currentDateTime = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
        const formattedDateTime = currentDateTime.toLocaleDateString('id-ID', options);
        document.getElementById('currentDateTimeLink').textContent = formattedDateTime;
    }

    // Update the date and time initially and every second
    updateCurrentDateTimeLink();
    setInterval(updateCurrentDateTimeLink, 1000);
</script>
@endpush
