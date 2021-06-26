<?php

require 'aksi/koneksi.php';

if (isset($_POST['konsultasi'])) {
    // var_dump($_POST);

    $c = $_POST['gejala_pilih'];


    print_r($c);
    var_dump($c);
    foreach ($c  as $cuk) {
        echo $cuk;
    }





    //     $co = count($c);
    //     echo $co;

    //     $i = 0;
    //     while ($co > $i) {

    //         echo $c[$i];

    //         $i++;
    //     }


}
