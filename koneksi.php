<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "portofolio_desta"; // Sesuaikan jika nama database-mu di phpMyAdmin berbeda

$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>