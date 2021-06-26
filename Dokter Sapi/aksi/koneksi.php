<?php
$DB_SERVER = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "sispaksapi";

$koneksi = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
if (!$koneksi) {
	die("Connection failed: " . mysqli_connect_error());
}





// //siapin lemari data buat plih baju xD
// function query($query)
// {
// 	global $koneksi;
// 	$result = mysqli_query($koneksi, $query);
// 	$rows = [];
// 	while ($row = mysqli_fetch_assoc($result)) {
// 		$rows[] = $row;
// 	}
// 	return $rows;
// }






	//cara 2

    // function query($query) {
	// 	global $koneksi;
	// 	$result = mysqli_query($koneksi, $query);
	// 	$rows = [];
	// 	while ($row = mysqli_fetch_assoc($result)){
	// 		$rows = $row;
	// 	}
	// 	return $rows;
	// }
	
    // $koneksi=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS) or die ("Maaf, koneksi gagal.");
    // mysqli_select_db ($koneksi,$DB_NAME) or die ("Maaf, basis data tidak ditemukan.");
