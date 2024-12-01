@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Daftar {{ $title }}</h1>
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Guru</th>
                    <th>Pelajaran</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwal as $key => $item)
                    <tr data-bs-toggle="collapse" href="#collapseExample{{$key}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$key}}">
                        <td>
                            {{ $loop->iteration }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-square" viewBox="0 0 16 16">
                                <path d="M3.626 6.832A.5.5 0 0 1 4 6h8a.5.5 0 0 1 .374.832l-4 4.5a.5.5 0 0 1-.748 0z"/>
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
                            </svg>
                        </td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->pelajaran->name }}</td>
                        <td>{{ $item->kelas->kelas }}</td>
                    </tr>
                    <tr>
                        <td colspan="7" class="p-0">
                            <div class="collapse" id="collapseExample{{$key}}">
                                <div class="card card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>Nama</td>
                                                <td>Kehadiran</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($item->kelas->siswa as $index => $sw)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $sw->name }}</td>
                                                    <td>
                                                        @if ($sw->absensi->status == 'hadir')
                                                            <span class="badge bg-success">
                                                        @elseif ($sw->absensi->status == 'alpa')
                                                            <span class="badge bg-danger">
                                                        @elseif ($sw->absensi->status == 'izin')
                                                            <span class="badge bg-warning">
                                                        @else
                                                            <span class="badge bg-secondary">
                                                        @endif
                                                            {{ ucfirst($sw->absensi->status ?? 'Belum diabsen') }}</td>
                                                        </span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">
                                                        <p class="text-center">Data Kosong</p>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <p class="text-center">Data Kosong</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
