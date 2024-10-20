@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Data Produksi</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Lokasi</th>
                    <th>Periode</th>
                    <th>Produksi</th>
                    <th>Jenis Tanaman</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataProduksi as $data)
                    <tr>
                        <td>{{ $data['tahun'] }}</td>
                        <td>{{ $data['lokasi'] }}</td>
                        <td>{{ $data['periode'] }}</td>
                        <td>{{ $data['produksi'] }}</td>
                        <td>{{ $data['jenis_tanaman'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
