@extends('dashboard.layouts.main')

@section('style')
    {{-- style datatable plugin --}}
    <link rel="stylesheet" href="{{ asset('./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    {{-- incrase table fontsize --}}
    <style>
        td,
        th {
            font-size: 20px;
           
        }
        
    </style>
@endsection

{{-- format main content dashboard --}}
@section('content')

<x-breadcrumb title="Work Order" link="{{ route('workOrder') }}" item="Work Order" subItem="Manage" />

<div class="content">
    <div class="container-fluid">
        <div class="card-body fc">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="proyeksTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Proyek</th>
                                        <th>Instansi</th>
                                        <th>Pekerjaan</th>
                                        <th>Lokasi</th>
                                        <th>Due date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
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
            $('#proyeksTable').DataTable({
                deferRender: false,
                processing: true,
                serverSide: true,
                paging: true,
                pageLength: 5,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
                ajax: "{{ route('workOrder') }}",
                columns: [
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'instansi',
                        name: 'instansi'
                    },
                    {
                        data: 'deskripsi',
                        name: 'pekerjaan'
                    },
                    {
                        data: 'lokasi',
                        name: 'lokasi'
                    },
                    {
                        data: 'due_date',
                        name: 'tanggal'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        class: 'flex justify-content-center'
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
