<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public $title = 'Kelas';
    public $view = 'admin.kelas.';
    public $route = 'admin.kelas.';

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
            'kelas' => 'required',
        ]);

        Kelas::create($validate);

        return redirect()->route($this->route.'index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = $this->title;
        $data['model'] = Kelas::find($id);
        $data['route'] = route($this->route.'update', $id);

        return view($this->view.'.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data['title'] = $this->title;

        $kelas = Kelas::find($id);

        $validate = $request->validate([
            'kelas' => 'required',
        ]);

        $kelas->update($validate);

        return redirect()->route($this->route.'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::find($id);

        $kelas->delete();

        return redirect()->back();
    }
}
