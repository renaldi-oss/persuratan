@push('styles')

@endpush


<div class="pt-3">
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('checklist.create', $wo->id) }}" class="btn btn-primary" style="text-decoration: none;">
            <i class="fas fa-plus"></i> Add Checklist
        </a>
    </div>

    <div>
        <table id="tableChecklist" class="table1 table-bordered table-striped"  style="text-align: center;justify-content: center;align-items: center;">
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

@push('script')
{{-- script datatable --}}
<script src="{{ asset('./plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

{{-- script table user --}}
<script type="text/javascript">
  $(document).ready(function() {
    $('#tableChecklist').DataTable({
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
      ajax:
      {
        url: "{{ route('quality-control.index') }}",
        data: function (d) {
            d.id = {{ $wo->id }}
        }
      },
      columns: [
        {data: 'deskripsi', name: 'deskripsi'},
        {data: 'created_at', name: 'created_at'},
        {
            data: 'action',
            name: 'action',
        },
        ]
    });
  });

</script>


@endpush
