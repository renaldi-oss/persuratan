@push('styles')
{{-- calender --}}
<link rel="stylesheet" href="{{ asset('./plugins/fullcalendar/main.css') }}">

@endpush


<div class="pt-3">
    {{-- button to create and modal Material --}}
    <div class="d-flex justify-content-end">
        <div>
            <button type="button" class="btn btn-primary" >
                <i class="fas fa-plus"></i> 
            </button>
        </div>
    </div>

    <div>
        <table id="tableQualityControl" class="table1 table-bordered table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Deskripsi</th>
                    <th>File</th>
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

<script>
$(document).ready(function() {
    $('#tableQualityControl').DataTable({
        paging: true,
        searching: false,
        ordering: true,
        pagelength: 10,
    });
});

</script>

@endpush