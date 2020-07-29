<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_spk";

$con = mysqli_connect($host, $user, $pass, $db) or die("Gagal terhubung");
mysqli_select_db($con, $db) or die("Database tidak tersedia");
?>
