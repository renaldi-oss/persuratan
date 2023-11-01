

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @hasSection('title')
  <title> @yield('title') - {{ config('app.name') }}</title>
  @else
    <title>{{ config('app.name') }}</title>
  @endif
  <link rel="icon" href="{{ url(asset('./assets/img/LOGO1.png')) }}" type="image/png" sizes="32x32">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('./plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css') }}">
  @yield('style')
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @yield('main')

    <!-- jQuery -->
    <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('./plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
      // if there is a message in session, show it
      // @if (session('status'))
      //   // check the type of message
      //   @if (session('status') == 'success')
      //     Swal.fire(
      //       'Success!',
      //       '{{ session('message') }}',
      //       'success'
      //     )
      //   @elseif (session('status') == 'error')
      //     Swal.fire(
      //       'Error!',
      //       '{{ session('message') }}',
      //       'error'
      //     )
      //   @else
      //     Swal.fire(
      //       'Info!',
      //       '{{ session('message') }}',
      //       'info'
      //     )
      //   @endif
      // @endif
    </script>
    <script>
      @if (session('status'))
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: '{{ session('status') }}',
          title: '{{ session('message') }}'
        })
      @endif
    </script>


    @stack('script')
</body>

</html>
