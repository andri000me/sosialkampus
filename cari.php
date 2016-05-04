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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Selamat Datang di Sosial Kampus - Login atau Daftar</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styles.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images/icon.png" type="image/x­icon" />
         	    <style type="text/css">
           
            ul{
            	margin-left:-40px;
              text-decoration: none;
              font-size: 18px;
            }

            ul li{
            	list-style-type: none;
            	border-bottom: dotted 1px black;
              height: 50px;
            }

            li:hover{
            	background: #ddd;
            }
            </style>

       <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                 
                 function search(){

                      var nama=$("#search").val();

                      if(nama!=""){
                        $("#result").html("<img src='images/ajax-loader.gif'/>");
                         $.ajax({
                            type:"post",
                            url:"search.php",
                            data:"nama="+nama,
                            success:function(data){
                                $("#result").html(data);
                                $("#search").val("");
                             }
                          });
                      }                     
                 }
                  $("#button").click(function(){
                  	 search();
                  });

                  $('#search').keyup(function(e) {
                     if(e.keyCode == 13) {
                        search();
                      }
                  });
            });
        </script>
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
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-8"><input type="text" id="search" class="form-control" placeholder="Cari Teman Sekampus"/></div>
      <div class="col-xs-6 col-md-4"><button type="button" id="button" class="btn btn-primary">Cari</button></div>
    </div><br />
    <ul id="result"></ul>
  </div>

  <!-- memanggil jQueri -->
	<script src="js/jquery-1.11.3.min.js"></script>
	<!-- memanggil javascript bootstrap -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>