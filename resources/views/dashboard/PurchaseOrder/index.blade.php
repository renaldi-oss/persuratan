@extends('dashboard.layouts.main')

@section("style")
{{-- Styles for the datatable plugin --}}
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')

<x-breadcrumb title="Purchase Order" link="{{ route('purchase') }}" item="Purchase Order" subItem="Manage" />

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card" style="height: auto;">
        
          <!-- /.card-header -->
          <div class="card-body">
            <div class="container-fluid my-2">
              <a href="{{ route('purchase.create') }}" class="btn btn-primary">Create</a>
            </div>

    
            <div class="card">
              <div class="card-body">
               
                <table id="purchaseOrdersTable1" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th>No Surat</th>
                      <th>Pekerjaan</th>
                      <th>Requester</th>
                      <th>Division</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>

            <div class="card mt-4">
              <div class="card-body">
                
                <table id="purchaseOrdersTable2" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th>No Surat</th>
                      <th>Pekerjaan</th>
                      <th>Requester</th>
                      <th>Division</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection
<!-- Your Blade content above -->

@push('script')
{{-- Scripts for the datatable --}}
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

{{-- Script for the purchaseOrdersTable1 and purchaseOrdersTable2 --}}
<script type="text/javascript">
  $(document).ready(function() {
    $('#purchaseOrdersTable1').DataTable({
      deferRender: true,
      processing: true,
      serverSide: true,
      paging: true,
      pageLength: 10,
      lengthChange: true,
      searching: true,
      ordering: true,
      info: true,
      autoWidth: true,
      ajax: {
        url: "{{ route('purchase') }}",
        data: function (d) {
          d.pekerjaan_id_null = 1; // Filter for IS NULL
        }
      },
      columns: [
        { data: 'surat_no', name: 'surat_no' },
        { data: 'pekerjaan', name: 'pekerjaan' },
        { data: 'requester', name: 'requester' },
        { data: 'division', name: 'division' },
        { data: 'status', name: 'status' },
        {
          data: 'action',
          name: 'action',
          orderable: true,
          searchable: true,
          class: 'd-flex justify-content-center'
        },
      ]
    });

    $('#purchaseOrdersTable2').DataTable({
      deferRender: true,
      processing: true,
      serverSide: true,
      paging: true,
      pageLength: 10,
      lengthChange: true,
      searching: true,
      ordering: true,
      info: true,
      autoWidth: true,
      ajax: {
        url: "{{ route('purchase') }}",
        data: function (d) {
          d.pekerjaan_id_null = 0; // Filter for IS NOT NULL
        }
      },
      columns: [
        { data: 'surat_no', name: 'surat_no' },
        { data: 'pekerjaan', name: 'pekerjaan' },
        { data: 'requester', name: 'requester' },
        { data: 'division', name: 'division' },
        { data: 'status', name: 'status' },
        {
          data: 'action',
          name: 'action',
          orderable: true,
          searchable: true,
          class: 'd-flex justify-content-center'
        },
      ]
    });
  });
</script>
@endpush

<!-- Your Blade content below -->
