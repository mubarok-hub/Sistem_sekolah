<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class MuridNilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::where('murid_id', auth()->id())->with('mapel')->get();
        return view('murid.nilai.index', compact('nilai'));
    }
}
