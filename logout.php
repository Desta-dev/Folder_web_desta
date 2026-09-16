<?php
session_start();
include 'koneksi.php';

// 1. Jika pengguna sudah login, catat aktivitas "Logout" ke database
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $log_query = "INSERT INTO log_aktivitas (username, aksi) VALUES ('$username', 'Logout')";
    mysqli_query($conn, $log_query);
}

// 2. Hancurkan tiket masuk (session)
session_unset();
session_destroy();

// 3. Kembalikan pengguna ke halaman website utama
echo "<script>alert('Anda telah berhasil keluar!'); window.location='index.html';</script>";
?>