@extends('components.navbar')
@section('content')
    <h1>Edit Jadwal</h1>
    <form action="/admin/jadwal/{{ $jadwal->id }}/edit" method="post">
        @csrf
        @method('PUT')
        <label class="form-label" for="rute_id">Rute</label>
        <select class="form-control" name="rute_id" id="rute_id">
            @foreach ($rute as $item)
                <option value="{{ $item->id }}"  {{ $item->id == $jadwal->rute->id ? 'selected' : '' }}>{{ $item->maskapai->nama_maskapai }} | {{ $item->rute_asal }} | {{ $item->rute_tujuan }}</option>
            @endforeach
        </select>
        @error('rute_id')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label class="form-label" for="waktu_berangkat">Waktu Berangkat</label>
        <input class="form-control" type="time" name="waktu_berangkat" value="{{ $jadwal->waktu_berangkat }}" id="waktu_berangkat">
        @error('waktu_berangkat')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label class="form-label" for="waktu_tiba">Waktu Tiba</label>
        <input class="form-control" type="time" name="waktu_tiba"value="{{ $jadwal->waktu_tiba }}"  id="waktu_tiba">
        @error('waktu_tiba')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label class="form-label" for="harga">Harga</label>
        <input class="form-control" type="number" name="harga" value="{{ $jadwal->harga }}" id="harga">
        @error('harga')
            <p>{{ $message }}</p>
        @enderror
        <br>


        <button type="submit" class="btn btn-success">Edit</button>
    </form>
@endsection
