<?php
include "configuration/config_include.php";
connect();
$get_id_tahun = $_GET['id'];

$sql = "DELETE FROM tahun_ajaran WHERE id_tahun_ajaran = '$get_id_tahun'";
$run_sql = mysqli_query($conn, $sql);

if ($run_sql) {
  echo "<script>alert('Delete Berhasil');location.href='tahun_ajaran'</script>";
}
