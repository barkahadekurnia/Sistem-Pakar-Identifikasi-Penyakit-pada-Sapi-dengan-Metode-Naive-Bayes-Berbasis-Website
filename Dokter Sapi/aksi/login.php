<?php
session_start();
require 'koneksi.php';

if (isset($_POST["masuk"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    //cari username
    $result = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username = '$username'");

    //  cari username yang ada di database .. kalo ada lanjuut
    if (mysqli_num_rows($result) === 1) {
        $data = mysqli_fetch_assoc($result);
        //cek apakah password sama dgn yg di hash
        $hash = $data["password"];
        if (password_verify($password, $hash)) {
            //set session
            // echo "asa";
            
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['level'] = $data['kode_level'];
            $_SESSION['foto'] = $data['foto'];

            //redirect
            header("Location: ../dashboard.php");
            exit;
        } else {
            //ini eror! 
            $pakar_berhasil_login = 2;
            header("location:../login.php?pakar_berhasil_login=" . $pakar_berhasil_login);
            // echo "
            // <script>
            // alert('Nama Pengguna atau Kata Sandi Salah!')
            // document.location.href='../login.php';
            // </script>
            // ";
        }
    }
    $pakar_berhasil_login = 2;
    header("location:../login.php?pakar_berhasil_login=" . $pakar_berhasil_login);
}
// var_dump($data);
// var_dump($_SESSION);
// echo mysqli_error($koneksi);
