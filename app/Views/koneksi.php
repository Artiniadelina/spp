<?php
// Koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'webspp');

// Cek koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Jika perlu, set karakter set
mysqli_set_charset($conn, "utf8");

// Jika Anda ingin melakukan query dan lainnya, lanjutkan di sini

// Menutup koneksi setelah selesai (opsional)
// mysqli_close($conn);
?>
