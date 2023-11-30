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

    // axios.get('{{ route('qcPass.index', ['id' => $wo->id]) }}')
    // .then(function (response) {
    //     var e = response.data;

       
    //     var table = $('#tableQcPass').DataTable();
    //     table.clear().draw();
    //     for (var i = 0; i < e.length; i++) {
    //         table.row.add([
    //             i+1,
    //             e[i].deskripsi,
    //             '<a href="{{ asset('storage/qcPass') }}/'+e[i].file+'" target="_blank">Lihat File</a>',
    //             '<button type="button" class="btn btn-danger btn-sm" onclick="hapusQcPass('+e[i].id+')">Hapus</button>'
    //         ]).draw(false);
    //     }
    // })




    // // ambil data kalender dari database
    // axios.get('{{ route('jadwal.index', ['id' => $wo->id]) }}')
    // .then(function (response) {
    //     var e = response.data;

       
    //     var table = $('#tableCalendar').DataTable();
    //     table.clear().draw();
    //     for (var i = 0; i < e.length; i++) {
    //         var start = moment(e[i].start).format('DD/MM/YYYY');
    //         var end = moment(e[i].end).format('DD/MM/YYYY');
    //         table.row.add([
    //             i+1,
    //             e[i].nama,
    //             start + ' - ' + end,
    //             '<button type="button" class="btn btn-danger btn-sm" onclick="hapusJadwal('+e[i].id+')">Hapus</button>'
    //         ]).draw(false);
    //     }
    //     var colors = ['red', 'blue', 'green', 'purple', 'pink'];
    //     for (var i = 0; i < e.length; i++) {
    //         calendar.addEvent({
    //             title: e[i].nama,
    //             start: e[i].start,
    //             end: e[i].end,
    //             allDay: true,
    //             color: colors[i % colors.length],
    //         });
    //     }
    // })
    // .catch(function (error) {
    //     console.log(error);
    // });

    // $('#tanggal').daterangepicker({
    //     startDate: moment().subtract(1, 'months'),
    //     endDate: moment(),
    //     minDate : moment().subtract(1, 'years'),
    //     maxDate : moment().add(1, 'years'),
    // });
    // $('form').on('submit', function(e) {
    //     e.preventDefault();
        
    //     var formData = new FormData(this);

    //     formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    //     formData.append('id', '{{ $wo->id }}');
    //     formData.append('start', $('#tanggal').data('daterangepicker').startDate.format('YYYY-MM-DD'));
    //     formData.append('end', $('#tanggal').data('daterangepicker').endDate.format('YYYY-MM-DD'));

    //     $('#createJadwalPelaksanaan').modal('hide');

    //     axios.post('{{ route('jadwal.store') }}', formData)
    //     .then(function (response) {
    //         var event = response.data;

    //         calendar.addEvent({
    //             title: event.nama,
    //             start: event.start,
    //             end: event.end,
    //             allDay: true
    //         });

    //         var table = $('#tableCalendar').DataTable();
    //         table.row.add([
    //             table.data().count() + 1,
    //             event.nama,
    //             moment(event.start).format('DD/MM/YYYY') + ' - ' + moment(event.end).format('DD/MM/YYYY'),
    //             '<button type="button" class="btn btn-danger btn-sm" onclick="hapusJadwal('+event.id+')">Hapus</button>'
    //         ]).draw(false);

    //         $(':input').val('');
    //     })
    //     .catch(function (error) {
    //         console.log(error);
    //     });
    // });

});

</script>

@endpush