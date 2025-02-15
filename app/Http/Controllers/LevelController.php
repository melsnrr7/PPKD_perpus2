<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Level::get();
        $title = "Level";
        return view('level.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Level";
        return view('level.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Level::create([
            'nama_level' => $request->nama_level,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->to('level')->with('message', 'Data berhasil ditambah');
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
        $edit = Level::find($id);
        $title = "Edit Data " . $edit->nama_level;
        return view('level.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Level::where('id', $id)->update([
            'nama_level' => $request->nama_level,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->to('level')->with('message', 'Data berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Level::where('id', $id)->delete();
        return redirect()->to('level')->with('message', 'Data berhasil dihapus');
    }
}
