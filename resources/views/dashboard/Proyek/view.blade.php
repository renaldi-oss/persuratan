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
<div class="page-content">
    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="container-fluid d-flex justify-content-end my-2">
                    <a href="{{ route('proyek.index') }}" class="btn btn-primary">Kembali</a>

                </div>

            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">proyek</h4>

                            <br />
                            <table class="table table-bordered table-striped" style="border-collapse: collapse; border-spacing: 0">
                                <thead>
                                    <tr>
                                        <th width="200px;">No Surat</th>
                                        <th width="50;">:</th>
                                        <th>001/PEN/TKL/XII/2021</th>
                                        <th>Tanggal</th>
                                        <th>:</th>
                                        <th>01 Desember 2021</th>
                                    </tr>
                                    <tr>
                                        <th>Client</th>
                                        <th>:</th>
                                        <th>PT New Module International</th>
                                        <th>Nama Pekerjaan</th>
                                        <th>:</th>
                                        <th>nama pekerjaan</th>
                                    </tr>
                                    <tr>
                                        <th>Lokasi</th>
                                        <th>:</th>
                                        <th>lokasi</th>
                                        <th>Deskripsi Pekerjaan</th>
                                        <th>:</th>
                                        <th>Deskripsi pekerjaan</th>
                                    </tr>
                                    <tr>
                                        <th>Attn</th>
                                        <th>:</th>
                                        <th></th>
                                        <th>Email</th>
                                        <th>:</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th>Delivery Time</th>
                                        <th>:</th>
                                        <th></th>
                                        <th>Payment</th>
                                        <th>:</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Kontrak</th>
                                        <th>:</th>
                                        <th>01 Desember 2021</th>
                                        <th>Tanggal Akhir Kontrak</th>
                                        <th>:</th>
                                        <th>31 Maret 2022</th>
                                    </tr>
                                    <tr>
                                        <th>Scan PO</th>
                                        <th>:</th>
                                        <th>
                                            <a href="http://tekno.kimedaka.com/upload/doc_po/contoh1.pdf" target="_blank" class="btn btn-success">Lihat</a>
                                        </th>
                                        <th>No Kontrak</th>
                                        <th>:</th>
                                        <th>9901923091</th>
                                    </tr>

                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="header-title">
                                Detail proyek
                                <div style="float: right"></div>
                            </h5>
                            <br />
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="DataTables_Table_0_length">
                                            <label>Show
                                                <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm" fdprocessedid="3f20bs">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                                entries</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0" /></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dt-responsive table-striped datatables dataTable no-footer dtr-inline collapsed" style="border-collapse: collapse; border-spacing: 0px; width: 100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 67.3333px" aria-sort="ascending" aria-label="No: activate to sort column descending">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 102.333px" aria-label="Nama: activate to sort column ascending">No Cat</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 102.333px" aria-label="Nama: activate to sort column ascending">Nama</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 84.3333px" aria-label="QTY: activate to sort column ascending">QTY</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 147.333px" aria-label="Unit Price: activate to sort column ascending">Unit Price</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 157px" aria-label="Estimated Price: activate to sort column ascending">Estimated Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td>No 1</td>
                                                    <td>No Cat 1</td>
                                                    <td>Nama 1</td>
                                                    <td>QTY 1</td>
                                                    <td>Unit Price 1</td>
                                                    <td>Estimated Price 1</td>
                                                </tr>
                                                <tr class="even">
                                                    <td>No 2</td>
                                                    <td>No Cat 2</td>
                                                    <td>Nama 2</td>
                                                    <td>QTY 2</td>
                                                    <td>Unit Price 2</td>
                                                    <td>Estimated Price 2</td>
                                                </tr>
                                                <!-- Tambahkan baris baru sesuai data yang Anda miliki -->
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                                                    <a href="http://tekno.kimedaka.com/user/detail_proyek/1#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                                </li>
                                                <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next">
                                                    <a href="http://tekno.kimedaka.com/user/detail_proyek/1#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">Next</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
   <!-- /.row -->
<div class="page-content-wrapper">
    <div class="container-fluid">
       

        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                    <h5 class="header-title">
                                Bukti Upload PO
                                <div style="float: right"></div>
                            </h5>
                    </div>
                    <div class="card-body">
                        <div id="actions" class="row">
                            <div class="col-lg-6">
                                <div class="btn-group w-100">
                                    <span class="btn btn-success col fileinput-button">
                                        <i class="fas fa-plus"></i>
                                        <span>Add files</span>
                                    </span>
                                    <button type="submit" class="btn btn-primary col start">
                                        <i class="fas fa-upload"></i>
                                        <span>Start upload</span>
                                    </button>
                                    <button type="reset" class="btn btn-warning col cancel">
                                        <i class="fas fa-times-circle"></i>
                                        <span>Cancel upload</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center">
                                <div class="fileupload-process w-100">
                                    <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table table-striped files" id="previews">
                            <div id="template" class="row mt-2">
                                <div class="col-auto">
                                    <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="lead" data-dz-name></span>
                                        <span data-dz-size></span>
                                    </p>
                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                </div>
                                <div class="col-4 d-flex align-items-center">
                                    <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                    </div>
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    <div class="btn-group">
                                        <button class="btn btn-primary start">
                                            <i class="fas fa-upload"></i>
                                            <span>Start</span>
                                        </button>
                                        <button data-dz-remove class="btn btn-warning cancel">
                                            <i class="fas fa-times-circle"></i>
                                            <span>Cancel</span>
                                        </button>
                                        <button data-dz-remove class="btn btn-danger delete">
                                            <i class="fas fa-trash"></i>
                                            <span>Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
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
            $('#table').DataTable({
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
                ajax: "{{ route('penawaran.index') }}",
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
            <a class="btn btn-primary btn-sm" href="#">
                <i class="fas fa-eye"></i>
            </a>
            <a class="btn btn-info btn-sm" href="#">
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