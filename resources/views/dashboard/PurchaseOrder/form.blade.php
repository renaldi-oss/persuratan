{{-- ISI FORM --}}
<div class="form-group">
    <label for="input-type">No Surat</label>
    <input type="text" class="form-control @error('surat_no') is-invalid @enderror" id="input-surat_no" name="type" placeholder="Masukkan nomor surat" value="{{ old('type', ($user->type ?? '')) }}" autofocus>
    <x-errormessage error="surat_no" />
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
<div class="form-group">
    <label for="input-type">Requester</label>
    <input type="text" class="form-control @error('requester') is-invalid @enderror" id="input-requester" name="type" placeholder="Masukkan requester" value="{{ old('type', ($user->type ?? '')) }}" autofocus>
    <x-errormessage error="requester" />
</div>
<div class="form-group">
    <label for="input-type">Division</label>
    <input type="text" class="form-control @error('division') is-invalid @enderror" id="input-division" name="type" placeholder="Masukkan division" value="{{ old('type', ($user->type ?? '')) }}" autofocus>
    <x-errormessage error="division" />
</div>
<div class="form-group">
    <label for="input-status">Status</label>
    <select class="form-control @error('status') is-invalid @enderror" id="input-status" name="status" autofocus>
        <option value="" selected disabled>Pilih Status</option>
        <option value="pending" {{ old('status', ($user->status ?? '')) == 'pending' ? 'selected' : '' }}>
            Pending
        </option>
        <option value="manager" {{ old('status', ($user->status ?? '')) == 'manager' ? 'selected' : '' }}>
            Manager
        </option>
    </select>
    <x-errormessage error="status" />
</div>


<div class="d-flex justify-content-between ">
    <button type="reset" class="btn btn-primary">Reset</button>
    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
</div>
@push('script')

@endpush
