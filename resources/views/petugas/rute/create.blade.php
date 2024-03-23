@extends('components.navbar')
@section('content')
    <h1>Tambah Rute</h1>

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <label class="form-label" for="maskapai_id">Maskapai</label>
        <select class="form-control" name="maskapai_id" id="maskapai_id">
            @foreach ($maskapai as $item)
                <option value="{{ $item->id }}">{{ $item->nama_maskapai }}</option>
            @endforeach
        </select>
        @error('maskapai_id')
            {{ $message }}
        @enderror
        <br>

        <label class="form-label" for="rute_asal">Rute Asal</label>
        <select class="form-control" name="rute_asal" id="rute_asal">
            @foreach ($kota as $item)
                <option value="{{ $item->nama_kota }}">{{ $item->nama_kota }}</option>
            @endforeach
        </select>
        @error('rute_asal')
            {{ $message }}
        @enderror
        <br>

        <label class="form-label" for="rute_tujuan">Rute Tujuan</label>
        <select class="form-control" name="rute_tujuan" id="rute_tujuan">
            @foreach ($kota as $item)
                <option value="{{ $item->nama_kota }}">{{ $item->nama_kota }}</option>
            @endforeach
        </select>
        @error('rute_tujuan')
            {{ $message }}
        @enderror
        <br>

        <label class="form-label" for="kapasitas">Kapasitas</label>
        <input type="number" class="form-control" name="kapasitas" value="{{ old('kapasitas') }}" id="kapasitas">
        @error('kapasitas')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label class="form-label" for="tanggal_pergi">Tanggal Pergi</label>
        <input type="date" class="form-control" name="tanggal_pergi" id='tanggal_pergi'>
        @error('tanggal_pergi')
            {{ $message }}
        @enderror
        <br>
        <button type="submit" class="btn btn-success">Buat</button>
    </form>
@endsection
