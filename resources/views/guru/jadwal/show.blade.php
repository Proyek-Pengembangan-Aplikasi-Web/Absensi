@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container mt-5">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center">
            <h1>Pelajaran {{ $jadwal->pelajaran->name }}, Kelas {{ $jadwal->kelas->kelas }}, {{ Carbon\Carbon::parse($jadwal->date)->format('d-m-Y H:s:i') }}</h1>
            <a href="{{ route('guru.jadwal.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <hr>

        <form action="{{ route('guru.absensi.store') }}" method="post">
            @csrf
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Kehadiran</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwal->kelas->siswa as $index => $sw)
                        <input type="hidden" value="{{ $sw->id }}" name="id_siswa[]">
                        <input type="hidden" value="{{ $jadwal->id }}" name="id_jadwal">
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sw->name }}</td>
                            <td>
                                @if ($sw->absensi?->where('id_siswa', $sw->id)->where('id_jadwal', $jadwal->id)->first()?->status == 'hadir')
                                    <span class="badge bg-success">
                                @elseif ($sw->absensi?->where('id_siswa', $sw->id)->where('id_jadwal', $jadwal->id)->first()?->status == 'alpa')
                                    <span class="badge bg-danger">
                                @elseif ($sw->absensi?->where('id_siswa', $sw->id)->where('id_jadwal', $jadwal->id)->first()?->status == 'izin')
                                    <span class="badge bg-warning">
                                @else
                                    <span class="badge bg-secondary">
                                @endif
                                    {{ ucfirst($sw->absensi?->where('id_siswa', $sw->id)->where('id_jadwal', $jadwal->id)->first()?->status ?? 'Belum diabsen') }}</td>
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <input id="inputStatus{{$index}}" type="text" style="width: 50px" disabled/>
                                    <input id="inputStatusData{{$index}}" type="hidden" style="width: 50px" name="status[]" />

                                    <button id="buttonHadir" onclick="statusUpdate{{$index}}('hadir')" type="button" class="btn btn-success btn-sm">Hadir</button>
                                    <button id="buttonSakit" onclick="statusUpdate{{$index}}('sakit')" type="button" class="btn btn-warning btn-sm">Sakit</button>
                                    <button id="buttonIzin" onclick="statusUpdate{{$index}}('izin')" type="button" class="btn btn-primary btn-sm">Izin</button>
                                    <button id="buttonAlpa" onclick="statusUpdate{{$index}}('alpa')" type="button" class="btn btn-danger btn-sm">Alpa</button>
                                </div>
                            </td>
                            <script>
                                function statusUpdate{{$index}}(param) {
                                    document.getElementById('inputStatus{{$index}}').value = param;
                                    document.getElementById('inputStatusData{{$index}}').value = param;
                                }
                            </script>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <p class="text-center">Data Kosong</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if ($jadwal->status != 'selesai')
                <button type="submit" class="btn btn-primary">Simpan Absen</button>
            @endif
        </form>
    </div>
@endsection
