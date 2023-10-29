<div class="form-group">
    <label for="input-username">Username</label>
    <input type="text" class="form-control @error('username') is-invalid @enderror" id="input-username" name="username" placeholder="Masukkan username Kriteria" value="{{ old('username', ($user->username ?? '')) }}" autofocus>
    <x-errormessage error="username" />
</div>
<div class="form-group">
    <label for="input-name">Nama</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="input-name" name="name" placeholder="Masukkan nama Kriteria" value="{{ old('name', ($user->name ?? '')) }}">
    <x-errormessage error="name" />
</div>
<div class="form-group">
    <label for="input-email">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="input-email" name="email" placeholder="Masukkan email Kriteria" value="{{ old('email', ($user->email ?? '')) }}">
    <x-errormessage error="email" />
</div>
<div class="form-group">
    <label for="input-password">Password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="input-password" name="password" placeholder="Masukkan password Kriteria" value="{{ old('password', ($user->password ?? '')) }}">
    <x-errormessage error="password" />
</div>

<div class="form-group">
    <label for="input-roles">Roles</label>
    <select class="form-control @error('roles') is-invalid @enderror" id="input-roles" name="roles">
        <option value="">-- Pilih Roles --</option>
        @foreach ($roles as $role)
            <option value="{{ $role->name }}" {{ old('roles', ($user->roles ?? '')) == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
        @endforeach
    </select>
    <x-errormessage error="roles" />
</div>

<button type="reset" class="btn btn-primary">Reset</button>
<button type="submit" class="btn btn-primary">{{ $tombol }}</button>

@push('script')

@endpush
