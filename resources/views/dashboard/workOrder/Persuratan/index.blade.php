<div class="pt-3">
    <div class="d-flex justify-content-end mb-2">
        <a href="#" class="btn btn-primary open-modal" data-id="{{ $wo->id }}" style="text-decoration: none;">
            <i class="fas fa-plus"></i>Surat
        </a>
    </div>

    <div>
        <table id="tableSurat" class="table1 table-bordered table-striped"  style="text-align: center;justify-content: center;align-items: center;">
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Tipe</th>
                    <th>Kode</th>
                    <th>Mime Type</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalSurat" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="createSurat">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Surat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                      </div>
                      <div class="modal-body">
                          <label for="input-deskripsi">Deskripsi</label>
                          <input type="text" class="form-control" id="input-deskripsi" name="deskripsi" placeholder="Masukkan deskripsi">
                            <label for="input-tipe">Tipe</label>
                            <select id="input-tipe"
                            class="form-control select2" style="width: 100%;" name="tipe">
                            </select>
                          <div class="form-group">
                            <label for="input-Qc">File Quality Control</label>
                            <input type="file" class="filepond" id="input-file_surat" name="file" data-max-file-size="3MB">
                          </div>
                        
                        <div class="d-flex justify-content-between mt-2">
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>

                      </div>
                </form>
              </div>
        </div>
    </div>
</div>

@push('script')


<script type="text/javascript">
  $(document).ready(function() {
    $('#tableSurat').DataTable({
      deferRender: false,
      processing: true,
      serverSide: true,
      paging: true,
      pageLength: 10,
      lengthChange: true,
      searching: true,
      ordering: true,
      orderable: true,
      info: true,
      autoWidth: true,
      responsive: true,
      ajax:
      {
        url: "{{ route('surat.index') }}",
        data: function (d) {
            d.id = {{ $wo->id }}
        }
      },
      columns: [
        {data: 'deskripsi', name: 'deskripsi'},
        {data: 'tipe', name: 'tipe'},
        {data: 'kode', name: 'kode'},
        {data: 'mime_type', name: 'mime_type'},
        {data: 'created_at', name: 'created at'},
        {
            data: 'action',
            name: 'action',
        },
        ]
    });
  });

$(document).on('click', '.open-modal', function(e) {
    e.preventDefault();
    $('#modalSurat').modal('show');
    var id = $(this).data('id');
    $('#createSurat').trigger('reset');

    $.ajax({
        url: "{{ route('ajax-surat') }}",
        method: 'GET',
        data: {
            _token: '{{ csrf_token() }}',
            id: id
        },
        success: function(d) {
            var data = d;
            console.log(data);
            var select = $('#input-tipe');
            select.empty();
            $.each(data, function(key, value) {
                select.append('<option value="' + value.id + '">' + value.keterangan + '</option>');
            });
        }
    });
});

// handle create event
$(document).on('submit', '#createSurat', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    // add id to formData
    formData.append('work_order_id', {{ $wo->id }});
    var file = pond.getFiles()[0];
    if (file) {
        formData.append('file', file.serverId);
    } else {
        alert('Please select a file.');
        return;
    }
    $.ajax({
        url: "{{ route('surat.store') }}",
        method: 'POST',
        data: formData,
        processData: false, 
        contentType: false, 
        success: function(data) {
            $('#modalSurat').modal('hide');
            $('#tableSurat').DataTable().ajax.reload();

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
                icon: 'success',
                title: 'Surat berhasil ditambahkan'
            });
        }
    });
});

$('#modalSurat').on('hidden.bs.modal', function (e) {
    $('.modal-backdrop').remove();
})


$(document).on('click', '.delete-surat', function() {
    var id = $(this).data('id');
    $.ajax({
        url: "{{ route('surat.destroy', ['surat' => " + id + "]) }}",
        method: 'DELETE',
        data: {
            _token: '{{ csrf_token() }}',
            id: id
        },
        success: function(data) {
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
                icon: 'success',
                title: 'Surat berhasil dihapus'
            });
            // Reload the DataTable
            $('#tableSurat').DataTable().ajax.reload();
        }
    });
});


</script>

<script>
    var pond;

document.addEventListener("DOMContentLoaded", function(){
  FilePond.setOptions({
    labelIdle: 'Surat dapat di drag & drop <span class="filepond--label-action">Browse</span>',
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
  const inputElement = document.querySelector('input[id="input-file_surat"]');
  pond = FilePond.create( inputElement ); // Assign FilePond instance to pond variable
});
  </script>


@endpush
