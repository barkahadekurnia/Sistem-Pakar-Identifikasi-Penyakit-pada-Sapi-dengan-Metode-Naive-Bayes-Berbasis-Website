<?php
require 'koneksi.php';

//cek apakah submit dah di teken? 
if (isset($_POST["submit"])) {
    global $kode_penyakit;
    // dan convert semua tag HTML yang mungkin dimasukkan untuk mengindari XSS
    $id = htmlentities($_POST["id"]);
    $kode_penyakit = htmlentities($_POST["kode_penyakit"]);
    $nama_penyakit = htmlentities($_POST["nama_penyakit"]);
    $nama_latin = htmlentities($_POST["nama_latin"]);
    $penjelasan = $_POST["penjelasan"];
    $solusi = $_POST["solusi"];

    $gambarLama = htmlentities($_POST["gambarLama"]);
    //kodegejala
    $gejala = $_POST["gejala"];
    $count_gejala = count($gejala);

    //gejala yg dimasukin

    //gejala di input sesuai yg dipilih ke tabel relasi
    if ($count_gejala > 0) {
        //hapus relasi yg lama
        mysqli_query($koneksi, "DELETE FROM relasi WHERE kode_penyakit = '$kode_penyakit'");

        for ($i = 0; $i < $count_gejala; $i++) {
            $kode_gejala = $gejala[$i];

            $query_relasi  = "INSERT INTO relasi 
                                (id,kode_penyakit,kode_gejala) 
                              VALUES 
                                ('','$kode_penyakit','$kode_gejala')";
            mysqli_query($koneksi, $query_relasi);
        }
    }
    //cek apakah user piih gbr
    // === 4 artinya ga uplod
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // $penulis = $_SESSION['username'];

    //update penyakit
    $query = "UPDATE penyakit

                    SET
    
                 nama_penyakit= '$nama_penyakit',
                 nama_latin= '$nama_latin',
                 penjelasan = '$penjelasan',
                 solusi = '$solusi',
                 gambar = '$gambar'

                 WHERE id = $id
                 ";

    mysqli_query($koneksi, $query);

    if (mysqli_affected_rows($koneksi) > 0) {

        var_dump(mysqli_affected_rows($koneksi));

        $penyakit_berhasil_diubah = 1;
        header("location:../lihat_penyakit.php?penyakit_berhasil_diubah=" . $penyakit_berhasil_diubah);
    } else {
        echo "
        <script>
        alert('data gagal diubah');
        document.location.href = '../ubah_penyakit.php?id=$id';
        </script>
        ";
        // header("location:../ubah_penyakit.php?id=".$id);
        echo "<br>";
        echo mysqli_error($koneksi);
    }
}




function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    //cek $_FILES pke var_dump
    //cek apakah tdk ada gambar di uplod
    // if ($error === 4) {
    //     echo "<script>
    //             alert('pilih gambar terlebih dahulu!');
    //             </script> 
    //                 ";
    //     return false;
    // }

    //cek apakah yg diupload adalah gambar
    $ekstensigambarValid = ['jpg', 'jpeg', 'png'];
    //misahin ekstensi dan nama file
    $ekstensigambar = explode('.', $namaFile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    //strtolower = buat ubah karakter ke kecil > paksa
    if (!in_array($ekstensigambar, $ekstensigambarValid)) {
        echo "<script> 
        alert ('yg anda upload bukan gambar'); 
        </script>";
        return false;
    }

    //cek jika ukurannya trlalu besar >1mb
    if ($ukuranFile > 1000000) {
        echo "<script> 
        alert ('ukuran gambar anda terlalu besar'); 
        </script>";
        return false;
    }

    //kalo lolos pengecekan diatas > gambar siap diupload
    // bikin nama gambar baru > nama random di DB
    // .= itu buat gabungin 2 inisiasi
    //ambil data time
    // $namaFileBaru = round(microtime(true));
    global $kode_penyakit;
    date_default_timezone_set('Asia/Jakarta');
    $namaFileBaru = $kode_penyakit;
    $namaFileBaru .= date('-d-m-Y-h-i-s');
    //uniqid fungsi inisiasi nama random
    // $namaFileBaru =  uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensigambar;

    global $gambarLama;
    unlink('../images/penyakit/' . $gambarLama);

    move_uploaded_file($tmpName, '../images/penyakit/' . $namaFileBaru);

    return $namaFileBaru;
}
