<?php
session_start();
include 'koneksi.php';
if (!$_SESSION['no']) {
  header('location: login.php');
}
$nouser = $_SESSION['no'];
$data = mysql_fetch_array(mysql_query("SELECT * FROM `tb_user` WHERE `no_user`='" . $_SESSION['no'] . "'"));
if (isset($_POST['kirim'])){
  $status = $_POST['status'];
  $tanggal = date('Y-m-d H:i:s');
  mysql_query("INSERT INTO `tb_timeline`(`no_user`, `status`, `tanggal`) VALUES ('$nouser','$status','$tanggal')");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Beranda | Sosial Kampus<?php echo $data['nama']; ?> | Sosial Kampus</title>
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
    <?php echo "<img src="."ftprofile/" . $data["foto"]. " width=200px height=220px style=float: left; margin-right: 10px class='img-responsive img-rounded' alt=Responsive image>";?>
    <p>
      <?php
        echo '<a href="profile.php?id=' . $_SESSION['no'] . '">' . $data['nama'] . '</a> <br />';
        echo  $data['tentang'] ;
      ?>
    </p>
  </div>
  <div class="content">
    <p>Buat Status</p>
    <form method="post">
      <textarea class="form-control" name="status" placeholder="Apa yang anda pikirkan ?" rows="3" cols="50" maxlength="140" ></textarea>
      <br/>
      
    <div class="row">
  <div class="col-md-3 col-md-offset-3"></div>
  <div class="col-md-3 col-md-offset-3"><button type="submit" name="kirim" class="btn btn-primary">Post</button> <span style="color: #555; font-size: 12px">Maksimum 140 huruf</span></div>
</div>
    </form>
    <br/>
    <hr />
    <p>Dinding Status</p>
    <?php
    // Turn off error reporting
    error_reporting(0);
     #PAGINASI
      $batas=5; //satu halaman menampilkan 5 baris
      $halaman=$_GET['halaman'];
      $posisi=null;
      if(empty($halaman)){
        $posisi=0;
        $halaman=1;
      }else{
        $posisi=($halaman-1)* $batas;
      }
    $querystatus = mysql_query("SELECT `tb_timeline`.*,`tb_user`.`no_user`,`tb_user`.`nama`,`tb_user`.`foto` FROM tb_timeline
    LEFT JOIN `tb_user` ON `tb_timeline`.`no_user` = `tb_user`.`no_user` ORDER BY `tb_timeline`.`id_timeline` DESC limit $posisi,$batas");
    while ($data = mysql_fetch_array($querystatus)) {
      echo '<div style="border: 1px solid #DCDCDC; margin-bottom: 10px; padding: 10px;">';
      echo '<img src="ftprofile/' . $data['foto'] . '" width=50px height=50px style="float: left; margin-right: 10px">';
      echo '<a href="profile.php?id=' . $data['no_user'] . '" style="margin-right: 20px">' . $data['nama'] . '</a>' . $data['status'];
      echo '<br /><span style="color: #555; font-size: 12px"><i>' . $data['tanggal'] . '</i></span>';
      echo '<div style="clear: both; margin-bottom: 10px"></div></div>';
    }
    if (mysql_num_rows($querystatus) == 0) {
      echo "Tidak ada status tersimpan!";
    }
  $sql_paging = mysql_query("SELECT `tb_timeline`.*,`tb_user`.`no_user`,`tb_user`.`nama`,`tb_user`.`foto` FROM tb_timeline
    LEFT JOIN `tb_user` ON `tb_timeline`.`no_user` = `tb_user`.`no_user` ORDER BY `tb_timeline`.`id_timeline` DESC");
      $jmldata = mysql_num_rows($sql_paging);
      $jumlah_halaman = ceil($jmldata / $batas);  
      for($i = 1; $i <= $jumlah_halaman; $i++)
        if($i != $halaman) {
          echo "<a class='btn btn-primary btn-xs active' href='index.php?halaman=".$i."'>".$i."</a> &nbsp";
        } else {
          echo  $i . "&nbsp";
        }
      mysql_close();?>
    <br>
    Total Status :<?php echo $jmldata;
    ?>
  </div>
  </div>
  <!-- memanggil jQueri -->
	<script src="js/jquery-1.11.3.min.js"></script>
	<!-- memanggil javascript bootstrap -->
	<script src="js/bootstrap.min.js"></script>
 </body>
</html>