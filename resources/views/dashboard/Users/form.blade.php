{{-- ISI FORM --}}
<div class="form-group">
    <label for="input-name">Nama</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="input-name" name="name" placeholder="Masukkan nama" value="{{ old('name', ($user->name ?? '')) }}">
    <x-errormessage error="name" />
</div>

<div class="form-group">
    <label for="input-username">Username</label>
    <input type="text" class="form-control @error('username') is-invalid @enderror" id="input-username" name="username" placeholder="Masukkan username" value="{{ old('username', ($user->username ?? '')) }}" autofocus>
    <x-errormessage error="username" />
</div>

<div class="form-group">
    <label for="input-email">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="input-email" name="email" placeholder="Masukkan email" value="{{ old('email', ($user->email ?? '')) }}">
    <x-errormessage error="email" />
</div>
<div class="form-group">
    <label for="input-password">Password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="input-password" name="password" placeholder="Masukkan password" value="{{ old('password', ($user->password ?? '')) }}">
    <x-errormessage error="password" />
</div>

<div class="form-group">
    <label for="input-roles">Roles</label>
    <select class="form-control @error('roles') is-invalid @enderror" id="input-roles" name="roles">
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
