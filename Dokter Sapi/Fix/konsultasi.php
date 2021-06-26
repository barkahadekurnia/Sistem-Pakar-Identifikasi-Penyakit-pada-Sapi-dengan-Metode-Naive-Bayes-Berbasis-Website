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
                        <a class="nav-link font_navbar text-uppercase" href="saran.php" for="saran">Saran</a>
                        <a class="nav-link font_navbar text-uppercase" href="login.php">Masuk</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-top: 75px !important;">

            <div class="content-header p-0">
            </div>
            <!-- tentang -->
            <div class="container" id="tentang">
                <!-- maintentang -->
                <!-- <div class="d-flex justify-content-center">
                    <h3 class="mt-4"><span class="align-self-center display2">KONSULTASI</span></h3>
                </div> -->
                <!-- <div class="d-flex justify-content-center">
                    <h5 class="mb-4"><i>Cara Melakukan Konsultasi Penyakit Sapi :</i></h5>
                </div> -->
                <div class="row">
                    <!-- bio -->
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="card-header">
                                <div class="justify-content-center">
                                    <h3 class=""><span class="judul">Konsultasi Penyakit Sapi</span></h3>

                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="italic">Untuk Melakukan Identifikasi Penyakit Sapi , Silahkan pilih gejala penyakit yang dialami Sapi anda </h6>
                                <span>Pilih Gejala Penyakit:</span>

                                <div class="form-group row">
                                    <!-- <label class="col-sm-3 text-right" for="solusi">Pilih Gejala Penyakit :</label> -->
                                    <div class="col-sm-9">
                                        <table>
                                            <?php $no = 0;
                                            while ($hasil = mysqli_fetch_array($q_gejala)) {
                                                // while ($hasil = $q_gejala->fetch_array()) {
                                                $no++; ?>
                                                <tr class="custom-control custom-switch custom-switch-off custom-switch-on-info">

                                                    <td style="padding: 5px;">
                                                        <input type="checkbox" class="custom-control-input" name="gejala[]" id="<?php echo $hasil['kode_gejala']; ?>" value="<?php echo $hasil['kode_gejala']; ?>">


                                                        <label class="custom-control-label" style="font-weight: normal;" for="<?php echo $hasil['kode_gejala']; ?>">
                                                            <?php echo $no; ?>
                                                            <?= "."; ?>
                                                            <?php echo $hasil['nama_gejala'];
                                                            ?>
                                                        </label>
                                                    </td>
                                                </tr>
                                            <?php     } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <div class="card-footer">
                                <div class="form-group row d-flex justify-content-center mt-2">
                                    <button name="konsultasi" class="btn btn-info">Konsultasi</button>
                                </div>
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