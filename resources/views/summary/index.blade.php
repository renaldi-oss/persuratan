@extends('dashboard.layouts.main')

@section("style")
{{-- style datatable plugin --}}
<link rel="stylesheet" href="{{ asset('./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('./plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

@endsection

@section('content')

<x-breadcrumb title="Summary" link="{{ route('summary.index') }}" item="Summary" subItem="" />

<div class="row ml-3 mr-3">
  <div class="col-12">
    <div class="card">
      <div class="card-body table-responsive p-4">
        <table id="pekerjaan" class="table table-hover text-nowrap col-12">
          <thead>
              <tr>
                  <th class="col-5">No Surat</th>
                  <th class="col-5">Nama Pekerjaan</th>
                  <th class="col-2">Aksi</th>
              </tr>
          </thead>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
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
          paging: true,
          pageLength: 10,
          searching: true,
          ajax: "{{ route('summary.index') }}",
          columns: [
              {
                  data: 'surat_no',
                  name: 'no surat'
              },
              {
                  data: 'nama',
                  name: 'pekerjaan'
              },
              {
                  data: 'action',
                  name: 'action'
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