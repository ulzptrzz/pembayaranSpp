<?php
$host = "localhost";
$user = "root";
$password = "auli@p98";
$dbname = "spp_crud";

// Koneksi ke database
$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
