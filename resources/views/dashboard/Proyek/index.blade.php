@extends('dashboard.layouts.main')

@section("style")
{{-- style datatable plugin --}}
<link rel="stylesheet" href="{{ asset('./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('./plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('./plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('content')

<x-breadcrumb title="proyek" link="{{ route('proyek.index') }}" item="proyek" subItem="Manage" />

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card" style="height: auto;">
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <div class="container-fluid my-2">
                            <a href="{{ route('proyek.create') }}" class="btn btn-primary">Create</a>
                        </div>
                        <table id="table1" class="table table-bordered table-striped" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>Nama Proyek</th>
                                    <th>Instansi</th>
                                    <th>Pekerjaan</th>
                                    <th>Lokasi</th>
                                    <th>Due Date</th>
                                    <th>Nomor PO</th>
                                    <th>File PO</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection


@push('script')
{{-- script datatable --}}
<script src="{{ asset('./plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('./plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('./plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('./plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('./plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


{{-- script table user --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#table1').DataTable({
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
            ajax: "{{ route('instansi.index') }}",
            columns: [{
                    data: 'nama_proyek',
                    name: 'nama_proyek'
                },
                {
                    data: 'id_instansi',
                    name: 'id_instansi'
                },
                {
                    data: 'pekerjaan',
                    name: 'pekerjaan'
                },
                {
                    data: 'lokasi',
                    name: 'lokasi'
                },
                {
                    data: 'due_date',
                    name: 'due_date'
                },
                {
                    data: 'no_po',
                    name: 'no_po'
                },
                {
                    data: 'file_po',
                    name: 'file_po'
                },

                {
                    data: 'action',
                    name: 'action',
                    class: 'project-actions text-center',
                    render: function(data, type, full, meta) {
                        return `
                        <a class="btn btn-primary btn-sm" href="{{ route('proyek.view') }}">
    <i class="fas fa-eye"></i>
</a>

            <a class="btn btn-info btn-sm" href="{{ route('proyek.edit') }}">
                <i class="fas fa-pencil-alt"></i>
            </a>
            <a class="btn btn-danger btn-sm" href="#">
                <i class="fas fa-trash"></i>
            </a>
        `;
                    }
                },

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
@endpush