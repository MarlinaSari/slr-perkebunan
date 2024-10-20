@extends('layouts.app')

@section('title', 'Hasil Prediksi Produksi Kelapa Sawit')

@section('header', 'Hasil Perhitungan Prediksi Produksi Kelapa Sawit')

@section('content')
<div class="container">
    <h1>Hasil Prediksi Produksi Kelapa Sawit</h1>

    <!-- Bagian ini hanya untuk admin -->
    @if(Auth::user()->role == 'admin')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form Input untuk Alpha (hanya admin) -->
        <form action="{{ route('sawit.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <select name="lokasi" class="form-control" required>
                    <option value="">Pilih Kecamatan</option>
                    @foreach($kecamatan as $kec)
                        <option value="{{ $kec }}">{{ $kec }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tahun">Tahun:</label>
                <input type="number" name="tahun" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="periode">Periode:</label>
                <input type="text" name="periode" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="produksi">Produksi:</label>
                <input type="number" name="produksi" class="form-control" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="alpha_ses">Alpha (hanya untuk SES):</label>
                <input type="number" name="alpha" class="form-control" step="0.01" min="0" max="1"  <input type="number" name="alpha_ses" class="form-control" step="0.01" min="0" max="1" value="{{ old('alpha_ses') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endif

    <!-- Tambahkan tautan unduh PDF dan CSV di sini -->
    <div class="mb-3">
        <h4>Unduh Data</h4>
        <a href="{{ route('sawit.export.pdf') }}" class="btn btn-danger">Download PDF</a>
        <a href="{{ route('sawit.export.csv') }}" class="btn btn-success">Download CSV</a>
    </div>
    
    <!-- Tabel untuk Hasil Regresi Linear dan SES, bisa dilihat oleh semua user -->
    <h2>Hasil Regresi Linear</h2>
    @if(!empty($sawitRegression))
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Lokasi</th>
                <th>Intercept (a)</th>
                <th>Slope (b)</th>
                <th>MAPE (%)</th>
                <th>Prediksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sawitRegression as $location => $data)
            <tr>
                <td>{{ $location }}</td>
                <td>{{ number_format($data['a'], 2) }}</td>
                <td>{{ number_format($data['b'], 2) }}</td>
                <td>{{ number_format($data['MAPE'], 2) }}</td>
                <td>
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>Periode</th>
                                <th>Produksi Aktual</th>
                                <th>Produksi Prediksi</th>
                                <th>APE (%)</th>
                                @if(Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['predictions'] as $prediction)
                            <tr>
                                <td>{{ $prediction['periode'] }}</td>
                                <td>{{ number_format($prediction['produksi'], 2) }}</td>
                                <td>{{ number_format($prediction['predictedY'], 2) }}</td>
                                <td>{{ number_format($prediction['APE'], 2) }}</td>
                                @if(Auth::user()->role == 'admin')
                                <td>
                                    <form action="{{ route('sawit.destroy', $prediction['periode']) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                    <a href="{{ route('sawit.edit', $prediction['periode']) }}" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Tidak ada data regresi linear tersedia.</p>
    @endif

    <h2>Hasil Single Exponential Smoothing (SES)</h2>
    @if(!empty($sawitSES))
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Lokasi</th>
                <th>MAPE (%)</th>
                <th>Prediksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sawitSES as $location => $data)
            <tr>
                <td>{{ $location }}</td>
                <td>{{ number_format($data['MAPE'], 2) }}</td>
                <td>
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>Periode</th>
                                <th>Produksi Aktual</th>
                                <th>Produksi Prediksi</th>
                                <th>APE (%)</th>
                                @if(Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['predictions'] as $prediction)
                            <tr>
                                <td>{{ $prediction['periode'] }}</td>
                                <td>{{ number_format($prediction['produksi'], 2) }}</td>
                                <td>{{ number_format($prediction['predictedY'], 2) }}</td>
                                <td>{{ number_format($prediction['APE'], 2) }}</td>
                                @if(Auth::user()->role == 'admin')
                                <td>
                                    <form action="{{ route('sawit.destroy', $prediction['periode']) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                    <a href="{{ route('sawit.edit', $prediction['periode']) }}" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Tidak ada data SES tersedia.</p>
    @endif
    
</div>

@endsection
