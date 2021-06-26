<?php

require 'aksi/koneksi.php';

$kode_artikel = $_GET['kode_artikel'];

$sql_artikel = mysqli_query($koneksi, "SELECT*,DATE_FORMAT(waktu_tambah,'%e %M %Y') as waktu_tambah FROM artikel where kode_artikel='$kode_artikel'"); // ganti format waktu yg di db ke tanggal bulan taun
$data = mysqli_fetch_assoc($sql_artikel);
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
    <!-- <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v9.0" nonce="eNWdglWj"></script> -->
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark navbar-info fixed-top">
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
            <div class="container">
                <div class="row">
                    <div class="col-sm-12  ">
                        <div class="card" style="margin-top: 2rem;">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-8 pb-2" style=" border-bottom: 1px solid #dee2e6;">
                                        <h2 class=""><?= $data["judul_artikel"]; ?> </h2>
                                        <p class="text-muted"><small>&nbsp;<?php echo $data['nama_penulis'] ?> |
                                                <?php echo " " . $data['waktu_tambah']; ?></small>
                                        </p>
                                        <div class="text-center pt-2">
                                            <img class="profile-user-img img-fluid" style="width: 350px;height-max: 300px;" src="images/artikel/<?= $data["gambar"]; ?>" onerror="this.src='images/no_image.png'">

                                        </div>
                                        <p class="text-center font-italic font-smaller"><small><?= $data["judul_artikel"]; ?> </small></p>

                                        <p class="text"><?= $data["isi_artikel"]; ?></p>
                                        <a href="artikel.php">
                                            <button type="button" class="btn btn-secondary float-right">Kembali</button>
                                        </a>

                                    </div>
                                    <div class="col-sm-12 col-md-4 " style="border-left: 1px solid #dee2e6;">
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

                                <!-- <div class="row mt-3">
                                    <div class="col-sm-12 col-md-8">
                                        <div id="disqus_thread" style="width:100%; padding: 15px; "></div>
                                        <script type="text/javascript">
                                            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                                            var disqus_shortname = 'uye'; // required: replace example with your forum shortname

                                            /* * * DON'T EDIT BELOW THIS LINE * * */
                                            (function() {
                                                var dsq = document.createElement('script');
                                                dsq.type = 'text/javascript';
                                                dsq.async = true;
                                                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                            })();
                                        </script>
                                        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                        <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
                                    </div>
                                </div> -->
                            </div>
                        </div>


                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->




            </div>
        </div> <!-- row -->

        <!-- maincarosel -->
    </div>
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