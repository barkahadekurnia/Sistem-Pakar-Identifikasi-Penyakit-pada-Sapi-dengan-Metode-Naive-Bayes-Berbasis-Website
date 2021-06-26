<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
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
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- CSS main -->
    <link rel="stylesheet" href="assets/cssku/style-main.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aladin&display=swap" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav clearfix">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark navbar-info fixed-top ">
            <div class="container">
                <!-- <div class="row">
                    <div class="col-2"></div> -->
                <a href="index.php" class="navbar-brand m-0 p-0">
                    <img src="images/favicon.ico" alt="Dokter Sapi Logo" class="brand-image img-circle elevation-3" style="opacity: 1; margin-top: -1.15rem;">
                    <span class="brand-text font_logo"> Dokter Sapi</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3 " id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-link font_navbar text-uppercase active" href="#" for="index" id="index">Beranda</a>
                        <a class="nav-link font_navbar text-uppercase" href="konsultasi.php">Konsultasi</a>
                        <a class="nav-link font_navbar text-uppercase" href="artikel.php" for="artikel">Artikel</a>
                        <a class="nav-link font_navbar text-uppercase" href="index.php#bantuan" for="bantuan">Bantuan</a>
                        <a class="nav-link font_navbar text-uppercase" href="index.php#tentang" for="tentang">Tentang</a>
                        <!-- <a class="nav-link font_navbar text-uppercase" href="index.php#saran" for="saran">Saran</a> -->
                        <a class="nav-link font_navbar text-uppercase" href="login.php">Masuk</a>
                    </div>
                    <!-- <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index3.html" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                    </ul> -->
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper mt-lg-5" style="margin-top: 75px !important;">
            <!-- Content Header (Page header) -->
            <div class="content-header p-0">
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h3 class="display-1">Selamat Datang di Sistem Pakar identifikasi Penyakit Sapi</h3>
                    <h3 class="display-2">Sapi Anda Sakit ?</h3>
                    <p class="lead1">Ayo identifikasi penyakit sapi anda</p>
                    <p class="lead2">dan Temukan Solusi Penanganannya</p>
                    <a href="konsultasi.php">
                        <button class="btn btn-info mt-4 mb-5">
                            <span class="fa fa-syringe nav-icon"></span>&nbsp;Konsultasi</button>
                    </a>
                </div>
            </div>
            <div class="content">

                <!-- bantuan -->
                <div class="container" style="padding-top: 5rem; padding-bottom:15rem;" id="bantuan">
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

                                        <div class="col-sm-4 p-3" style="border-left: 1px solid rgb(0,0,0,.125); border-right: 1px solid rgb(0,0,0,.125);">
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
                                                <img class="img-thumbnail" src="images/bantuan/simpanhasilidentifikasi.png" style="height:250px; display:block;border: 0px;">
                                            </div>

                                            <p> Setelah melakukan identifikasi Penyakit Sapi,
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
                <!-- tentang -->
                <div class="container" style="padding-top: 5rem; padding-bottom:15rem;" id="tentang">
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
                                    <h3 class="widget-user-username">Barkah Ade Kurnia</h3>
                                    <h5 class="widget-user-desc">Administrator</h5>
                                </div>

                                <a href="https://www.linkedin.com/in/barkah-ade-kurnia-7b13561a1/">
                                    <div class="widget-user-image ">
                                        <img class="img-circle  elevation-2" src="images/kami/ade.jpg" alt="User Avatar">
                                    </div>
                                </a>

                                <div class="card-body">
                                    <ul class="nav flex-column mt-3 ml-4 mb-0 fa-ul text-muted">
                                        <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-id-badge"></i></span>Mahasiswa Teknik Informatika <br>Sistem Cerdas <br> Universitas Jenderal Soedirman</li>
                                        <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-user-graduate"></i></span>- S-1 Universitas Jenderal Soedirman<br>&nbsp;</li>
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
                                    <h3 class="widget-user-username">Ipung Permadi, S.Si., M.Cs.</h3>
                                    <h5 class="widget-user-desc">Pembimbing</h5>
                                </div>

                                <a href="https://scholar.google.co.id/citations?user=ADbpFd4AAAAJ&hl=id">
                                    <div class="widget-user-image ">
                                        <img class="img-circle elevation-2" src="images/kami/ipung.jpg" alt="User Avatar">
                                    </div>
                                </a>

                                <div class="card-body">
                                    <ul class="nav flex-column mt-3 ml-4 mb-0 fa-ul text-muted">
                                        <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-id-badge"></i></span>Dosen Teknik Informatika <br>Kecerdasan Buatan <br>Universitas Jenderal Soedirman</li>
                                        <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-user-graduate"></i></span>- S-1 Universitas Jenderal Soedirman <br>- S-2 Universitas Gajah Mada</li>
                                        <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-map-marked-alt"></i></span>Kampus Teknik Unsoed Jl. Raya Mayjen Sungkono No.KM 5</li>
                                        <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-phone"></i></span>WA : 085228840991</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-info">
                                    <h3 class="widget-user-username">Drh. Sufiriyanto, M.P.</h3>
                                    <h5 class="widget-user-desc">Pembimbing / Pakar Sapi</h5>
                                </div>
                                <a href="http://fapet.unsoed.ac.id/tenaga-pendidik/sufiriyanto">
                                    <div class="widget-user-image ">
                                        <img class="img-circle elevation-2" src="images/kami/sufiriyanto_putih.png" alt="User Avatar">
                                    </div>
                                </a>
                                <div class="card-body">
                                    <ul class="nav flex-column mt-3 ml-4 mb-0 fa-ul text-muted">
                                        <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-id-badge"></i></span>Dosen Ilmu Peternakan <br>Kajian Ternak <br>Universitas Jenderal Soedirman</li>
                                        <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-user-graduate"></i></span>- S-1 Universitas Gajah Mada <br>- S-2 Universitas Gajah Mada</li>
                                        <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-map-marked-alt"></i></span>Fakultas Pertanian UNSOED | Jl. DR. Soeparno No.63 Biodata
                                        </li>
                                        <li class="nav-link medium"><span class="fa-li"><i class="fas fa-md fa-phone"></i></span>WA : 081229982626</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row -->
                    <!-- maincarosel -->
                </div>
                <!-- saran -->
                <!-- <div class="container" id="saran" style="padding-top: 5rem;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center">
                                <h2 class="mt-4"><span class="align-self-center ">SARAN</span></h2>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h3 class="mb-4"><span class="text-center font-italic">Berikan Saran dan Masukkan kepada kami agar website kami bisa lebih berkembang kedepannya, Terimakasih.</h5>
                            </div>
                            <div class="card card-info " style="margin-bottom: 13rem;">
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

                                </form>
                            </div>
                        </div>
                    </div>
            
                </div> -->
                <a id="back-to-top" href="#" class="btn btn-info btn-md back-to-top pull-left" role="button" data-toggle="tooltip" data-placement="top" data-original-title="" title="" style="display: none;">
                    <span class="fa fa-angle-up"></span>
                </a>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

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
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>


    <script>
        $(document).ready(function() {
            // Add smooth scrolling to all links
            $("a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 10, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
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
                }, 0);
                return false;
            });

            $('#back-to-top').tooltip('show');
        });
    </script>
    <!-- <script>
        $('.infinite-scroll').jscroll({
            loadingHtml: '<img src="images/ade.png" alt="Loading" /> Loading...',
            padding: 20,
            nextSelector: 'a.jscroll-next:last',
            contentSelector: 'li'
        });

        $('.scroll').jscroll();
    </script> -->
</body>

</html>