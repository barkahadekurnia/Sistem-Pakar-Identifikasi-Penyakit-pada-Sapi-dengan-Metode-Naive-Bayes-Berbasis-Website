<?php
require 'koneksi.php';

if (isset($_POST['kirim_saran'])) {
    $nama = htmlentities($_POST['nama']);
    $email = htmlentities($_POST['email']);
    $saran = htmlentities($_POST['saran']);

    //7jam=25200detik
    $sql = "INSERT INTO saran VALUES ('','$nama','$email','$saran',NOW())";
    mysqli_query($koneksi, $sql);
}

$cekberhasil = mysqli_affected_rows($koneksi);
$notifsaran = 1;

if ($cekberhasil > 0) {
    header("location:../saran.php?notifsaran=" . $notifsaran);
} else {
    echo " Ada yang salah bro ! ";

    echo " ";
    echo mysqli_error($koneksi);
}
