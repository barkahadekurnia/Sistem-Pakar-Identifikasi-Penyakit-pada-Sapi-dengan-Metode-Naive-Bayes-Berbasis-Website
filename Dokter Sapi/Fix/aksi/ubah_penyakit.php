<?php
require 'koneksi.php';

//cek apakah submit dah di teken? 
if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        // var_dump($_POST);
        // var_dump($_FILES);

        echo "
                <script>
                    alert('data berhasil diubah');
                    document.location.href = '../lihat_penyakit.php';
                </script>

            ";
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





function ubah($data)
{
    //biar bisa ambil data di $koneksi
    global $koneksi;
    global $kode_penyakit;
    global $id;

    $id = $data["id"];
    $kode_penyakit = $data["kode_penyakit"];
    $nama_penyakit = $data["nama_penyakit"];
    $nama_latin = $data["nama_latin"];
    $penjelasan = $data["penjelasan"];
    $solusi = $data["solusi"];

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

    // $penulis = $_SESSION['username'];

    //gejala yg dimasukin
    $gejala = $data["gejala"];
    $count_gejala = count($gejala);

    //hapus relasi yg lama
    mysqli_query($koneksi, "DELETE FROM relasi WHERE kode_penyakit = '$kode_penyakit'");
    //gejala di input sesuai yg dipilih ke tabel relasi
    if ($count_gejala > 0) {
        for ($i = 0; $i < $count_gejala; $i++) {
            $kode_gejala = $gejala[$i];

            $query_relasi  = "INSERT INTO relasi 
                                (id,kode_penyakit,kode_gejala) 
                              VALUES 
                                ('','$kode_penyakit','$kode_gejala')";
            mysqli_query($koneksi, $query_relasi);
        }
    }

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

    return mysqli_affected_rows($koneksi);
}




function upload()
{
    global $kode_penyakit;
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
    // if (!in_array($ekstensigambar, $ekstensigambarValid)) {
    //     echo "<script> 
    //     alert ('yg anda upload bukan gambar'); 
    //     </script>";
    //     return false;
    // }

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
    $namaFileBaru = $kode_penyakit;
    $namaFileBaru .= date('-d-m-Y-h-i-s');
    //uniqid fungsi inisiasi nama random
    // $namaFileBaru =  uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensigambar;


    move_uploaded_file($tmpName, '../images/penyakit/' . $namaFileBaru);

    return $namaFileBaru;
}
