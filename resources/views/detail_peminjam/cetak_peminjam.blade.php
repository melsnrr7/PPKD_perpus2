<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data</title>
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Detail Peminjaman Buku</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <td>No</td>
                <th>Nama Anggota</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Pengembalian</th>
                <th>Keterangan</th>
            </tr>
            @foreach ($cetak_peminjam as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->anggota->nama_anggota}}</td>
                    <td>{{$item->books->nama_buku}}</td>
                    <td>{{$item->tanggal_pinjam}}</td>
                    <td>{{$item->tanggal_pengembalian}}</td>
                    <td>{{$item->keterangan}}</td>
                </tr>
            @endforeach

        </table>
    </div>
</body>
</html>
