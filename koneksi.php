<?php

$dbhost = 'ap-cdbr-azure-southeast-b.cloudapp.net';
$dbuser = 'b90d36109fcb5e';
$dbpassword = 'f44d8473';
$dbname = 'soskamdb';
$koneksi = mysql_connect($dbhost,$dbuser,$dbpassword);
$cek = mysql_select_db($dbname,$koneksi);
if (!$cek) {
echo "Ups.! Koneksi database gagal!";
}

?>