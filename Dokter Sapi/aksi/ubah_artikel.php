<?php
include 'koneksi.php';



// var_dump($_POST["nama"]);
//cek apakah submit dah di teken? 
if (isset($_POST["submit"])) {

    //biar bisa ambil data di $koneksi
    global $koneksi;
    global $kode_artikel;

    $kode_artikel = $_POST["kode_artikel"];
    $id = $_POST["id"];
    $judul_artikel = $_POST["judul_artikel"];
    $isi_artikel = $_POST["isi_artikel"];
    $gambarLama = $_POST["gambarLama"];
    $nama_penulis = $_POST["nama_penulis"];


    //cek apakah user piih gbr
    // === 4 artinya ga uplod
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }





    // $gambar = upload();



    $query = "UPDATE artikel 
                    SET
    
                judul_artikel = '$judul_artikel',
                isi_artikel = '$isi_artikel',
                gambar = '$gambar',
                nama_penulis ='$nama_penulis',
                waktu_tambah = now()

                WHERE id = $id
                ";


    mysqli_query($koneksi, $query);

    $cek = mysqli_affected_rows($koneksi);
    if ($cek > 0) {
        // $cekberhasil = mysqli_affected_rows($koneksi);
        $artikel_berhasil_diubah = 1;
        header("location:../lihat_artikel.php?artikel_berhasil_diubah=" . $artikel_berhasil_diubah);

        var_dump($gambar);
        // var_dump($_FILES);
    } else {
        echo "
        <script>
        alert('data tidak diubah');
        document.location.href = '../lihat_artikel.php';
        </script>
        ";


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
    if ($ukuranFile > 5000000) {
        echo "<script> 
        alert ('ukuran gambar anda terlalu besar'); 
        </script>";
        return false;
    }

    //kalo lolos pengecekan diatas > gambar siap diupload
    // bikin nama gambar baru > nama random di DB
    // .= itu buat gabungin 2 inisiasi
    //ambil data time
    global $kode_artikel;
    date_default_timezone_set('Asia/Jakarta');

    $namaFileBaru = $kode_artikel;
    $namaFileBaru .= date('-d-m-Y-h-i-s');
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensigambar;

    global $gambarLama;
    unlink('../images/artikel/' . $gambarLama);

    move_uploaded_file($tmpName,  '../images/artikel/' . $namaFileBaru);

    return $namaFileBaru;
}
