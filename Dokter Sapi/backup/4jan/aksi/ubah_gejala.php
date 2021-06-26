<?php
require 'koneksi.php';



// var_dump($data["nama"]);
//cek apakah submit dah di teken? 
if (isset($_POST["submit"])) {
    //cek data berubah kaga
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = '../lihat_gejala.php';
            </script>
        
        ";
    } else {
        echo "
        <script>
        alert('data tidak diubah');
        document.location.href = '../lihat_gejala.php';
        </script>
        ";

        echo "<br>";
        echo mysqli_error($koneksi);
    }
}


function ubah($data)
{
    //biar bisa ambil data di $koneksi
    global $koneksi;
    global $kode_gejala;

    $kode_gejala = $data["kode_gejala"];
    $id = $data["id"];
    $nama_gejala = $data["nama_gejala"];
    $keterangan = $data["keterangan"];
    $gambarLama = $data["gambarLama"];
    //kodegejala



    //cek apakah user piih gbr
    // === 4 artinya ga uplod
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
        if (!$gambar) {
            //kalo ketemu return false .. bawahnya ga di jalanin 
            return false;
        }
    }
    // //cek nama_gejala dah ada atau belum?
    // $result = mysqli_query($koneksi, "SELECT nama_gejala FROM penyakit WHERE nama_gejala = '$nama_gejala'");

    // if (mysqli_fetch_assoc($result)) {
    //     echo " <script> alert('Penyakit $nama_gejala sudah terdaftar, Silahkan masukkan Gejala yang lain')
    //         </script> ";
    //     return false;
    // }

    $query = "UPDATE gejala 

                    SET
    
                 nama_gejala = '$nama_gejala',
                 keterangan = '$keterangan',
                 gambar = '$gambar'

                 WHERE id = $id
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
    //cek $_FILES pke var_dump
    //cek apakah tdk ada gambar di uplod
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
                </script> 
                    ";
        return false;
    }

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
    //ambil data kode_gejala
    //kalo lolos pengecekan diatas > gambar siap diupload
    // bikin nama gambar baru > nama random di DB
    // .= itu buat gabungin 2 inisiasi
    //ambil data time
    //uniqid fungsi inisiasi nama random
    // $namaFileBaru =  uniqid();

    global $kode_gejala;
    date_default_timezone_set('Asia/Jakarta');

    $namaFileBaru = $kode_gejala;
    $namaFileBaru .= date('-d-m-Y-h-i-s');
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensigambar;

    move_uploaded_file($tmpName, '../images/gejala/' . $namaFileBaru);

    return $namaFileBaru;
}
