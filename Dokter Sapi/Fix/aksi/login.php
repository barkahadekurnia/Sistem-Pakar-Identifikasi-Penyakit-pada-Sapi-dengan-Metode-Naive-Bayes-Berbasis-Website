<?php
require 'koneksi.php';


if (isset($_POST["masuk"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username = '$username'");

    //cek username ada kaga di db
    if (mysqli_num_rows($result) === 1) {
        $data = mysqli_fetch_assoc($result);
        //cek apakah password sama dgn yg di hash
        if (password_verify($password, $data["password"])) {
            //set session
            $_SESSION["masuk"] = true;

            $_SESSION['username'] = $data['username'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['level'] = $data['level'];
            $_SESSION['foto'] = $data['foto'];

            //redirect
            header("Location: ../dashboard.php");
            exit;
        }
    }

    //ini eror! 

    echo "password/username SALAH";
    header("location:../login.php");

    echo mysqli_error($koneksi);

    $error = true;
}
