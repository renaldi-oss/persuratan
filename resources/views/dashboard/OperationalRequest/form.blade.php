{{-- ISI FORM --}}
<div class="row">
    <div class="form-group col-md-6">
        <label for="input-pekerjaan">Pekerjaan</label>
        <select type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="input-pekerjaan" name="pekerjaan_id">
            <option selected disabled value="">Pilih Pekerjaan</option>
            @foreach ($pekerjaan as $id => $pekerjaans)
                <option value="{{ $pekerjaans->id }}" {{ old('pekerjaan_id', ($operational->pekerjaan_id ?? null)) == $pekerjaans->id ? 'selected' : '' }}>{{ $pekerjaans->nama }}</option>
            </option>
            @endforeach
        </select>
        <x-errormessage error="pekerjaan" />
    </div>
    <div class="form-group col-md-6">
        <label for="input-tanggal">Tanggal</label>
        @php
            $tanggal = old('tanggal', ($operational->tanggal ?? null));
            $formattedTanggal = $tanggal ? date('m/d/Y', strtotime($tanggal)) : '';
        @endphp
        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="input-tanggal" name="tanggal" value="{{ $formattedTanggal }}">
        <x-errormessage error="tanggal" />
    </div>
</div>
<div class="form-group">
    <label for="input-kegiatan">Jenis Kegiatan</label>
    <input type="text" class="form-control @error('kegiatan') is-invalid @enderror" id="input-kegiatan" name="kegiatan" placeholder="Masukkan Jenis kegiatan" value="{{ old('kegiatan', ($operational->kegiatan ?? '')) }}" autofocus>
    <x-errormessage error="kegiatan" />
</div>
<div class="form-group">
    <label for="input-lokasi">Lokasi</label>
    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="input-lokasi" name="lokasi" placeholder="Masukkan lokasi" value="{{ old('lokasi', ($operational->lokasi ?? '')) }}" autofocus>
    <x-errormessage error="lokasi" />
</div>
<div class="row">
    <div class="form-group col-md-6">
        <label for="input-jumlah">Jumlah</label>
        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="input-jumlah" name="jumlah" placeholder="Masukkan jumlah" value="{{ old('jumlah', ($operational->jumlah ?? '')) }}" autofocus>
        <x-errormessage error="jumlah" />
    </div>
    <div class="form-group col-md-6">
        <label for="input-status">Status</label>
        <select type="text" class="form-control @error('status') is-invalid @enderror" id="input-status" name="status" value="{{ old('status', ($operational->status ?? '')) }}" autofocus>
            <option selected value="pending">Pending</option>
            <option value="manager">Manager</option>
            <option value="finance">Finance</option>
        </select>
        <x-errormessage error="status" />
    </div>
</div>


<div class="d-flex justify-content-between ">
    <button type="reset" class="btn btn-primary">Reset</button>
    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
</div>
@push('script')

@endpush
