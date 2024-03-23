@extends('components.navbar')
@section('content')
    <h1>Edit kota</h1>
    <form action="/admin/kota/{{ $kota->id }}/edit" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label class="form-label" for="nama_kota">Nama kota</label>
        <input class="form-control" type="text" name="nama_kota" value="{{ $kota->nama_kota }}" id="nama_kota">
        @error('nama_kota')
            <p>{{ $message }}</p>
        @enderror
        <br>


        <button type="submit" class="btn btn-success">Edit</button>
    </form>
@endsection
