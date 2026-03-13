@extends('layouts.app')

@section('title', 'Edit Tugas')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-9 col-lg-10">
            <div class="page-hero p-4 p-lg-5 mb-4 shadow-sm">
                <span class="badge badge-soft-primary mb-3">Form Edit</span>
                <h1 class="h3 mb-2">Edit Data Tugas</h1>
                <p class="text-secondary mb-0">
                    Perbarui detail tugas agar informasi judul, mata kuliah, deadline, dan status tetap akurat.
                </p>
            </div>

            <div class="card soft-card shadow-sm">
                <div class="card-body p-4 p-lg-5">
                    <div class="mb-4">
                        <h2 class="h5 mb-1">Ubah Informasi Tugas</h2>
                        <p class="text-muted mb-0">Pastikan perubahan data sudah benar sebelum disimpan.</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Periksa kembali input Anda. Pastikan semua field terisi dengan format yang benar.
                        </div>
                    @endif

                    <form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('tugas._form', ['submitLabel' => 'Update'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
