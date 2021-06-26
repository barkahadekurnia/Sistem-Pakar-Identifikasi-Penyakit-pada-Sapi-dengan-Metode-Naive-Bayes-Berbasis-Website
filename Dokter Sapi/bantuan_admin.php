<?php
session_start();

require 'aksi/koneksi.php';

if (!isset($_SESSION['username'])) {
    header('location:login.php');
} else {
    if ($_SESSION['level'] == "Administrator") {
        $status_user = "Administrator";
    } else {
        $status_user = "Pakar";
        header('location:dashboard.php');
    }
}


// echo $status_user;
// var_dump($status_user);

// var_dump($_SESSION);
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Dokter Sapi</title>
    <!-- icon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- cssku -->
    <link rel="stylesheet" href="assets/cssku/style-main.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- navbar sidebar -->
        <section>
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-dark navbar-info bg-color">
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
                        <a class="nav-link" data-toggle="dropdown" href="#"> <?= $_SESSION['nama'] ?>&nbsp;
                            <i class="nav-icon fas fa-caret-square-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <a href="profil.php" class="dropdown-item">
                                <i class="fas fa-user mr-2"></i> Profil
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="aksi/logout.php" class="dropdown-item">
                                <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-info elevation-3">
                <!-- Brand Logo -->
                <div class="container pl-3 bg-color image" style="border-bottom: 1px solid #17a2b8;">
                    <a href="dashboard.php" class="navbar-brand m-0 p-0">
                        <img src="images/favicon.ico" alt="Dokter Sapi Logo" class="brand-image img-circle elevation-3" style="height:36px; opacity: 1; margin-top: -1.15rem;">
                        <span class="brand-text font_sidebar" style="margin-left: 5px;"> Dokter Sapi</span>
                    </a>
                </div>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-bottom: 1px solid #17a2b8;">
                        <div class="image" style="padding-top: 10px!important;">
                            <img src="images/pengguna/<?= $_SESSION['foto'] ?>" class="img-circle elevation-2" alt="User Image" style="width: 2.7rem;height:2.7rem ;">
                        </div>
                        <div class="info">
                            <a href="#" class=""><?= $_SESSION['nama'] ?></a>
                            <a href="#" class="d-block font-italic"><?= $_SESSION['level'] ?></a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column  nav-flat nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="dashboard.php" class="nav-link ">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Beranda
                                    </p>
                                </a>
                            </li>
                            <?php if ($_SESSION['level'] == 'Administrator') : ?>
                                <!-- admin -->

                                <li class="nav-item has-treeview">
                                    <a href="data_pakar.php" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            Data Pakar
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="tambah_pakar.php" class="nav-link">
                                                <i class="fas fa-plus-circle nav-icon" style="font-size: 14px;"></i>
                                                <p style="font-size: 15.5px;">
                                                    Tambah Data Pakar
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="lihat_pakar.php" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon" style="font-size: 14px;"></i>
                                                <p style="font-size: 15.5px;">
                                                    Lihat Daftar Pakar
                                                </p>

                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview">

                                    <a href="data_artikel.php" class="nav-link">
                                        <i class="nav-icon fas fa-newspaper"></i>
                                        <p>
                                            Data Artikel
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="tambah_artikel.php" class="nav-link">
                                                <i class="fas fa-plus-circle nav-icon" style="font-size: 14px;"></i>
                                                <p style="font-size: 15.5px;">
                                                    Tambah Artikel
                                                </p>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="lihat_artikel.php" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon" style="font-size: 14px;"></i>
                                                <p style="font-size: 15.5px;">
                                                    Lihat Daftar Artikel
                                                </p>

                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="lihat_saran.php" class="nav-link">
                                        <i class="nav-icon fas fa-comment-alt"></i>
                                        <p>
                                            Data Saran
                                        </p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="bantuan_admin.php" class="nav-link active">
                                        <i class="nav-icon fas fa-info-circle"></i>
                                        <p>
                                            Bantuan
                                        </p>
                                    </a>
                                </li>

                            <?php else : ?>
                                <!-- pakar -->

                                <li class="nav-item has-treeview">
                                    <a href="data_penyakit.php" class="nav-link">
                                        <i class="nav-icon fas fa-laptop-medical"></i>
                                        <p>
                                            Data Penyakit
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="tambah_penyakit.php" class="nav-link">
                                                <i class="fas fa-plus-circle nav-icon" style="font-size: 14px;"></i>
                                                <p style="font-size: 15.5px;">
                                                    Tambah Data Penyakit
                                                </p>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="lihat_penyakit.php" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon" style="font-size: 14px;"></i>
                                                <p style="font-size: 15.5px;">
                                                    Lihat Daftar Penyakit
                                                </p>

                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="nav-item has-treeview">

                                    <a href="data_gejala.php" class="nav-link">
                                        <i class="nav-icon fas fa-virus"></i>
                                        <p>
                                            Data Gejala
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="tambah_gejala.php" class="nav-link">
                                                <i class="fas fa-plus-circle nav-icon" style="font-size: 14px;"></i>
                                                <p style="font-size: 15.5px;">
                                                    Tambah Data Gejala
                                                </p>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="lihat_gejala.php" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon" style="font-size: 14px;"></i>
                                                <p style="font-size: 15.5px;">
                                                    Lihat Daftar Gejala
                                                </p>

                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="nav-item has-treeview">

                                    <a href="data_artikel.php" class="nav-link">
                                        <i class="nav-icon fas fa-newspaper"></i>
                                        <p>
                                            Data Artikel
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="tambah_artikel.php" class="nav-link">
                                                <i class="fas fa-plus-circle nav-icon" style="font-size: 14px;"></i>
                                                <p style="font-size: 15.5px;">
                                                    Tambah Artikel
                                                </p>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="lihat_artikel.php" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon" style="font-size: 14px;"></i>
                                                <p style="font-size: 15.5px;">
                                                    Lihat Daftar Artikel
                                                </p>

                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="lihat_saran.php" class="nav-link">
                                        <i class="nav-icon fas fa-comment-alt"></i>
                                        <p>
                                            Data Saran
                                        </p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="bantuan_pakar.php" class="nav-link">
                                        <i class="nav-icon fas fa-info-circle"></i>
                                        <p>
                                            Bantuan
                                        </p>
                                    </a>
                                </li>

                            <?php endif; ?>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            <!-- Main Sidebar Container -->
        </section>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Bantuan <?= $_SESSION['level']; ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <?php $date = date('l , d M Y');
                                echo "$date"; ?>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <!-- bantuan -->
                <div class="container-fluid pt-2" id="bantuan">
                    <!-- maintentang -->
                    <div class="row">
                        <!-- bio -->
                        <div class="col-12">
                            <div class="card card-info card-outline collapsed-card">
                                <div class="card-header" data-card-widget="collapse">
                                    <h2 class="float-left"><i>Cara Mengolah Data Profil :</i></h2>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-sm-12 col-md-4 p-3">
                                            <h3 class="">Cara melihat profil anda </h3>
                                            <div class="text-center pb-2">
                                                <img class="img-thumbnail" src="images/bantuan/admin/profil.png" style="height:250px; display:block;border: 0px;">
                                            </div>
                                            <p>Anda dapat melihat profil anda dengan mengklik dropdown anda di pojok kanan atas</p>
                                            <p>Kemudian anda dapat masuk kedalam halaman profil anda dengan menekan tombol profil<a href="profil.php">
                                                    <span style="font-weight: bold; color:#17a2b8;">"Profil"</span></a>yang ada pada menu drowpdown. </p>
                                        </div>
                                        <div class="col-sm-12 col-md-4 p-3" style="border-left: 1px solid rgb(0,0,0,.125); border-right: 1px solid rgb(0,0,0,.125);">
                                            <h3 class="">Cara mengubah data profil anda</h3>
                                            <div class="text-center pb-2">
                                                <img class="img-thumbnail" src="images/bantuan/admin/ubah data profil.png" style="height:250px; display:block;border: 0px;">
                                            </div>
                                            <p>Untuk mengubah data profil anda, anda dapat melakukannya dengan cara menekan tombol

                                                <span style="font-weight: bold; color:#17a2b8;">"Ubah Data Profil"</span> yang ada pada bawah foto anda
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div> <!-- row -->

                </div>
                <!-- bantuan -->
                <div class="container-fluid pt-2" id="bantuan">
                    <!-- maintentang -->

                    <div class="row">
                        <!-- bio -->
                        <div class="col-12">
                            <div class="card card-info card-outline collapsed-card">
                                <div class="card-header" data-card-widget="collapse">
                                    <h2 class="float-left"><i>Cara Mengolah Data Pakar :</i></h2>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-sm-12 col-md-4 p-3">
                                            <h3 class="">Cara menambah data pakar <br> </h3>
                                            <div class="text-center pb-2">
                                                <img class="img-thumbnail" src="images/bantuan/admin/tambah pakar.png" style="height:250px; display:block;border: 0px;">
                                            </div>
                                            <p>Anda dapat menambahkan pakar dengan cara masuk ke halaman tambah pakar<a href="tambah_pakar.php">
                                                    <span style="font-weight: bold; color:#17a2b8;">"Tambah Pakar"</span></a>yang ada pada sidebar disamping. </p>
                                        </div>
                                        <div class="col-sm-12 col-md-4 p-3" style="border-left: 1px solid rgb(0,0,0,.125); border-right: 1px solid rgb(0,0,0,.125);">
                                            <h3 class="">Cara melihat daftar pakar </h3>
                                            <div class="text-center pb-2">
                                                <img class="img-thumbnail" src="images/bantuan/admin/lihat daftar pakar.png" style="height:250px; display:block;border: 0px;">
                                            </div>
                                            <p>Untuk melihat daftar pakar pertama anda bisa menekan menu data pakar yang ada pada sidebar disamping
                                            </p>
                                            <p>Kemudian, masuk kehalaman lihat daftar pakar dengan cara menekan menu
                                                <a href="lihat_pakar.php"><span style="font-weight: bold; color:#17a2b8;">"Lihat daftar Pakar"</span></a> yang ada pada sidebar
                                            </p>
                                        </div>
                                        <div class="col-sm-12 col-md-4 p-3">
                                            <h3 class="">Cara mengubah dan menghapus data pakar</h3>
                                            <div class="text-center pb-2">
                                                <img class="img-thumbnail" src="images/bantuan/admin/ubah dan hapus pakar.png" style="height:250px; display:block;border: 0px;">
                                            </div>
                                            <p>Untuk mengubah dan menghapus data pakar anda bisa melakukannya melalui halaman lihat daftar pakar
                                            </p>
                                            <p>Anda bisa mengubah data pakar dengan cara menekan tombol
                                                <span style="font-weight: bold; color:#17a2b8;">"Ubah"</span> yang ada pada tabel daftar pakar
                                            </p>
                                            <p>Anda bisa menghapus data pakar dengan cara menekan tombol
                                                <span style="font-weight: bold; color:#17a2b8;">"Hapus"</span> yang ada pada tabel daftar pakar
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div>
                <!-- bantuan -->
                <div class="container-fluid pt-2" id="bantuan">
                    <!-- maintentang -->

                    <div class="row">
                        <!-- bio -->
                        <div class="col-12">
                            <div class="card card-info card-outline collapsed-card">
                                <div class="card-header" data-card-widget="collapse">
                                    <h2 class="float-left"><i>Cara Mengolah Data Artikel :</i></h2>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-sm-12 col-md-4 p-3">
                                            <h3 class="">Cara menambah data artikel </h3>
                                            <div class="text-center pb-2">
                                                <img class="img-thumbnail" src="images/bantuan/admin/tambah artikel.png" style="height:250px; display:block;border: 0px;">
                                            </div>
                                            <p>Anda dapat menambahkan artikel dengan cara masuk ke halaman tambah artikel<a href="tambah_artikel.php">
                                                    <span style="font-weight: bold; color:#17a2b8;">"Tambah artikel"</span></a>yang ada pada sidebar disamping. </p>
                                        </div>
                                        <div class="col-sm-12 col-md-4 p-3" style="border-left: 1px solid rgb(0,0,0,.125); border-right: 1px solid rgb(0,0,0,.125);">
                                            <h3 class="">Cara melihat daftar artikel</h3>
                                            <div class="text-center pb-2">
                                                <img class="img-thumbnail" src="images/bantuan/admin/lihat daftar artikel.png" style="height:250px; display:block;border: 0px;">
                                            </div>
                                            <p>Untuk melihat daftar artikel pertama anda bisa menekan menu data artikel yang ada pada sidebar disamping
                                            </p>
                                            <p>Kemudian, masuk kehalaman lihat daftar artikel dengan cara menekan menu
                                                <a href="lihat_artikel.php"><span style="font-weight: bold; color:#17a2b8;">"Lihat daftar artikel"</span></a> yang ada pada sidebar
                                            </p>
                                        </div>
                                        <div class="col-sm-12 col-md-4 p-3">
                                            <h3 class="">Cara mengubah dan menghapus data artikel</h3>
                                            <div class="text-center pb-2">
                                                <img class="img-thumbnail" src="images/bantuan/admin/ubah dan hapus artikel.png" style="height:250px; display:block;border: 0px;">
                                            </div>
                                            <p>Untuk mengubah dan menghapus data artikel anda bisa melakukannya melalui halaman lihat daftar artikel
                                            </p>
                                            <p>Anda bisa mengubah data artikel dengan cara menekan tombol
                                                <span style="font-weight: bold; color:#17a2b8;">"Ubah"</span> yang ada pada tabel daftar artikel
                                            </p>
                                            <p>Anda bisa menghapus data artikel dengan cara menekan tombol
                                                <span style="font-weight: bold; color:#17a2b8;">"Hapus"</span> yang ada pada tabel daftar artikel
                                            </p>
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
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Universitas Jenderal Soedirman
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2020 </strong> Sistem Pakar Identifikasi Penyakit Sapi
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
</body>

</html>