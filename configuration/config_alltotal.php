<?php
include 'config_connect.php';
date_default_timezone_set("Asia/Jakarta");
$harisekarang=date('d');
$bulansekarang=date('m');
$tahunsekarang=date('Y');

// Total Data1

$sqlx2="SELECT COUNT(userna_me) as data FROM user";
$hasilx2=mysqli_query($conn,$sqlx2);
$row=mysqli_fetch_assoc($hasilx2);
$datax1=$row['data'];

// Total Data2

$sqlx2="SELECT COUNT(kode) as data FROM siswa";
$hasilx2=mysqli_query($conn,$sqlx2);
$row=mysqli_fetch_assoc($hasilx2);
$datax2=$row['data'];

// Total Data3

$sqlx2="SELECT COUNT(kode) as data FROM ajaran";
$hasilx2=mysqli_query($conn,$sqlx2);
$row=mysqli_fetch_assoc($hasilx2);
$datax3=$row['data'];

// Total Data4

$sqlx2="SELECT COUNT(kode) as data FROM status";
$hasilx2=mysqli_query($conn,$sqlx2);
$row=mysqli_fetch_assoc($hasilx2);
$datax4=$row['data'];


?>
