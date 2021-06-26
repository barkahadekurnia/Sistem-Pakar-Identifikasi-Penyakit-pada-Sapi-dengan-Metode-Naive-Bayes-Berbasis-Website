<?php
require 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM saran WHERE id = '$id' ");


if (mysqli_affected_rows($koneksi) > 0) {

    $saran_berhasil_dihapus = 1;
    header("location:../lihat_saran.php?saran_berhasil_dihapus=" . $saran_berhasil_dihapus);
} else {

    header("Location:  ../lihat_saran.php?id=" . $id);
    echo mysqli_error($koneksi);
}
