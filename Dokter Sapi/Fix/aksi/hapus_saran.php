<?php
require 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM saran WHERE id = '$id' ");


if (mysqli_affected_rows($koneksi) > 0) {
    echo " 
    <script>
    alert('Data Berhasil Dihapus');
    document.location.href = '../lihat_saran.php';
    </script>
    ";
} else {

    header("Location:  ../lihat_saran.php?id=" . $id);
    echo mysqli_error($koneksi);
}
