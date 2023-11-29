@push("styles")
{{-- style datatable plugin --}}
<link rel="stylesheet" href="{{ asset('./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('./plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

@endpush


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
                                <input type="hidden" name="pekerjaan_id" value="{{ $id }}">
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
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="table-responsive" x-init="initPrimary" x-ref="tablePrimary"
                style="border-bottom: 2px solid #ccc;
                margin-bottom: 20px;
                padding-bottom: 20px">
    <div class="d-flex justify-content-between">
        <h2>Primary Material</h2>
        <button type="button" class="btn btn-primary align-self-center" data-toggle="modal" data-target="#createMaterial">
            Add Primary
        </button>
    </div>
        <table id="tablePrimary" class="table1 table-bordered table-striped" style="text-align: center;">
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
    <div class="table-responsive" x-init="initAdditional" x-ref="tableAdditional">
        <div class="d-flex justify-content-between">
            <h2>Additional Material</h2>
            <button type="button" class="btn btn-primary align-self-center" data-toggle="modal" data-target="#createMaterial">
                Add Additional
            </button>
        </div>
        <table id="tableAdditional" class="table1 table-bordered table-striped" style="text-align: center;">
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
    function initPrimary() {
        $('#tablePrimary').DataTable({
            deferRender: false,
            processing: true,
            serverSide: true,
            paging: true,
            pageLength: 5,
            lengthChange: true,
            searching: true,
            ordering: true,
            orderable: true,
            info: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url: "{{ route('material') }}",
                data: {
                    tipe: 'primary',
                    id: {{ $id }}
                }
            },
            columns: [
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'brand',
                    name: 'brand'
                },
                {
                    data: 'toko',
                    name: 'toko'
                },
                {
                    data: 'qty',
                    name: 'qty'
                },
                {
                    data: 'estimated_price',
                    name: 'harga_estimasi'
                },
                {
                    data: 'real_price',
                    name: 'harga_asli'
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
    };
</script>

<script type="text/javascript">
    function initAdditional() {
        $('#tableAdditional').DataTable({
            deferRender: false,
            processing: true,
            serverSide: true,
            paging: true,
            pageLength: 5,
            lengthChange: true,
            searching: true,
            ordering: true,
            orderable: true,
            info: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url: "{{ route('material') }}",
                data: {
                    tipe: 'additional',
                    id: {{ $id }}
                }
            },
            columns: [
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'brand',
                    name: 'brand'
                },
                {
                    data: 'toko',
                    name: 'toko'
                },
                {
                    data: 'qty',
                    name: 'qty'
                },
                {
                    data: 'estimated_price',
                    name: 'harga_estimasi'
                },
                {
                    data: 'real_price',
                    name: 'harga_asli'
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
    };
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
