<?php
 include "koneksi.php";
 
 $nama=$_POST["nama"];
 
  
 $result=mysql_query("SELECT * FROM tb_user where nama like '%$nama%' ");
  $found=mysql_num_rows($result);

 if($found>0){
    while($row=mysql_fetch_array($result)){
    echo '<img src="ftprofile/' . $row['foto'] . '" width=50px height=50px style="float: left; margin-right: 10px;class=img-responsive">
            <li><a href="profile.php?id=' . $row['no_user'] . '">' . $row['nama'] . '</li></a>';
        }   
    }else{
    echo "<li>Nama Belum Terdaftar<li>";
 }
?>