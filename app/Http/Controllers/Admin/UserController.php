<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public $title = 'User';
    public $view = 'admin.user.';
    public $route = 'admin.users.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = $this->title;
        $data['user'] = User::get();
        $data['route'] = route($this->route.'create');

        return view($this->view.'index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = $this->title;
        $data['guru'] = User::where('role', 'guru')->get();
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
            'username' => 'required',
            'role' => 'required|in:admin,guru',
            'email' => 'required|unique:users,email',
        ]);

        $validate['password'] = Hash::make('12345678');

        User::create($validate);

        return redirect()->route($this->route.'index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = $this->title;
        $data['guru'] = User::where('role', 'guru')->get();
        $data['model'] = User::find($id);
        $data['route'] = route($this->route.'update', $id);

        return view($this->view.'.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data['title'] = $this->title;

        $user = User::find($id);

        $validate = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required|in:admin,guru',
            'email' => 'required',
        ]);

        $validate['password'] = Hash::make('12345678');

        $user->update($validate);

        return redirect()->route($this->route.'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->back();
    }
}
