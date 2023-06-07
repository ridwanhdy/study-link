<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelas.io</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <style>
    .pesan-terima-kasih {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #fff;
      padding: 20px;
      border: 1px solid #ccc;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>

<body>
  <!-- Container -->
  <header id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><img src="img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#kerjasama">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="pendaftaran d-flex justify-content-center">
      <div class="row col-md-5">
        <div class="card" style="width: 30em;">
          <div class="card-header text-center">
            Silahkan Mendaftar
          </div>
          <div class="card-body">
            <?php
            include 'koneksi.php';

            $show_form = true; // Menandakan apakah form harus ditampilkan atau tidak

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              // Memeriksa apakah tombol "Daftar" telah diklik
              if (isset($_POST['daftar'])) {
                // Mendapatkan nilai yang dikirim melalui form
                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $whatsapp = $_POST['whatsapp'];
                $kelas = $_POST['kelas'];

                // Melakukan validasi atau operasi lain yang diperlukan
                $query = "INSERT INTO siswa (nama, email, whatsapp, kelas) VALUES ('$nama', '$email', '$whatsapp', '$kelas')";
                mysqli_query($koneksi, $query);

                $show_form = false; // Tidak menampilkan form setelah berhasil mendaftar
            ?>

                <div class="pesan-terima-kasih text-center">
                  <h4>Terima kasih telah mendaftar!</h4>
                  <p>Terima kasih, <?php echo $nama; ?>, telah mendaftar di Kelas.io.</p>
                  <p>Data pendaftaran Anda:</p>
                  <ul class="list-unstyled">
                    <li>Nama Lengkap: <?php echo $nama; ?></li>
                    <li>Alamat Email: <?php echo $email; ?></li>
                    <li>Nomor Whatsapp: <?php echo $whatsapp; ?></li>
                    <li>Kelas: <?php echo $kelas; ?></li>
                  </ul>
                </div>
            <?php
              }
            }

            if ($show_form) { // Menampilkan form jika $show_form bernilai true
            ?>
              <form method="POST">
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama lengkap">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan email">
                </div>
                <div class="form-group">
                  <label for="whatsapp">Nomor Whatsapp</label>
                  <input type="tel" name="whatsapp" class="form-control" id="whatsapp" placeholder="Masukkan nomor Whatsapp">
                </div>
                <div class="form-group">
                  <label for="kelas">Pilih Kelas</label>
                  <select name="kelas" class="form-control" id="kelas">
                    <option value="">Pilih Kelas</option>
                    <option value="frontend">Frontend Class</option>
                    <option value="backend">Backend Class</option>
                    <option value="uiux">UI/UX Class</option>
                  </select>
                </div>
                <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
              </form>
            <?php
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Akhir Container -->
  <script src="js/script.js"></script>
</body>

</html>
