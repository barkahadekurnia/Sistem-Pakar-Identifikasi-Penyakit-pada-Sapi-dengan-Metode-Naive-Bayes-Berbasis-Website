<?php

require 'aksi/koneksi.php';


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
                        <a class="nav-link font_navbar text-uppercase" href="konsultasi.php">Konsultasi</a>
                        <a class="nav-link font_navbar text-uppercase" href="artikel.php" for="artikel">Artikel</a>
                        <a class="nav-link font_navbar text-uppercase" href="bantuan.php" for="bantuan">Bantuan</a>
                        <a class="nav-link font_navbar text-uppercase active" href="tentang.php" for="tentang">Tentang</a>
                        <!-- <a class="nav-link font_navbar text-uppercase" href="saran.php" for="saran">Saran</a> -->
                        <a class="nav-link font_navbar text-uppercase" href="login.php">Masuk</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-top: 75px !important;">
            <!-- tentang -->
            <div class="container" id="tentang">
                <!-- maintentang -->
                <div class="d-flex justify-content-center">
                    <h2 class="mt-4"><span class="align-self-center">TENTANG KAMI</span></h2>
                </div>
                <div class="d-flex justify-content-center">
                    <h3 class="mb-4"><i>Sistem ini dirancang dan dibangun oleh :</i></h3>
                </div>
                <div class="row">
                    <!-- bio -->
                    <div class="col-md-4">
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-info">
                                <h3 class="widget-user-username font_tentang1">Barkah Ade Kurnia</h3>
                                <h5 class="widget-user-desc font_tentang2">Administrator</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="images/ade.png" alt="User Avatar">
                            </div>
                            <div class="card-body">
                                <ul class="nav flex-column mt-3 ml-4 mb-0 fa-ul text-muted">
                                    <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-id-badge"></i></span>Mahasiswa Teknik Informatika Universitas Jenderal Soedirman</li>
                                    <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-map-marked-alt"></i></span>Perumahan Taman Gading Blok C Nomor 157 Cilacap</li>
                                    <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-phone"></i></span>WA : 0985392220676</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-info">
                                <h3 class="widget-user-username font_tentang1">Ipung Permadi, S.Si., M.Cs.</h3>
                                <h5 class="widget-user-desc font_tentang2">Pembimbing</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="images/ade.png" alt="User Avatar">
                            </div>
                            <div class="card-body">
                                <ul class="nav flex-column mt-3 ml-4 mb-0 fa-ul text-muted">
                                    <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-id-badge"></i></span>Dosen Teknik Informatika Universitas Jenderal Soedirman</li>
                                    <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-map-marked-alt"></i></span>Kampus Teknik Unsoed Jl. Raya Mayjen Sungkono No.KM 5</li>
                                    <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-phone"></i></span>WA : 0985392220676</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-info">
                                <h3 class="widget-user-username font_tentang1">Drh. Sufiriyanto, M.P.</h3>
                                <h5 class="widget-user-desc font_tentang2">Pakar Sapi</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="images/ade.png" alt="User Avatar">
                            </div>
                            <div class="card-body">
                                <ul class="nav flex-column mt-3 ml-4 mb-0 fa-ul text-muted">
                                    <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-id-badge"></i></span>Dosen Peternakan Universitas Jenderal Soedirman</li>
                                    <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-map-marked-alt"></i></span>Fakultas Pertanian UNSOED | Jl. DR. Soeparno No.63</li>
                                    <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-phone"></i></span>WA : 0985392220676</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
                <!-- maincarosel -->
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

    <script type="text/javascript">
        $(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            var notifsaran = <?php echo json_encode($notifsaran); ?>;
            if (notifsaran > 0) {

                $(function() {
                    Toast.fire({
                        icon: 'success',
                        title: 'Saran telah berhasil dimasukkan, Terimakasih!'
                    })
                });
            }
        });
    </script>

</body>

</html>