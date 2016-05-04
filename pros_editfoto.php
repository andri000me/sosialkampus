<?php
session_start();
include 'koneksi.php';
if (!$_SESSION['no']) {
  header('location: login.php');
}
$no = $_SESSION['no'];
$data = mysql_fetch_array(mysql_query("SELECT * FROM `tb_user` WHERE `no_user`='" . $_SESSION['no'] . "'"));
if (isset($_POST['ubah'])) {
  if (($_FILES['image']['name']=='')) {
    echo '<script>alert(\'Pastikan foto anda tidak kosong!\');history.go(-1);</script>';
  } else {
    $foto = $_FILES['image']['name'];
    $update = mysql_query("UPDATE `tb_user` SET `foto`='$foto' WHERE `no_user`='" .$_SESSION['no']. "'");
    echo '<script>alert(\'Foto Profile berhasil diubah!\');';
    echo 'window.location= "profile.php"'; 
    echo '</script>';
  }
   move_uploaded_file($_FILES["image"]["tmp_name"],"ftprofile/".$_FILES["image"]["name"]);
}
?>