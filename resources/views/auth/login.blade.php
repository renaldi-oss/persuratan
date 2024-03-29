@extends('layouts.app')

@section('main')
<main class="hold-transition login-page">
    <div class="login-box">
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
        <img src="{{ asset('./assets/img/TEKNO-KLOP.png') }}" alt="Tekno Klop Indonesia" class="brand-image" style=" width: 210px; height: auto;">
        </div>
        <div class="card-body">
          <form id="loginForm" action="{{ route('login.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <div class="input-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
              @if (App::environment('local'))
                <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
                <div class="col-12 mt-1">
                  <a href="{{ route('auto-login', ['role' => 'finance']) }}" class="btn btn-primary btn-block">finance</a>
                </div>
                <div class="col-12 mt-1">
                  <a href="{{ route('auto-login', ['role' => 'manager']) }}" class="btn btn-primary btn-block">manager</a>
                </div>
                <div class="col-12 mt-1">
                  <a href="{{ route('auto-login', ['role' => 'engineer']) }}" class="btn btn-primary btn-block">engineer</a>
                </div>
              @endif
            </div>
          </form>
        </div>
      </div>
    </div>
</main>
@endsection

@push('script')
{{-- required jquery untuk validator input data --}}
<script src="{{ asset('./plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('./plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script>
 $(function () {
  $('#loginForm').validate({
    rules: {
      username: {
        required: true,
      },
      password: {
        required: true,
        minlength: 6
      }
    },
    messages: {
      username: {
        required: "Please enter a valid username",
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters long"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
  </script>

@endpush
