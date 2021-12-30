<?php

		$jabatan = $_SESSION['jabatan'];
		$chmenu1=$chmenu2=$chmenu3=$chmenu4=$chmenu5=$chmenu6=$chmenu7=$chmenu8=$chmenu9=$chmenu10="";
		$sqlnya="SELECT * FROM chmenu where userjabatan = '$jabatan'";
	$hasilnya= mysqli_query($conn,$sqlnya);
	if(mysqli_num_rows($hasilnya)>0){
		$rownya=mysqli_fetch_assoc($hasilnya);
		$chmenu1=$rownya['menu1']; //user
		$chmenu2=$rownya['menu2'];
		$chmenu3=$rownya['menu3'];
		$chmenu4=$rownya['menu4'];
		$chmenu5=$rownya['menu5'];
		$chmenu6=$rownya['menu6'];
		$chmenu7=$rownya['menu7'];
		$chmenu8=$rownya['menu8'];
		$chmenu9=$rownya['menu9'];
		$chmenu10=$rownya['menu10'];
	}


?>
