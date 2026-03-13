<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TugasController extends Controller
{
    private const STATUS_OPTIONS = [
        'Belum Dikerjakan',
        'Sedang Dikerjakan',
        'Selesai',
    ];

    public function index(): View
    {
        $daftarTugas = Tugas::query()
            ->latest()
            ->get();

        return view('tugas.index', [
            'daftarTugas' => $daftarTugas,
        ]);
    }

    public function create(): View
    {
        return view('tugas.create', [
            'statusOptions' => self::STATUS_OPTIONS,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateTugas($request);

        Tugas::create($data);

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function edit(int $id): View
    {
        $tugas = Tugas::query()->findOrFail($id);

        return view('tugas.edit', [
            'tugas' => $tugas,
            'statusOptions' => self::STATUS_OPTIONS,
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $tugas = Tugas::query()->findOrFail($id);
        $data = $this->validateTugas($request);

        $tugas->update($data);

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Tugas berhasil diperbarui.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $tugas = Tugas::query()->findOrFail($id);

        $tugas->delete();

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Tugas berhasil dihapus.');
    }

    private function validateTugas(Request $request): array
    {
        return $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'mata_kuliah' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'deadline' => ['required', 'date'],
            'status' => ['required', 'string', Rule::in(self::STATUS_OPTIONS)],
        ]);
    }
}
