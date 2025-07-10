<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JadwalPelajaran;
use App\Models\TugasMurid;

class Tugas extends Model
{
    public function jadwal()
    {
        return $this->belongsTo(JadwalPelajaran::class);
    }
    
    public function tugasMurid()
    {
        return $this->hasMany(TugasMurid::class);
    }
}
