@extends('components.navbar')
@section('content')
<h1>Maskapai page</h1>
<a href="/admin/maskapai/create" class="btn btn-primary">Tambah maskapai</a>
@if (Session::has('success'))
    <div class="alert alert-success mt-4">
        {{ Session::get('success') }}
    </div>
@endif
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama maskapai</th>
            <th>Logo</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($maskapai as $data)
            <tr>
            <td><p>{{ $loop->iteration }}</p></td>
            <td><p>{{ $data->nama_maskapai }}</p></td>
            <td><img src="/storage/images/{{ $data->logo_maskapai }}" width="100" alt="Logo Maskapai"></td>
            <td>
                <a href="/admin/maskapai/{{ $data->id }}/edit">Edit</a>
                <a href="/admin/maskapai/{{ $data->id }}/delete">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
