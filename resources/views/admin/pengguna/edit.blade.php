@extends('components.navbar')
@section('content')
    <h1> Pengguna</h1>
    <form action="" method="post">
        @csrf
        @method('PUT')
        <label class="form-label" for="nama_lengkap">nama_lengkap</label>
        <input class="form-control" type="text" name="nama_lengkap" value="{{ $user->nama_lengkap }}" id="nama_lengkap">
        @error('nama_lengkap')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <br>

        <label class="form-label" for="username">username</label>
        <input class="form-control" type="text" name="username" value="{{ $user->username }}" id="username">
        @error('username')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <br>

        <label class="form-label" for="password">password</label>
        <input class="form-control" type="password" name="password" id="password">
        @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <br>

        <label class="form-label" for="role">Role</label>
        <select name="role" id="role">
            {{-- <option value="{{ $user->role }}" selected >{{ $user->role }}</option> --}}
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
            <option value="pengguna" {{ $user->role == 'pengguna' ? 'selected' : '' }}>Pengguna</option>
        </select>

        <button type="submit" class="btn btn-success">Login</button>
    </form>
@endsection
