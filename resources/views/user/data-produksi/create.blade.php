@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Data Produksi</h2>

        <form action="{{ route('data-produksi.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tahun">Tahun:</label>
                <input type="text" name="tahun" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <input type="text" name="lokasi" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="periode">Periode:</label>
                <input type="text" name="periode" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="produksi">Produksi:</label>
                <input type="text" name="produksi" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="jenis_tanaman">Jenis Tanaman:</label>
                <select name="jenis_tanaman" class="form-control" required>
                    <option value="kakao">Kakao</option>
                    <option value="karet">Karet</option>
                    <option value="kopi">Kopi</option>
                    <option value="kelapa">Kelapa</option>
                    <option value="sawit">Sawit</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
