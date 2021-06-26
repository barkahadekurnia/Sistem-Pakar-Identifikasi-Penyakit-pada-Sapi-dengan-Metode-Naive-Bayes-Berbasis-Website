<?php
require 'koneksi.php';



// var_dump($data["nama"]);
//cek apakah submit dah di teken? 
if (isset($_POST["submit"])) {
    //pindah sek men enak
    $data = $_POST;

    $usernamelama = $data["usernamelama"];
    $username = $data["username"];
    //cek dlu user ganti username kaga
    if ($usernamelama == $username) {
        //klo sama brati lanjut

        $id = $data["id"];
        $username = $data["username"];
        $nama = $data["nama"];
        $alamat = $data["alamat"];
        $email = $data["email"];
        $level = $data["level"];
        $no_hp = $data["no_hp"];
        $fotoLama = $data["fotoLama"];
        $passwordlama = $data["passwordlama"];
        $password = mysqli_real_escape_string($koneksi, $data["password"]);
        $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

        //cek apakah user piih gbr
        // === 4 artinya ga uplod
        if ($_FILES['foto']['error'] === 4) {
            $foto = $fotoLama;
        } else {
            $foto = upload();
        }

        $sql_pakar = mysqli_query($koneksi, "SELECT * FROM pengguna where id=$id");
        $data_pakar = mysqli_fetch_assoc($sql_pakar);
        if (empty($data['password'])  && empty($data['password2'])) {
            $password = $passwordlama;

            $query = "UPDATE pengguna SET 
            username = '$username',
            password = '$password',
            nama = '$nama',
            alamat = '$alamat',
            email = '$email',     
            no_hp = '$no_hp',            
            foto = '$foto' ,
            kode_level = '$level'
            WHERE id = $id
            ";
            mysqli_query($koneksi, $query);

            if (mysqli_affected_rows($koneksi) > 0) {
                $pakar_berhasil_diubah = 1;
                header("location:../lihat_pakar.php?pakar_berhasil_diubah=" . $pakar_berhasil_diubah);
            } else {
                //username ga di ganti dan pw ga di ganti

                $pakar_berhasil_diubah = 2;
                header("location:../ubah_pakar.php?id=" . $id . "&&pakar_berhasil_diubah=" . $pakar_berhasil_diubah);

                // $pakar_berhasil_diubah = 2;
                // header("location:../lihat_pakar.php?pakar_berhasil_diubah=" . $pakar_berhasil_diubah);
            }
        } elseif (!empty($data['password'])  && !empty($data['password2'])) {

            //cek konfirmasi password
            if ($password == $password2) {

                //enkripsi password
                $password = password_hash($password, PASSWORD_DEFAULT); //hash
                // $password = md5($password); //md5
                $query = "UPDATE pengguna 
                    SET
    
                 username = '$username',
                 password = '$password',
                 nama = '$nama',
                 alamat = '$alamat',
                 email = '$email',     
                 no_hp = '$no_hp',            
                 foto = '$foto' ,
                 kode_level = '$level'
                 WHERE id = $id
                 ";
                mysqli_query($koneksi, $query);


                $pakar_berhasil_diubah = 1;
                header("location:../lihat_pakar.php?pakar_berhasil_diubah=" . $pakar_berhasil_diubah);
            } else {

                echo "<script> alert('Konfirmasi Password tidak sesuai');
                history.go(-1);
                </script> ";
            }
        } else {

            echo "<script> alert('Konfirmasi Password tidak sesuai');
            history.go(-1);
            </script> ";
        }
    } //jika user input username baru
    else {
        //cek dlu username yg mau di ganti udh ada blom di db
        $sql_pakar = mysqli_query($koneksi, "SELECT username FROM pengguna where username='$username'");
        $jumlah_pakar = mysqli_num_rows($sql_pakar);
        if ($jumlah_pakar > 0) //berarti sudah ada di db nih nama yg mau di ganti   
        {
            echo "<script> alert('nama pengguna yang anda masukkan sudah terdaftar, silahkan gunakan username yang lain');
            history.go(-1);
            </script> ";
        } else {
            //jika username blom ada di db maka lanjuttt
            $id = $data["id"];
            $username = $data["username"]; //username isiin username yg di minta user
            $nama = $data["nama"];
            $alamat = $data["alamat"];
            $email = $data["email"];
            $level = $data["level"];
            $no_hp = $data["no_hp"];
            $fotoLama = $data["fotoLama"];
            $passwordlama = $data["passwordlama"];
            $password = mysqli_real_escape_string($koneksi, $data["password"]);
            $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

            //cek apakah user piih gbr
            // === 4 artinya ga uplod
            if ($_FILES['foto']['error'] === 4) {
                $foto = $fotoLama;
            } else {
                $foto = upload();
            }

            $sql_pakar = mysqli_query($koneksi, "SELECT * FROM pengguna where id=$id");
            $data_pakar = mysqli_fetch_assoc($sql_pakar);
            if (empty($data['password'])  && empty($data['password2'])) {
                $password = $passwordlama;

                $query = "UPDATE pengguna SET 
            username = '$username',
            password = '$password',
            nama = '$nama',
            alamat = '$alamat',
            email = '$email',     
            no_hp = '$no_hp',            
            foto = '$foto' ,
            kode_level = '$level'
            WHERE id = $id
            ";
                mysqli_query($koneksi, $query);

                if (mysqli_affected_rows($koneksi) > 0) {
                    $pakar_berhasil_diubah = 1;
                    header("location:../lihat_pakar.php?pakar_berhasil_diubah=" . $pakar_berhasil_diubah);
                } else {

                    echo "<script> alert('Konfirmasi Password tidak sesuai');
                    history.go(-1);
                    </script> ";

                    // $pakar_berhasil_diubah = 2;
                    // header("location:../lihat_pakar.php?pakar_berhasil_diubah=" . $pakar_berhasil_diubah);
                }
            } elseif (!empty($data['password'])  && !empty($data['password2'])) {

                //cek konfirmasi password
                if ($password == $password2) {

                    //enkripsi password
                    $password = password_hash($password, PASSWORD_DEFAULT); //hash
                    // $password = md5($password); //md5
                    $query = "UPDATE pengguna 
                    SET
    
                 username = '$username',
                 password = '$password',
                 nama = '$nama',
                 alamat = '$alamat',
                 email = '$email',     
                 no_hp = '$no_hp',            
                 foto = '$foto' ,
                 kode_level = '$level'
                 WHERE id = $id
                 ";
                    mysqli_query($koneksi, $query);


                    $pakar_berhasil_diubah = 1;
                    header("location:../lihat_pakar.php?pakar_berhasil_diubah=" . $pakar_berhasil_diubah);
                } else {

                    echo "<script> alert('Konfirmasi Password tidak sesuai');
                    history.go(-1);
                    </script> ";
                }
            } else {

                echo "<script> alert('Konfirmasi Password tidak sesuai');
                history.go(-1);
                </script> ";
            }
        }
    }
}


function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];
    //cek $_FILES pke var_dump
    //cek apakah tdk ada foto di uplod
    if ($error === 4) {
        echo "<script>
                alert('pilih foto terlebih dahulu!');
                history.go(-1);
                </script> 
                    ";
        return false;
    }

    //cek apakah yg diupload adalah foto
    $ekstensifotoValid = ['jpg', 'jpeg', 'png'];
    //misahin ekstensi dan nama file
    $ekstensifoto = explode('.', $namaFile);
    $ekstensifoto = strtolower(end($ekstensifoto));
    //strtolower = buat ubah karakter ke kecil > paksa
    if (!in_array($ekstensifoto, $ekstensifotoValid)) {
        echo "<script> 
        alert ('yg anda upload bukan foto'); 
        history.go(-1);
        </script>";
        return false;
    }

    //cek jika ukurannya trlalu besar >1mb
    if ($ukuranFile > 1000000) {
        echo "<script> 
        alert ('ukuran foto anda terlalu besar'); 
        history.go(-1);
        </script>";
        return false;
    }

    //kalo lolos pengecekan diatas > foto siap diupload
    // bikin nama foto baru > nama random di DB
    // .= itu buat gabungin 2 inisiasi
    //ambil data time
    // $namaFileBaru = round(microtime(true));
    // $namaFileBaru = date('d-m-Y');
    //uniqid fungsi inisiasi nama random
    // $namaFileBaru =  uniqid();

    global $username;
    date_default_timezone_set('Asia/Jakarta');
    $namaFileBaru = $username;
    $namaFileBaru .= date('-d-m-Y-h-i-s');
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensifoto;

    global $fotoLama;
    unlink('../images/pengguna/' . $fotoLama);
    move_uploaded_file($tmpName, '../images/pengguna/' . $namaFileBaru);


    return $namaFileBaru;
}
