<?php

require 'aksi/koneksi.php';

$q_gejala = mysqli_query($koneksi, "SELECT*FROM gejala");
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
                        <a class="nav-link font_navbar text-uppercase" href="index.php">Beranda</a>
                        <a class="nav-link font_navbar text-uppercase  active" href="konsultasi.php">Konsultasi</a>
                        <a class="nav-link font_navbar text-uppercase" href="artikel.php" for="artikel">Artikel</a>
                        <a class="nav-link font_navbar text-uppercase" href="bantuan.php" for="bantuan">Bantuan</a>
                        <a class="nav-link font_navbar text-uppercase" href="tentang.php" for="tentang">Tentang</a>
                        <!-- <a class="nav-link font_navbar text-uppercase" href="saran.php" for="saran">Saran</a> -->
                        <a class="nav-link font_navbar text-uppercase" href="login.php">Masuk</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-top: 75px !important;">
            <!-- bantuan -->
            <div class="container" id="bantuan">
                <!-- maintentang -->
                <div class="d-flex justify-content-center">
                    <h2 class="mt-4"><span class="align-self-center">BANTUAN</span></h2>
                </div>
                <div class="d-flex justify-content-center">
                    <h3 class="mb-4"><i>Cara melakukan Identifikasi Penyakit Sapi adalah :</i></h3>
                </div>
                <div class="row">
                    <!-- bio -->
                    <div class="col-12">
                        <div class="card card-info card-outline">
                            <!-- <div class="card-header">
                                <div class="">
                                    <h1 class=""><span class="">Bantuan</span></h1>
                                </div>
                            </div> -->
                            <div class="card-body">

                                <div class="row mb-2">
                                    <div class="col-sm-4 p-3">
                                        <h3 class="">1. Masuk ke halaman Konsultasi penyakit sapi</h3>
                                        <div class="text-center pb-2">
                                            <img class="img-thumbnail" src="images/bantuan/konsul.png" style="height:250px; display:block;border: 0px;">
                                        </div>
                                        <p>Anda dapat masuk ke halaman Konsultasi Penyakit Sapi dengan cara menekan tab <a href="konsultasi.php">
                                                <span style="font-weight: bold; color:#17a2b8;">"Konsultasi"</span></a>yang ada pada menu diatas. </p>
                                        <p>
                                            Anda juga bisa masuk ke halaman Konsultasi Penyakit Sapi dengan cara menekan tombol <a href="konsultasi.php">
                                                <span style="font-weight: bold; color:#17a2b8;">"Konsultasi"</span></a> yang ada di halaman Beranda</p>



                                    </div>

                                    <div class="col-sm-4 p-3">
                                        <h3 class="">2. Lakukan Identifikasi penyakit sapi anda</h3>
                                        <div class="text-center pb-2">
                                            <img class="img-thumbnail" src="images/bantuan/pilihgejala.png" style="height:250px; display:block;border: 0px;">
                                        </div>
                                        <p>Untuk melakukan identifikasi penyakit Sapi, pertama silahkan pilih gejala gejala yang di alami oleh Sapi anda.

                                        </p>
                                        <p>Kemudian, jika anda sudah memilih semua gejala yang dialami oleh Sapi anda, Silahkan tekan tombol
                                            <span style="font-weight: bold; color:#17a2b8;">"Konsultasikan"</span>
                                        </p>

                                    </div>
                                    <div class="col-sm-4 p-3">
                                        <h3 class="">3. Simpan hasil Identifikasi penyakit sapi anda</h3>
                                        <div class="text-center pb-2">
                                            <img class="img-thumbnail" src="images/Bantuan/simpanhasilidentifikasi.png" style="height:250px; display:block;border: 0px;">
                                        </div>

                                        <p>

                                            Setelah melakukan identifikasi Penyakit Sapi,
                                            Anda dapat menyimpan hasil Identifikasi Penyakit Sapi dengan cara menekan tombol
                                            <span style="font-weight: bold; color:#17a2b8;">"Simpan Hasil Identifikasi"</span> <br>
                                            </Untuk>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div> <!-- row -->

            </div>
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
    <!--animated css -->
    <script src="dist/js/wow.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>


</body>

</html>