<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi | Sosial Kampus</title>
  <link rel="stylesheet" type="text/css" href="styles.css"/>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images/icon.png" type="image/x­icon" />
</head>
<body>
  <div class="container">
  <div class="header">
    <img src="images/logo.png" class='img-responsive'/>
  </div>
  <div class="navigasi">
    <li><a href="index.php">Home</a></li>
  </div>
  <div class="sidebar">
    <p>Anda harus registrasi untuk bisa menggunakan Sosial Kampus!</p>
    <a href="daftar.php" class="btn btn-primary btn-lg active" role="button">Daftar Sekarang!</a>
  </div>
  <div class="content">
    <div class="title-form-daftar">Masukkan data diri</div>
    <form method="post" action="pros_daftar.php" enctype="multipart/form-data">
      <div class="col-xs-4">
        <br />
        <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" />
        <br />
        <input class="form-control" type="email" name="email" placeholder="Email" />
        <br />
        <input class="form-control" type="password" name="sandi" placeholder="Password" />
        <br />
        <input class="form-control" type="text" name="jurusan" placeholder="Jurusan" />
        <br />
        <input class="form-control" type="text" name="hp" placeholder="Nomor HP / Telpon" />
        <br />
        <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap"></textarea>
        <br />
        <textarea class="form-control" name="tentang" placeholder="Tentang Saya"></textarea>
        <br />
        <p>Foto :</p>
        <input name="image" type="file" id="image" size="90" maxlength="50" />
        <br />
        <p><button class="btn btn-primary btn-lg" type="submit" name="daftar">Daftar</button>
        <br />
        Sudah memiliki akun ? <a href="login.php">Masuk</a></p>
    </div>
    </form>
  </div>
  </div>
  <!-- memanggil jQueri -->
	<script src="js/jquery-1.11.3.min.js"></script>
	<!-- memanggil javascript bootstrap -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>