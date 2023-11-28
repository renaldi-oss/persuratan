@section('style')
{{-- style datetimepicker --}}
<link rel="stylesheet" href="{{ asset('./plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

{{-- ISI FORM --}}
<x-forms.input id="input-kode" label="Kode" name="kode" placeholder="Masukkan kode" :value="$kodeSurat->kode ?? ''" />
<x-forms.input id="input-keterangan" label="Keterangan" name="keterangan" placeholder="Masukkan keterangan" :value="$kodeSurat->keterangan ?? ''" />

@if(\Auth::user())
  @role('admin')
    {{-- Tabel Kode dan Keterangan --}}
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Kode</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
          {{-- Loop through your data here --}}
          @foreach ($yourDataArray as $item)
            <tr>
              <td>{{ $item->kode }}</td>
              <td>{{ $item->keterangan }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endrole
@endif

<div class="d-flex justify-content-between">
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
        kode : {
          required: true,
        },
        keterangan : {
          required: true,
        },
    
     },
     messages: {
        kode: {
          required: "Please enter a valid kode",
        },
       
        keterangan: {
          required: "Please enter a valid keterangan",
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