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
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="e.g Udin" name="name" value="{{ isset($model) ? ($model->name ?? old('name')) : old('name') }}">
            </div>

            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control" id="nis" placeholder="e.g 092314234721" name="nis" type="number" value="{{ isset($model) ? ($model->nis ?? old('nis')) : old('nis') }}">
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
@endsection
