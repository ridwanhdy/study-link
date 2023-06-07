<?php
// Panggil file yang diperlukan
require_once 'koneksi.php';

// Cek apakah parameter id tersedia
if (isset($_POST['id'])) {
  $id = $_POST['id'];

  // Ambil data yang diinputkan dari form
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $whatsapp = $_POST['whatsapp'];
  $kelas = $_POST['kelas'];

  // Query untuk update data siswa berdasarkan id
  $query = "UPDATE siswa SET nama = '$nama', email = '$email', whatsapp = '$whatsapp', kelas = '$kelas' WHERE id = '$id'";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // Data berhasil diupdate, redirect ke halaman utama
    header("Location: dashboard.php");
    exit();
  } else {
    // Data gagal diupdate
    echo "Gagal mengupdate data siswa.";
  }
} else {
  // Parameter id tidak tersedia
  echo "Parameter id tidak tersedia.";
}
?>
