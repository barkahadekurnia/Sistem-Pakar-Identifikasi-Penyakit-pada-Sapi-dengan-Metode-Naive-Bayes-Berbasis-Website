<?php
require 'koneksi.php';



// var_dump($data["nama"]);
//cek apakah submit dah di teken? 
if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = '../lihat_pengguna.php';
            </script>
        ";
    } else {
        // echo "
        // <script>
        // alert('data gagal ubah');
        // document.location.href = 'index.php';
        // </script>
        // ";

        echo "<br>";
        echo mysqli_error($koneksi);
    }
}



function ubah($data)
{
    //biar bisa ambil data di $koneksi
    global $koneksi;



    $id = $data["id"];
    $username = $data["username"];
    $password = $data["password"];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $email = $data["email"];
    $level = $data["level"];
    $fotoLama = $data["fotoLama"];

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script> alert('konfirmasi password tidak sesuai')
        </script> ";
        return false;
    }


    //cek apakah user piih gbr
    // === 4 artinya ga uplod
    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }


    $query = "UPDATE pengguna 
                    SET
    
                 username = '$username',
                 password = '$password',
                 nama = '$nama',
                 alamat = '$alamat',
                 email = '$email',                 
                 foto = '$foto' ,
                 kode_level = '$level'
                 WHERE id = $id
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
                alert('pilih foto terlebih dahulu!');
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
    $namaFileBaru = round(microtime(true));
    // $namaFileBaru = date('d-m-Y');
    //uniqid fungsi inisiasi nama random
    // $namaFileBaru =  uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensifoto;


    move_uploaded_file($tmpName, '../images/pengguna/' . $namaFileBaru);

    return $namaFileBaru;
}
