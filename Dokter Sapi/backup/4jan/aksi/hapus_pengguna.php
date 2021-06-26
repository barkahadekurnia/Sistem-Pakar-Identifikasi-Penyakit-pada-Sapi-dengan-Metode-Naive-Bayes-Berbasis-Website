<?php
require 'koneksi.php';

$id = $_GET["id"];

function hapus($id)
{

    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM pengguna WHERE id = '$id' ");

    return mysqli_affected_rows($koneksi);
}

//fungsi ga bakal jalan kalo ga dipanggil

// hapus($id);

if (hapus($id) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href = '../lihat_pengguna.php';
        </script>
        ";
} else {
    echo  "
    <script>
    alert('data gagal dihapus');
    document.location.href = '../lihat_pengguna.php';
    </script>
    ";
}

//orjust do simple
// $id = $_GET["id"];

// mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = '$id' ");
