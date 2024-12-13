<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    public $title = 'Pelajaran';
    public $view = 'admin.pelajaran.';
    public $route = 'admin.pelajaran.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = $this->title;
        $data['pelajaran'] = Pelajaran::get();
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
            'name' => 'required',
        ]);

        Pelajaran::create($validate);

        return redirect()->route($this->route.'index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = $this->title;
        $data['model'] = Pelajaran::find($id);
        $data['route'] = route($this->route.'update', $id);

        return view($this->view.'.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data['title'] = $this->title;

        $pelajaran = Pelajaran::find($id);

        $validate = $request->validate([
            'name' => 'required',
        ]);

        $pelajaran->update($validate);

        return redirect()->route($this->route.'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelajaran = Pelajaran::find($id);

        $pelajaran->delete();

        return redirect()->back();
    }
}
