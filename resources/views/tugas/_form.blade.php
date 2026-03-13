@php
    $selectedStatus = old('status', $tugas->status ?? '');
    $selectedDeadline = old('deadline', isset($tugas) ? optional($tugas->deadline)->format('Y-m-d') : '');
@endphp

<div class="row g-4">
    <div class="col-md-6">
    <label for="judul" class="form-label">Judul Tugas</label>
    <input
        type="text"
        class="form-control @error('judul') is-invalid @enderror"
        id="judul"
        name="judul"
        value="{{ old('judul', $tugas->judul ?? '') }}"
        required
    >
    @error('judul')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="col-md-6">
    <label for="mata_kuliah" class="form-label">Mata Kuliah</label>
    <input
        type="text"
        class="form-control @error('mata_kuliah') is-invalid @enderror"
        id="mata_kuliah"
        name="mata_kuliah"
        value="{{ old('mata_kuliah', $tugas->mata_kuliah ?? '') }}"
        required
    >
    @error('mata_kuliah')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="col-12">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea
        class="form-control @error('deskripsi') is-invalid @enderror"
        id="deskripsi"
        name="deskripsi"
        rows="4"
        required
    >{{ old('deskripsi', $tugas->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="col-md-6">
    <label for="deadline" class="form-label">Deadline</label>
    <input
        type="date"
        class="form-control @error('deadline') is-invalid @enderror"
        id="deadline"
        name="deadline"
        value="{{ $selectedDeadline }}"
        required
    >
    @error('deadline')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="col-md-6">
    <label for="status" class="form-label">Status</label>
    <select
        class="form-select @error('status') is-invalid @enderror"
        id="status"
        name="status"
        required
    >
        <option value="">Pilih status</option>
        @foreach ($statusOptions as $status)
            <option value="{{ $status }}" @selected($selectedStatus === $status)>{{ $status }}</option>
        @endforeach
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
</div>

<div class="d-flex flex-column flex-sm-row gap-2 mt-4">
    <button type="submit" class="btn btn-primary px-4">{{ $submitLabel }}</button>
    <a href="{{ route('tugas.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>
