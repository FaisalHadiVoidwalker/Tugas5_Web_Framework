@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="page-hero p-4 p-lg-5 shadow-sm">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <span class="badge badge-soft-primary mb-3">Home</span>
                <h1 class="display-6 fw-semibold mb-3">Sistem Manajemen Tugas Mahasiswa</h1>
                <p class="lead text-secondary mb-4">
                    Kelola tugas kuliah dengan antarmuka yang sederhana, navigasi yang jelas, dan struktur data yang rapi.
                </p>
                <div class="d-flex flex-column flex-sm-row gap-2">
                    <a href="{{ route('tugas.index') }}" class="btn btn-primary">Lihat Daftar Tugas</a>
                    <a href="{{ route('tugas.create') }}" class="btn btn-outline-primary">Tambah Tugas Baru</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card soft-card shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="h5 mb-3">Akses Cepat</h2>
                        <div class="d-grid gap-2">
                            <a href="{{ route('tugas.index') }}" class="btn btn-outline-primary">Daftar Tugas</a>
                            <a href="{{ route('tugas.create') }}" class="btn btn-outline-primary">Tambah Tugas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
