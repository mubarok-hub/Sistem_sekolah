<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasMuridController extends Controller
{
    public function index()
    {
        // ambil semua tugas dari kelas si murid
        $murid = auth()->user();
        $tugas = Tugas::whereHas('jadwal', function ($q) use ($murid) {
            $q->where('kelas_id', $murid->kelas_id);
        })->with('jadwal.mapel')->get();
        
        return view('murid.tugas.index', compact('tugas'));
    }

}
