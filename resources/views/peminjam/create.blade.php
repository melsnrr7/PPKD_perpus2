@extends('layouts.app1')
@section('content1')

<div class="card">
    <div class="card-header">{{$title}}</div>
    <div class="card-body">
        <form action="" method="POST">
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
            <table class="transaction table table-border">
                <div align="right" class="mb-3">
                    <a href="" class="btn btn-primary btn-add">Add</a>
                </div>
                <thead>
                    <th>No</th>
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
                        <td>{{$no++}}</td>
                        <td>
                            <select name="id_buku" id="id_buku" class="form-control">
                                @foreach ($books as $buku)
                                    <option value="{{$buku->id}}">{{$buku->nama_buku}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="date" name="tanggal_pinjam" class="form-control">
                        </td>
                        <td>
                            <input type="date" name="tanggal_pengembalian" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="keterangan" class="form-control">
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
</div>
@endsection
