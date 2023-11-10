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

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card-body fc">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Administration & Finance</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="operationalsTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Kegiatan</th>
                                            <th>Instansi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List Proyek</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="proyeksTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama Proyek</th>
                                            <th>Instansi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
                autoWidth: true,
                responsive: true,
                ajax: "{{ route('getProyek') }}",
                // data: @json($proyek),
                columns: [{
                        data: 'due_date',
                        name: 'tanggal'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'instansi',
                        name: 'instansi'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        searchable: true,

                    },
                ]
            });
        });
    </script>

    {{-- script table operational --}}
    <script>
        $(document).ready(function() {
        $('#operationalsTable').DataTable({
                deferRender: false,
                processing: true,
                serverSide: true,
                paging: true,
                pageLength: 5,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: true,
                responsive: true,
                ajax: "{{ route('getOperational') }}",
                columns: [{
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'kegiatan',
                        name: 'kegiatan'
                    },
                    {
                        data: 'instansi',
                        name: 'instansi'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        searchable: true,

                    },
                ]
            });
        });
    </script>
@endpush
