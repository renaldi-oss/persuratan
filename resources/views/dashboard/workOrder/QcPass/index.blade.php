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

});

</script>

@endpush
