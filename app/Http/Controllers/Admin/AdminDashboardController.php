<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Tugas;
use App\Models\Nilai;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'jumlahGuru' => User::where('role', 'guru')->count(),
            'jumlahMurid' => User::where('role', 'murid')->count(),
            'jumlahWali' => User::where('role', 'wali')->count(),
            'jumlahKelas' => Kelas::count(),
            'jumlahMapel' => Mapel::count(),
            'jumlahTugas' => Tugas::count(),
            'jumlahNilai' => Nilai::count(),
        ]);
    }
}
