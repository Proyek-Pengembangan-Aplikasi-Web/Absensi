<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $fillable = [
        'id_siswa',
        'id_jadwal',
        'date',
        'status',
        'desc'
    ];

    public function siswa(){
        return $this->hasOne(Siswa::class, 'id', 'id_siswa');
    }

    public function jadwal(){
        return $this->belongsTo(Jadwal::class, 'id', 'id_jadwal');
    }
}
