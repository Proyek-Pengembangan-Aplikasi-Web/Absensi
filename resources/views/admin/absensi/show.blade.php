@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container mt-5">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center">
            <h1>Detail {{ $title }}</h1>
            <a href="{{ route('admin.absensi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <hr>

        <!-- Detail Section -->
        <div class="row">
            <!-- Informasi Produk -->
            <div class="col-md-8">
                <h2 class="mb-4">
                    @if ($absensi->status == 'hadir')
                        <span class="badge bg-success">
                    @elseif ($absensi->status == 'alpa')
                        <span class="badge bg-danger">
                    @elseif ($absensi->status == 'izin')
                        <span class="badge bg-warning">
                    @else
                        <span class="badge bg-primary">
                    @endif
                        {{ ucfirst($absensi->status) }}</td>
                    </span>
                </h2>
                <p><strong>Siswa :</strong> {{ $absensi->siswa->name }}</p>
                <p><strong>Pelajaran :</strong> {{ $absensi->pelajaran->name }}</p>
                <p><strong>Tanggal :</strong> {{ $absensi->date }}</p>
                <p><strong>Alasan :</strong> {{ $absensi->desc ?? '-' }}</p>
            </div>
        </div>
    </div>
@endsection
