{{-- ISI FORM --}}
<div class="form-group">
    <label for="input-type">Pemohon</label>
    <input type="text" class="form-control @error('pemohon') is-invalid @enderror" id="input-pemohon" name="type" placeholder="Masukkan nama pemohon" value="{{ old('type', ($user->type ?? '')) }}" autofocus>
    <x-errormessage error="pemohon" />
</div>

<div class="form-group">
    <label for="input-divisi">Divisi</label>
    <select class="form-control" name="divisi" id="divisi">
        <option value="" selected disabled>Pilih Divisi</option>
        <option value="automasi">Automasi</option>
        <option value="it">IT</option>
        <option value="lab">Lab</option>
    </select>
    {{-- <input type="text" class="form-control @error('instance') is-invalid @enderror" id="input-instance" name="instance" placeholder="" value="{{ old('instance', ($user->instance ?? '')) }}"> --}}
    <x-errormessage error="divisi" />
</div>
<div class="form-group">
    <label for="input-pekerjaan">Pekerjaan</label>
    <select class="form-control @error('pekerjaan') is-invalid @enderror" id="input-pekerjaan" name="pekerjaan" autofocus>
        <option value="" selected disabled>Pilih Pekerjaan</option>
        @foreach($pekerjaans as $pekerjaan)
            <option value="{{ $pekerjaan->id }}" {{ old('pekerjaan', ($user->pekerjaan ?? '')) == $pekerjaan->id ? 'selected' : '' }}>
                {{ $pekerjaan->nama }}
            </option>
        @endforeach
    </select>
    <x-errormessage error="pekerjaan" />

</div>

<div class="d-flex justify-content-between ">
    <button type="reset" class="btn btn-primary">Reset</button>
    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
</div>
@push('script')

@endpush
