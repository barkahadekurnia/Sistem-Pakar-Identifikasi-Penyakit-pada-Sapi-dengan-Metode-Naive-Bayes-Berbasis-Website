<?php
// error_reporting(0);
require "aksi/koneksi.php";

date_default_timezone_set("Asia/Jakarta"); //set timezone
$tanggal_sekarang = date("d M Y H:i");
?>

<html>

<head>
    <title>Dokter Sapi (Hasil Identifikasi Penyakit <?php echo $tanggal_sekarang; ?>)</title>
    <link rel="shortcut icon" href="images/favicon/favicon_unsoed.ico">
    <style type="text/css">
        body {
            text-align: justify;
        }

        p {
            margin: 0px;
            padding-bottom: 5px;
        }

        ul {
            margin: 0px;
            padding-left: 18px;
            padding-bottom: 5px;
        }

        ol {
            margin: 0px;
            padding-bottom: 5px;
        }
    </style>
</head>

<body>
    <div style="text-align: center;">
        <u>
            <h3 style="margin-top: 0px; margin-bottom: 0px;">Hasil Identifikasi</h3>
        </u>
        <h3 style="margin-top: 0px; margin-bottom: 0px;">Sistem Pakar Identifikasi Penyakit Sapi</h3>
        <p>Tanggal Konsultasi: <?php echo $tanggal_sekarang ?></p></br></br></br>
    </div>
    <?php
    $ip = $_SERVER['REMOTE_ADDR'];
    $nilai = mysqli_query($koneksi, "SELECT nilai from tmp_identifikasi where ip='$ip' order by nilai desc limit 1");
    $max = mysqli_fetch_assoc($nilai);
    $nilaimax = $max['nilai'];
    $hasilident = mysqli_query($koneksi, "SELECT * from tmp_identifikasi left join penyakit on tmp_identifikasi.kode_penyakit=penyakit.kode_penyakit where nilai='$nilaimax' and ip='$ip'");
    $jmlhasilident = mysqli_num_rows($hasilident);

    if ($jmlhasilident == 1) {
        $tampilpenyakit = mysqli_fetch_assoc($hasilident);
        if (!empty($tampilpenyakit['gambar'])) {
            echo "<center><img src='images/penyakit/$tampilpenyakit[gambar]' height='170'></center></br></br>";
        }
    ?>
        <b>Nama Penyakit:</b> <?php echo $tampilpenyakit['nama_penyakit']; ?></br></br>
        <b>Gejala:</b></br>
        <?php
        $qry_gejala = mysqli_query($koneksi, "SELECT * from relasi left join gejala on relasi.kode_gejala=gejala.kode_gejala where kode_penyakit in ('$tampilpenyakit[kode_penyakit]')");
        while ($hsl_gejala = mysqli_fetch_array($qry_gejala)) {
            echo "- $hsl_gejala[nama_gejala] <br>";
        }
        echo "<br>
			<b>Penjelasan:</b></br>$tampilpenyakit[penjelasan]</br>
			<b>Solusi:</b></br>$tampilpenyakit[solusi]</br>
			";
    } elseif ($jmlhasilident >= 2) {
        ?>
        Penyakit yang mungkin dialami:</br></br>
        <?php
        while ($tampilpenyakit = mysqli_fetch_array($hasilident)) {
        ?>
            <b><u><?php echo $tampilpenyakit['nama_penyakit']; ?></u></b></br></br>
            <?php
            if (!empty($tampilpenyakit['gambar'])) {
                echo "<center><img src='images/penyakit/$tampilpenyakit[gambar]' height='170'></center></br>";
            }
            ?>
            <b>Gejala:</b></br>
    <?php
            $qry_gejala = mysqli_query($koneksi, "SELECT * from relasi left join gejala on relasi.kode_gejala=gejala.kode_gejala where kode_penyakit in ('$tampilpenyakit[kode_penyakit]')");
            while ($hsl_gejala = mysqli_fetch_array($qry_gejala)) {
                echo "- $hsl_gejala[nama_gejala] <br>";
            }
            echo "<br>
				<b>Penjelasan:</b></br>$tampilpenyakit[penjelasan]</br>
				<b>Solusi:</b></br>$tampilpenyakit[solusi]</br>
				<hr>
				";
        }
    }
    ?>
    <script>
        window.load = print_sm();

        //lempar ke file pdf
        function print_sm() {
            window.print();
        }
    </script>
</body>

</html>