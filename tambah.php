<?php
// Panggil file yang diperlukan
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $whatsapp = $_POST['whatsapp'];
    $kelas = $_POST['kelas'];

    // Query untuk menambahkan data siswa
    $query = "INSERT INTO siswa (nama, email, whatsapp, kelas) VALUES ('$nama', '$email', '$whatsapp', '$kelas')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Data siswa berhasil ditambahkan.";
    } else {
        echo "Gagal menambahkan data siswa: " . mysqli_error($koneksi);
    }
}
?>
