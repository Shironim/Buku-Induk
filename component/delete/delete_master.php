<?php
include "../../configuration/config_connect.php";
include "../../configuration/config_session.php";
include "../../configuration/config_chmod.php";
include "../../configuration/config_etc.php";
$forward = $_GET['forward'];
$no = $_GET['no'];
$chmod = $_GET['chmod'];
$forwardpage = $_GET['forwardpage'];
?>

<?php
if ($_SESSION['jabatan'] == 'admin' || $_SESSION['jabatan'] == 'guru') {

  $sql = "delete from $forward where no='" . $no . "'";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Delete Berhasil');location.href='../../admin'</script>";
  } else {
    echo "<script>alert('Delete Gagal');</script>";
  }
}
?>

    