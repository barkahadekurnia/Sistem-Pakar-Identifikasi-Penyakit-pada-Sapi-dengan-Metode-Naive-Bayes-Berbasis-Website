<?php
require 'koneksi.php';
//yaak dicoba dulu bosque

// //001=1 LOL

$q = 004;
echo $q;

for ($i = 1; $i <= $q; $i++) {
    echo $q;
}



//ambil angka doang dari string

// $string = 'Jam 10 siang lebih 12 menit.';
// $string = preg_replace("/[^0-9]/", "", $string);
// echo $string;

$penyakit = mysqli_query($koneksi, "SELECT kode_penyakit FROM penyakit");
while ($angka_penyakit = mysqli_fetch_assoc($penyakit)) {
    var_dump($angka_penyakit);
    $string[] = preg_replace("/[^0-9]/", "", $angka_penyakit);
}
var_dump($penyakit);
var_dump($string);


//ambil nilai max
//php max()
//sql
// $kodemax=mysqli_fetch_array(mysqli_query($sql,"SELECT * from gejala 
// where kode_gejala in (SELECT max(kode_gejala) from gejala)"));

$penyakit = mysqli_query($koneksi, "SELECT kode_penyakit FROM penyakit");

$j = 0;
$hasilnya = 1;
foreach ($penyakit as $cek) {
}

//tampil gejala urut abjad
$q_gejala = mysqli_query($koneksi, "SELECT * FROM `gejala`  
ORDER BY `gejala`.`nama_gejala` ASC"); //urut abjad
