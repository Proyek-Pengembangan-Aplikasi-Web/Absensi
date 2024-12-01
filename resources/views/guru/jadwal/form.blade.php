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
                <label for="guru" class="form-label">Guru</label>
                <select @isset($model) disabled @endisset name="id_user" id="guru" class="form-control">
                    @foreach ($guru as $gr)
                        <option {{ isset($model) ? ($model->id_user == $gr->id ? ' selected' : '') : '' }} value="{{ $gr->id }}">{{ $gr->name }}</option>
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
                <label for="kelas" class="form-label">Kelas</label>
                <select name="id_kelas" id="kelas" class="form-control">
                    @foreach ($kelas as $kls)
                        <option {{ isset($model) ? ($model->id_kelas == $kls->id ? 'selected' : '') : '' }} value="{{ $kls->id }}">{{ $kls->kelas }}</option>
                    @endforeach
                </select>
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
