<?php
session_start();
require 'aksi/koneksi.php';

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
//ambil data di URL
$id = $_GET["id"];
// var_dump($id);
//query data  mhs berdasarkan id 
//[0] buat ambil indeks pertama dari function query

//siapin lemari data buat plih baju xD
$query = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id=$id");
$data = mysqli_fetch_assoc($query);


if (!isset($_GET['pakar_berhasil_diubah'])) {
    $pakar_berhasil_diubah = 0;
} else {
    $pakar_berhasil_diubah = $_GET['pakar_berhasil_diubah'];
}

// var_dump($data);
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
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- CSS main -->
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
                        <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="dashboard.php" class="nav-link active">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Beranda
                                    </p>
                                </a>
                            </li>
                            <?php if ($_SESSION['level'] == 'Administrator') : ?>
                                <!-- admin -->

                                <li class="nav-item has-treeview">
                                    <a href="data_pakar.php" class="nav-link ">
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
                                    <a href="bantuan_admin.php" class="nav-link">
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
        <!-- end of sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Ubah Data Profil</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="profil.php">Profil</a></li>
                                <li class="breadcrumb-item active">Ubah Profil</li>
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
                                    <h3 class="card-title">Ubah Data Profil</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <form class="form-horizontal" role="form" action="aksi/ubah_profil.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value=" <?= $data["id"]; ?> ">
                                        <input type="hidden" name="fotoLama" value="<?= $data["foto"]; ?>">
                                        <input type="hidden" name="usernamelama" value="<?= $data["username"]; ?>">
                                        <input type="hidden" name="passwordlama" value="<?= $data["password"]; ?>">
                                        <input type="hidden" name="level" value="<?= $data["kode_level"]; ?>">
                                        <div class="form-group row">
                                            <label class="col-sm-3 text-right" for="username"> Username:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Nama Pakar" required value="<?= $data["username"]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 text-right" for="password">Password:</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 text-right" for="password2">Konfirmasi Password:</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi Passowrd">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 text-right" for="nama"><?php if ($_SESSION['level'] == 'Administrator') {
                                                                                                echo "Nama Administrator";
                                                                                            } else {

                                                                                                echo "Nama pakar";
                                                                                            } ?>:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required value="<?= $data["nama"]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 text-right" for="alamat">Alamat:</label>
                                            <div class="col-sm-6">
                                                <textarea type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required><?= $data["alamat"]; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 text-right" for="email">Email:</label>
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required value="<?= $data["email"]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 text-right" for="no_hp">Nomor Telepon:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Telepon" required value="<?= $data["no_hp"]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 text-right" for="no_hp">Foto Saat ini:</label>
                                            <div class="col-sm-6">
                                                <img style="height:150px;" src="images/pengguna/<?= $data["foto"]; ?>">
                                            </div>
                                        </div>
                                        <div class=" form-group row">
                                            <label class="col-sm-3 text-right" for="gambar">Ganti Foto: </label>
                                            <div class="form-group col-sm-6">
                                                <div class="input-file">
                                                    <input type="file" name="foto" id="fupload">
                                                </div>
                                                <div class="form-group pt-2 pb-0">
                                                    <label class="control-label" for="gambar"></label>
                                                    <div class="" id="hasil" style="display:none;">
                                                        <img class="img-fluid" style="height: 150px;" src=" #" id="tampil">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-0">
                                                </div>
                                                <div class="col-md-9 col-sm-12">
                                                    <button type="submit" name="submit" class="btn btn-info ">Ubah Data Profil</button>
                                                    <a href="profil.php">
                                                        <button type="button" class="btn btn-secondary float-right">Batal Ubah</button>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

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
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
    <!-- page script -->
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->

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
    <script type="text/javascript">
        $(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });


            var pakar_berhasil_diubah = <?php echo json_encode($pakar_berhasil_diubah); ?>;
            if (pakar_berhasil_diubah == 2) {

                $(function() {
                    Toast.fire({
                        icon: 'error',
                        title: 'Data Profil tidak diubah, Silahkan Coba Lagi!'
                    })
                });
            }



        });
    </script>

    <!-- <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script> -->
</body>

</html>