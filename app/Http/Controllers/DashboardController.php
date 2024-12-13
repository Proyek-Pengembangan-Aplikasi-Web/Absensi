<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $data['siswa'] = Siswa::count();
        $data['kelas'] = Kelas::count();
        $data['guru'] = User::where('role', 'guru')->count();
        $data['jadwal'] = Jadwal::where('id_user', Auth::user()->id)->count();

        return view('dashboard', $data);
    }
}
