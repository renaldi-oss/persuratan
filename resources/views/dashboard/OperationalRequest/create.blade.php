@extends('dashboard.layouts.main')


@section('content')

<x-breadcrumb title="Create Operational request" link="{{ route('operational') }}" item="Operational" subItem="Create" />

<div class="card m-3">
  <div class="card-body">
    <form id="Form" action="{{ route('operational.store') }}" method="POST">
        {{ csrf_field() }}
        @include('dashboard.OperationalRequest.form', ['tombol' => 'Create'])
    </form>
  </div>
</div>

@endsection

@push('script')
<script src="{{ asset('./plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('./plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script>
  $(function () {
   $('#Form').validate({
     rules: {
       username: {
         required: true,
       },
       date:{
         required: true,
       },
        email: {
          required: true,
        },
       password: {
         required: true,
         minlength: 5
       },
       roles: {
         required: true,
       }
     },
     messages: {
       name: {
         required: "Please enter a valid name",
       },
       username: {
         required: "Please enter a valid username",
       },
        email: {
          required: "Please enter a valid email address",
        },
       password: {
         required: "Please provide a password",
         minlength: "Your password must be at least 5 characters long"
       },
        roles: {
          required: "Please select a roles",
          notEqual: "Please select a roles"
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