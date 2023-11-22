{{-- ISI FORM --}}
<div class="form-group">
    <label for="input-name">Nama</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="input-nama" name="nama" placeholder="Masukkan nama" value="{{ old('nama', ($instansi->nama ?? '')) }}">
    <x-errormessage error="nama" />
</div>

<div class="form-group">
    <label for="input-alamat">Alamat</label>
    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="input-alamat" name="alamat" placeholder="Masukkan alamat" value="{{ old('alamat', ($instansi->alamat ?? '')) }}" autofocus>
    <x-errormessage error="alamat" />
</div>

<div class="form-group">
    <label for="input-kontak">Kontak</label>
    <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="input-kontak" name="kontak" placeholder="Masukkan kontak" value="{{ old('kontak', ($instansi->kontak ?? '')) }}">
    <x-errormessage error="kontak" />
</div>

<div class="form-group">
    <label for="input-email">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="input-email" name="email" placeholder="Masukkan email" value="{{ old('email', ($instansi->email ?? '')) }}">
    <x-errormessage error="email" />
</div>


<div class="d-flex justify-content-between ">
    <button type="reset" class="btn btn-primary">Reset</button>
    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
</div>



@push('script')
<script src="{{ asset('./plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('./plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script>
  $(function () {
   $('#Form').validate({
     rules: {
        nama : {
          required: true,
        },
        alamat : {
          required: true,
        },
        kontak : {
          required: true,
        },
        email : {
          required: true,
          email: true,
        },
        lokasi : {
          required: true,
        },
     },
     messages: {
        nama : {
          required: "Please enter a valid name",
        },
        alamat : {
          required: "Please enter a valid alamat",
        },
        kontak : {
          required: "Please enter a valid kontak",
        },
        email : {
          required: "Please enter a valid email address",
          email: "Please enter a valid email address"
        },
        lokasi : {
          required: "Please enter a valid lokasi",
        },
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