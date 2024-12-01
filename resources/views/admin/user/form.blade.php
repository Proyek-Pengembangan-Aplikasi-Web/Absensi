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
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="e.g Udin" name="username" value="{{ isset($model) ? ($model->username ?? old('username')) : old('username') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="e.g Udin" name="email" value="{{ isset($model) ? ($model->email ?? old('email')) : old('email') }}">
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
