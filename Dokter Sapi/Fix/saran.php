<?php
error_reporting(E_ALL ^ E_NOTICE);

require 'aksi/koneksi.php';

$notifsaran = 0;

$notifsaran = $_GET['notifsaran'];

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
                        <a class="nav-link font_navbar text-uppercase" href="tentang.php" for="tentang">Tentang</a>
                        <a class="nav-link font_navbar text-uppercase  active" href="saran.php" for="saran">Saran</a>
                        <a class="nav-link font_navbar text-uppercase" href="login.php">Masuk</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-top: 75px !important;">
            <div class="content">
                <!-- saran -->
                <div class="container">
                    <div class="row" style="padding-top: 75px;">
                        <div class="col-md-5">
                            <div class=" p-4 ml-4 float-right">
                                <img class="media-right" src="images/sapi_jempol.png" alt="User Avatar" style="width: 250px; height: auto;">
                            </div>
                        </div>
                        <div class="col-md-5" style="padding-top: 30px;">
                            <div class="">
                                <!-- /.login-logo -->
                                <div class="card card-info card-outline">
                                    <div class="card-body login-card-body">
                                        <form action="aksi/tambah_saran.php" method="post">
                                            <div class="login-logo font_judul">
                                                <a href=""><span style="color: #17a2b8; text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7);"><b>Saran</b></span></a>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input name="nama" type="text" class="form-control" placeholder="Nama">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input name="email" type="email" class="form-control" placeholder="Email">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-envelope"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <textarea name="saran" type="text" class="form-control" placeholder="Saran" style="margin-top: 0px; margin-bottom: 0px; height: 80px;"></textarea>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-comment-dots"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- /.col -->
                                                <div class="col-12 justify-content-center">
                                                    <button type="submit" name="kirim_saran" class="btn btn-info btn-block">Kirim Saran</button>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.login-card-body -->
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->

                    <!-- v2 -->
                    <!-- <div class="row " style="padding-top: 5px;">
                        <div class="col-md-12 " style="">
                            <div class="d-flex justify-content-center">
                                <h3 class="mt-4"><span class="align-self-center">SARAN</span></h3>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h5 class="mb-4"><span class="text-center font-italic">Berikan Saran dan Masukkan kepada kami agar website kami bisa lebih berkembang kedepannya, Terimakasih.</h5>
                            </div>

                            <div class="card card-info ">
                                <form class="form-horizontal" action="aksi/tambah_saran.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-info card-outline  mb-0 mt-0">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class=" p-4 ml-4 float-right">
                                                            <img class="media-right" src="images/sapi_jempol.png" alt="User Avatar" style="width: 250px; height: auto;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                                <div class="col-sm-10">
                                                                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="msaran" class="col-sm-2 col-form-label">Saran</label>
                                                                <div class="col-sm-10">
                                                                    <textarea type="text" class="form-control" name="saran" id="msaran" placeholder="Saran" style="margin-top: 0px; margin-bottom: 0px; height: 177px;"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row d-flex justify-content-center mt-2">
                                                                <button name="kirim_saran" class="btn btn-info">Kirim Saran</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div> -->
                    <!-- /.row -->
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Universitas Jenderal Soedirman
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2020 </strong> Barkah Ade Kurnia
    </footer>
    </div>
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