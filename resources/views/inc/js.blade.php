<?php
use App\Models\Books;
$books = Books::get();
?>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('assets/admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('assets/admin/js/sb-admin-2.min.js')}}"></script>

<script>
    $('.btn-add').click(function() {
        let tbody = $('tbody');
        let newTr = "<tr>";
        newTr += "<td>";
        newTr += "<select name='id_buku[]' class='form-control'>";
        newTr += "<option value='' disable hidden required>Choose a book</option>";
        @foreach ($books as $buku)
            newTr += "<option value={{ $buku->id }}>{{ $buku->nama_buku }}</option>";
        @endforeach
        newTr += "</select>";
        newTr += "</td>";
        newTr += "<td><input type='date' name='tanggal_pinjam[]' class='form-control' required></td>";
        newTr += "<td><input type='date' name='tanggal_pengembalian[]' class='form-control' required></td>";
        newTr += "<td><input type='text' name='keterangan[]' class='form-control' required></td>";
        newTr += "<td>Hapus</td>";
        newTr += "</tr>";
        tbody.append(newTr);
    });
</script>
