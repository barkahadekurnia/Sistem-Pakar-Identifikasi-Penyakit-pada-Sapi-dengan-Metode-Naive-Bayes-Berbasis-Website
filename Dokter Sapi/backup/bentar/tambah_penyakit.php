<?php
include 'aksi/koneksi.php';


$q_gejala = mysqli_query($koneksi, "SELECT*FROM gejala");
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dokter Sapi</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#"> Admin
                        <i class="nav-icon fas fa-caret-square-down"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profil
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="index.php" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="images/favicon-32x32.png" alt="dosa Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">DoSa ~ Dokter Sapi</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Administrator</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav  nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Beranda
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview menu-open">

                            <a href="data_pengguna.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Data Pengguna
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: block;">
                                <li class="nav-item">
                                    <a href="tambah_pengguna.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Tambah Data Pengguna
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="lihat_pengguna.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Lihat Daftar Pengguna
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-open">

                            <a href="data_penyakit.php" class="nav-link">
                                <i class="nav-icon fas fa-disease"></i>
                                <p>
                                    Data Penyakit
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: block;">
                                <li class="nav-item">
                                    <a href="tambah_penyakit.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Tambah Data Penyakit
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="lihat_penyakit.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Lihat Daftar Penyakit
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-open">

                            <a href="data_gejala.php" class="nav-link">
                                <i class="nav-icon fas fa-virus"></i>
                                <p>
                                    Data Gejala
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: block;">
                                <li class="nav-item">
                                    <a href="tambah_gejala.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Tambah Data Gejala
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="lihat_gejala.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Lihat Daftar Gejala
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-open">

                            <a href="data_artikel.php" class="nav-link">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>
                                    Data Artikel
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: block;">
                                <li class="nav-item">
                                    <a href="tambah_artikel.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Tambah Artikel
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="lihat_artikel.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Lihat Daftar Artikel
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="data_saran.php" class="nav-link">
                                <i class="nav-icon fas fa-comment-alt"></i>
                                <p>
                                    Data Saran
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tambah Data Penyakit</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Data Penyakit</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info">

                                <div class="card-header">
                                    <h3 class="card-title">Tambah Data Penyakit</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="aksi/tambah_penyakit.php" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group col-3">
                                            <label for="nama_penyakit">Nama Penyakit:</label>
                                            <input type="text" class="form-control" name="nama_penyakit" id="nama_penyakit" placeholder="Nama Penyakit">
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="nama_latin">Nama Latin:</label>
                                            <input type="text" class="form-control" name="nama_latin" id="nama_latin" placeholder="Nama Latin">
                                        </div>
                                        <div class="form-group col-2">
                                            <div class="input-file">
                                                <label for="gambar">Gambar Penyakit: </label>
                                                <input type="file" name="gambar" id="fupload">
                                            </div>
                                            <div class="form-group col-2">
                                                <label class="control-label" for="gambar"></label>
                                                <div class="" id="hasil" style="width: 100px; height: 100px; display:none;">
                                                    <img class="img-fluid" src="#" id="tampil">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-auto">
                                            <label for="penjelasan">Penjelasan Penyakit:</label>
                                            <textarea required class="textarea" placeholder="Isi Penyakit..." name="penjelasan" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            </textarea>
                                        </div>
                                        <div class="form-group col-auto">
                                            <label for="solusi">Solusi Penanganan Penyakit:</label>
                                            <textarea required class="textarea" placeholder="Isi Penyakit..." name="solusi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            </textarea>
                                        </div>
                                        <div class="form-group col-auto">
                                            <label for="solusi">Pilih Gejala Penyakit:</label>
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


                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" name="submit" class="btn btn-info">Tambah Penyakit</button>
                                        </div>
                                </form>
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Universitas Jenderal Soedirman
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2020 </strong> Sistem Pakar Identifikasi Penyakit Sapi
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->

    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function() {
            // Summernote
            $('.textarea').summernote()
        })
    </script>
    <!-- //view file uplod -->
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#tampil').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#fupload").change(function() {
            readURL(this);
            $('#hasil').show();
        });
    </script>
    <!-- //uplod file
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script> -->
</body>

</html>