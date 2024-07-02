<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = User::get();
        $title = "User";
        // $datas = DB::table('users')
        //     ->join('levels', 'users.id_level', '=', 'levels.id')
        //     ->select('users.*', 'levels.nama_level')
        //     ->get();
        return view('user.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::orderBy('id', 'desc')->get();
        $title = "Tambah User";
        return view('user.create', compact('title', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'usertype' => $request->usertype,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->to('user')->with('message', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = User::find($id);
        $levels = Level::get();
        $title = "Edit Data " . $edit->nama_level;
        return view('user.edit', compact('edit', 'title', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $edit = User::find($id);
        if ($request->password) {
            $password = Hash::make($request->password);
        } else {
            $password = $edit->password;
        }
        User::where('id', $id)->update([
            'usertype' => $request->usertype,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);

        return redirect()->to('user')->with('message', 'Data berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect()->to('user')->with('message', 'Data berhasil dihapus');
    }
}
