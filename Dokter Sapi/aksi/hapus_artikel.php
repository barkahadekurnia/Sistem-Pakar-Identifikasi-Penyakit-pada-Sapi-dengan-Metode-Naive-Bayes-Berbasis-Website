<?php
require 'koneksi.php';

session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

$id = $_GET["id"];

function hapus($id)
{

    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM artikel WHERE id = '$id' ");

    return mysqli_affected_rows($koneksi);
}

//fungsi ga bakal jalan kalo ga dipanggil

// hapus($id);

if (hapus($id) > 0) {
    // $cekberhasil = mysqli_affected_rows($koneksi);
    $artikel_berhasil_dihapus = 1;
    header("location:../lihat_artikel.php?artikel_berhasil_dihapus=" . $artikel_berhasil_dihapus);
} else {
    echo " Ada yang salah cuk ! ";
    header("location:../lihat_artikel.php");
    echo " ";
    echo mysqli_error($koneksi);
}

//orjust do simple
// $id = $_GET["id"];

// mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = '$id' ");
