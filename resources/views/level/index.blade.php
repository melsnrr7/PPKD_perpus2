@extends('layouts.app1')
@section('content1')
<div class="card">
    <div class="card-header"></div>
        <div class="card-body">
            <div class="table-responsive">
                <div align="right" class="mb-3">
                <a href="{{route('level.create')}}" class="btn btn-primary">Tambah Data</a>
            </div>
            <table class="table table-border">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Level</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach ($datas as $data )

                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{ $data->nama_level}}</td>
                        <td>{{$data->keterangan}}</td>
                        <td>
                            <a href="{{route('level.edit', $data->id)}}" class="btn btn-success btn-sm">Edit</a>

                            <form method="POST" action="{{route('level.destroy', $data->id)}}" class="d-inline">
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
