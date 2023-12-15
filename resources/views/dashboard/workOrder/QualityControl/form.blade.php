@section('style')
{{-- style datetimepicker --}}
<link rel="stylesheet" href="{{ asset('./plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

@endsection

<x-forms.input id="input-judul" label="Judul" name="judul" placeholder="Masukkan judul" :value="$qc->judul ?? ''" />

<x-forms.textarea id="input-deskripsi" label="Deskripsi" name="deskripsi" placeholder="Masukkan deskripsi" :value="$qc->deskripsi ?? ''"/>

<div class="form-group">
  <label for="input-Qc">File Quality Control</label>
  <input type="file" class="filepond @error('file_qc') is-invalid @enderror" id="input-file_qc" name="file" data-max-file-size="3MB" multiple>
  <x-errormessage error="file_qc" />
</div>

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

{{-- script filepond --}}
<script>
  document.addEventListener("DOMContentLoaded", function(){
    FilePond.setOptions({
      labelIdle: 'File Quality Control dapat di drag & drop <span class="filepond--label-action">Browse</span>',
      allowMultiple: false,
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