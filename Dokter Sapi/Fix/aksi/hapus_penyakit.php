<?php
require 'koneksi.php';

$id = $_GET["id"];


function hapus($id)
{

    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM penyakit WHERE id = '$id' ");

    return mysqli_affected_rows($koneksi);
}

//fungsi ga bakal jalan kalo ga dipanggil

// hapus($id);

if (hapus($id) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href = '../lihat_penyakit.php';
        </script>
        ";
} else {
    echo  "
    <script>
    alert('data gagal dihapus');
    document.location.href = '../lihat_penyakit.php';
    </script>
    ";
}

//orjust do simple
// $id = $_GET["id"];

// mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = '$id' ");

//eksperimen

// $data_penyakit = query("SELECT kode_penyakit FROM penyakit WHERE id = '$id'");

// $penyakit = query("SELECT kode_penyakit FROM relasi WHERE kode_penyakit = '$data_penyakit'");
// $count_penyakit = count($penyakit);

// //penyakit di input sesuai yg dipilih ke tabel relasi
// if ($count_penyakit > 0) {
//     for ($i = 0; $i < $count_penyakit; $i++) {
//         $kode_penyakit = $penyakit[$i];

//         mysqli_query($koneksi, "DELETE FROM relasi WHERE kode_penyakit = '$kode_penyakit' ");
//     }
// }