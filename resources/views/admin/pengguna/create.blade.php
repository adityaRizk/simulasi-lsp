@extends('components.navbar')
@section('content')
    <h1>Tambah Pengguna</h1>
    <form action="" method="post">
        @csrf
        <label class="form-label" for="nama_lengkap">nama_lengkap</label>
        <input class="form-control" type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" id="nama_lengkap">
        @error('nama_lengkap')
            <p class=" text-danger">{{ $message }}</p>
        @enderror

        <label class="form-label" for="username">username</label>
        <input class="form-control" type="text" name="username" value="{{ old('username') }}" id="username">
        @error('username')
            <p class=" text-danger">{{ $message }}</p>
        @enderror

        <label class="form-label" for="password">password</label>
        <input class="form-control" type="password" name="password" id="password">
        @error('password')
            <p class=" text-danger">{{ $message }}</p>
        @enderror

        <label class="form-label" for="role">Role</label>
        <select class="form-control" name="role" id="role">
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
            <option value="pengguna" selected>Pengguna</option>
        </select>

        <button type="submit" class="btn btn-success">Buat</button>
    </form>
@endsection
