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
                    document.location.href = '../lihat_gejala.php';
                </script>

            ";
    } else {
        echo "
        <script>
        alert('data gagal ditambahkan');
        document.location.href = '../tambah_gejala.php';
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
    global $kode_gejala;

    $nama_gejala = $data["nama_gejala"];
    $keterangan = $data["keterangan"];
    //kodegejala

    //ambil nilai id max
    // SELECT max(nama_kolom) FROM nama_table
    $idmax = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * from gejala where id in (SELECT max(id) from gejala)"));
    if ($idmax == "") {
        $id = 1;
    } else {
        $id = $idmax['id'] + 1;
    }


    if ($id < 10) {
        $kode_gejala = "G00" . $id;
    } elseif ($id < 100) {
        $kode_gejala = "G0" . $id;
    } else {
        $kode_gejala = "G" . $id;
    }

    //cek gejala dah ada atau belum?
    $result = mysqli_query($koneksi, "SELECT nama_gejala FROM gejala WHERE nama_gejala = '$nama_gejala'");

    if (mysqli_fetch_assoc($result)) {
        echo " <script> alert('gejala $nama_gejala sudah terdaftar, Silahkan masukkan gejala yang lain')
            </script> ";
        return false;
    }

    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        //kalo ketemu return false .. bawahnya ga di jalanin 
        return false;
    }
    // (id,kode_gejala,nama_gejala,keterangan,gambar,waktu_tambah)
    $query = "INSERT INTO gejala 

                    VALUES
                ('$id','$kode_gejala','$nama_gejala','$keterangan','$gambar')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


// function id()
// {
//     global $koneksi;

//     //ngitung row di tabel
//     $query = " SELECT * FROM gejala ";

//     $row_id = mysqli_query($koneksi, $query);
//     $row = mysqli_num_rows($row_id);

//     $id = $row + 1;

//     return $id;
// }

// function kode_gejala()
// {
//     $id = id();

//     if ($id < 10) {
//         $kode_gejala = "G00" . $id;
//     } elseif ($id < 100) {
//         $kode_gejala = "G0" . $id;
//     } else {
//         $kode_gejala = "G" . $id;
//     }

//     return $kode_gejala;
// }



function upload()
{
    global $kode_gejala;
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
    $namaFileBaru = $kode_gejala;
    $namaFileBaru .= date('-d-m-Y-h-i-s');
    //uniqid fungsi inisiasi nama random
    // $namaFileBaru =  uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensigambar;


    move_uploaded_file($tmpName, '../images/gejala/' . $namaFileBaru);

    return $namaFileBaru;
}
