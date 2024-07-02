@extends('layouts.app1')
@section('content1')
<div class="card">
    <div class="card-header">{{$title}}</div>
        <div class="card-body">
            <form action="{{route('anggota.update', $edit->id)}}" method="POST">
            @csrf
            @method("PUT")
                <div class="form-group mb-3">
                    <label for="">Nama</label>
                    <input value="{{$edit->nama_anggota}}" type="text" name="nama_anggota" placeholder="Masukkan Nama Anda" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input value="{{$edit->email}}" type="email" name="email" placeholder="Masukkan Email Anda" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">No Tlp</label>
                    <input value="{{$edit->no_tlp}}" type="text" name="no_tlp" placeholder="Masukkan No Tlp Anda" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <input type="submit" class="btn btn-primary" value="simpan">
                    <a href="{{url()->previous()}}" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
