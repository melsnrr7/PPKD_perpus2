<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Books;
use App\Models\Detail_peminjam;
use App\Models\Peminjams;
use Illuminate\Http\Request;

class PeminjamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Peminjams::get();
        $title = "Peminjaman";
        return view('peminjam.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datas = Peminjams::get();
        $books = Books::get();
        $title = "Tambah Peminjam";
        $anggotas = Anggota::orderBy('id', 'desc')->get();
        $no_transaksi = Peminjams::orderBy('id', 'desc')->first();
        $huruf = "TR";
        $urutan = $no_transaksi->id;
        $urutan++;

        $no_transaksi = $huruf . date("dmY") . sprintf("%03s", $urutan);

        return view('peminjam.create', compact('datas', 'books', 'title', 'anggotas', 'no_transaksi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $peminjam = Peminjams::create([
            'no_transaksi' => $request->no_transaksi,
            'id_anggota' => $request->id_anggota,
        ]);

        foreach ($request->id_buku as $key => $id_buku) {
            Detail_peminjam::create([
                'id_peminjam' => $peminjam->id,
                'id_buku' => $id_buku,
                'tanggal_pinjam' => $request->tanggal_pinjam[$key],
                'tanggal_pengembalian' => $request->tanggal_pengembalian[$key],
                'keterangan' => $request->keterangan[$key],
            ]);
        }
        return redirect()->to('peminjam')->with('message', 'Data berhasil ditambah');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
