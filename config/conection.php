<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_web_php";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}