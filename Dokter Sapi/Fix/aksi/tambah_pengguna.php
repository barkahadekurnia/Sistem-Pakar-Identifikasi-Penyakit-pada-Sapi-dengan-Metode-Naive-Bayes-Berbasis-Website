<?php
require 'koneksi.php';

//cek apakah submit dah di teken? 
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        // var_dump($_POST);
        // var_dump($_FILES);

        echo "
                <script>
                    alert('data berhasil ditambahkan');
                    document.location.href = '../lihat_pengguna.php';
                </script>

            ";
    } else {
        echo "
        <script>
        alert('data gagal ditambahkan');
        document.location.href = '../tambah_pengguna.php';
        </script>
        ";

        echo "<br>";
        echo mysqli_error($koneksi);
    }
}



function tambah($data)
{
    //biar bisa ambil data di $koneksi
    global $koneksi;

    $username = $data["username"];
    $password = $data["password"];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $email = $data["email"];
    $no_hp = $data["no_hp"];
    $level = $data["level"];

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script> alert('konfirmasi password tidak sesuai')
        </script> ";
        return false;
    }

    //cek username dah ada atau belum?
    $result = mysqli_query($koneksi, "SELECT username FROM pengguna WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo " <script> alert('Username $username;  sudah terdaftar, Silahkan gunakan Username yang lain')
        </script> ";
        return false;
    }

    //upload foto
    $foto = upload();
    if (!$foto) {
        //kalo ketemu return false .. bawahnya ga di jalanin 
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO pengguna 
                    VALUES
                 ('','$username','$password','$nama','$alamat','$email','$no_hp','$foto','$level')
                 ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];
    //cek $_FILES pke var_dump
    //cek apakah tdk ada foto di uplod
    if ($error === 4) {
        echo "<script>
                alert('pilih foto terlebih dahulu');
                </script> 
                    ";
        return false;
    }

    //cek apakah yg diupload adalah foto
    $ekstensifotoValid = ['jpg', 'jpeg', 'png'];
    //misahin ekstensi dan nama file
    $ekstensifoto = explode('.', $namaFile);
    $ekstensifoto = strtolower(end($ekstensifoto));
    //strtolower = buat ubah karakter ke kecil > paksa
    if (!in_array($ekstensifoto, $ekstensifotoValid)) {
        echo "<script> 
        alert ('yg anda upload bukan foto'); 
        </script>";
        return false;
    }

    //cek jika ukurannya trlalu besar >1mb
    if ($ukuranFile > 1000000) {
        echo "<script> 
        alert ('ukuran foto anda terlalu besar'); 
        </script>";
        return false;
    }

    //kalo lolos pengecekan diatas > foto siap diupload
    // bikin nama foto baru > nama random di DB
    // .= itu buat gabungin 2 inisiasi
    //ambil data time
    // $namaFileBaru = round(microtime(true));
    date_default_timezone_set('Asia/Jakarta');
    $namaFileBaru = date('d-m-Y-h-i-s');
    //uniqid fungsi inisiasi nama random
    // $namaFileBaru =  uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensifoto;


    move_uploaded_file($tmpName, '../images/pengguna/' . $namaFileBaru);

    return $namaFileBaru;
}
