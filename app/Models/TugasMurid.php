<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tugas;
use App\Models\User;

class TugasMurid extends Model
{
    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
    
    public function murid()
    {
        return $this->belongsTo(User::class, 'murid_id');
    }
}

