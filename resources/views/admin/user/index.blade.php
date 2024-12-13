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
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Ditambahkan Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($user as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.users.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <p class="text-center">Data Kosong</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
