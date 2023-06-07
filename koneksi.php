<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'kelas';

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Memeriksa apakah koneksi berhasil
if (!$koneksi) {
  die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
