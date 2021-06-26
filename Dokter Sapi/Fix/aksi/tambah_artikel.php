<?php
require 'koneksi.php';

//cek apakah submit dah di teken? 
if (isset($_POST["submit"])) {
    // jalanin fungsi tambah
    if (tambah($_POST) > 0) {

        // $cekberhasil = mysqli_affected_rows($koneksi);
        $artikel_berhasil_ditambah = 1;
        header("location:../lihat_artikel.php?artikel_berhasil_ditambah=" . $artikel_berhasil_ditambah);
    } else {
        echo " Ada yang salah bro ! ";

        echo " ";
        echo mysqli_error($koneksi);
    }
}



function tambah($data)
{
    //biar bisa ambil data di $koneksi
    global $koneksi;
    global $kode_artikel;

    $judul_artikel = $data["judul_artikel"];
    $isi_artikel = $data["isi_artikel"];
    //kodeartikel

    //ambil nilai id max
    // SELECT max(nama_kolom) FROM nama_table
    $idmax = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * from artikel where id in (SELECT max(id) from artikel)"));
    if ($idmax == "") {
        $id = 1;
    } else {
        $id = $idmax['id'] + 1;
    }


    if ($id < 10) {
        $kode_artikel = "ARTIKEL00" . $id;
    } elseif ($id < 100) {
        $kode_artikel = "ARTIKEL0" . $id;
    } else {
        $kode_artikel = "ARTIKEL" . $id;
    }

    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        //kalo ketemu return false .. bawahnya ga di jalanin 
        return false;
    }

    // $query = "INSERT INTO artikel 
    //             (id,kode_artikel,judul_artikel,isi_artikel,gambar)
    //                 VALUES
    //             ('$id','$kode_artikel','$judul_artikel','$isi_artikel','$gambar')";
    $query = "INSERT INTO artikel 
    
        VALUES
    ('$id','$kode_artikel','$judul_artikel','$isi_artikel','$gambar','',NOW())
    ";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function upload()
{
    global $kode_artikel;
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

    date_default_timezone_set('Asia/Jakarta');
    $namaFileBaru = $kode_artikel;
    $namaFileBaru .= date('-d-m-Y-h-i-s');
    //uniqid fungsi inisiasi nama random
    // $namaFileBaru =  uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensigambar;


    move_uploaded_file($tmpName, '../images/artikel/' . $namaFileBaru);

    return $namaFileBaru;
}
