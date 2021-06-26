<?php
require 'koneksi.php';

$id = $_GET["id"];

function hapus($id)
{

    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM gejala WHERE id = '$id' ");

    return mysqli_affected_rows($koneksi);
}

//fungsi ga bakal jalan kalo ga dipanggil

// hapus($id);

if (hapus($id) > 0) {

    $gejala_berhasil_dihapus = 1;
    header("location:../lihat_gejala.php?gejala_berhasil_dihapus=" . $gejala_berhasil_dihapus);
} else {
    echo  "
    <script>
    alert('data gagal dihapus');
    document.location.href = '../lihat_gejala.php';
    </script>
    ";
}

//orjust do simple
// $id = $_GET["id"];

// mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = '$id' ");
