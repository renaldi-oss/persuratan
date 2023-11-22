{{-- ISI FORM --}}
<div class="form-group">
    <label for="input-date">Tanggal</label>
    <input type="date" class="form-control @error('date') is-invalid @enderror" id="input-date" name="date" placeholder="Masukkan tanggal" value="{{ old('date', ($user->date ?? '')) }}">
    <x-errormessage error="date" />
</div>
<div class="form-group">
    <label for="input-type">Jenis Kegiatan</label>
    <input type="text" class="form-control @error('type') is-invalid @enderror" id="input-type" name="type" placeholder="Masukkan Jenis kegiatan" value="{{ old('type', ($user->type ?? '')) }}" autofocus>
    <x-errormessage error="type" />
</div>
<div class="form-group">
    <label for="input-instance">Pekerjaan</label>
    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="input-instance" name="instance" placeholder="Masukkan instansi" value="{{ old('instance', ($user->instance ?? '')) }}">
    <x-errormessage error="instance" />
</div>
<div class="form-group">
    <label for="input-location">Lokasi</label>
    <input type="text" class="form-control @error('location') is-invalid @enderror" id="input-location" name="location" placeholder="Masukkan lokasi" value="{{ old('location', ($user->location ?? '')) }}" autofocus>
    <x-errormessage error="location" />
</div>
<div class="form-group">
    <label for="input-amount">Jumlah</label>
    <input type="number" class="form-control @error('amount') is-invalid @enderror" id="input-amount" name="amount" placeholder="Masukkan jumlah" value="{{ old('amount', ($user->amount ?? '')) }}" autofocus>
    <x-errormessage error="amount" />
</div>


<div class="d-flex justify-content-between ">
    <button type="reset" class="btn btn-primary">Reset</button>
    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
</div>
@push('script')

@endpush
