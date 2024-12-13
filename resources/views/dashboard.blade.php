@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <main class="col-12">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>

        @if (Auth::user()->role == 'admin')
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Murid</h5>
                            <p class="card-text">1000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Kelas</h5>
                            <p class="card-text">1000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Guru</h5>
                            <p class="card-text">1000</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Jadwal Saya</h5>
                            <p class="card-text">3</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="card text-bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Kelas</h5>
                            <p class="card-text">1000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Guru</h5>
                            <p class="card-text">1000</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        @endif
    </main>
@endsection
