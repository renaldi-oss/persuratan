<div class="pt-3">
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('quality-control.create', ['id' => $wo->id]) }}" class="btn btn-primary" style="text-decoration: none;">
            <i class="fas fa-plus"></i> Add Quality Control
        </a>
    </div>

    <div>
        <table id="tableQualityControl" class="table1 table-bordered table-striped"  style="text-align: center;justify-content: center;align-items: center;">
            <thead>
                <tr>
                    <th>Judul</th>
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

{{-- script table user --}}
<script type="text/javascript">
  $(document).ready(function() {
    $('#tableQualityControl').DataTable({
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
      autoWidth: false,
      responsive: true,
      ajax:
      {
        url: "{{ route('quality-control.index') }}",
        data: function (d) {
            d.id = {{ $wo->id }}
        }
      },
      columns: [
        {data: 'judul', name: 'judul'},
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