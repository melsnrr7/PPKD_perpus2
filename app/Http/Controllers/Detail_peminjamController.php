<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Books;
use Illuminate\Http\Request;
use App\Models\Detail_peminjam;
use Illuminate\Support\Facades\DB;

class Detail_peminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Detail_peminjam::with('anggota', 'books')->get();
        $title = "Detail Peminjam";
        $books = Books::orderBy('id', 'desc')->get();
        $anggotas = Anggota::orderBy('id', 'desc')->get();

        return view('detail_peminjam.index', compact('datas', 'title', 'books', 'anggotas'));
    }

    public function cetak_peminjam()
    {
        $cetak_peminjam = Detail_peminjam::with('anggota', 'books')->get();
        return view('detail_peminjam.cetak_peminjam', compact('cetak_peminjam'));
    }
    // public function index_2(string $idPeminjam)
    // {
    //     $datas = Detail_peminjam::with('anggota', 'books')
    //         ->where('id_peminjam', $idPeminjam);
    //     $title = "Detail Peminjam";
    //     $books = Books::orderBy('id', 'desc')->get();
    //     $anggotas = Anggota::orderBy('id', 'desc')->get();

    //     return view('detail_peminjam.index', compact('datas', 'title', 'books', 'anggotas'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //SELECT detail_peminjams.*, anggotas.nama_anggota, books.nama_buku FROM `detail_peminjams` join anggotas on detail_peminjams.id_peminjam = anggotas.id join books on detail_peminjams.id_buku = books.id WHERE detail_peminjams.id_peminjam = 1
        $datas = DB::table('detail_peminjams')
            ->select('detail_peminjams.*', 'anggotas.nama_anggota', 'books.nama_buku')
            ->join('anggotas', 'detail_peminjams.id_peminjam', '=', 'anggotas.id')
            ->join('books', 'detail_peminjams.id_buku', '=', 'books.id')
            ->where('detail_peminjams.id_peminjam', '=', $id)
            ->get();

        $title = "Detail Peminjam";
        $books = Books::orderBy('id', 'desc')->get(); // Menggunakan model Book (jika sudah di-import)
        $anggotas = Anggota::orderBy('id', 'desc')->get(); // Menggunakan model Anggota (jika sudah di-import)

        return view('detail_peminjam.index', compact('datas', 'title', 'books', 'anggotas'));
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
