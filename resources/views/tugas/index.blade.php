@extends('layouts.app')

@section('title', 'Daftar Tugas')

@section('content')
    <div class="page-hero p-4 p-lg-5 mb-4 shadow-sm">
        <span class="badge badge-soft-primary mb-3">Daftar Tugas</span>
        <h1 class="h2 mb-2">Daftar Tugas Mahasiswa</h1>
        <p class="text-secondary mb-0">
            Halaman ini menampilkan seluruh data tugas mahasiswa dalam bentuk tabel yang ringkas dan mudah dipantau.
        </p>
    </div>

    <div class="card soft-card shadow-sm">
        <div class="card-header bg-white border-0 px-4 pt-4 pb-0">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-start gap-3">
                <div>
                    <h2 class="h5 mb-1">Tabel Tugas</h2>
                    <p class="text-muted mb-0">Pantau semua tugas mahasiswa yang tersimpan di database.</p>
                </div>
                <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-2">
                    <a href="{{ route('tugas.create') }}" class="btn btn-primary">Tambah Tugas</a>
                    <span class="badge rounded-pill text-bg-light border text-dark">
                        Total: {{ $daftarTugas->count() }} tugas
                    </span>
                </div>
            </div>
        </div>
        <div class="card-body p-0 pt-3">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Judul Tugas</th>
                            <th>Mata Kuliah</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($daftarTugas as $tugas)
                            <tr>
                                <td class="ps-4 fw-semibold">{{ $loop->iteration }}</td>
                                <td>{{ $tugas->judul }}</td>
                                <td>{{ $tugas->mata_kuliah }}</td>
                                <td>{{ $tugas->deadline->format('d-m-Y') }}</td>
                                <td>
                                    @if ($tugas->status === 'Selesai')
                                        <span class="badge bg-success">Selesai</span>
                                    @elseif ($tugas->status === 'Sedang Dikerjakan')
                                        <span class="badge bg-warning text-dark">Sedang Dikerjakan</span>
                                    @else
                                        <span class="badge bg-secondary">Belum Dikerjakan</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex flex-column flex-sm-row justify-content-end gap-2">
                                        <a href="{{ route('tugas.edit', $tugas->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#hapusTugasModal"
                                            data-delete-url="{{ route('tugas.destroy', $tugas->id) }}"
                                            data-tugas-judul="{{ $tugas->judul }}"
                                        >
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    Belum ada data tugas. Klik tombol <strong>Tambah Tugas</strong> untuk memulai.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hapusTugasModal" tabindex="-1" aria-labelledby="hapusTugasModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="hapusTugasModalLabel">Konfirmasi Hapus Tugas</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-2">Data tugas berikut akan dihapus secara permanen:</p>
                    <p class="fw-semibold text-dark mb-0" id="hapusTugasJudul">-</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="hapusTugasForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const hapusTugasModal = document.getElementById('hapusTugasModal');
            const hapusTugasForm = document.getElementById('hapusTugasForm');
            const hapusTugasJudul = document.getElementById('hapusTugasJudul');

            if (!hapusTugasModal || !hapusTugasForm || !hapusTugasJudul) {
                return;
            }

            hapusTugasModal.addEventListener('show.bs.modal', function (event) {
                const triggerButton = event.relatedTarget;

                if (!triggerButton) {
                    return;
                }

                const deleteUrl = triggerButton.getAttribute('data-delete-url');
                const tugasJudul = triggerButton.getAttribute('data-tugas-judul');

                hapusTugasForm.setAttribute('action', deleteUrl);
                hapusTugasJudul.textContent = tugasJudul;
            });
        });
    </script>
@endpush
