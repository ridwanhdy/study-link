<?php
// Panggil file yang diperlukan
require_once 'koneksi.php';

// Cek apakah parameter id tersedia
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Query untuk menghapus data siswa berdasarkan id
  $query = "DELETE FROM siswa WHERE id = '$id'";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // Data berhasil dihapus, redirect ke halaman utama
    header("Location: dashboard.php");
    exit();
  } else {
    // Data gagal dihapus
    echo "Gagal menghapus data siswa.";
  }
} else {
  // Parameter id tidak tersedia
  echo "Parameter id tidak tersedia.";
}
?>
