<?php
require 'koneksi.php';

//a. inisiasi variabel

$gejala = mysqli_query($koneksi, "SELECT * FROM gejala");

$m = mysqli_num_rows($gejala);

$penyakit = mysqli_query($koneksi, "SELECT * FROM penyakit");

$jumlah_penyakit = mysqli_num_rows($penyakit);

$n = 1;
$p = 1 / $jumlah_penyakit;

$ip = $_SERVER['REMOTE_ADDR']; //get ip address by apache - Basically $_SERVER['REMOTE_ADDR']gives the IP address from which the request was sent to the web server. Echo "Your IP Address is "

if (isset($_POST["konsultasi"])) {
    //nc
    $gejala_terpilih = $_POST["gejala_pilih"];
    // var_dump($gejala_terpilih);
    // echo "<br/>";
    // echo max($gejala_terpilih);


    if ($gejala_terpilih == "") {
        echo "<script>alert('Gejala belum dipilih, silakan memilih gejala untuk mendapatkan hasil identifikasi!');</script>";
        //resresh ke page konsul ni mindahin ke konsul
        // echo "<meta http-equiv=refresh content=0;url=konsultasi.php>";
    } else {

        //kosongin dulu tabel tmp
        mysqli_query($koneksi, "DELETE FROM tmp_identifikasi WHERE ip='$ip'");

        //itung dlu berapa gejala yg dipilih
        // $jml_gejala_terpilih = count($gejala_terpilih);

        //ambil angka doang dari string kode penyakit P00x 
        //001 = 1 LOL xD

        $query_angka_penyakit = mysqli_query($koneksi, "SELECT kode_penyakit FROM penyakit");

        while ($a_penyakit = mysqli_fetch_assoc($query_angka_penyakit)) {
            // mau ambil angkanya doang dari string ngubah P001 > 001
            $angka_penyakit[] = preg_replace("/[^0-9]/", "", $a_penyakit);
        }
        //cari nilai  max penyakit
        $max_penyakits = max($angka_penyakit);
        $max_penyakit = $max_penyakits['kode_penyakit']; // aray nya ubah ke string
        // echo $max_penyakit;
        // var_dump($max_penyakit);

        //proses loop berdasar jumlah max penyakit
        for ($i = 1; $i <= $max_penyakit; $i++) {

            //loop untuk setiap gejala terpilih
            foreach ($gejala_terpilih as $cek_gejala) {

                //balikin ke kode penyakit semula P001
                if ($i < 10) {
                    $kode_penyakit = "P00" . $i;
                } elseif ($i < 100) {
                    $kode_penyakit = "P0" . $i;
                } else {
                    $kode_penyakit = "P" . $i;
                }

                // gejala yg ada di tiap penyakit di cek di relasi
                // echo $kode_penyakit;
                // echo $cek_gejala;
                // echo "<br/>";

                $pilihrelasi = mysqli_query($koneksi, "SELECT * FROM relasi WHERE kode_penyakit='$kode_penyakit' and kode_gejala='$cek_gejala'");
                //nc=1 klo doi samaan relasi gejala
                $nc = mysqli_num_rows($pilihrelasi);
                // $nc = 1 klo ada nc=0 klo ga da > done
                // echo $nc;

                //  b. Menghitung nilai P(Vj) dan P(αi|Vj) = (nc+mp)/(n+m)
                $peluang = ($nc + ($m * $p)) / ($n + $m);
                $hasil = $peluang;
                // var_dump($peluang);
            }
            // c. Menghitung P(Vj) x P(αi|Vj)

            $nilaibayes = $hasil * $p;

            //balikin ke kode penyakit semula P001
            if ($i < 10) {
                $kode_penyakit = "P00" . $i;
            } elseif ($i < 100) {
                $kode_penyakit = "P0" . $i;
            } else {
                $kode_penyakit = "P" . $i;
            }
            // echo $kode_penyakit;

            //insert data ke tmp identifikasi
            mysqli_query($koneksi, "INSERT INTO tmp_identifikasi values ('','$ip','$kode_penyakit','$nilaibayes')"); //harusnya masukin kode penyakit
        }
        //comot data nilai yg paling gede
        $nilai = mysqli_query($koneksi, "SELECT nilai from `tmp_identifikasi` where ip='$ip'   
        ORDER BY `tmp_identifikasi`.`nilai`  DESC");

        $max = mysqli_fetch_assoc($nilai);
        // var_dump($max);

        $nilaimax = $max['nilai'];

        //leftjoin − returns all rows from the left table, even if there are no matches in the right table.
        $hasilident = mysqli_query($koneksi, "SELECT * from tmp_identifikasi left join penyakit on tmp_identifikasi.kode_penyakit=penyakit.kode_penyakit where nilai='$nilaimax' and ip='$ip'");
        $cekhasil = mysqli_fetch_assoc($hasilident);
        // var_dump($cekhasil);

        $jmlhasilident = mysqli_num_rows($hasilident);
    }
}
