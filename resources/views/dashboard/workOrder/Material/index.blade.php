@push("styles")
{{-- style datatable plugin --}}
<link rel="stylesheet" href="{{ asset('./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('./plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

@endpush


<div>
    <div class="container-fluid my-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createMaterial">
            Create Primary Material
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createMaterial">
            Create Additional Material
        </button>
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
                            <table class="table table-bordered align-items-center table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Brand</th>
                                        <th>Toko</th>
                                        <th>Qty</th>
                                        <th>Harga Estimasi</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="(field, index) in fields" :key="index">
                                        <tr>
                                            <td x-text="index + 1"></td>
                                            <td><input x-model="field.nama" type="text" name="nama[]" class="form-control"></td>
                                            <td><input x-model="field.brand" type="text" name="brand[]" class="form-control"></td>
                                            <td>
                                                <select x-model="field.toko" name="toko[]" class="form-control">
                                                    <option value="offline">Offline</option>
                                                    <option value="online">Online</option>
                                                </select>
                                            </td>
                                            <td><input x-model="field.qty" type="number" name="qty[]" class="form-control"></td>
                                            <td><input x-model="field.harga" type="number" name="harga[]" class="form-control"></td>
                                            <td><button type="button" class="btn btn-danger btn-small" @click="removeField(index)">&times;</button></td>
                                        </tr>
                                    </template>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7" class="text-right"><button type="button" class="btn btn-info" @click="addNewField()">+ Add Row</button></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="tableMaterial" class="table1 table-bordered table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Brand</th>
                    <th>Toko</th>
                    <th>Qty</th>
                    <th>Harga Estimasi</th>
                    <th>Harga Asli</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table id="tableMaterial" class="table1 table-bordered table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Brand</th>
                    <th>Toko</th>
                    <th>Qty</th>
                    <th>Harga Estimasi</th>
                    <th>Harga Asli</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

@push('script')
{{-- script datatable --}}
<script src="{{ asset('./plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

{{-- script table user --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableMateria').DataTable({
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
            responsive: true,
            autoWidth: false,
            ajax: "{{ route('pekerjaan.index') }}",
            columns: [
                {
                    data: 'surat_no',
                    name: 'no surat'
                },
                {
                    data: 'instansi',
                    name: 'instansi'
                },
                {
                    data: 'nama',
                    name: 'pekerjaan'
                },
                {
                    data: 'to_attn',
                    name: 'attn'
                },
                {
                    data:'due_date',
                    name:'due date'
                },
                {
                    data: 'status',
                    name: 'Status'
                },
                {
                    data: 'action',
                    name: 'action',
                    class: 'd-flex justify-content-center'
                }
            ],
            drawCallback: function(settings) {
                var data = this.api().rows({
                    page: 'current'
                }).data();
                console.log(data);
            },
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
        }
    }
}
</script>
@endpush
