<?php
session_start();
include 'koneksi.php';
if (!$_SESSION['no']) {
  header('location: login.php');
}
$no = $_SESSION['no'];
$data = mysql_fetch_array(mysql_query("SELECT * FROM `tb_user` WHERE `no_user`='" . $_SESSION['no'] . "'"));
if (isset($_POST['ubah'])) {
  if (($_POST['oldpass']=='') or ($_POST['newpass']=='') or ($_POST['connewpass']=='')) {
    echo '<script>alert(\'Pastikan sandi tidak ada yang kosong!\');history.go(-1);</script>';
  } else {
    $oldpass = md5($_POST['oldpass']);
    $newpass = md5($_POST['newpass']);
    $connewpass = md5($_POST['connewpass']);
    if ($data['sandi'] == $oldpass) {
      if ($newpass == $connewpass) {
        mysql_query("UPDATE `tb_user` SET `sandi`='$newpass' WHERE `no_user`='$no'");
        session_destroy();
        echo '<script>alert(\'Kata sandi berhasil diubah. Silahkan login kembali!\');history.go(-1);</script>';
      } else {
        echo '<script>alert(\'Kata sandi baru tidak cocok!\');history.go(-1);</script>';
      }
    } else {
      echo '<script>alert(\'Kata sandi salah!\');history.go(-1);</script>';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Sandi | Sosial Kampus</title>
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
    <form method="post">
    <?php
      $data = mysql_fetch_assoc(mysql_query("SELECT * FROM `tb_user` WHERE `no_user`='$no'"));
        echo '<div class="col-xs-4">';
        echo '<input type="password" name="oldpass" class="form-control" placeholder="Sandi Lama" />';
        echo '<br />';
        echo '<input type="password" name="newpass" class="form-control" placeholder="Sandi Baru" />';
        echo '<br />';
        echo '<input type="password" name="connewpass" class="form-control" placeholder="Ulangi Sandi Baru" />';
        
      ?> <br />
      <p><button type="submit" name="ubah" class="btn btn-primary">Ubah</button> <a class="btn btn-danger" href="profile.php?id=<?php echo $_SESSION['no']?>" role="button">Batal</a></p>
      </div>   
    </form>
  </div>
  </div>
</body>
</html>