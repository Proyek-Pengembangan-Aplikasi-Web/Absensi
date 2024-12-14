<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public $title = 'Jadwal';
    public $view = 'admin.jadwal.';
    public $route = 'admin.jadwal.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = $this->title;
        $data['jadwal'] = Jadwal::get();
        $data['route'] = route($this->route.'create');

        return view($this->view.'index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = $this->title;
        $data['route'] = route($this->route.'store');
        $data['pelajaran'] = Pelajaran::get();
        $data['guru'] = User::where('role', 'guru')->get();
        $data['kelas'] = Kelas::get();

        return view($this->view.'.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['title'] = $this->title;

        $validate = $request->validate([
            'id_pelajaran' => 'required',
            'id_user' => 'required',
            'id_kelas' => 'required',
            'date' => 'required',
        ]);

        Jadwal::create($validate);

        return redirect()->route($this->route.'index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = $this->title;
        $data['model'] = Jadwal::find($id);
        $data['pelajaran'] = Pelajaran::get();
        $data['guru'] = User::where('role', 'guru')->get();
        $data['route'] = route($this->route.'update', $id);
        $data['kelas'] = Kelas::get();

        return view($this->view.'.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data['title'] = $this->title;

        $jadwal = Jadwal::find($id);

        $validate = $request->validate([
            'id_pelajaran' => 'required',
            'id_kelas' => 'required',
            'date' => 'required',
        ]);

        $jadwal->update($validate);

        return redirect()->route($this->route.'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::find($id);

        $jadwal->delete();

        return redirect()->back();
    }
}
