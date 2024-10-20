@extends('layouts.app')

@section('content')
<style>
    .jenis-tanaman-nav {
        margin-bottom: 20px;
        display: flex;
        justify-content: space-around;
    }

    .jenis-tanaman-nav ul {
        list-style-type: none;
        padding: 0;
        display: flex;
        gap: 10px;
    }

    .jenis-tanaman-nav ul li {
        display: inline;
        margin-right: 15px;
    }

    .jenis-tanaman-nav ul li a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff; /* Warna kotak */
        color: white; /* Warna teks */
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Efek transisi */
    }

    .jenis-tanaman-nav ul li a:hover {
        background-color: #0056b3; /* Warna saat hover */
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2); /* Bayangan lebih besar saat hover */
    }

    h3 {
        margin-top: 30px;
        color: #333;
    }

    .table {
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 8px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .table thead th {
        background-color: #f2f2f2;
    }
</style>

<div class="container">
    <h2>Data Produksi Berdasarkan Jenis Tanaman</h2>
    
    <div class="jenis-tanaman-nav">
        <ul>
            <li><a href="#" data-target="kakao">Kakao</a></li>
            <li><a href="#" data-target="karet">Karet</a></li>
            <li><a href="#" data-target="kelapa">Kelapa</a></li>
            <li><a href="#" data-target="kopi">Kopi</a></li>
            <li><a href="#" data-target="sawit">Sawit</a></li>
        </ul>
    </div>

    <!-- Data Produksi Kakao -->
    <div class="tabel-produksi" id="kakao" style="display:none;">
        <h3>Data Produksi Kakao</h3>
        @if(Auth::user()->role === 'admin') <!-- Hanya admin yang bisa melihat kolom aksi -->
        <a href="{{ route('data-produksi.create') }}" class="btn btn-success mb-3">Tambah Data Produksi</a>
        @endif

    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Lokasi</th>
                    <th>Periode</th>
                    <th>Produksi</th>
                    <th>Jenis Produksi</th>
                    @if(Auth::user()->role === 'admin') <!-- Hanya admin yang bisa melihat kolom aksi -->
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($kakaoData as $data)
                    <tr>
                        <td>{{ $data['tahun'] }}</td>
                        <td>{{ $data['lokasi'] }}</td>
                        <td>{{ $data['periode'] }}</td>
                        <td>{{ $data['produksi'] }}</td>
                        <td>{{ $data['jenis_tanaman'] }}</td>
                    @if(Auth::user()->role === 'admin')
                        <td>
                                <a href="{{ route('kakao.edit', $data['periode']) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kakao.destroy', $data['periode']) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                        </td>
                    @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- Penutupan div Kakao -->

    <!-- Data Produksi Karet -->
    <div class="tabel-produksi" id="karet" style="display:none;">
        <h3>Data Produksi Karet</h3>
        @if(Auth::user()->role === 'admin') <!-- Hanya admin yang bisa melihat kolom aksi -->
        <a href="{{ route('data-produksi.create') }}" class="btn btn-success mb-3">Tambah Data Produksi</a>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Lokasi</th>
                    <th>Periode</th>
                    <th>Produksi</th>
                    <th>Jenis Produksi</th>
                    @if(Auth::user()->role === 'admin') <!-- Hanya admin yang bisa melihat kolom aksi -->
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($karetData as $data)
                    <tr>
                        <td>{{ $data['tahun'] }}</td>
                        <td>{{ $data['lokasi'] }}</td>
                        <td>{{ $data['periode'] }}</td>
                        <td>{{ $data['produksi'] }}</td>
                        <td>{{ $data['jenis_tanaman'] }}</td>
                        @if(Auth::user()->role === 'admin')
                        <td>
                                <a href="{{ route('karet.edit', $data['periode']) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('karet.destroy', $data['periode']) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                        </td>
                    @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- Penutupan div Karet -->

    <!-- Data Produksi Kelapa -->
    <div class="tabel-produksi" id="kelapa" style="display:none;">
        <h3>Data Produksi Kelapa</h3>
        @if(Auth::user()->role === 'admin') <!-- Hanya admin yang bisa melihat kolom aksi -->
        <a href="{{ route('data-produksi.create') }}" class="btn btn-success mb-3">Tambah Data Produksi</a>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Lokasi</th>
                    <th>Periode</th>
                    <th>Produksi</th>
                    <th>Jenis Produksi</th>
                    @if(Auth::user()->role === 'admin') <!-- Hanya admin yang bisa melihat kolom aksi -->
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($kelapaData as $data)
                    <tr>
                        <td>{{ $data['tahun'] }}</td>
                        <td>{{ $data['lokasi'] }}</td>
                        <td>{{ $data['periode'] }}</td>
                        <td>{{ $data['produksi'] }}</td>
                        <td>{{ $data['jenis_tanaman'] }}</td>
                        @if(Auth::user()->role === 'admin')
                        <td>
                                <a href="{{ route('kelapa.edit', $data['periode']) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kelapa.destroy', $data['periode']) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                        </td>
                    @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- Penutupan div Kelapa -->

    <!-- Data Produksi Kopi -->
    <div class="tabel-produksi" id="kopi" style="display:none;">
        <h3>Data Produksi Kopi</h3>
        @if(Auth::user()->role === 'admin') <!-- Hanya admin yang bisa melihat kolom aksi -->
        <a href="{{ route('data-produksi.create') }}" class="btn btn-success mb-3">Tambah Data Produksi</a>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Lokasi</th>
                    <th>Periode</th>
                    <th>Produksi</th>
                    <th>Jenis Produksi</th>
                    @if(Auth::user()->role === 'admin') <!-- Hanya admin yang bisa melihat kolom aksi -->
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($kopiData as $data)
                    <tr>
                        <td>{{ $data['tahun'] }}</td>
                        <td>{{ $data['lokasi'] }}</td>
                        <td>{{ $data['periode'] }}</td>
                        <td>{{ $data['produksi'] }}</td>
                        <td>{{ $data['jenis_tanaman'] }}</td>
                        @if(Auth::user()->role === 'admin')
                        <td>
                                <a href="{{ route('kopi.edit', $data['periode']) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kopi.destroy', $data['periode']) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                        </td>
                    @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- Penutupan div Kopi -->

    <!-- Data Produksi Sawit -->
    <div class="tabel-produksi" id="sawit" style="display:none;">
        <h3>Data Produksi Kelapa Sawit</h3>
        @if(Auth::user()->role === 'admin') <!-- Hanya admin yang bisa melihat kolom aksi -->
        <a href="{{ route('data-produksi.create') }}" class="btn btn-success mb-3">Tambah Data Produksi</a>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Lokasi</th>
                    <th>Periode</th>
                    <th>Produksi</th>
                    <th>Jenis Produksi</th>
                    @if(Auth::user()->role === 'admin') <!-- Hanya admin yang bisa melihat kolom aksi -->
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($sawitData as $data)
                    <tr>
                        <td>{{ $data['tahun'] }}</td>
                        <td>{{ $data['lokasi'] }}</td>
                        <td>{{ $data['periode'] }}</td>
                        <td>{{ $data['produksi'] }}</td>
                        <td>{{ $data['jenis_tanaman'] }}</td>
                        @if(Auth::user()->role === 'admin')
                        <td>
                                <a href="{{ route('sawit.edit', $data['periode']) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('sawit.destroy', $data['periode']) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                        </td>
                    @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- Penutupan div Sawit -->

</div> <!-- Penutupan div container -->
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const links = document.querySelectorAll('.jenis-tanaman-nav a');
        const tables = document.querySelectorAll('.tabel-produksi');

        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                // Sembunyikan semua tabel
                tables.forEach(table => table.style.display = 'none');

                // Tampilkan tabel yang sesuai
                const target = this.getAttribute('data-target');
                document.getElementById(target).style.display = 'block';
            });
        });
    });
</script>
@endsection
