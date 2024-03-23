@extends('components.navbar')
@section('content')
    <h1>Edit Maskapai</h1>
    <form action="/admin/maskapai/{{ $maskapai->id }}/edit" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label class="form-label" for="nama_maskapai">Nama Maskapai</label>
        <input type="text" class="form-control" name="nama_maskapai" value="{{ $maskapai->nama_maskapai }}" id="nama_maskapai">
        @error('nama_maskapai')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label class="form-label" for="logo_maskapai">Logo</label>
        <input type="file" class="form-control" name="logo_maskapai" id="logo_maskapai">
        @error('logo_maskapai')
            <p>{{ $message }}</p>
        @enderror
        <br>


        <button type="submit" class="btn btn-success">Edit</button>
    </form>
@endsection
