<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public $title = 'Absensi';
    public $view = 'guru.absensi.';
    public $route = 'guru.absensi.';

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['title'] = $this->title;

        $validate = $request->validate([
            'id_siswa.*' => 'required|exists:siswa,id',
            'desc.*' => 'nullable',
            'id_jadwal' => 'required|exists:jadwals,id',
            'status.*' => 'required|in:hadir,alpa,izin,sakit',
        ]);

        $validate['date'] = Carbon::now();

        foreach ($request->id_siswa as $key => $value) {
            Absensi::create([
                'id_siswa' => $value,
                'id_jadwal' => $request->id_jadwal,
                'date' => $validate['date'],
                'status' => $request->status[$key],
            ]);
        }

        Jadwal::whereId($request->id_jadwal)->update([
            'status' => 'selesai'
        ]);

        return redirect()->back();
    }
}
