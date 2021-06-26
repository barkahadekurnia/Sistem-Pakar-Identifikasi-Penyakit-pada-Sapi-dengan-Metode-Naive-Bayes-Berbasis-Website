<?php
require 'aksi/koneksi.php';

//ambil data di URL
$id = $_GET["id"];
// var_dump($id);
//query data  mhs berdasarkan id 
//siapin lemari data buat plih baju xD
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
//[0] buat ambil indeks pertama dari function query
$data = query("SELECT * FROM gejala WHERE id=$id")[0];

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
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- cssku -->
    <link rel="stylesheet" href="assets/cssku/style-main.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        td {
            border: 1px dashed #ddd !important;
        }
    </style>
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

                            <a href="data_gejala.php" class="nav-link">
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
                            <h1>Detail Gejala</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <?php $date = date('l , d M Y');
                                echo "$date"; ?>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-virus"></i>
                                        &nbsp;
                                        Gambar Gejala

                                    </h3>
                                </div>
                                <div class="card-body overflow-hidden" style="height: 420px;">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid" style="width:auto;height:300px" src="images/gejala/<?= $data["gambar"]; ?>" onerror="this.src='images/no_image.png'">
                                    </div>
                                    <!-- <h3 class="profile-username text-center">Gejala</h3>
                                    <p class="text-muted text-center">Detail</p> -->
                                    <div class="text-center mt-3">
                                        <a href="ubah_penyakit.php?id=<?= $id; ?>" class=" text-center btn btn-info">
                                            <i class="fas fa-edit"></i>
                                            Ubah Data Penyakit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=col-8>
                            <div class="card card-info ">

                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-info"></i>
                                        &nbsp;
                                        Detail Gejala

                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body  overflow-auto" style="height: 420px;">
                                    <!-- <div class="row">
                                        <div class="col-2">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item pt-3 pb-3">
                                                    <b>Kode Gejala</b>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Nama Gejala</b>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Keterangan</b>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="col-10">
                                            <ul class="list-group list-group-unbordered">
                                                <li class=" list-group-item">
                                                    <?= $data["kode_gejala"]; ?>
                                                </li>
                                                <li class="list-group-item">
                                                    <?= $data["nama_gejala"]; ?>
                                                </li>
                                                <li class="list-group-item">
                                                    <?= $data["keterangan"]; ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:left; height: 290px">
                                            <table class="table justify-content-center" style="width: 100%; height: 100%;">
                                                <tr class="row">
                                                    <td class="col-md-2" style="border-left: 0px !important">Kode Gejala</td>
                                                    <td class="col-md-10 col-lg-10 col-xs-12" style="border-right: 0px !important"><?php echo $data['kode_gejala']; ?></td>
                                                </tr>
                                                <tr class="row">
                                                    <td class="col-md-2" style="border-left: 0px !important">Gejala</td>
                                                    <td class="" style="border-right: 0px !important"><?php echo $data['nama_gejala']; ?></td>
                                                </tr>
                                                <tr class="row">
                                                    <td class="col-md-2 col-lg-2 col-xs-2" style="border-left: 0px !important">Detail Gejala</td>
                                                    <td class="col-md-10 col-lg-10 col-xs-12" style="border-right: 0px !important"><?php echo $data['keterangan']; ?></td>
                                                </tr>
                                                <tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- 
                                    pke tabel -->
                                <!-- 
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><b>Kode Gejala</b></td>
                                                        <td><?= $data["kode_gejala"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Nama Gejala</b></td>
                                                        <td><?= $data["nama_gejala"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Keterangan</b></td>
                                                        <td><?= $data["keterangan"]; ?></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div> -->
                            </div>
                        </div>

                        </di>
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
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>


</body>

</html>