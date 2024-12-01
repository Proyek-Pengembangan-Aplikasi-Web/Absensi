@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Form {{ $title }}</h1>
        <form action="{{ $route }}" method="POST">
            @csrf
            @isset($model)
                @method('PUT')
            @endisset
            <div class="mb-3">
                <label for="siswa" class="form-label">Siswa</label>
                <select @isset($model) disabled @endisset name="id_siswa" id="siswa" class="form-control">
                    @foreach ($siswa as $sw)
                        <option {{ isset($model) ? ($model->id_siswa == $sw->id ? ' selected' : '') : '' }} value="{{ $sw->id }}">{{ $sw->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="pelajaran" class="form-label">Pelajaran</label>
                <select name="id_pelajaran" id="pelajaran" class="form-control">
                    @foreach ($pelajaran as $pljrn)
                        <option {{ isset($model) ? ($model->id_pelajaran == $pljrn->id ? 'selected' : '') : '' }} value="{{ $pljrn->id }}">{{ $pljrn->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select onchange="statusOn(this)" name="status" id="status" class="form-control">
                    <option {{ isset($model) ? ($model->status == 'hadir' ? 'selected' : '') : '' }} value="hadir">Hadir</option>
                    <option {{ isset($model) ? ($model->status == 'alpa' ? 'selected' : '') : '' }} value="alpa">Alpa</option>
                    <option {{ isset($model) ? ($model->status == 'izin' ? 'selected' : '') : '' }} value="izin">Izin</option>
                    <option {{ isset($model) ? ($model->status == 'sakit' ? 'selected' : '') : '' }} value="sakit">Sakit</option>
                </select>
            </div>

            <div id="descInput" style="display: {{ isset($model) ? ($model->status == 'izin' ? 'block' : 'none') : 'none' }}" class="mb-3">
                <label for="desc" class="form-label">Alasan</label>
                <input name="desc" type="text" class="form-control" id="desc" placeholder="e.g Menjenguk saudara yang sakit" value="{{ isset($model) ? ($model->desc ?? old('desc')) : old('desc') }}">
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        function statusOn(param) {
            var descInput = document.getElementById('descInput');
            if (param.value == 'izin') {
                descInput.style.display = 'block';
            } else {
                descInput.style.display = 'none';
            }
        }
    </script>
@endsection
