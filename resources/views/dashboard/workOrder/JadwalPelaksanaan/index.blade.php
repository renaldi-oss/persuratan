@push('styles')
{{-- calender --}}
<link rel="stylesheet" href="{{ asset('./plugins/fullcalendar/main.css') }}">
@endpush

<div class="pt-3">
    {{-- button to create and modal Material --}}
    <div class="d-flex justify-content-end">
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createMaterial">
                Create
            </button>
            <div class="modal fade" id="createMaterial">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Create Material</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" x-data="postTimeline()">
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered align-items-center table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Brand</th>
                                            <th>Toko</th>
                                            <th>Qty</th>
                                            <th>Harga Estimasi</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(field, index) in fields" :key="index">
                                            <tr>
                                                <td x-text="index + 1"></td>
                                                <td><input x-model="field.nama" type="text" name="nama[]" class="form-control"></td>
                                                <td><input x-model="field.brand" type="text" name="brand[]" class="form-control"></td>
                                                <td>
                                                    <select x-model="field.toko" name="toko[]" class="form-control">
                                                        <option value="offline">Offline</option>
                                                        <option value="online">Online</option>
                                                    </select>
                                                </td>
                                                <td><input x-model="field.qty" type="number" name="qty[]" class="form-control"></td>
                                                <td><input x-model="field.harga" type="number" name="harga[]" class="form-control"></td>
                                                <td><button type="button" class="btn btn-danger btn-small" @click="removeField(index)">&times;</button></td>
                                            </tr>
                                        </template>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7" class="text-right"><button type="button" class="btn btn-info" @click="addNewField()">+ Add Row</button></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end button to create and table Material--}}

    {{-- Calender --}}
    <div x-data="{}" x-init="initCalendar" x-ref="calendar">
        <div class="col-md-9">
            <div class="card card-primary">
            <div class="card-body p-0">
                <div id="calendar"></div>
            </div>
            </div>
        </div>
    </div>
</div>
@push('script')
{{-- calender --}}
<script src = {{ asset("./plugins/moment/moment.min.js") }}></script>
<script src="{{ asset('./plugins/fullcalendar/main.js') }}"></script>

<script>
    function initCalendar() {
        var calendarEl = this.$refs.calendar;
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            initialDate: '2021-01-07',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            }
        });
        calendar.render();
    }

    function postTimeline() {
        return {
            fields: [{
                nama: '',
                brand: '',
                toko: '',
                qty: '',
                harga: '',
            }],
            addNewField() {
                this.fields.push({
                    nama: '',
                    brand: '',
                    toko: '',
                    qty: '',
                    harga: '',
                })
            },
            removeField(index) {
                this.fields.splice(index, 1)
            },
            save() {
                console.log(this.fields)
            }
        }
    }
</script>

@endpush