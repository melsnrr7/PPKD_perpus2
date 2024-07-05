@extends('layouts.app1')
@section('content1')
<div class="card">
    <div class="card-header">{{$title}}</div>
    <div class="card-body">
        <div class="table-responsive">
            <div align="right" class="mb-3">
                <a href="{{route('cetak_peminjam')}}" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Print</a>
                    {{-- <a href="{{route('peminjam.create')}}" class="btn btn-primary">Tambah Data</a> --}}
                </div>
            <table class="table table-border">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Keterangan</th>

                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach ($datas as $data )
                    {{-- @dd($datas) --}}
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->nama_anggota}}</td>
                        <td>{{$data->nama_buku}}</td>
                        <td>{{$data->tanggal_pinjam}}</td>
                        <td>{{$data->tanggal_pengembalian}}</td>
                        <td>{{$data->keterangan}}</td>
                        {{-- <td>
                            {{-- detail print delete --}}
                            {{-- <a href="#" class="btn btn-primary btn-sm">Print</a> --}}

                            {{-- <form method="POST" action="{{route('peminjam.destroy', $data->id)}}" class="d-inline">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                            </form>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
</div>

@endsection
