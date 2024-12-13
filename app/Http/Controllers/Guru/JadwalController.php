<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public $title = 'Jadwal';
    public $view = 'guru.jadwal.';
    public $route = 'guru.jadwal.';

    public function show($id)
    {
        $data['title'] = $this->title;
        $data['jadwal'] = Jadwal::find($id);

        return view($this->view.'show', $data);
    }
}
