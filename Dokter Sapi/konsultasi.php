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
                        <a class="nav-link font_navbar text-uppercase" href="index.php" for="index" id="index">Beranda</a>
                        <a class="nav-link font_navbar text-uppercase active" href="konsultasi.php">Konsultasi</a>
                        <a class="nav-link font_navbar text-uppercase" href="artikel.php" for="artikel">Artikel</a>
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

            <div class="content-header p-0">
            </div>

            <div class="container">
                <div class="row">
                    <!-- bio -->
                    <div class="col-md-12">

                        <div class="card" style="margin-top: 2rem;">

                            <div class="card-header">
                                <div class="">
                                    <h2 class=""><span class="">Konsultasi Penyakit Sapi</span></h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-4 text-center">
                                        <img class="img-thumbnail" src="images/sapi_jempol.png" style="width: 170px; border: 0px;">
                                    </div>
                                    <div class="col-sm-8">
                                        <h3 class="pb-3">Halo, Selamat Datang di halaman Konsultasi</h3>

                                        <p>Untuk melakukan identifikasi penyakit Sapi, silahkan pilih gejala gejala yang di alami oleh Sapi anda </p>
                                        <p>Anda dapat mengecek detail gejala dengan mengklik <span style="font-weight: bold; color:#17a2b8;">"Lihat Detail"</span></p>
                                        <p>Pastikan untuk memilih gejala sesuai dengan yang di alami oleh Sapi anda
                                        <p>
                                        <p>Kemudian, jika anda sudah memilih semua gejala yang dialami oleh Sapi anda, Silahkan klik tombol <span style="font-weight: bold; color:#17a2b8;">"Konsultasikan"</span></p>

                                    </div>

                                </div>
                                <form role="form" action="hasil_identifikasi.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group row border border-info rounded">
                                        <!-- <label class="col-sm-3 text-right" for="solusi">Pilih Gejala Penyakit :</label> -->
                                        <div class="col-sm-12 p-3">
                                            <h6 style="font-size: 1.05rem;">Pilih gejala yang dialami :</h6>
                                            <table>
                                                <?php
                                                $q_gejala = mysqli_query($koneksi, "SELECT * FROM gejala");

                                                $no = 0;
                                                while ($data = mysqli_fetch_array($q_gejala)) {
                                                    // while ($data = $q_gejala->fetch_array()) {
                                                    $no++; ?>
                                                    <tr class="custom-control custom-switch custom-switch-off custom-switch-on-info">
                                                        <td style="padding: 5px;">
                                                            <input type="checkbox" class="custom-control-input" name="gejala_pilih[]" id="input<?php echo $data['kode_gejala']; ?>" value="<?php echo $data['kode_gejala']; ?>">

                                                            <label class="custom-control-label" style="font-weight: normal;" for="input<?php echo $data['kode_gejala']; ?>">
                                                                <?php echo $no; ?>
                                                                <?= "."; ?>
                                                                <?php echo $data['nama_gejala'];
                                                                ?>
                                                            </label>
                                                        </td>

                                                        <td style="padding: 5px;">

                                                            <a href="javascript:void(0);" class="" style="font-weight: normal; color:#17a2b8;" data-target="#modal<?php echo $data['kode_gejala']; ?>" data-toggle="modal" href="#<?php echo $data['kode_gejala']; ?>"><small>
                                                                    <i class="nav-icon fas fa-info-circle"> Lihat Detail</i>
                                                                </small>
                                                            </a>
                                                            <!-- void 0 buat cancel load page  -->
                                                            <!-- <label class="custom-control-label" style="font-weight: normal;" for="">
                                                           
                                                        </label> -->

                                                            <div class="modal fade" id="modal<?php echo $data['kode_gejala']; ?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header" style="background-color: #17a2b8; color: white;">
                                                                            <h4 class="modal-title">Detail Gejala</h4>
                                                                            <button type="button" style="color: white;" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row mb-2">
                                                                                <div class="col-sm-4" style="border-right: 1px solid #ddd;">
                                                                                    <label class="modal-title">Nama Gejala </label>
                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <p class="modal-title"><?php echo $data['nama_gejala']; ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <div class="col-sm-4" style="border-right: 1px solid #ddd;">
                                                                                    <label class="modal-title">Keterangan Gejala </label>
                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <p class="modal-title"><?php echo $data['keterangan']; ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <div class="col-sm-4">
                                                                                    <label class="modal-title">Gambar Gejala </label>
                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <p class="modal-title"></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-center">
                                                                                <img class="img img-thumbnail " style="height: 212px; width:auto; " src="images/gejala/<?= $data["gambar"]; ?>" onerror="this.src='images/no_image.png'">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            <!-- /.modal -->
                                                        </td>
                                                    </tr>
                                                <?php     } ?>
                                            </table>
                                        </div>

                                    </div>
                            </div>


                            <div class="card-footer">
                                <div class="form-group row d-flex  pl-2 mt-2">
                                    <a href="javascript:void(0);" class="" style="font-weight: normal; color:#17a2b8;" data-target="#konfirmasi" data-toggle="modal" href="#konfirmasi"><small>

                                            <button type="submit" name="konsultasi" class="btn btn-info"> <i class="fa fa-syringe"> </i>&nbsp;Konsultasikan</button>

                                    </a>
                                </div>
                                <div class="modal fade" id="konfirmasi">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #17a2b8; color: white;">
                                                <h4 class="modal-title">Konfirmasi Gejala yang Dipilih</h4>
                                                <button type="button" style="color: white;" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin gejala yang anda pilih sudah sesuai ? </p>

                                                <p>Jika belum yakin maka silahkan klik <b>Batal</b> dan cek kembali data gejala yang dipilih</p>
                                                <p>Jika iya maka silahkan klik tombol <b>Lanjut</b> </p>

                                            </div>
                                            <div class=" modal-footer justify-content-between">
                                                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                                <button class="btn btn-success" type="submit" name="konsultasi">Lanjut</button>

                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>


                            </div>

                        </div>
                        </form>
                    </div>
                </div> <!-- row -->
                <!-- maincarosel -->
            </div>
            <a id="back-to-top" href="#" class="btn btn-info btn-md back-to-top pull-left" role="button" data-toggle="tooltip" data-placement="top" data-original-title="" title="" style="display: none; ">
                <span class="fa fa-angle-up"></span>
            </a>
            <!-- <a id="back-to-top" href="#footer" class="btn btn-info btn-md back-to-bottom pull-left float left" role="button" data-toggle="tooltip" data-placement="top" data-original-title="" title="" style="display: none; margin-bottom: 50px;">
                <span class="fa fa-angle-up"></span>
            </a> -->
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