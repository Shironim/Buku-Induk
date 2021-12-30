<?php
session_start();
error_reporting(0);
$logout = $_GET['logout']; 

if($logout<>null){ 
session_unset();
session_destroy();
?>
<meta http-equiv="refresh" content="0;  url='login" />
<?php	
}else{

session_unset();
session_destroy();
header("Location : login");
}

if($logout==null){

session_unset();
session_destroy();
?>
<meta http-equiv="refresh" content="0;  url='login'" />	
<?php
}
?>

