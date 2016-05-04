<?php
session_start();
include 'koneksi.php';
if (!$_SESSION['no']) {
  header('location: login.php');
}
$no = $_SESSION['no'];
$data = mysql_fetch_array(mysql_query("SELECT * FROM `tb_user` WHERE `no_user`='" . $_SESSION['no'] . "'"));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profile | Sosial Kampus</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" type="text/css" href="styles.css"/>
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
    echo '<img src="ftprofile/' . $data['foto']. '" width=200px height=220px style=float: left; margin-right: 10px class="img-responsive img-rounded" alt=Responsive image>';
    ?>
    <p>
      <?php
        echo '<a href="profile.php?id=' . $_SESSION['no'] . '">' . $data['nama'] . '</a> <br />';
        echo  $data['tentang'] ;
      ?>
    </p>
  </div>
  <div class="content">
    <form method="post" action="pros_editprof.php" enctype="multipart/form-data"> 
    <?php
      $data = mysql_fetch_assoc(mysql_query("SELECT * FROM `tb_user` WHERE `no_user`='$no'"));
        echo '<div class="col-xs-4">';
        echo '<p>Nama Lengkap :</p>';
        echo '<input type="text" name="nama" class="form-control"  placeholder="Nama Lengkap" value="' .$data['nama']. '" />';
        echo '<p>Email :</p>';
        echo '<input type="email" name="email" class="form-control" placeholder="Email" value="' .$data['email']. '" />';
        echo '<p>Jurusan :</p>';
        echo '<input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value="' .$data['jurusan']. '" />';
        echo '<p>Nomor HP / Telpon:</p>';
        echo '<input type="text" name="hp" class="form-control" placeholder="Nomor HP / Telpon" value="' .$data['hp']. '" />';
        echo '<p>Alamat :</p>';
        echo '<textarea name="alamat" class="form-control" placeholder="Alamat Lengkap">' .$data['alamat']. '</textarea>';
        echo '<p>Tentang Saya :</p>';
        echo '<textarea name="tentang" class="form-control" placeholder="Tentang Saya">' .$data['tentang']. '</textarea>'; 
      ?><br />
      <p><button type="submit" name="ubah" class="btn btn-primary">Ubah</button> <a class="btn btn-danger" href="profile.php?id=<?php echo $_SESSION['no']?>" role="button">Batal</a></p>
      </div> 
    </form>
    </div>
  </div>
</body>
</html>