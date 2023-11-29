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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createJadwalPelaksanaan">
                Create
            </button>
            <div class="modal fade" id="createJadwalPelaksanaan">
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
        <table id="tableCalendar" class="table1 table-bordered table-striped" style="text-align: center;justify-content: center;align-items: center;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th style="width: 80px;justify-content: center;">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    {{-- Calender --}}
    <div>
        <div class="col-12">
            <div class="card card-primary mt-5">
            <div class="card-body p-0">
                <div id="calendar"></div>
            </div>
            </div>
        </div>
    </div>
</div>

@push('script')
{{-- script datatable --}}
<script src="{{ asset('./plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

{{-- calender --}}
<script src = {{ asset("./plugins/moment/moment.min.js") }}></script>
<script src="{{ asset('./plugins/fullcalendar/main.js') }}"></script>
{{-- date range picker --}}
<script src="{{ asset('./plugins/daterangepicker/daterangepicker.js') }}"></script>
{{-- tempusdominus-bootstrap-4 --}}
<script>
$(document).ready(function() {

    $('#tableCalendar').DataTable({
        paging: true,
        searching: false,
        ordering: true,
        pagelength: 10,
    });

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        textColor: 'black',
    });

    calendar.render();


    // ambil data kalender dari database
    axios.get('{{ route('jadwal.index', ['id' => $wo->id]) }}')
    .then(function (response) {
        var e = response.data;

        var table = $('#tableCalendar').DataTable();
        table.clear().draw();
        for (var i = 0; i < e.length; i++) {
            var start = moment(e[i].start).format('DD/MM/YYYY');
            var end = moment(e[i].end).format('DD/MM/YYYY'); // Menambah 1 hari ke end

            table.row.add([
                i + 1,
                e[i].nama,
                start + ' - ' + end,
                '<div style="display:flex;justify-content:center;"><button type="button" class="btn btn-block btn-outline-danger" onclick="hapusJadwal(' + e[i].id + ')"><i class="fas fa-solid fa-trash" style="color: #dc3545;"></i></button></div>'
            ]).draw(false);
            var colors = ['#d93838', '#007bff', 'rgb(32 171 81)', '#b559b5', '#e5afb8'];
            calendar.addEvent({
                title: e[i].nama,
                start: e[i].start,
                end: moment(e[i].end).add(1, 'day').toDate(), // Menambah 1 hari ke end dan konversi ke Date
                allDay: true,
                color: colors[i % colors.length],
            });
        }
    })
    .catch(function (error) {
        console.log(error);
    });

    $('#tanggal').daterangepicker({
        startDate: moment().subtract(1, 'months'),
        endDate: moment(),
        minDate : moment().subtract(1, 'years'),
        maxDate : moment().add(1, 'years'),
    });
    $('form').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('id', '{{ $wo->id }}');
        formData.append('start', $('#tanggal').data('daterangepicker').startDate.format('YYYY-MM-DD'));
        formData.append('end', $('#tanggal').data('daterangepicker').endDate.format('YYYY-MM-DD'));

        $('#createJadwalPelaksanaan').modal('hide');

        axios.post('{{ route('jadwal.store') }}', formData)
        .then(function (response) {
            var event = response.data;

            calendar.addEvent({
                title: event.nama,
                start: event.start,
                end: event.end,
                allDay: true
            });

            var table = $('#tableCalendar').DataTable();
            table.row.add([
                table.data().count() + 1,
                event.nama,
                moment(event.start).format('DD/MM/YYYY') + ' - ' + moment(event.end).format('DD/MM/YYYY'),
                '<button type="button" class="btn btn-block btn-outline-danger" onclick="hapusJadwal(' + e[i].id + ')"><i class="fas fa-solid fa-trash" style="color: #dc3545;"></i></button>'
            ]).draw(false);

            $(':input').val('');
        })
        .catch(function (error) {
            console.log(error);
        });
    });

});

function hapusJadwal(id) {
    var deleteUrl = '{{ route('jadwal.destroy', ['jadwal' => ':id']) }}';
    var url = deleteUrl.replace(':id', id);

    axios.delete(url, {
        data: {
            _token: '{{ csrf_token() }}'
        }
    })
    .then(function (response) {
        var table = $('#tableCalendar').DataTable();
        var row = table.row(function (idx, data, node) {
            return data[0] === id ? true : false;
        });

        if (row) {
            row.remove().draw(); // Hapus dari tabel
        } else {
            console.log("Baris tidak ditemukan dalam tabel.");
        }

        var event = calendar.getEventById(id);
        if (event) {
            event.remove(); // Hapus dari kalender
        }
    })
    .catch(function (error) {
        console.log(error);
    });
}



</script>

@endpush
