<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
        'name', 'nis', 'id_kelas'
    ];

    // public setAttribute

    public function kelas(){
        return $this->hasOne(Kelas::class, 'id', 'id_kelas');
    }

    public function absensi(){
        return $this->hasOne(Absensi::class, 'id_siswa');
    }
}
