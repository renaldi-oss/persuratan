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
    <label for="input-instance">Instansi</label>
    <input type="text" class="form-control @error('instance') is-invalid @enderror" id="input-instance" name="instance" placeholder="Masukkan instansi" value="{{ old('instance', ($user->instance ?? '')) }}">
    <x-errormessage error="instance" />
</div>
<div class="form-group">
    <label for="input-location">Lokasi</label>
    <input type="text" class="form-control @error('location') is-invalid @enderror" id="input-location" name="location" placeholder="Masukkan lokasi" value="{{ old('location', ($user->location ?? '')) }}" autofocus>
    <x-errormessage error="location" />
</div>
<div class="form-group">
    <label for="input-po">No PO</label>
    <input type="text" class="form-control @error('po') is-invalid @enderror" id="input-po" name="po" placeholder="Masukkan po" value="{{ old('po', ($user->po ?? '')) }}" autofocus>
    <x-errormessage error="po" />
</div>
<div class="form-group">
    <label for="input-amount">Jumlah</label>
    <input type="number" class="form-control @error('amount') is-invalid @enderror" id="input-amount" name="amount" placeholder="Masukkan jumlah" value="{{ old('amount', ($user->amount ?? '')) }}" autofocus>
    <x-errormessage error="amount" />
</div>

<div class="form-group">
    <label for="input-status">Status</label>
    <select class="form-control @error('status') is-invalid @enderror" id="input-status" name="status">
        @foreach ($roles as $id => $name)
            <option value="{{ $id }}" 
            {{  (isset($user) && $user->roles->pluck('id')->contains($id)) ? 'selected' : '' }}
            >{{ $name }}</option>
        @endforeach
    </select>
    <x-errormessage error="roles" />
</div>

<div class="d-flex justify-content-between ">
    <button type="reset" class="btn btn-primary">Reset</button>
    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
</div>
@push('script')

@endpush
