@extends('components.navbar')
@section('content')
<h1>Konfirmasi page</h1>
@if (Session::has('success'))
    <div class="alert alert-success mt-4">
        {{ Session::get('success') }}
    </div>
@endif
<table>
    <tr>
        <th>No</th>
        <th>Rute Asal</th>
        <th>Rute Tujuan</th>
        <th>Tanggal Trsansaksi</th>
        <th>Jumlah Tiket</th>
        <th>Harga</th>
        <th>Status</th>
        <th>Detail</th>
    </tr>
    @foreach ($order as $data)
    <tr>
        <td><p>{{ $loop->iteration }}</p></td>
        <td><p>{{ $data->jadwal->rute->rute_asal }}</p></td>
        <td><p>{{ $data->jadwal->rute->rute_tujuan }}</p></td>
        <td><p>{{ $data->jadwal->waktu_berangkat }}</p></td>
        <td><p>{{ $data->jumlah_tiket }}</p></td>
        <td><p>{{ $data->total_harga }}</p></td>
        <td><p>{{ $data->acc }}</p></td>
        <td>
            <a href="/admin/konfirmasi/{{ $data->id }}/terima">Acc</a>
            <a href="/admin/konfirmasi/{{ $data->id }}/tolak">Cancle</a>
        </td>
    </tr>
    @endforeach
</table>

@endsection
