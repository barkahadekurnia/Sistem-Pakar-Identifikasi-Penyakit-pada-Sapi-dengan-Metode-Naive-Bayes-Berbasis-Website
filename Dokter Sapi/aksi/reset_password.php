<?php
require_once 'koneksi.php';
$id = $_GET['id'];

$querycari     = mysqli_query($koneksi, "SELECT*FROM pengguna WHERE id = '$id'");
$hasil_cari    = mysqli_fetch_assoc($querycari);
$nama_pengguna = $hasil_cari['username']; //ambil data nama pengguna
$password_reset = password_hash($password, PASSWORD_DEFAULT); //bikin enkripsi hash

$queryreset    = mysqli_query($koneksi, "UPDATE pengguna set password='$password_reset' where id='$id'");
if ($queryreset) {

    header("location:../lihat_pengguna");
} else {
    echo "ada yang salah bro!";
}
