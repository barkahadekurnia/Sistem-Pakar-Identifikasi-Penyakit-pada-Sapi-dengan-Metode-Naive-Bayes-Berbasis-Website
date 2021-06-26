<?php
session_start();

$_SESSION = [];

session_unset();
session_destroy();

header("location: login.php");
exit;
$sql = "SELECT *, count(id) as pengguna FROM user WHERE username='$username' and password='$password'";
