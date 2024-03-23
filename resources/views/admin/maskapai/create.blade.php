@extends('components.navbar')
@section('content')
    <h1>Tambah Maskapai</h1>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <label class="form-label" for="nama_maskapai">Nama Maskapai</label>
        <input class="form-control" type="text" name="nama_maskapai" value="{{ old('nama_maskapai') }}" id="nama_maskapai">
        @error('nama_maskapai')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label class="form-label" for="logo_maskapai">Maskapai</label>
        <input class="form-control" type="file" name="logo_maskapai" id="logo_maskapai">
        @error('logo_maskapai')
            <p>{{ $message }}</p>
        @enderror
        <br>


        <button type="submit" class="btn btn-success">Buat</button>
    </form>
@endsection
