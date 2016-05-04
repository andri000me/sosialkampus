<?php
session_start();
include 'koneksi.php';
if (!$_SESSION['no']) {
  header('location: login.php');
}
$no = $_SESSION['no'];
$data = mysql_fetch_array(mysql_query("SELECT * FROM `tb_user` WHERE `no_user`='" . $_SESSION['no'] . "'"));
if (isset($_POST['ubah'])) {
  if (($_POST['nama']=='') or ($_POST['email']=='') or ($_POST['jurusan']=='') or ($_POST['alamat']=='') or ($_POST['tentang']=='')) {
    //echo '<script>alert(\'Pastikan data diri tidak ada yang kosong!\');history.go(-1);</script>';
  } else {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    $hp = $_POST['hp'];
    $alamat = $_POST['alamat'];
    $tentang = $_POST['tentang'];
    $update = mysql_query("UPDATE `tb_user` SET `nama`='$nama',`email`='$email',`jurusan`='$jurusan',`hp`='$hp',`alamat`='$alamat',`tentang`='$tentang' WHERE `no_user`='" .$_SESSION['no']. "'");
    echo '<script>alert(\'Profile berhasil diubah!\');';
    echo 'window.location= "profile.php"'; 
    echo '</script>';
  }
}
?>