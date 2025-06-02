<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('penilaian.index', compact('siswas'));
    }

    // Method ini akan dipanggil via AJAX
    public function editModal(Siswa $siswa)
    {
        $kriterias = Kriteria::all();
        $existing = $siswa->penilaians->pluck('nilai', 'kriteria_id')->toArray();

        // Mengembalikan view sebagai string HTML
        return view('penilaian.edit', compact('siswa', 'kriterias', 'existing'))->render();
    }

    public function update(Request $request, Siswa $siswa)
    {
        $kriterias = Kriteria::all();

        foreach ($kriterias as $kriteria) {
            $nilai = $request->input('nilai')[$kriteria->id] ?? null;

            Penilaian::updateOrCreate(
                ['siswa_id' => $siswa->id, 'kriteria_id' => $kriteria->id],
                ['nilai' => $nilai]
            );
        }

        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil disimpan.');
    }
}