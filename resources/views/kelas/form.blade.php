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
                <label for="kelas" class="form-label">Kelas</label>
                <input name="kelas" type="text" class="form-control" id="kelas" placeholder="e.g 2B" value="{{ isset($model) ? ($model->kelas ?? old('kelas')) : old('kelas') }}">
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
