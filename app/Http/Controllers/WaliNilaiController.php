<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\WaliMurid;
use Illuminate\Http\Request;

class WaliNilaiController extends Controller
{
    public function index()
    {
        $muridId = WaliMurid::where('wali_id', auth()->id())->value('murid_id');
        $nilai = Nilai::where('murid_id', $muridId)->with('mapel')->get();

        return view('wali.nilai.index', compact('nilai'));
    }
}
