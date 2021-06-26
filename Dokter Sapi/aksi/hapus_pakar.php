<?php
require 'koneksi.php';

$id = $_GET["id"];

//cari dlu cuy pakarnya
$sql_pakar = mysqli_query($koneksi, "SELECT * FROM pengguna where id=$id");
$data_pakar = mysqli_fetch_assoc($sql_pakar);
//kalo dia admin kaga bisa hapus admin..     
if ($data_pakar["kode_level"] === "Administrator") {
    $pakar_berhasil_dihapus = 2;
    header("location:../lihat_pakar.php?pakar_berhasil_dihapus=" . $pakar_berhasil_dihapus);
} else {

    mysqli_query($koneksi, "DELETE FROM pengguna WHERE id = '$id' ");

    if (mysqli_affected_rows($koneksi) > 0) {

        $pakar_berhasil_dihapus = 1;
        header("location:../lihat_pakar.php?pakar_berhasil_dihapus=" . $pakar_berhasil_dihapus);
    } else {
        echo  "
    <script>
    alert('data gagal dihapus');
    document.location.href = '../lihat_pakar.php';
    </script>
    ";
    }
}

//orjust do simple
    // $id = $_GET["id"];

    // mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = '$id' ");