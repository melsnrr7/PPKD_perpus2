@extends('layouts.app1')
@section('content1')

<div class="card">
    <div class="card-header">{{$title}}</div>
    <div class="card-body">
        <form action="{{route('peminjam.store')}}" method="POST">
            @csrf
            <div class="mb-3 row">
                <div class="col-sm-3">
                    <label for="id_anggota" class="form-label">Nama Anggota</label>
                    <div class="input-group">
                        <select name="id_anggota" id="id_anggota" class="form-control">
                            @foreach ($anggotas as $anggota)
                                <option value="{{$anggota->id}}">{{$anggota->nama_anggota}}</option>
                            @endforeach
                        </select>
                        <a href="{{route('anggota.create')}}" class="btn btn-primary">Tambah Anggota</a>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-3">
                    <label for="no_transaksi" class="form-label">No Transaksi</label>
                    <input type="text" readonly name="no_transaksi" id="no_transaksi" value="{{$no_transaksi}}" class="form-control">
                </div>
            </div>

            <br>
            <br>
            <table class="transaction table table-bordered">
                <div align="right" class="mb-3">
                    <button type="button" class="btn btn-primary btn-add">Add</button>
                </div>
                <thead>
                    <th>Nama Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach ($datas as $data )
                        <tr>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="form-group mb-3">
                <input type="submit" class="btn btn-primary" value="simpan">
                <a href="{{url()->previous()}}" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
