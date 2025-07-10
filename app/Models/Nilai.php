<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
     protected $table = 'nilai'; 

    protected $fillable = [
        'user_id',
        'mapel_id',
        'tugas_id',
        'nilai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
}
