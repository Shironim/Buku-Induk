<?php
include "configuration/config_include.php";
connect();
$id_siswa = $_GET['id'];

$sql_cek_siswa = "SELECT id_siswa FROM siswa WHERE id_siswa = '$id_siswa'";
$sql_cek_bank = "SELECT id_siswa FROM bank WHERE id_siswa = '$id_siswa'";
$sql_cek_pip = "SELECT id_siswa FROM pip WHERE id_siswa = '$id_siswa'";
$sql_cek_kps = "SELECT id_siswa FROM kps WHERE id_siswa = '$id_siswa'";
$sql_cek_ayah_siswa = "SELECT id_siswa FROM ayah_siswa WHERE id_siswa = '$id_siswa'";
$sql_cek_ibu_siswa = "SELECT id_siswa FROM ibu_siswa WHERE id_siswa = '$id_siswa'";
$sql_cek_wali_siswa = "SELECT id_siswa FROM wali_siswa WHERE id_siswa = '$id_siswa'";

$query_siswa = mysqli_query($conn, $sql_cek_siswa);
$query_ayah_siswa = mysqli_query($conn, $sql_cek_ayah_siswa);
$query_ibu_siswa = mysqli_query($conn, $sql_cek_ibu_siswa);
$query_wali_siswa = mysqli_query($conn, $sql_cek_wali_siswa);
$query_bank = mysqli_query($conn, $sql_cek_bank);
$query_pip = mysqli_query($conn, $sql_cek_pip);
$query_kps = mysqli_query($conn, $sql_cek_kps);

$fetch_siswa = mysqli_fetch_array($query_siswa);
$fetch_ayah_siswa = mysqli_fetch_array($query_ayah_siswa);
$fetch_ibu_siswa = mysqli_fetch_array($query_ibu_siswa);
$fetch_wali_siswa = mysqli_fetch_array($query_wali_siswa);
$fetch_bank = mysqli_fetch_array($query_bank);
$fetch_pip = mysqli_fetch_array($query_pip);
$fetch_kps = mysqli_fetch_array($query_kps);


if (!empty($fetch_ayah_siswa)) {
  $ayah = "DELETE FROM ayah_siswa WHERE id_siswa = '$id_siswa'";
  $delete_ayah = mysqli_query($conn, $ayah);
}
if (!empty($fetch_ibu_siswa)) {
  $ibu = "DELETE FROM ibu_siswa WHERE id_siswa = '$id_siswa'";
  $delete_ibu = mysqli_query($conn, $ibu);
}
if (!empty($fetch_wali_siswa)) {
  $wali = "DELETE FROM wali_siswa WHERE id_siswa = '$id_siswa'";
  $delete_wali = mysqli_query($conn, $wali);
}
if (!empty($fetch_bank)) {
  $bank = "DELETE FROM bank WHERE id_siswa = '$id_siswa'";
  $delete_bank = mysqli_query($conn, $bank);
}
if (!empty($fetch_pip)) {
  $pip = "DELETE FROM pip WHERE id_siswa = '$id_siswa'";
  $delete_pip = mysqli_query($conn, $pip);
}
if (!empty($fetch_kps)) {
  $kps = "DELETE FROM kps WHERE id_siswa = '$id_siswa'";
  $delete_kps = mysqli_query($conn, $kps);
}
if (!empty($fetch_siswa)) {
  $siswa = "DELETE FROM siswa WHERE id_siswa = '$id_siswa'";
  $delete_siswa = mysqli_query($conn, $siswa);
}

echo "<script>alert('Berhasil Hapus Data Siswa');location.href='siswa'</script>";
