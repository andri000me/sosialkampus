<?php
session_start();
include 'koneksi.php';
if (!$_SESSION['no']) {
  header('location: login.php');
}
$data = mysql_fetch_array(mysql_query("SELECT * FROM `tb_user` WHERE `no_user`='" . $_SESSION['no'] . "'"));
if (!$_GET) {
  $profile = mysql_fetch_array(mysql_query("SELECT * FROM `tb_user` WHERE `no_user`='" . $_SESSION['no'] . "'"));
} else {
  $profile = mysql_fetch_array(mysql_query("SELECT * FROM `tb_user` WHERE `no_user`='" . $_GET['id'] . "'"));
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile <?php echo $data['nama']; ?> | Sosial Kampus</title>
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
    <li><a href="profile.php?id=<?php echo $_SESSION['no']; ?>">Profile</a></li>
    <li><a href="cari.php">Cari Teman</a></li>
    <li><a href="keluar.php">Keluar</a></li>
  </div>
  <div class="sidebar" align="center">
    <p>Profile Saya</p>
    <?php 
    echo '<img src="ftprofile/' . $data['foto']. '" width=200px height=220px style=float: left; margin-right: 10px class="img-responsive img-rounded" alt="Responsive image">';
    ?>
    <p>
      <?php
        echo '<a href="profile.php?id=' . $_SESSION['no'] . '">' . $data['nama'] . '</a> <br />';
        echo  $data['tentang'] ;
      ?>
    </p>
  </div>
  <div class="content">
  <p>Profile <?php if ((@$_GET['id']==$_SESSION['no']) or (!@$_GET['id'])) { echo '| <a class="btn btn-default" href="edit_profile.php" role="button">Edit Profile</a> <a class="btn btn-default" href="edit_foto.php" role="button">Ganti Foto</a> <a class="btn btn-default" href="edit_sandi.php" role="button">Ganti Sandi</a>' ; }?></p>
  <table align="center">
    <tr> 
   <td rowspan="5" width="210px">
   <?php echo '<img src="ftprofile/' . $profile['foto']. '" width=200px height=150px style=float: left; margin: 20px class="img-responsive img-thumbnail" alt="Responsive image">';?>
   </td>
  </tr>
  </table> <br />  
  <table class="table table-condensed" align="right">
  <tr>
  <td></td>
  <td><p><b>Nama Lengkap</b> </td>
  <td><?php echo $profile['nama'] ?></p></td>
  </tr>
  <tr>
  <td></td>
  <td><p><b>Jurusan</b> </td> 
  <td><?php echo $profile['jurusan'] ?></p></td>
  </tr>
  <tr>
  <td></td>
  <td><p><b>Nomor HP / Telpon</b> </td>
  <td><?php echo $profile['hp'] ?></p></td>
  </tr>
  <tr>
  <td></td>
  <td><p><b>Alamat Lengkap</b> </td>
  <td><?php echo $profile['alamat'] ?></p></td>
  </tr>
  <tr>
  <td></td>
  <td><p><b>Tentang</b> </td>
  <td><?php echo $profile['tentang'] ?></p></td>
  </tr>
  </table>
  </div>
  </div>
  <!-- memanggil jQueri -->
	<script src="js/jquery-1.11.3.min.js"></script>
	<!-- memanggil javascript bootstrap -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>