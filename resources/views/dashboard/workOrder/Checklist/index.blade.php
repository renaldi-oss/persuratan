<div class="pt-3">
    <div class="d-flex justify-content-end mb-2">
        <a href="#" class="btn btn-primary open-modal" data-id="{{ $wo->id }}" style="text-decoration: none;">
            <i class="fas fa-plus"></i> Add Checklist
        </a>
    </div>

    <div>
        <table id="tableChecklist" class="table1 table-bordered table-striped"  style="text-align: center;justify-content: center;align-items: center;">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Qty</th>
                    <th>Pembelian</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="myModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-content">
                <form id="createChecklist">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Item Checklist</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <label for="input-nama">Nama</label>
                          <select id="input-nama"
                          class="form-control select2" style="width: 100%;" name="nama">
                          </select>
                          <label for="input-qty">Qty</label>
                          <input type="number" class="form-control" id="input-qty" name="qty" placeholder="Masukkan jumlah">
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

<script src="{{ asset('./plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    })
</script>

{{-- script table user --}}
<script type="text/javascript">
  $(document).ready(function() {
    $('#tableChecklist').DataTable({
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
        url: "{{ route('checklist.index') }}",
        data: function (d) {
            d.id = {{ $wo->id }}
        }
      },
      columns: [
        {data: 'nama', name: 'nama'},
        {data: 'qty', name: 'qty'},
        {data: 'pembelian', name: 'pembelian'},
        {
            data: 'status',
            name: 'status',
            render: function(data, type, row) {
                return '<input type="checkbox" class="status-checkbox" data-id="' + row.id + '"' + (data == 'sudah' ? ' checked' : '') + '>';
            }
        },
        {
            data: 'action',
            name: 'action',
        },
        ]
    });
  });

  $('#myModal').on('show.bs.modal', function (e) {
    $('.modal-backdrop').remove();
    });
//   handle checkbox event
    $(document).on('change', '.status-checkbox', function() {
        var id = $(this).data('id');
        var status = $(this).prop('checked') ? 'sudah' : 'belum';
        $.ajax({
            url: "{{ route('checklist.update', ['checklist' => " + id + "]) }}",
            method: 'PUT',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                status: status
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
                title: 'Checklist berhasil diupdate'
            });
            }
        });
    });

    // handle delete event
    $(document).on('click', '.delete-checklist', function() {
    var id = $(this).data('id');
    $.ajax({
        url: "{{ route('checklist.destroy', ['checklist' => " + id + "]) }}",
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
                title: 'Checklist berhasil dihapus'
            });
            // Reload the DataTable
            $('#tableChecklist').DataTable().ajax.reload();
        }
    });
});

$(document).on('click', '.open-modal', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: "{{ route('ajax-material') }}",
        method: 'GET',
        data: {
            _token: '{{ csrf_token() }}',
            id: id
        },
        success: function(d) {
            var data = d.data;
            console.log(data);
            $('#myModal').modal('show');
            var select = $('#myModal').find('#input-nama');
            select.empty();
            $.each(data, function(key, value) {
                select.append('<option value="' + value.id + '">' + value.nama + '</option>');
            });
        }
    });
});

// handle create event
$(document).on('submit', '#createChecklist', function(e) {
    e.preventDefault();
    var qty = $(this).find('#input-qty').val();
    var wo_id = {{ $wo->id }};
    var material_id = $(this).find('#input-nama').val();
    $.ajax({
        url: "{{ route('checklist.store') }}",
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            wo_id: wo_id,
            material_id: material_id,
            qty: qty
        },
        success: function(data) {
            $('#myModal').modal('hide');
            $('#tableChecklist').DataTable().ajax.reload();

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
                title: 'Checklist berhasil dihapus'
            });
        }
    });
});

</script>


@endpush
