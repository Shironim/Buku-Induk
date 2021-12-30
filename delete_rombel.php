<?php
include "configuration/config_include.php";
connect();
$get_id_rombel = $_GET['id'];

$sql = "DELETE FROM rombel WHERE id_rombel = '$get_id_rombel'";
$run_sql = mysqli_query($conn, $sql);

if ($run_sql) {
  echo "<script>alert('Delete Berhasil');location.href='kelas_rombel'</script>";
}
