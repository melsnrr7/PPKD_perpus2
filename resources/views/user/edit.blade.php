@extends('layouts.app1')
@section('content1')
<div class="card">
    <div class="card-header">{{$title}}</div>
        <div class="card-body">
            <form action="{{route('user.update', $edit->id)}}" method="POST">
            @csrf
            @method("PUT")
                <div class="form-group mb-3">
                    <label for="">Level</label>
                    <select name="id_level" class="form-control">
                        <option value="">Pilih Level</option>
                        @foreach ($levels as $level)
                            <option value="{{$level->id}}">{{$level->nama_level}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">Nama</label>
                    <input value="{{$edit->name}}" type="text" name="name" placeholder="Masukkan Nama Anda" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input value="{{$edit->email}}" type="email" name="email" placeholder="Masukkan Email Anda" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Masukkan Password Anda" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <input type="submit" class="btn btn-primary" value="simpan">
                    <a href="{{url()->previous()}}" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
