@extends('layouts.app')

@section('title', 'Tambah Tugas')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-9 col-lg-10">
            <div class="page-hero p-4 p-lg-5 mb-4 shadow-sm">
                <span class="badge badge-soft-primary mb-3">Form Input</span>
                <h1 class="h3 mb-2">Tambah Tugas Baru</h1>
                <p class="text-secondary mb-0">
                    Isi data tugas mahasiswa secara lengkap agar proses pemantauan deadline dan status lebih mudah.
                </p>
            </div>

            <div class="card soft-card shadow-sm">
                <div class="card-body p-4 p-lg-5">
                    <div class="mb-4">
                        <h2 class="h5 mb-1">Informasi Tugas</h2>
                        <p class="text-muted mb-0">Semua field wajib diisi sebelum data disimpan.</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Periksa kembali input Anda. Pastikan semua field terisi dengan format yang benar.
                        </div>
                    @endif

                    <form action="{{ route('tugas.store') }}" method="POST">
                        @csrf
                        @include('tugas._form', ['submitLabel' => 'Simpan'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
