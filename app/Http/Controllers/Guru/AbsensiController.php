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
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = $this->title;
        $data['kelas'] = Kelas::get();
        $data['route'] = route($this->route.'create');

        return view($this->view.'index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = $this->title;
        $data['siswa'] = Siswa::get();
        $data['pelajaran'] = Pelajaran::get();
        $data['route'] = route($this->route.'store');

        return view($this->view.'.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['title'] = $this->title;

        $validate = $request->validate([
            'id_siswa.*' => 'required|exists:siswa,id',
            'desc.*' => 'nullable',
            'id_pelajaran.*' => 'required|exists:pelajaran,id',
            'status.*' => 'required|in:hadir,alpa,izin,sakit',
        ]);

        $validate['date'] = Carbon::now();

        foreach ($request->id_siswa as $key => $value) {
            Absensi::create([
                'id_siswa' => $value,
                'id_pelajaran' => $request->id_pelajaran[$key],
                'date' => $validate['date'],
                'status' => $request->status[$key],
            ]);
        }

        Jadwal::where('id_pelajaran', $request->id_pelajaran[0])->update([
            'status' => 'selesai'
        ]);

        return redirect()->back();
    }

    public function show(string $id) {
        $data['title'] = $this->title;
        $data['absensi'] = Absensi::find($id);

        return view($this->view.'show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = $this->title;
        $data['siswa'] = Siswa::get();
        $data['pelajaran'] = Pelajaran::get();
        $data['model'] = Absensi::find($id);
        $data['route'] = route($this->route.'update', $id);

        return view($this->view.'.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data['title'] = $this->title;

        $absensi = Absensi::find($id);

        $validate = $request->validate([
            'id_pelajaran' => 'required|exists:pelajaran,id',
            'status' => 'required|in:hadir,alpa,izin,sakit',
            'desc' => 'nullable',
        ]);

        $absensi->update($validate);

        return redirect()->route($this->route.'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $absensi = Absensi::find($id);

        $absensi->delete();

        return redirect()->back();
    }
}
