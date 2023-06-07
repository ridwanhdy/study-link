<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelas.io</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
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
              <a class="nav-link" href="#download">Daftar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="pendaftaran d-flex justify-content-center">
      <div class="row col-md-5">
        <div class="card" style="width: 30em;">
          <div class="card-header text-center">
            Login Admin
          </div>
          <div class="card-body">
            <?php
            include 'koneksi.php';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              // Mendapatkan nilai yang dikirim melalui form
              $username = $_POST['username'];
              $password = $_POST['password'];

              // Melakukan validasi atau operasi lain yang diperlukan
              $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
              $result = mysqli_query($koneksi, $query);

              if (mysqli_num_rows($result) > 0) {
                // Jika username dan password cocok, redirect ke dashboard.php
                header("Location: dashboard.php");
                exit;
              } else {
                // Jika username dan password tidak cocok, tampilkan pesan error
                echo "<div class='alert alert-danger' role='alert'>Username atau password salah!</div>";
              }
            }
            ?>
            <form method="POST">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password">
              </div>
              <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Akhir Container -->
  <script src="js/script.js"></script>
</body>

</html>
