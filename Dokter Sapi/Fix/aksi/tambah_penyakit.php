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
                    document.location.href = '../lihat_penyakit.php';
                </script>

            ";
    } else {
        echo "
        <script>
        alert('data gagal ditambahkan');
        document.location.href = '../tambah_penyakit.php';
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
    global $kode_penyakit;

    $nama_penyakit = $data["nama_penyakit"];
    $nama_latin = $data["nama_latin"];
    $penjelasan = $data["penjelasan"];
    $solusi = $data["solusi"];

    // $penulis = $_SESSION['username'];
    //kodepenyakit

    //ambil nilai id max
    // SELECT max(nama_kolom) FROM nama_table
    $idmax = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * from penyakit where id in (SELECT max(id) from penyakit)"));
    if ($idmax == "") {
        $id = 1;
    } else {
        $id = $idmax['id'] + 1;
    }


    if ($id < 10) {
        $kode_penyakit = "P00" . $id;
    } elseif ($id < 100) {
        $kode_penyakit = "P0" . $id;
    } else {
        $kode_penyakit = "P" . $id;
    }

    //cek nama_penyakit dah ada atau belum?
    $result = mysqli_query($koneksi, "SELECT nama_penyakit FROM penyakit WHERE nama_penyakit = '$nama_penyakit'");

    if (mysqli_fetch_assoc($result)) {
        echo " <script> alert('Penyakit $nama_penyakit sudah terdaftar, Silahkan masukkan Penyakit yang lain')
        </script> ";
        return false;
    }

    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        //kalo ketemu return false .. bawahnya ga di jalanin 
        return false;
    }


    // (id,kode_penyakit,nama_penyakit,nama_latin,penjelasan,solusi,gambar,waktu_ubah)
    //penyakit
    $query = "INSERT INTO penyakit 
                
                    VALUES
                ('$id','$kode_penyakit','$nama_penyakit','$nama_latin','$penjelasan','$solusi','$gambar')";

    mysqli_query($koneksi, $query);


    $gejala = $data["gejala"];
    $count_gejala = count($gejala);

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
