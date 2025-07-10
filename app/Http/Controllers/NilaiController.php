<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\TugasMurid;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $tugas = Tugas::with(['tugasMurid.murid'])
            ->whereHas('jadwal', fn($q) => $q->where('guru_id', auth()->id()))
            ->get();

        return view('guru.nilai.index', compact('tugas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'murid_id' => 'required|exists:users,id',
            'mapel_id' => 'required',
            'nilai' => 'required|numeric|min:0|max:100',
            'kategori' => 'required',
        ]);

        Nilai::create($request->all());

        return back()->with('success', 'Nilai berhasil disimpan');
    }
}
