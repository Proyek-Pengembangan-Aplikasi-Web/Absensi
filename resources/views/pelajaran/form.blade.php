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
                <label for="pelajaran" class="form-label">Pelajaran</label>
                <input name="name" type="text" class="form-control" id="pelajaran" placeholder="e.g 2B" value="{{ isset($model) ? ($model->name ?? old('pelajaran')) : old('pelajaran') }}">
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
