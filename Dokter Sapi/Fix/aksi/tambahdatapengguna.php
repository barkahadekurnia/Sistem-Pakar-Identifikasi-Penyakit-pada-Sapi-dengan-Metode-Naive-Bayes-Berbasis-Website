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
                    document.location.href = 'index.php';
                </script>

            ";
    } else {
        echo "
        <script>
        alert('data gagal ditambahkan');
        document.location.href = 'index.php';
        </script>
        ";

        echo "<br>";
        echo mysqli_error($koneksi);
    }
}

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    //biar bisa ambil data di $koneksi
    global $koneksi;

    $nama = $data["nama"];
    $nim = $data["nim"];
    $jurusan = $data["jurusan"];

    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        //kalo ketemu return false .. bawahnya ga di jalanin 
        return false;
    }

    $query = "INSERT INTO mahasiswa 
                    VALUES
                 ('','$nama','$nim','$jurusan','$gambar')
                 ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tdk ada gambar di uplod
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
                </script> 
                    ";
        return false;
    }

    //cek apakah yg diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    //misahin ekstensi dan nama file
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    //strtolower = buat ubah karakter ke kecil > paksa
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> 
        alert ('yg anda aplod bukn gambar'); 
        </script>";
        return false;
    }

    //cek jika ukurannya trlalu besar >1mb
    if ($ukuranFile > 1000000) {
        echo "<script> 
        alert ('ukuran gambar anda trlalu besar'); 
        </script>";
        return false;
    }

    //kalo lolos pengecekan diatas > gambar siap diupload
    // bikin nama gambar baru > nama random di DB
    // .= itu buat gabungin 2 inisiasi
    $namaFileBaru =  uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

    return $namaFileBaru;
}


function ubah($data)
{
    //biar bisa ambil data di $koneksi
    global $koneksi;



    $id = $data["id"];
    $nama = $data["nama"];
    $nim = $data["nim"];
    $jurusan = $data["jurusan"];
    $gambarLama = $data["gambarLama"];

    //cek apakah user piih gbr
    // === 4 artinya ga uplod
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    $query = "UPDATE mahasiswa 
                    SET
                 nama = '$nama',
                 nim = '$nim',
                 jurusan = '$jurusan',
                 gambar = '$gambar' 
                 WHERE id = $id
                 ";


    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function registrasi($data)
{
    global $koneksi;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "konfirmasi password tdk sesuai";
        return false;
    }

    //cek username dah ada atau belum?
    $result = mysqli_query($koneksi, "SELECT username FROM pengguna WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo " <script> alert('username sudah terdaftar')
        </script> ";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    // $password = md5($password);

    // var_dump($password);
    // die;

    $query = "INSERT INTO pengguna VALUES 
            ('','$username','$password')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
