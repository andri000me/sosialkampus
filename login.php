<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $sandi = md5($_POST['sandi']);
  $login = mysql_query("SELECT `no_user`, `nama` FROM `tb_user` WHERE `email`='$email' and `sandi`='$sandi'");
  if(mysql_num_rows($login)=='0'){
    echo '<script>alert(\'Email atau kata sandi salah!\');history.go(-1);</script>';
  } else {
    $data = mysql_fetch_array($login);
    $_SESSION['no'] = $data['no_user'];
    header('location: index.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Selamat Datang di Sosial Kampus - Login atau Daftar</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styles.css"/>
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
    <form class="form-inline" method="post">
      <div class="form-group">
      <label for="exampleInputName2">Email :</label>
      <input name="email" type="email" class="form-control" placeholder="Masukkan Email" />
      </div>
      <div class="form-group">
      <label for="exampleInputName2">Sandi :</label>
      <input name="sandi" type="password" class="form-control" placeholder="Masukkan Sandi"/>
      </div>
      <button type="submit" name="login" class="btn btn-primary">Login</button> <br /> 
    </form> <br/>
    <div>
      <img src="images/bgsoskam.png" class="img-responsive" width="auto"/>
      </div>
  </div>
  </div>
  <!-- memanggil jQueri -->
	<script src="js/jquery-1.11.3.min.js"></script>
	<!-- memanggil javascript bootstrap -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>