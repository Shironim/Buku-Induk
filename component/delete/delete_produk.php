<?php
include "../../configuration/config_connect.php";
include "../../configuration/config_session.php";
include "../../configuration/config_chmod.php";
include "../../configuration/config_etc.php";
$forward =$_GET['forward'];
$no = $_GET['no'];
$chmod = $_GET['chmod'];
$forwardpage = $_GET['forwardpage'];
$kode = $_GET['kode'];
$jumlah = $_GET['jumlah'];
$barang = $_GET['barang'];
$get = $_GET['get'];
$detail = $_GET['detail'];
?>

<?php
if( $chmod == '4' || $chmod == '5' || $_SESSION['jabatan'] =='admin'){

if($get == '1'){
  $sqle3="SELECT * FROM barang where kode='$barang'";
  $hasile3=mysqli_query($conn,$sqle3);
  $row=mysqli_fetch_assoc($hasile3);
  $terjualawal=$row['terjual'];
  $sisa=$row['sisa'];


 $sql = "delete from $forward where no='".$no."'";
 if (mysqli_query($conn, $sql)) {

   $sqlx = "select SUM(biayaakhir) as biayaakhir from $forward where nota='".$kode."'";
   $hasil = mysqli_query($conn, $sqlx);
   $row=mysqli_fetch_assoc($hasil);
   $biayaakhir=$row['biayaakhir'];

  $sqlc3 = "update bayar set total='$biayaakhir' where nota='$kode'";
$update = mysqli_query($conn, $sqlc3);

   $sql="select * from $forward where nota='$kode'";
 	$hasil= mysqli_query($conn,$sql);
 	if(mysqli_num_rows($hasil)==0){

    $sqlc3 = "update bayar set status='batal' where nota='$kode'";
$update = mysqli_query($conn, $sqlc3);
 }
 ?>

  <body onload="setTimeout(function() { document.frm1.submit() }, 10)">
  <form action="<?php echo $baseurl; ?>/<?php echo $forwardpage;?>" name="frm1" method="post">

  <input type="hidden" name="kode" value="<?php echo $kode;?>" />
  <input type="hidden" name="hapusberhasil" value="1" />

<?php
 } else{
 ?>   <body onload="setTimeout(function() { document.frm1.submit() }, 10)">
   <input type="hidden" name="kode" value="<?php echo $kode;?>" />
	  <input type="hidden" name="hapusberhasil" value="2" />
 <?php
 }


}else{

 ?>
  <body onload="setTimeout(function() { document.frm1.submit() }, 10)">
   <form action="<?php echo $baseurl; ?>/<?php echo $forwardpage;?>" name="frm1" method="post">

<input type="hidden" name="kode" value="<?php echo $kode;?>" />
	  <input type="hidden" name="hapusberhasil" value="2" />
 <?php
 }

 }
?>
<table width="100%" align="center" cellspacing="0">
  <tr>
    <td height="500px" align="center" valign="middle"><img src="../../dist/img/load.gif">
  </tr>
</table>


   </form>
<meta http-equiv="refresh" content="10;url=jump?kode=<?php echo $kode.'&';?>forward=<?php echo $forward.'&';?>forwardpage=<?php echo $forwardpage.'&'; ?>chmod=<?php echo $chmod; ?>">
</body>
