@extends('layouts.app1')
@section('content1')
<div class="card">
    <div class="card-header">{{$title}}</div>
        <div class="card-body">
            <form action="{{route('books.update', $edit->id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group mb-3">
                <label for="">Nama Buku</label>
                <input value="{{$edit->nama_buku}}" type="text" name="nama_buku" placeholder="Masukkan Buku" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Penerbit</label>
                <input value="{{$edit->penerbit}}" type="text" name="penerbit" placeholder="Masukkan Penerbit Buku" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Qty</label>
                <input value="{{$edit->qty}}" type="number" name="qty" placeholder="Masukkan Qty Buku" class="form-control">
            </div>
            {{-- <div class="form-group mb-3">
                <label for="">Deskripsi</label>
                <input value="{{$edit->deskripsi}}" type="text" name="deskripsi" placeholder="Masukkan Deskripsi Buku" class="form-control">
            </div> --}}
            <div class="form-group mb-3">
                <label for="">Deskripsi</label>
                <textarea name="deskripsi" id="" cols="30" rows="10" placeholder="Masukkan Deskripsi Buku" class="form-control">{{$edit->deskripsi}}</textarea>
            </div>
            <div class="form-group mb-3">
                <label for="">Penulis</label>
                <input value="{{$edit->penulis}}" type="text" name="penulis" placeholder="Masukkan Penulis Buku" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Genre</label>
                <input value="{{$edit->genre}}" type="text" name="genre" placeholder="Masukkan Genre Buku" class="form-control">
            </div>

                <div class="form-group mb-3">
                    <input type="submit" class="btn btn-primary" value="simpan">
                    <a href="{{url()->previous()}}" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
