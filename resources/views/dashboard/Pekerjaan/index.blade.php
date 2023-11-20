@extends('dashboard.layouts.main')

@section("style")
{{-- style datatable plugin --}}
<link rel="stylesheet" href="{{ asset('./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('./plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

@endsection

@section('content')

<x-breadcrumb title="Pekerjaan" link="{{ route('pekerjaan.index') }}" item="pekerjaan" subItem="Manage" />

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card" style="height: auto;">
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <div class="container-fluid my-2">
                            <a href="{{ route('pekerjaan.create') }}" class="btn btn-primary">Create</a>
                        </div>
                        <div class="table-responsive">
                            <table id="pekerjaan" class="table1 table-bordered table-striped" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>No Surat</th>
                                        <th>Instansi</th>
                                        <th>Pekerjaan</th>
                                        <th>Attn</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
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

{{-- script table user --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#pekerjaan').DataTable({
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
                    data: 'no_surat',
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
@endpush
