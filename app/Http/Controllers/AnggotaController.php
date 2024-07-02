<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Anggota::get();
        $title = "Anggota";
        return view('anggota.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Anggota";
        return view('anggota.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Anggota::create([
            'nama_anggota' => $request->nama_anggota,
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
        ]);

        return redirect()->to('anggota')->with('message', 'Data berhasil ditambah');
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
        $edit = Anggota::find($id);
        $title = "Edit Data " . $edit->nama_anggota;
        return view('anggota.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Anggota::where('id', $id)->update([
            'nama_anggota' => $request->nama_anggota,
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
        ]);

        return redirect()->to('anggota')->with('message', 'Data berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Anggota::where('id', $id)->delete();
        return redirect()->to('anggota')->with('message', 'Data berhasil dihapus');
    }
}
