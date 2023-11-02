@extends('dashboard.layouts.main')

@section("style")
{{-- style datatable plugin --}}
<link rel="stylesheet" href="{{ asset('./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('./plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('./plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('content')
  
  <x-breadcrumb title="Manage Instansi" link="{{ route('instansi.index') }}" item="Instansi" subItem="Manage" />

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          
          <div class="card" style="height: auto;">
            <!-- /.card-header -->
            <div class="card-body ">
              <div class="container-fluid my-2">
                <a href="{{ route('instansi.create') }}" class="btn btn-primary">Create</a>                
              </div>
              <table id="table" class="table table-bordered table-striped" style="text-align: center;">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Kontak</th>
                  <th>Email</th>
                  <th>Lokasi</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
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
      ajax: "{{ route('instansi.index') }}",
      columns: [
        {data: 'nama', name: 'nama'},
        {data: 'alamat', name: 'alamat'},
        {data: 'kontak', name: 'kontak'}, 
        {data: 'email', name: 'email'}, 
        {data: 'lokasi', name: 'lokasi'},
        {
            data: 'action', 
            name: 'action', 
            class: 'd-flex justify-content-center'
        },
        ],
        drawCallback: function(settings) {
          var data = this.api().rows({page:'current'}).data();
          console.log(data);
        },
    });
  });  
</script>

@endpush