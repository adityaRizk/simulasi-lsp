@extends('components.navbar')
@section('content')
<h1>Rute Page</h1>
<a href="/admin/rute/create" class="btn btn-primary">Tambah rute</a>
@if (Session::has('success'))
    <div class="alert alert-success mt-4">
        {{ Session::get('success') }}
    </div>
@endif
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>maskapai</th>
            <th>rute awal</th>
            <th>rute tujuan</th>
            <th>Kapasitas</th>
            <th>tanggal pergi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($rute as $data)
        <tr>
            <td><p>{{ $loop->iteration }}</p></td>
            <td><p>{{ $data->maskapai->nama_maskapai }}</p></td>
            <td><p>{{ $data->rute_asal }}</p></td>
            <td><p>{{ $data->rute_tujuan }}</p></td>
            <td><p>{{ $data->kapasitas }}</p></td>
            <td><p>{{ $data->tanggal_pergi }}</p></td>
            <td>
                <a href="/admin/rute/{{ $data->id }}/edit">Edit</a>
                <a href="/admin/rute/{{ $data->id }}/delete">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
