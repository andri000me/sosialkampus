<?php
include 'koneksi.php';
if (isset($_POST['daftar'])) {
  if (($_POST['nama']=='') or ($_POST['email']=='') or ($_POST['sandi']=='') or ($_POST['jurusan']=='') or ($_POST['hp']=='') or ($_POST['alamat']=='') or ($_POST['tentang']=='') or ($_FILES['image']['name']=='')) {
   echo '<script>alert(\'Pastikan data diri tidak ada yang kosong!\');history.go(-1);';
   echo 'window.location= "daftar.php"';  
   echo '</script>';
  }
  else {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $sandi = md5($_POST['sandi']);
    $jurusan = $_POST['jurusan'];
    $hp = $_POST['hp'];
    $alamat = $_POST['alamat'];
    $tentang = $_POST['tentang'];
    $foto = $_FILES['image']['name'];
    $cari_email = mysql_query("SELECT `email` FROM `tb_user` WHERE `email`='$email'");
    if (mysql_num_rows($cari_email) == 0 ) {
      $sql = "INSERT INTO `tb_user`(`nama`, `email`, `sandi`, `jurusan`, `hp`, `alamat`, `tentang`, `foto`) VALUES ('$nama','$email','$sandi','$jurusan','$hp','$alamat','$tentang','$foto')";
      $tambahdata = mysql_query($sql);
     echo '<script>alert(\'Berhasil mendaftar silahkan login!\');';   
     echo 'window.location= "login.php"'; 
     echo '</script>';  
    }
   else {
     echo '<script>alert(\'Ups.! Email sudah pernah didaftarkan!\');history.go(-1);';
     echo 'window.location= "daftar.php"'; 
     echo '</script>';
    }
    move_uploaded_file($_FILES["image"]["tmp_name"],"ftprofile/".$_FILES["image"]["name"]);
  }
}
?>