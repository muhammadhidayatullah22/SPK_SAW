<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('penilaians')->get();
        $kriterias = Kriteria::all();

        $nilai_matrix = [];

        // Siapkan nilai mentah
        foreach ($siswas as $siswa) {
            foreach ($kriterias as $kriteria) {
                $nilai = Penilaian::where('siswa_id', $siswa->id)
                                  ->where('kriteria_id', $kriteria->id)
                                  ->value('nilai');
                $nilai_matrix[$siswa->id][$kriteria->id] = $nilai ?? 0;
            }
        }

        // Hitung nilai max/min tiap kriteria
        $normal = [];
        foreach ($kriterias as $kriteria) {
            $values = array_column(array_column($nilai_matrix, $kriteria->id), 0);

            $max = max($values);
            $min = min($values);

            foreach ($siswas as $siswa) {
                $val = $nilai_matrix[$siswa->id][$kriteria->id];
                if ($kriteria->jenis == 'benefit') {
                    $normal[$siswa->id][$kriteria->id] = $max > 0 ? $val / $max : 0;
                } else {
                    $normal[$siswa->id][$kriteria->id] = $val > 0 ? $min / $val : 0;
                }
            }
        }

        // Hitung skor akhir
        $ranking = [];
        foreach ($siswas as $siswa) {
            $skor = 0;
            foreach ($kriterias as $kriteria) {
                $skor += $normal[$siswa->id][$kriteria->id] * $kriteria->bobot;
            }
            $ranking[] = [
                'siswa' => $siswa,
                'skor' => round($skor, 4)
            ];
        }

        // Urutkan skor tertinggi ke rendah
        usort($ranking, fn($a, $b) => $b['skor'] <=> $a['skor']);

        return view('hasil.index', compact('ranking'));
    }
}
