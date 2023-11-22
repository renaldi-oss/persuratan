@section('style')
{{-- style datetimepicker --}}
<link rel="stylesheet" href="{{ asset('./plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

@endsection


{{-- ISI FORM --}}

<x-forms.input id="input-nama" label="Nama" name="nama" placeholder="Masukkan nama" :value="$pekerjaan->nama ?? ''" />

<x-forms.textarea id="input-deskripsi" label="Deskripsi" name="deskripsi" placeholder="Masukkan deskripsi" :value="$pekerjaan->deskripsi ?? ''" />

<x-forms.input id="input-jenis" label="Jenis" name="jenis" placeholder="Masukkan jenis" :value="$pekerjaan->jenis ?? ''" />
  
<x-forms.select id="input-instansi_id" label="Instansi" name="instansi_id" :value="$pekerjaan->instansi_id ?? ''" :options="$instansi" />

<x-forms.input id="input-lokasi" label="Lokasi" name="lokasi" placeholder="Masukkan lokasi" :value="old('lokasi', ($pekerjaan->lokasi ?? ''))" />

<x-forms.input type="email" id="input-to_email" label="To Email" name="to_email" placeholder="Masukkan to_email" :value="old('to_email', ($pekerjaan->to_email ?? ''))" />
    
<x-forms.input id="input-to_attn" label="To Attn" name="to_attn" placeholder="Masukkan attn" :value="old('to_attn', ($pekerjaan->to_attn ?? ''))" />

@if (Route::currentRouteName() == 'pekerjaan.edit')
@role('manager|finance')

<div class="form-group">
  <label for="input-due_date">Due Date</label>
  <input type="text" class="form-control @error('due_date') is-invalid @enderror datetimepicker-input" data-toggle="datetimepicker" data-target="#input-due_date" id="input-due_date" name="due_date" value="{{ old('due_date', ($pekerjaan->due_date ?? '')) }}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
  <x-errormessage error="due_date" />
</div>

<x-forms.input id="input-no_kontrak" label="No Kontrak" name="no_kontrak" placeholder="Masukkan no_kontrak" :value="old('no_kontrak', ($pekerjaan->no_kontrak ?? ''))" />

<x-forms.input id="input-nominal" label="Nominal" name="nominal" placeholder="Masukkan nominal" :value="old('nominal', ($pekerjaan->nominal ?? ''))" />

<x-forms.select id="input-status" label="Status" name="status" :value="old('status', ($pekerjaan->status ?? ''))" 
  :options="[
      ['id' => 'penawaran', 'nama' => 'Penawaran'],
      ['id' => 'on-going', 'nama' => 'On Going'],
      ['id' => 'over-time', 'nama' => 'Over Time'],
      ['id' => 'done', 'nama' => 'Done']
  ]"
/>

<div class="form-group">
  <label for="input-kontak">File Kontrak</label>
  <input type="file" class="filepond @error('file_kontrak') is-invalid @enderror" id="input-file_kontrak" name="file[]" data-max-file-size="3MB" multiple>
  <x-errormessage error="file_kontrak" />
</div>

@endrole
@endif

<div class="d-flex justify-content-between ">
    <button type="reset" class="btn btn-primary">Reset</button>
    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
</div>

@push('script')

{{-- required jquery untuk validator input data --}}
<script src="{{ asset('./plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('./plugins/jquery-validation/additional-methods.min.js') }}"></script>
{{-- script datetime --}}
<script src="{{ asset('./plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('./plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
{{-- script select2 --}}
<script src="{{ asset('./plugins/select2/js/select2.full.min.js') }}"></script>

<script>
  $(document).ready(function(){
    // validasi form
    $('#Form').validate({
     rules: {
        nama : {
          required: true,
        },
        deskripsi : {
          required: true,
        },
        jenis : {
          required: true,
        },
        lokasi : {
          required: true,
        },
        to_email : {
          required: true,
          email: true,
        },
        to_attn : {
          required: true,
        },
        kontak : {
          required: true,
        },
        due_date : {
          required: true,
        }
     },
     messages: {
        name: {
          required: "Please enter a valid name",
        },
        deskripsi: {
          required: "Please enter a valid deskripsi",
        },
        jenis: {
          required: "Please enter a valid jenis",
        },
        lokasi: {
          required: "Please enter a valid lokasi",
        },
        to_email: {
          required: "Please enter a valid to_email",
          email: "Please enter a valid email address"
        },
        to_attn: {
          required: "Please enter a valid to_attn",
        },
        kontak: {
          required: "Please enter a valid kontak",
        },
        due_date: {
          required: "Please enter a valid due_date",
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
    var dateval = $('#input-due_date').val();
    // datetimepicker
    $('#input-due_date').datetimepicker({
      format: 'YYYY/MM/DD',
      locale: 'id',
      minDate: moment().subtract(1, 'years').format('YYYY/MM/DD'),
      defaultDate: dateval ? moment(dateval, 'YYYY/MM/DD') : moment(),
    });
    // select2
    $('.select2').select2({theme: 'bootstrap4'});
  });
</script>
{{-- script filepond --}}
<script>
  document.addEventListener("DOMContentLoaded", function(){
    FilePond.setOptions({
      labelIdle: 'Files kontrak dapat di drag & drop <span class="filepond--label-action">Browse</span>',
      allowMultiple: true,
      credits: false,
      server: {
        process: {
          url: '{{ route('tempfile.upload') }}',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        },
        revert: {
          url: '{{ route('tempfile.destroy') }}',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        }
      }
    });
    const inputElement = document.querySelector('input[id="input-file_kontrak"]');
    const pond = FilePond.create( inputElement );

  });
</script>

  
@endpush