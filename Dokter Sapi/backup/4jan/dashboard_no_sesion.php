<?php
require 'aksi/koneksi.php';


?>
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
  <!-- icon -->
  <link rel="shortcut icon" href="images/favicon.ico">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- <link rel="stylesheet" href="assets/cssku/style-admin.css"> -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

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
          <a class="nav-link" data-toggle="dropdown" href="#"> Admin
            <i class="nav-icon fas fa-caret-square-down"></i>

          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="profil.php" class="dropdown-item">
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
    <aside class="main-sidebar sidebar-dark-info elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
        <img src="images/favicon-32x32.png" alt="dosa Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">
          <b>Dokter Sapi</b>
        </span>
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
          <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-flat nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="dashboard.php" class="nav-link active">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Beranda
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="data_pengguna.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Pengguna
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
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
              <a href="lihat_saran.php" class="nav-link">
                <i class="nav-icon fas fa-comment-alt"></i>
                <p>
                  Data Saran
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="bantuan_admin.php" class="nav-link">
                <i class="nav-icon fas fa-comment-alt"></i>
                <p>
                  Bantuan Admin
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="bantuan_pakar.php" class="nav-link">
                <i class="nav-icon fas fa-comment-alt"></i>
                <p>
                  Bantuan Pakar
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
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Beranda Admin</h1>
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
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="">Selamat Datang <?= "admin" ?></h5>

                  <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure maxime laudantium labore in non quia. Iusto aperiam, dolorem laborum eum iure vitae delectus dolorum perspiciatis quis! Consequatur quasi accusantium culpa!
                  </p>
                </div>
              </div>


            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
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