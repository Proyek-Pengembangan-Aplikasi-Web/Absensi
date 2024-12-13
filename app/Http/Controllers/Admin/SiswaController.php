<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public $title = 'Siswa';
    public $view = 'admin.siswa.';
    public $route = 'admin.siswa.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = $this->title;
        $data['siswa'] = Siswa::get();
        $data['route'] = route($this->route.'create');

        return view($this->view.'index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = $this->title;
        $data['kelas'] = Kelas::get();
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
            'name' => 'required',
            'nis' => 'required|numeric',
            'id_kelas' => 'required|exists:kelas,id',
        ]);

        Siswa::create($validate);

        return redirect()->route($this->route.'index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = $this->title;
        $data['kelas'] = Kelas::get();
        $data['model'] = Siswa::find($id);
        $data['route'] = route($this->route.'update', $id);

        return view($this->view.'.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data['title'] = $this->title;

        $siswa = Siswa::find($id);

        $validate = $request->validate([
            'name' => 'required',
            'nis' => 'required|numeric',
            'id_kelas' => 'required|exists:kelas,id',
        ]);

        $siswa->update($validate);

        return redirect()->route($this->route.'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::find($id);

        $siswa->delete();

        return redirect()->back();
    }
}
