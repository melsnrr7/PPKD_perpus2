@extends('layouts.app1')
@section('content1')
<div class="card">
    <div class="card-header">{{$title}}</div>
        <div class="card-body">
            <div class="table-responsive">
                <div align="right" class="mb-3">
                    <a href="{{route('peminjam.create')}}" class="btn btn-primary">Tambah Data</a>
                </div>
            <table class="table table-border">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Transaksi</th>
                        <th>Nama Anggota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach ($datas as $data )

                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->no_transaksi}}</td>
                        <td>{{$data->nama_anggota}}</td>
                        <td>
                            {{-- detail print delete --}}
                            <a href="#" class="btn btn-success btn-sm">Detail</a>
                            <a href="#" class="btn btn-primary btn-sm">Print</a>

                            <form method="POST" action="{{route('peminjam.destroy', $data->id)}}" class="d-inline">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
</div>
@endsection
