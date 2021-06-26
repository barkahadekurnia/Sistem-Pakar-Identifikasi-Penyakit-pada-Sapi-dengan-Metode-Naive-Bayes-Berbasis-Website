<?php 
error_reporting(0);
@ini_set('upload_max_size', '256M');
include '../config/conn.php';
// disini tambahkan cek autentikasi apakah sudah login atau belum

if(!empty($_POST['nama']) || !empty($_POST['username'])){
    // Simpan data yang di inputkan ke POST ke masing-masing variable
    // dan convert semua tag HTML yang mungkin dimasukkan untuk mengindari XSS
    $id_user = htmlentities($_POST['id_user']);
    $nama = htmlentities($_POST['nama']);
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    $email = htmlentities($_POST['email']);
    $notelp = htmlentities($_POST['notelp']);
    $userpic = htmlentities($_POST['detailFotoSaatIni']);
    
    if (empty($password)) {
        $password = htmlentities($_POST['detailPasswordLama']);
    }
    
    if ($_FILES['foto']['size'] != 0) {
        $imgfile = $_FILES['foto']['name'];
        $tmp_dir = $_FILES['foto']['tmp_name'];
        $imgsize = $_FILES['foto']['size'];
        
        $oldImage = $userpic;
        $upload_dir = '../foto/';
        $imgext = strtolower(pathinfo($imgfile, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg','jpg','png','gif');
        $userpic = rand(1000,1000000).'-'.time().".".$imgext; // time(); => 34567-63218313.png / 13131-19082731931.jpeg
        
        if(in_array($imgext,$valid_extensions)){
            if($imgsize < 5000000){
                move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                // hapus file foto lama
                unlink($upload_dir.$oldImage);
            }else{
                $data=['status'=>false, 'message'=>'Foto tidak boleh lebih dari 5MB'];
                echo json_encode($data);
                return;
            }
        }else{
            $data=['status'=>false, 'message'=>'Maaf, hanya JPG,JPEG,PNG & GIF'];
            echo json_encode($data);
            return;
        }
    }

    // Prepared statement untuk mengubah data
    $query = $db->prepare("UPDATE user SET nama = :nama, username = :username, password = :password, email = :email, no_telp = :notelp, foto = :foto WHERE id_user = :id_user ");
    
    $query->bindParam(":nama", $nama);
    $query->bindParam(":username", $username);
    $query->bindParam(":password", $password);
    $query->bindParam(":email", $email);
    $query->bindParam(":notelp", $notelp);
    $query->bindParam(":foto", $userpic);
    $query->bindParam(":id_user", $id_user);
    // Jalankan perintah SQL
    $query->execute();
    $data=['status'=>true, 'message'=>'Data berhasil diupdate bro'];
    echo json_encode($data);
}else{
    $data=['status'=>false, 'message'=>'Data tidak valid'];
    echo json_encode($data);
}
