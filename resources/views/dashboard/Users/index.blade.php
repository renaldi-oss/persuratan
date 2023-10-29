@extends('dashboard.layouts.main')

@section("style")
{{-- style datatable plugin --}}
<link rel="stylesheet" href="{{ asset('./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('./plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('./plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">


@endsection

@section('content')
  
  {{-- header --}}
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          
          <div class="card" style="height: auto;">
            <!-- /.card-header -->
            <div class="card-body ">
              <div class="container-fluid my-2">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                  Add
                </button>
              </div>
              <table id="usersTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Roles</th>
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
    
    {{-- modal --}}

    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Register New User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal -->


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
    $('#usersTable').DataTable({
      deferRender: false,
      processing: true,
      serverSide: true,
      paging: true,
      ajax: "{{ route('manage-user') }}",
      columns: [
        {data: 'id', name: 'id'},
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        {data: 'roles', name: 'roles'}, 
        {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
        },
      ]
    });
  });  
</script>


@endpush