@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <!-- Profile Section -->
    <div class="container mt-5">
        <div class="row">
            <!-- Profile Details -->
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profile Information</h5>
                        <ul class="list-unstyled">
                            <li><strong>Username :</strong> {{ Auth::user()->username }}</li>
                            <li><strong>Nama :</strong> {{ Auth::user()->name }}</li>
                            <li><strong>Email :</strong> {{ Auth::user()->email }}</li>
                            <li><strong>Role :</strong> {{ Auth::user()->role }}</li>
                            <li><strong>Ditambah pada :</strong> {{ Auth::user()->created_at ?? '-' }}</li>
                            <li><strong>Diubah pada :</strong> {{ Auth::user()->updated_at ?? '-' }}</li>
                        </ul>
                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Edit Profile</a>
                        <div class="collapse mt-3" id="collapseExample">
                            <form action="{{ route('profile.update') }}" method="post" class="card card-body">
                                @csrf
                                @method('PUT')
                                <div class="form-group mt-2">
                                    <label for="name">Username</label>
                                    <input required type="text" class="form-control mt-1" value="{{ Auth::user()->username }}" name="username">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="name">Nama</label>
                                    <input required type="text" class="form-control mt-1" value="{{ Auth::user()->name }}" name="name">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="name">Email</label>
                                    <input required type="email" class="form-control mt-1" value="{{ Auth::user()->email }}" name="email">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="name">Password <strong>(Isi Password Jika Ingin Mengubahnya)</strong></label>
                                    <input type="password" class="form-control mt-1" name="password" autocomplete="off">
                                </div>
                                <button class="btn btn-success mt-3">Simpan Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
