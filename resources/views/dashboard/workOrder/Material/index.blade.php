<div>
    <div class="container-fluid my-2">
        <div class="modal fade" id="createMaterial">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Create Material</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" x-data="handler()">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('material.store') }}" method="post">
                                <input type="hidden" name="pekerjaan_id" value="{{ $wo->pekerjaan->id }}">
                                @csrf
                                <table class="table table-bordered align-items-center table-sm">
                                    <table class="table table-bordered align-items-center table-sm">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Brand</th>
                                                <th>Toko</th>
                                                <th>Tipe</th>
                                                <th>Qty</th>
                                                <th>Harga Estimasi</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="(field, index) in fields" :key="index">
                                                <tr>
                                                    <td x-text="index + 1"></td>
                                                    <td><input x-model="field.nama" type="text" name="nama[index]" class="form-control"></td>
                                                    <td><input x-model="field.brand" type="text" name="brand[index]" class="form-control"></td>
                                                    <td>
                                                        <select x-model="field.toko" name="toko[index]" class="form-control">
                                                            <option value="offline">Offline</option>
                                                            <option value="online">Online</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select x-model="field.tipe" name="tipe[index]" class="form-control">
                                                            <option value="primary">Primary</option>
                                                            <option value="additional">Additional</option>
                                                        </select>
                                                    </td>
                                                    <td><input x-model="field.qty" type="number" name="qty[index]" class="form-control"></td>
                                                    <td><input x-model="field.harga" type="number" name="harga[index]" class="form-control"></td>
                                                    <td class="d-flex justify-content-center"><button type="button" class="btn btn-danger" @click="removeField(index)">X</button></td>
                                                </tr>
                                            </template>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="8" class="text-right"><button type="button" class="btn btn-info" @click="addNewField()">+ Add Row</button></td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" class="text-right"><button type="button" class="btn btn-primary" @click="save()">Save</button></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="table-responsive"
                style="border-bottom: 2px solid #ccc;
                margin-bottom: 20px;
                padding-bottom: 20px">
        <div class="d-flex justify-content-between">
            <h2>Material</h2>
            <button type="button" class="btn btn-primary align-self-center" data-toggle="modal" data-target="#createMaterial">
                <i class="fas fa-plus"></i> Add Material
            </button>
        </div>
        <table id="tableMaterial" class="table1 table-bordered table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Brand</th>
                    <th>Qty</th>
                    <th>Harga Estimasi</th>
                    <th>Harga Asli</th>
                    <th>Toko</th>
                    <th>Tipe</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

@push('script')

{{-- script table user --}}
<script type="text/javascript">
  $(document).ready(function() {
    $('#tableMaterial').DataTable({
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
      autoWidth: false,
      responsive: true,
      ajax:
      {
        url: "{{ route('material.index') }}",
        data: function (d) {
            d.id = {{ $wo->id }}
        }
      },
      columns: [
        {data: 'nama', name: 'nama'},
        {data: 'brand', name: 'brand'},
        {data: 'qty', name: 'qty'},
        {data: 'estimated_price', name: 'harga estimasi'},
        {data: 'real_price', name: 'harga asli'},
        {data: 'toko', name: 'toko'},
        {data: 'tipe', name: 'tipe'},
        {
            data: 'action',
            name: 'action',
        },
      ],
      initComplete: function () {
            this.api().columns(5).every( function () {
                var column = this;
                var select = $('<select class="form-control form-control-sm"><option value=""></option></select>')
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );

                var div = $('<div class="mt-2"></div>');
                div.append(select);
                $(column.header()).append(div);
            });
            this.api().columns(6).every( function () {
                var column = this;
                var select = $('<select class="form-control form-control-sm"><option value=""></option></select>')
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );

                var div = $('<div class="mt-2"></div>');
                div.append(select);
                $(column.header()).append(div);
            });
        }
    });
  });
</script>

<script>
function handler() {
    return {
        fields: [],
        addNewField() {
            this.fields.push({
                nama: '',
                brand: '',
                qty: 0,
                harga: 0,
                toko: 'offline'
            });
        },
        removeField(index) {
            this.fields.splice(index, 1);
        },
        save() {
            console.log(this.fields);
            
            
        }
    }
}
</script>
@endpush
