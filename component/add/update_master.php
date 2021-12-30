<?php 
include "../../configuration/config_connect.php";
include "../../configuration/config_session.php";
include "../../configuration/config_chmod.php";
include "../../configuration/config_etc.php";
$forward =$_GET['forward'];
$no = $_GET['no'];
$chmod = $_GET['chmod'];
$forwardpage = $_GET['forwardpage'];

if($chmod == '3' || $chmod == '4' || $chmod == '5' || $_SESSION['jabatan'] == 'admin'){ ?>
  <body onload="setTimeout(function() { document.frm1.submit() }, 10)">
   <form action="<?php echo $baseurl; ?>/tambah-<?php echo $forwardpage;?>" name="frm1" method="post">
	<input type="hidden" name="no" value="<?php echo $no ?>" />	
<?php
}
else{ ?>
 <body onload="window.location='<?php echo $baseurl; ?>/<?php echo $forwardpage; ?>'">
<?php
}
?>
<table width="100%" align="center" cellspacing="0">
  <tr>
    <td height="500px" align="center" valign="middle"><img src="dist/img/load.gif">
  </tr>
</table>
  
   </form>
</body>
 
 

   