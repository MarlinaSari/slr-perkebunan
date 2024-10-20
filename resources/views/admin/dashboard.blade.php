@extends('layouts.app')

@section('content')
<p>Selamat datang, {{ auth()->user()->name }}. Anda login sebagai {{ auth()->user()->role }}.</p>

<div class="row">
    <div class="col-md-3 grid-margin stretch-card average-price-card">
        <div class="card bg-primary text-white"> <!-- Ubah warna latar belakang -->
            <div class="card-body">
                <div class="d-flex justify-content-between pb-2 align-items-center">
                    <h2 class="font-weight-semibold mb-0">{{ $totalLokasi }}</h2>
                    <div class="icon-holder">
                        <i class="mdi mdi-map-marker"></i>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="font-weight-semibold mb-0">Jumlah Lokasi</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card average-price-card">
        <div class="card bg-success text-white"> <!-- Ubah warna latar belakang -->
            <div class="card-body">
                <div class="d-flex justify-content-between pb-2 align-items-center">
                    <h2 class="font-weight-semibold mb-0">{{ count($totalTanaman) }}</h2> <!-- Menampilkan jumlah jenis tanaman -->
                    <div class="icon-holder">
                        <i class="mdi mdi-leaf"></i>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="font-weight-semibold mb-0">Jenis Tanaman</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card average-price-card">
        <div class="card bg-warning text-white"> <!-- Ubah warna latar belakang -->
            <div class="card-body">
                <div class="d-flex justify-content-between pb-2 align-items-center">
                    <h2 class="font-weight-semibold mb-0">{{ $totalData }}</h2>
                    <div class="icon-holder">
                        <i class="mdi mdi-database"></i>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="font-weight-semibold mb-0">Total Data Keseluruhan</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<h3>Detail Jenis Tanaman</h3>
<ul class="list-group">
    @foreach($totalTanaman as $namaTanaman => $jumlah)
        <li class="list-group-item d-flex justify-content-between align-items-center">{{ $namaTanaman }} 
            <span class="badge badge-primary badge-pill">{{ $jumlah }}</span> {{ $jumlah }} Data </li>
    @endforeach
</ul>
@endsection