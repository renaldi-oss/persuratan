@extends('dashboard.layouts.main')


@section('content')

<x-breadcrumb title="Edit Operational Request" link="{{ route('operational') }}" item="Operational" subItem="Edit" />

<div class="card m-3">
  <div class="card-body">
    <form id="Form" action="{{ route('operational.update', $operational->id) }}" method="POST">
        {{ csrf_field() }}
        @method('PUT')
        @include('dashboard.OperationalRequest.form', ['tombol' => 'Update'])
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
       kegiatan: {
         required: true,
       },
       tanggal:{
         required: true,
       },
        pekerjaan: {
          required: true,
        },
       lokasi: {
        required: true,
       },
       jumlah: {
         required: true,
       }
     },
     messages: {
       kegiatan: {
         required: "Kegiatan tidak boleh kosong",
       },
        tanggal: {
          required: "Tanggal tidak boleh kosong",
        },
        pekerjaan: {
          required: "Pekerjaan tidak boleh kosong",
        },
        lokasi: {
          required: "Lokasi tidak boleh kosong",
        },
        jumlah: {
          required: "Jumlah tidak boleh kosong",
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
