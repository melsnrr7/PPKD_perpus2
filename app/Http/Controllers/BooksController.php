<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Books::get();
        $title = "Buku";
        return view('books.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Buku";
        return view('books.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Books::create([
            'nama_buku' => $request->nama_buku,
            'penerbit' => $request->penerbit,
            'qty' => $request->qty,
            'deskripsi' => $request->deskripsi,
            'penulis' => $request->penulis,
            'genre' => $request->genre,
        ]);

        return redirect()->to('books')->with('message', 'Data berhasil ditambah');
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
        $edit = Books::find($id);
        $title = "Edit Data " . $edit->nama_buku;
        return view('books.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Books::where('id', $id)->update([
            'nama_buku' => $request->nama_buku,
            'penerbit' => $request->penerbit,
            'qty' => $request->qty,
            'deskripsi' => $request->deskripsi,
            'penulis' => $request->penulis,
            'genre' => $request->genre,
        ]);

        return redirect()->to('books')->with('message', 'Data berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Books::where('id', $id)->delete();
        return redirect()->to('books')->with('message', 'Data berhasil dihapus');
    }
}
