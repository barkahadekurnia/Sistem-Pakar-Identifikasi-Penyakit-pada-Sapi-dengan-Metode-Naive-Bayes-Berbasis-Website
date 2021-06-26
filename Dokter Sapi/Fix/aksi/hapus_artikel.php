<?php
require 'koneksi.php';

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
    $artikel_berhasil_ditambah = 1;
    header("location:../saran.php?artikel_berhasil_ditambah=" . $artikel_berhasil_ditambah);
} else {
    echo " Ada yang salah bro ! ";

    echo " ";
    echo mysqli_error($koneksi);
}

//orjust do simple
// $id = $_GET["id"];

// mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = '$id' ");
