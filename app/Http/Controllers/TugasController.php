<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\JadwalPelajaran;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugas = Tugas::whereHas('jadwal', function ($q) {
            $q->where('guru_id', auth()->id());
        })->with('jadwal.mapel', 'jadwal.kelas')->get();

        return view('guru.index', compact('tugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jadwal = JadwalPelajaran::where('guru_id', auth()->id())->get();
        return view('guru.create', compact('jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'jadwal_id' => 'required|exists:jadwal_pelajaran,id',
            'tipe_tugas' => 'required|in:harian,mingguan,bulanan',
            'deadline' => 'required|date',
            'file' => 'nullable|file',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('tugas', 'public');
        }

        Tugas::create($validated);

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dibuat');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tugas $tugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tugas $tugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tugas $tugas)
    {
        //
    }
}
