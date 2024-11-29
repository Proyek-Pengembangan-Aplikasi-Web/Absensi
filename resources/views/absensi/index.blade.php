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
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kelas as $key => $item)
                    <tr data-bs-toggle="collapse" href="#collapseExample{{$key}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$key}}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kelas }}</td>
                        {{-- <td>
                            @if ($item->status == 'hadir')
                                <span class="badge bg-success">
                            @elseif ($item->status == 'alpa')
                                <span class="badge bg-danger">
                            @elseif ($item->status == 'izin')
                                <span class="badge bg-warning">
                            @else
                                <span class="badge bg-primary">
                            @endif
                                {{ ucfirst($item->status) }}</td>
                            </span>
                        <td>{{ $item->created_at }}</td> --}}
                        <td>
                            <a href="{{ route('absensi.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                            <a href="{{ route('absensi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('absensi.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?');">Hapus</button>
                            </form>
                        </td>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($item->siswa as $sw)
                                            @php
                                                $i = 1;
                                            @endphp
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $sw->name }}</td>
                                                {{-- <td>
                                                    @if ($sw->status == 'hadir')
                                                        <span class="badge bg-success">
                                                    @elseif ($sw->status == 'alpa')
                                                        <span class="badge bg-danger">
                                                    @elseif ($sw->status == 'izin')
                                                        <span class="badge bg-warning">
                                                    @else
                                                        <span class="badge bg-primary">
                                                    @endif
                                                        {{ ucfirst($sw->status) }}</td>
                                                    </span>
                                                <td>{{ $sw->created_at }}</td> --}}
                                                <td>
                                                    <form action="{{ route('absensi.destroy', $sw->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?');">Hadir</button>
                                                    </form>
                                                    <form action="{{ route('absensi.destroy', $sw->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?');">Alpa</button>
                                                    </form>
                                                    <form action="{{ route('absensi.destroy', $sw->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?');">Alpa</button>
                                                    </form>
                                                    <form action="{{ route('absensi.destroy', $sw->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?');">Alpa</button>
                                                    </form>
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
