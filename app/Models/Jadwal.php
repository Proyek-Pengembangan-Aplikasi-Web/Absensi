<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwals';
    protected $fillable = [
        'id_pelajaran',
        'id_user', // guru
        'id_kelas',
        'status',
        'date',
    ];

    public function pelajaran() {
        return $this->belongsTo(Pelajaran::class, 'id_pelajaran');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
