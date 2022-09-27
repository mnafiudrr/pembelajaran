<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $data_pengelola = User::all();
        return view('pages.pengelola.index', ['data_pengelola' => $data_pengelola]);
    }

    public function create()
    {
        return view('pages.pengelola.pengelola-create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255|min:6',
            'username' => 'required|max:20|min:6|unique:users',
            'password' => 'required|max:20|min:8'
        ]);

        $validate['password'] = Hash::make($validate['password']);
        
        User::create($validate);

        return redirect('/pengelola')->with('sukses', 'Pengelola berhasil ditambahkan');
    }

    public function delete($id)
    {
        $pengelola = User::find($id);
        $pengelola->delete();
        return redirect('/pengelola')->with('hapus', 'Pengelola berhasil dihapus');
    }
}
