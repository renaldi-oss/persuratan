@extends('dashboard.layouts.main')

@section("style")
{{-- style datatable plugin --}}
<link rel="stylesheet" href="{{ asset('./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('./plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('./plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('content')

  <x-breadcrumb title="Operational Request" link="{{ route('operational') }}" item="Operational" subItem="Manage" />

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="height: auto;">
            <!-- /.card-header -->
            <div class="card-body ">
              <div class="container-fluid my-2">
                <a href="{{ route('operational.create') }}" class="btn btn-primary">Create</a>
              </div>
              <table id="usersTable" class="table table-bordered table-striped text-center">
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
      pageLength: 10,
      lengthChange: true,
      searching: true,
      ordering: true,
      info: true,
      autoWidth: true,
      ajax: "{{ route('operational') }}",
      columns: [
        {data: 'id', name: 'id'},
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        {data: 'roles', name: 'roles'},
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
