@push('styles')
{{-- calender --}}
<link rel="stylesheet" href="{{ asset('./plugins/fullcalendar/main.css') }}">
{{-- daterange picker --}}
<link rel="stylesheet" href="{{ asset('./plugins/daterangepicker/daterangepicker.css') }}">
{{-- style datatable plugin --}}
<link rel="stylesheet" href="{{ asset('./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('./plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

@endpush


<div class="pt-3">
    {{-- button to create and modal Material --}}
    <div class="d-flex justify-content-end">
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalQcPass">
                Create
            </button>
            <div class="modal fade" id="modalQcPass">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Create Jadwal Pelaksanaan</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body"  x-data="{ }">
                            <form>
                                @csrf
                                <x-forms.input id="input-nama" label="Nama" name="nama" placeholder="Masukkan nama" :value="$jadwal->nama ?? ''" />
                                <x-forms.textarea id="input-deskripsi" label="Deskripsi" name="deskripsi" placeholder="Masukkan deskripsi" :value="$jadwal->deskripsi ?? ''" />
                                <div class="form-group">
                                    <label for="input-tanggal">Tanggal</label>
                                    <input type="text" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', ($jadwal->tanggal ?? '')) }}">
                                    <x-errormessage error="tanggal" />
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        {{-- table event kalendar --}}
        <table id="tableQcPass" class="table1 table-bordered table-striped" style="text-align: center;">
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

    $('#tableQcPass').DataTable({
        paging: true,
        searching: false,
        ordering: true,
        pagelength: 10,
    });

    
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