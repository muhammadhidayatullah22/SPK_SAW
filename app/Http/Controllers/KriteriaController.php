<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index() {
        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('kriterias'));
    }

    public function create() {
        return view('kriteria.kriteria');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'bobot' => 'required|numeric',
            'jenis' => 'required|in:benefit,cost',
        ]);

        Kriteria::create($request->all());
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan');
    }

    public function editModal(Kriteria $kriteria) {
        return view('kriteria.modal-edit', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria) {
        $request->validate([
            'nama' => 'required',
            'bobot' => 'required|numeric',
            'jenis' => 'required|in:benefit,cost',
        ]);

        $kriteria->update($request->all());
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil diperbarui');
    }

    public function destroy(Kriteria $kriteria) {
        $kriteria->delete();
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus');
    }
}

