<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: form-login.php");
    exit();
}

// Tangkap input dari form
$judul     = $_POST['judul'];
$kategori  = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];

// Kolom disesuaikan dengan huruf kapital phpMyAdmin (Judul, Kategori, Deskripsi)
$query = "INSERT INTO projects (Judul, Kategori, Deskripsi) VALUES ('$judul', '$kategori', '$deskripsi')";
$result = mysqli_query($conn, $query);

if ($result) {
    $username = $_SESSION['username'];
    $aktivitas = "Menambah project: " . $judul;
    mysqli_query($conn, "INSERT INTO log_aktivitas (Username, Aksi) VALUES ('$username', '$aktivitas')");

    echo "<script>alert('Project berhasil ditambahkan!'); window.location='admin.php';</script>";
} else {
    echo "<script>alert('Gagal menambah project!'); window.location='admin.php';</script>";
}
?>