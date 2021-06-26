<?php
require_once 'koneksi.php';
$id = $_GET['id'];

$sql = "SELECT * FROM user where id='$id'";
$querydeletegambar = mysqli_query($koneksi, $sql);
$carigambar = mysqli_fetch_array($querydeletegambar);
$gmbr = $carigambar['foto'];
$tmpfile = "../images/user/$gmbr";

if (isset($_POST['simpan'])) {
  $username = $_POST['username'];
  //Mengecek Username
  $username_lama = $carigambar['username'];
  if ($username_lama == $username) {
    $username = $_POST['username'];

    // jika gambar tidak dirubah
    if (empty($_POST['photo'])) {
      $new_name = $gmbr;
    } else {
      unlink($tmpfile);
      $new_name = $carigambar['id_user'] . time() . '.jpg';
    }

    $nama1 = $_POST['nama1'];
    $nama2 = $_POST['nama2'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $password_1 = $_POST['Password_1'];
    $password_2 = $_POST['Password_2'];


    if (empty($_POST['Password_1']) && (empty($_POST['Password_2']))) {

      $password = $carigambar['password'];
      $file = 'photo'; //name pada inputan type file
      $dir = '../images/user/';
      $width = 400; //satuan dalam pixel / px
      UploadImageResize($new_name, $file, $dir, $width);

      $sql = "UPDATE user set nama1='$nama1',
                                      nama2='$nama2',
                                      username='$username',
                                      email='$email',
                                      password='$password',
                                      waktu_ubah=NOW(),
                                      no_hp='$no_hp',
                                      alamat='$alamat',
                                      foto='$new_name' where id='$id'";
      mysqli_query($koneksi, $sql);
      $u = $id;
      header("location:../profil.php?u=" . $u);
    } else if (!empty($_POST['Password_1'] || !empty($_POST['Password_2']))) {

      if ($password_1 == $password_2) {


        $password = md5($password_2);
        $file = 'photo'; //name pada inputan type file
        $dir = '../images/user/';
        $width = 400; //satuan dalam pixel / px
        UploadImageResize($new_name, $file, $dir, $width);

        $sql = "UPDATE user set nama1='$nama1',
                                          nama2='$nama2',
                                          username='$username',
                                          email='$email',
                                          password='$password',
                                          waktu_ubah=NOW(),
                                          no_hp='$no_hp',
                                          alamat='$alamat',
                                          foto='$new_name' where id='$id'";
        mysqli_query($koneksi, $sql);
        $u = $id;
        header("location:../profil.php?u=" . $u);
      } else {

        $e = "1";
        header("location:../ubah_profil.php?n=" . $id . "&&e=" . $e);
      }
    } else {

      $e = "1";
      header("location:../ubah_profil.php?n=" . $id . "&&e=" . $e);
    }
  } else {
    $sql_cek_username = "SELECT*FROM user where username='$username'";
    $sql_cek_username_jalankan = mysqli_query($koneksi, $sql_cek_username);
    $hasil_cek_username = mysqli_num_rows($sql_cek_username_jalankan);
    if ($hasil_cek_username > 0) {
      $e = 2;
      header("location:../ubah_profil.php?n=" . $id . "&&e=" . $e);
    } else {

      // jika gambar tidak dirubah
      if (empty($_POST['photo'])) {
        $new_name = $gmbr;
      } else {
        unlink($tmpfile);
        $new_name = $carigambar['id_user'] . time() . '.jpg';
      }

      $nama1 = $_POST['nama1'];
      $nama2 = $_POST['nama2'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $no_hp = $_POST['no_hp'];
      $alamat = $_POST['alamat'];
      $password_1 = $_POST['Password_1'];
      $password_2 = $_POST['Password_2'];
      if (empty($_POST['Password_1']) && (empty($_POST['Password_2']))) {

        $password = $carigambar['password'];
        $file = 'photo'; //name pada inputan type file
        $dir = '../images/user/';
        $width = 400; //satuan dalam pixel / px
        UploadImageResize($new_name, $file, $dir, $width);

        $sql = "UPDATE user set nama1='$nama1',
                                      nama2='$nama2',
                                      username='$username',
                                      email='$email',
                                      password='$password',
                                      waktu_ubah=NOW(),
                                      no_hp='$no_hp',
                                      alamat='$alamat',
                                      foto='$new_name' where id='$id'";
        mysqli_query($koneksi, $sql);
        $u = $id;
        header("location:../profil.php?u=" . $u);
      } else if (!empty($_POST['Password_1'] || !empty($_POST['Password_2']))) {

        if ($password_1 == $password_2) {


          $password = md5($password_2);
          $file = 'photo'; //name pada inputan type file
          $dir = '../images/user/';
          $width = 400; //satuan dalam pixel / px
          UploadImageResize($new_name, $file, $dir, $width);

          $sql = "UPDATE user set nama1='$nama1',
                                          nama2='$nama2',
                                          username='$username',
                                          email='$email',
                                          password='$password',
                                          waktu_ubah=NOW(),
                                          no_hp='$no_hp',
                                          alamat='$alamat',
                                          foto='$new_name' where id='$id'";
          mysqli_query($koneksi, $sql);
          $u = $id;
          header("location:../profil.php?u=" . $u);
        } else {

          $e = "1";
          header("location:../ubah_profil.php?n=" . $id . "&&e=" . $e);
        }
      } else {

        $e = "1";
        header("location:../ubah_profil.php?n=" . $id . "&&e=" . $e);
      }
    }
  }
} else {
  echo "hmmmm ada yang salah nich";
}
