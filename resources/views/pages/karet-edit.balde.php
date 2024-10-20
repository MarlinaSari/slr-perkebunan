@extends('layouts.app')

@section('title', 'Edit Data Karet')

@section('header', 'Edit Data Produksi Karet')

@section('content')
<div class="container">
    <h1>Edit Data Produksi Karet</h1>

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

    <form action="{{ route('karet.update', $kakao->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="lokasi">Lokasi:</label>
            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $kakao->lokasi) }}" required>
        </div>

        <div class="form-group">
            <label for="tahun">Tahun:</label>
            <input type="number" name="tahun" class="form-control" value="{{ old('tahun', $kakao->tahun) }}" required>
        </div>

        <div class="form-group">
            <label for="periode">Periode:</label>
            <input type="text" name="periode" class="form-control" value="{{ old('periode', $kakao->periode) }}" required>
        </div>

        <div class="form-group">
            <label for="produksi">Produksi:</label>
            <input type="number" name="produksi" class="form-control" step="0.01" value="{{ old('produksi', $kakao->produksi) }}" required>
        </div>

        <div class="form-group">
            <label for="alpha_ses">Alpha (Hanya untuk SES):</label>
            <input type="number" name="alpha_ses" class="form-control" step="0.01" min="0" max="1" value="{{ old('alpha_ses', $kakao->alpha_ses) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('karet.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
