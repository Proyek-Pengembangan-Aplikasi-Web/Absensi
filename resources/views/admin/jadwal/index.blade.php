@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Daftar {{ $title }}</h1>
        <a href="{{ $route }}" class="btn btn-primary mb-3">Tambah {{ $title }}</a>
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Guru</th>
                    <th>Pelajaran</th>
                    <th>Kelas</th>
                    <th>Waktu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwal as $key => $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->pelajaran->name }}</td>
                        <td>{{ $item->kelas->kelas }}</td>
                        <td>{{ $item->date }}</td>
                        <td>
                            <a href="{{ route('admin.jadwal.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                            <a href="{{ route('admin.jadwal.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.jadwal.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?');">Hapus</button>
                            </form>
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
