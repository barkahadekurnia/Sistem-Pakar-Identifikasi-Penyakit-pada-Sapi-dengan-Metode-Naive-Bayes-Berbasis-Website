<?php

require 'aksi/koneksi.php';

// $sql_artikel = mysqli_query($koneksi, "SELECT* FROM artikel");


//ni qury seting view date yg diinginkan hari tgl bulan taun
$sql_artikel = mysqli_query($koneksi, "SELECT *, DATE_FORMAT(waktu_tambah,'%e %M %Y') AS waktu_tambah FROM artikel ");

// $sql_artikel = mysqli_query($koneksi, "SELECT*,DATE_FORMAT(waktu_tambah,'%e %M %Y') as waktu_tambah FROM artikel where kode_artikel='$kode_artikel'"); // ganti format waktu yg di db ke tanggal bulan taun
// $data = mysqli_fetch_assoc($sql_artikel);

// var_dump($sql_artikel);
// $hasil = mysqli_fetch_array($sql_artikel);
// // membuat link baca selengkapnya
// $panjang_artikel = strlen($hasil['artikel']);
// $artikel = strip_tags($hasil['artikel']);
// $strcut = substr($artikel, 0, 800);
// if ($panjang_artikel > 800) {
//     $strcut = substr($artikel, 0, 800);
//     $endpoint = strrpos($strcut, '');
//     $hasil_artikel = $endpoint ? substr($strcut, 0, $endpoint) : substr($strcut, 0);
//     $hasil_artikel .= '..<a href="artikels.php?n=' . $hasil['id'] . ' ">Baca selengkapnya.</a>';
// }


// $result = mysqli_query($koneksi, "SELECT * FROM artikel");

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Dokter Sapi</title>
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- animate style -->
    <link rel="stylesheet" href="dist/css/animate.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- CSS main -->
    <link rel="stylesheet" href="assets/cssku/style-main.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aladin&display=swap" rel="stylesheet">
    <!-- jQuery -->

</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark navbar-info fixed-top ">
            <div class="container">
                <a href="index.php" class="navbar-brand m-0 p-0">
                    <img src="images/favicon.ico" alt="Dokter Sapi Logo" class="brand-image img-circle elevation-3" style="opacity: 1; margin-top: -1.15rem;">
                    <span class="brand-text font_logo"> Dokter Sapi</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3 " id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-link font_navbar text-uppercase" href="index.php" for="index" id="index">Beranda</a>
                        <a class="nav-link font_navbar text-uppercase" href="konsultasi.php">Konsultasi</a>
                        <a class="nav-link font_navbar text-uppercase active" href="artikel.php" for="artikel">Artikel</a>
                        <a class="nav-link font_navbar text-uppercase" href="index.php#bantuan" for="bantuan">Bantuan</a>
                        <a class="nav-link font_navbar text-uppercase" href="index.php#tentang" for="tentang">Tentang</a>
                        <!-- <a class="nav-link font_navbar text-uppercase" href="index.php#saran" for="saran">Saran</a> -->
                        <a class="nav-link font_navbar text-uppercase" href="login.php">Masuk</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-top: 75px !important;">
            <!-- tentang -->
            <section class="content-header p-0">
            </section>
            <section class="content">
                <div class="container" id="tentang">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card" style="margin-top: 2rem;">
                                <div class="card-header">
                                    <div class="">
                                        <h2 class="text-left"><span class="">Artikel</span></h2>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-8">
                                            <?php while ($data = mysqli_fetch_assoc($sql_artikel)) : ?>
                                                <div class="row mb-3">
                                                    <div class="col-12 pb-4" style="border-bottom :1px solid rgba(0,0,0,.125);">
                                                        <a href="baca_artikel.php?kode_artikel=<?php echo $data['kode_artikel'] ?>" style="color:black">
                                                            <h3 class="" style="font-size: 1.4rem;"><?php echo $data['judul_artikel'] ?></h3>
                                                        </a>
                                                        <p class="text-muted"><small>&nbsp;<?php echo $data['nama_penulis'] ?> - <span class="fa fa-clock-o" aria-hidden="true"></span><?php echo "  " . $data['waktu_tambah']; ?></small></p>
                                                        <div class="row">
                                                            <div class="col-4 text-center">
                                                                <img class="img img-thumbnail " style="height: 190px; width:auto; " src="images/artikel/<?= $data["gambar"]; ?>" onerror="this.src='images/no_image.png'">
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="" style=" text-align: justify;">
                                                                    <?php

                                                                    $pjg_artikel = strlen($data['isi_artikel']);
                                                                    if ($pjg_artikel > 600) {
                                                                        $isiartikelpendek = substr(strip_tags($data['isi_artikel']), 0, 600);
                                                                        echo $isiartikelpendek;
                                                                        echo " ..."
                                                                    ?>
                                                                        <a href="baca_artikel.php?kode_artikel=<?php echo $data['kode_artikel'] ?>">
                                                                            <span style="color: #17a2b8;">Baca Selengkapnya</span>
                                                                        </a>
                                                                    <?php
                                                                    } else {
                                                                        echo $data['isi_artikel'];
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                            endwhile; ?>

                                        </div>
                                        <div class="col-sm-12 col-md-4" style="border-left: 1px solid #dee2e6;">
                                            <h5>Artikel Lainnya :</h5>
                                            <ul class="list-group list-group-flush">
                                                <?php
                                                $sql_artikel_lain = mysqli_query($koneksi, "SELECT* FROM artikel");
                                                while ($data = mysqli_fetch_assoc($sql_artikel_lain)) : ?>

                                                    <li class="list-group-item">
                                                        <a href="baca_artikel.php?kode_artikel=<?php echo $data['kode_artikel'] ?>">
                                                            <span style="color: black; !important"><?php echo $data['judul_artikel'] ?></span>
                                                        </a>
                                                    </li>

                                                <?php endwhile; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>

                        <!-- maincarosel -->
                    </div>

            </section>
            <a id="back-to-top" href="#" class="btn btn-info btn-md back-to-top pull-left" role="button" data-toggle="tooltip" data-placement="top" data-original-title="" title="" style="display: none; ">
                <span class="fa fa-angle-up"></span>
            </a>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer" style="margin-left: 0px;">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Universitas Jenderal Soedirman
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2020 </strong> Barkah Ade Kurnia
    </footer>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 50) {
                    $('#back-to-top').fadeIn();

                } else {
                    $('#back-to-top').fadeOut();

                }
            });
            // scroll body to 0px on click
            $('#back-to-top').click(function() {
                $('#back-to-top').tooltip('hide');
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });

            $('#back-to-top').tooltip('show');
        });
    </script>







</body>

</html>