@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Data Produksi</h2>

        <form action="{{ route('data-produksi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="number" class="form-control" id="tahun" name="tahun" required>
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <select name="lokasi" id="lokasi" class="form-control" required>
                    <option value="">Pilih Lokasi Kecamatan</option>
                    @foreach($lokasi as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="periode" class="form-label">Periode</label>
                <input type="text" class="form-control" id="periode" name="periode" required>
            </div>

            <div class="mb-3">
                <label for="produksi" class="form-label">Produksi</label>
                <input type="number" class="form-control" id="produksi" name="produksi" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="jenis_tanaman" class="form-label">Jenis Tanaman</label>
                <select class="form-select" id="jenis_tanaman" name="jenis_tanaman" required>
                    <option value="" disabled selected>Pilih Jenis Tanaman</option>
                    <option value="Kakao">Kakao</option>
                    <option value="Karet">Karet</option>
                    <option value="Kelapa">Kelapa</option>
                    <option value="Kopi">Kopi</option>
                    <option value="Sawit">Sawit</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection



