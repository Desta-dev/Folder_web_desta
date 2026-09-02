<?php
include 'koneksi.php';

$username = "admin"; // Ganti username sesukamu
$password_asli = "admin123"; // Ganti password sesukamu

// Enkripsi password secara otomatis agar aman
$password_terenkripsi = password_hash($password_asli, PASSWORD_DEFAULT);

// Masukkan data ke dalam tabel database
$query = "INSERT INTO admin (username, password) VALUES ('$username', '$password_terenkripsi')";
$proses = mysqli_query($koneksi, $query);

if ($proses) {
    echo "Berhasil! Akun admin sudah tersimpan di database.";
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>