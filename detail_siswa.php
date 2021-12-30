<!DOCTYPE html>
<html>
<?php
// include "configuration/config_etc.php";
include "configuration/config_include.php";
// etc();
encryption();
session();
connect();
head();
body();
timing();
//alltotal();
pagination();

$get_id_siswa = $_GET['id'];
?>

<?php
if (!login_check()) {
?>
  <meta http-equiv="refresh" content="0; url=logout" />
<?php
  exit(0);
}
?>
<div class="wrapper">
  <?php
  theader();
  menu();
  ?>
  <div class="content-wrapper">
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <!-- ./col -->

          <!-- SETTING START-->

          <?php
          error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
          include "configuration/config_chmod.php";

          $tabeldatabase = "siswa"; // tabel database

          $forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
          $sql = "SELECT * FROM siswa WHERE id_siswa = '$get_id_siswa'";
          $data = mysqli_query($conn, $sql);
          $fetch = mysqli_fetch_array($data);

          ?>


          <!-- SETTING STOP -->


          <!-- BREADCRUMB -->

          <!-- <ol class="breadcrumb ">
            <li><a href="<?php echo $_SESSION['baseurl']; ?>">Dashboard </a></li>
            <li><a href="<?php echo $halaman; ?>"><?php echo $dataapa ?></a></li>
            <?php

            if ($search != null || $search != "") {
            ?>
              <li> <a href="<?php echo $halaman; ?>">Data <?php echo $dataapa ?></a></li>
              <li class="active"><?php
                                  echo $search;
                                  ?></li>
            <?php
            } else {
            ?>
              <li class="active">Data <?php echo $dataapa ?></li>
            <?php
            }
            ?>
          </ol> -->

          <!-- BREADCRUMB -->

          <!-- BOX INSERT BERHASIL -->

          <script>
            window.setTimeout(function() {
              $("#myAlert").fadeTo(500, 0).slideUp(1000, function() {
                $(this).remove();
              });
            }, 5000);
          </script>

          <!-- BOX INFORMASI -->
          <?php
          if ($_SESSION['jabatan'] == 'admin' || $_SESSION['jabatan'] == 'guru') {
          ?>


            <!-- KONTEN BODY AWAL -->
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Data Siswa <?php echo $fetch['nama_siswa']; ?> </h3>
              </div>
              <!-- /.box-header -->

              <div class="box-body">
                <div class="table-responsive">
                  <!----------------KONTEN------------------->

                  <div id="main">
                    <div class="container-fluid">
                      <form class="form-horizontal" method="post" action="" id="Myform">
                        <div class="nav-tabs-custom">
                          <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Data Siswa</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Data Ayah</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Data Ibu</a></li>
                            <li><a href="#tab_4" data-toggle="tab">Data Wali</a></li>
                            <li><a href="#tab_5" data-toggle="tab">Data Pendidikan</a></li>
                            <li><a href="#tab_6" data-toggle="tab">Data Bank Siswa</a></li>
                            <li><a href="#tab_7" data-toggle="tab">Data PIP Siswa</a></li>
                            <li><a href="#tab_8" data-toggle="tab">Data KIP Siswa</a></li>
                            <li><a href="#tab_9" data-toggle="tab">Data KPS Siswa</a></li>
                            <!-- <li><a href="#tab_9" data-toggle="tab">Lain Lain</a></li> -->
                          </ul>
                        </div>
                        <div class="tab-content">
                          <?php
                          error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                          $sql = "SELECT * FROM siswa
                            JOIN rombel
                            ON siswa.id_rombel = rombel.id_rombel
                            JOIN tahun_ajaran
                            ON siswa.id_tahun_ajaran = tahun_ajaran.id_tahun_ajaran 
                            WHERE siswa.id_siswa = '$get_id_siswa'";
                          $hasil = mysqli_query($conn, $sql);
                          $siswa = mysqli_fetch_array($hasil);
                          $nis = $siswa["nis"];
                          $nisn = $siswa["nisn"];
                          $nama = $siswa["nama_siswa"];
                          // $jeniskelamin = $siswa["jk"];
                          $tempat = $siswa["tempat_lahir"];
                          $tgllahir = $siswa["tgl_lahir"];
                          $agama = $siswa["agama"];
                          $notelp = $siswa["telepon"];
                          $hp = $siswa["hp"];
                          $email = $siswa["email"];
                          $alat_transportasi = $siswa["alat_transportasi"];
                          $nik = $siswa["nik"];
                          $alamat = $siswa["alamat"];
                          $rt = $siswa["rt"];
                          $rw = $siswa["rw"];
                          $kelurahan = $siswa["kelurahan"];
                          $kecamatan = $siswa["kecamatan"];
                          $kode_pos = $siswa["kode_pos"];
                          $jumlahsaudarakandung = $siswa["jml_saudara_kandung"];
                          $jarakrumahkesekolah = $siswa["jarak_ke_sekolah"];
                          $keterangantinggal = $siswa["jenis_tinggal"];
                          $ajaran = $siswa["tahun_ajaran"];
                          $rombel = $siswa["rombel"];
                          $tinggibadan = $siswa["tinggi_badan"];
                          $beratbadan = $siswa["berat_badan"];

                          if ($siswa['jk'] == 'P') {
                            $jk = 'Perempuan';
                          } else {
                            $jk = 'Laki Laki';
                          }

                          ?>
                          <div class="tab-pane active" id="tab_1">
                            <div class="col-lg-6">
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="kode" class="col-sm-3 control-label">No. Induk / NISN:</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="nis" name="nis" value="<?= $nis ?>" disabled>
                                  </div>
                                  <div class="col-sm-5">
                                    <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $nisn; ?>" disabled>

                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="nama" class="col-sm-3 control-label">Nama Lengkap:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" disabled>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="jeniskelamin" class="col-sm-3 control-label">Jenis Kelamin:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jk" name="jk" value="<?php echo $jk; ?>" disabled>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="tempat" class="col-sm-3 control-label">Tempat / Tgl Lahir:</label>
                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tempat" name="tempat" value="<?php echo $tempat; ?>" disabled>
                                  </div>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control pull-right" id="datepicker2" name="tgllahir" value="<?php echo $tgllahir; ?>" disabled>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="agama" class="col-sm-3 control-label">Agama:</label>
                                  <div class="col-sm-9">

                                    <input type="text" class="form-control pull-right" name="agam" value="<?php echo $agama; ?>" disabled>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="notelp" class="col-sm-3 control-label">No Telepon / HP:</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="notelp" name="notelp" value="<?php echo $notelp; ?>" disabled>
                                  </div>
                                  <div class="col-sm-5">
                                    <input type="text" class="form-control" id="hp" name="hp" value="<?php echo $hp; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="email" class="col-sm-3 control-label">Email :</label>
                                  <div class="col-sm-9">

                                    <input type="text" class="form-control pull-right" name="email" value="<?php echo $email; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="nik" class="col-sm-3 control-label">NIK Siswa :</label>
                                  <div class="col-sm-9">

                                    <input type="text" class="form-control pull-right" name="nik" value="<?php echo $nik; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="tinggibadan" class="col-sm-3 control-label">Tinggi Badan:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tinggibadan" name="tinggibadan" value="<?php echo $tinggibadan; ?>" disabled>
                                  </div>
                                </div>
                              </div>

                            </div>
                            <div class="col-lg-6">
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="jumlahsaudarakandung" class="col-sm-3 control-label">Jml Saudara Kandung:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jumlahsaudarakandung" name="jumlahsaudarakandung" value="<?php echo $jumlahsaudarakandung; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="jarakrumahkesekolah" class="col-sm-3 control-label">Jarak Rumah:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jarakrumahkesekolah" name="jarakrumahkesekolah" value="<?php echo $jarakrumahkesekolah; ?>" disabled>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="keterangantinggal" class="col-sm-3 control-label">Keterangan Tinggal:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="keterangantinggal" name="keterangantinggal" value="<?php echo $keterangantinggal; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="alat_transportasi" class="col-sm-3 control-label">Alat Transportasi:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="alat_transportasi" name="alat_transportasi" value="<?php echo $alat_transportasi; ?>" disabled>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="alamat" class="col-sm-3 control-label">Alamat:</label>
                                  <div class="col-sm-9">
                                    <textarea class="form-control" rows="3" id="alamat" name="alamat" maxlength="255" disabled><?php echo $alamat; ?>, RT <?php echo $rt; ?> RW <?php echo $rw; ?> Kelurahan <?php echo $kelurahan; ?> Kecamatan <?php echo $kecamatan; ?>, <?php echo $kode_pos; ?>
                                          </textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="ajaran" class="col-sm-3 control-label">Tahun Ajaran :</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="<?php echo $ajaran; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="ajaran" class="col-sm-3 control-label">Rombongan Belajar :</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="rombel" name="rombel" value="<?php echo $rombel; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="beratbadan" class="col-sm-3 control-label">Berat Badan:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="beratbadan" name="beratbadan" value="<?php echo $beratbadan; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php
                          $sql = "SELECT * FROM siswa
                                  JOIN ayah_siswa
                                  ON siswa.id_siswa = ayah_siswa.id_siswa 
                                  WHERE siswa.id_siswa = '$get_id_siswa'";
                          $hasil = mysqli_query($conn, $sql);
                          $fill = mysqli_fetch_array($hasil);
                          $nama_ayah = $fill["nama_ayah"];
                          // $jeniskelamin = $fill["jk"];
                          $tahun_lahir_ayah = $fill["tahun_lahir_ayah"];
                          $pendidikanterakhirayah = $fill["jenjang_pendidikan_ayah"];
                          $pekerjaanayah = $fill["pekerjaan_ayah"];
                          $penghasilanayah = $fill["penghasilan_ayah"];
                          $nik_ayah = $fill["nik_ayah"];

                          ?>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_2">
                            <div class="col-lg-6">
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="namaayah" class="col-sm-3 control-label">Nama Ayah:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?php echo $nama_ayah; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="tempatayah" class="col-sm-3 control-label">Tahun Lahir:</label>
                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tahun_lahir_ayah" name="tahun_lahir_ayah" value="<?php echo $tahun_lahir_ayah; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="pendidikanterakhirayah" class="col-sm-3 control-label">Pendidikan Terakhir:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pendidikanterakhirayah" name="pendidikanterakhirayah" value="<?php echo $pendidikanterakhirayah; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="pekerjaanayah" class="col-sm-3 control-label">Pekerjaan:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pekerjaanayah" name="pekerjaanayah" value="<?php echo $pekerjaanayah; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="penghasilanayah" class="col-sm-3 control-label">Penghasilan Perbulan:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pekerjaanayah" name="pekerjaanayah" value="<?php echo $pekerjaanayah; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="nik_ayah" class="col-sm-3 control-label">NIK Ayah:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" value="<?php echo $nik_ayah; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /.tab-2 -->
                          <?php
                          $sql = "SELECT * FROM siswa
                                  JOIN ibu_siswa
                                  ON siswa.id_siswa = ibu_siswa.id_siswa 
                                  WHERE siswa.id_siswa = '$get_id_siswa'";
                          $hasil = mysqli_query($conn, $sql);
                          $fill = mysqli_fetch_array($hasil);
                          $nama_ibu = $fill["nama_ibu"];
                          // $jeniskelamin = $fill["jk"];
                          $tahun_lahir_ibu = $fill["tahun_lahir_ibu"];
                          $pendidikanterakhiribu = $fill["jenjang_pendidikan_ibu"];
                          $pekerjaanibu = $fill["pekerjaan_ibu"];
                          $penghasilanibu = $fill["penghasilan_ibu"];
                          $nik_ibu = $fill["nik_ibu"];
                          ?>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_3">
                            <div class="col-lg-6">
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="namaibu" class="col-sm-3 control-label">Nama ibu:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?php echo $nama_ibu; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="tempatibu" class="col-sm-3 control-label">Tahun Lahir:</label>
                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tahun_lahir_ibu" name="tahun_lahir_ibu" value="<?php echo $tahun_lahir_ibu; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="pendidikanterakhiribu" class="col-sm-3 control-label">Pendidikan Terakhir:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pendidikanterakhiribu" name="pendidikanterakhiribu" value="<?php echo $pendidikanterakhiribu; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="pekerjaanibu" class="col-sm-3 control-label">Pekerjaan:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pekerjaanibu" name="pekerjaanibu" value="<?php echo $pekerjaanibu; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="penghasilanibu" class="col-sm-3 control-label">Penghasilan Perbulan:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pekerjaanibu" name="pekerjaanibu" value="<?php echo $pekerjaanibu; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="nik_ibu" class="col-sm-3 control-label">NIK ibu:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" value="<?php echo $nik_ibu; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php
                          $sql = "SELECT * FROM siswa
                                  JOIN wali_siswa
                                  ON siswa.id_siswa = wali_siswa.id_siswa 
                                  WHERE siswa.id_siswa = '$get_id_siswa'";
                          $hasil = mysqli_query($conn, $sql);
                          $fill = mysqli_fetch_array($hasil);
                          $nama_wali = $fill["nama_wali"];
                          // $jeniskelamin = $fill["jk"];
                          $tahun_lahir_wali = $fill["tahun_lahir_wali"];
                          $pendidikanterakhirwali = $fill["jenjang_pendidikan_wali"];
                          $pekerjaanwali = $fill["pekerjaan_wali"];
                          $penghasilanwali = $fill["penghasilan_wali"];
                          $nik_wali = $fill["nik_wali"];
                          ?>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_4">
                            <div class="col-lg-6">
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="namawali" class="col-sm-3 control-label">Nama wali:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_wali" name="nama_wali" value="<?php echo $nama_wali; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="tempatwali" class="col-sm-3 control-label">Tahun Lahir:</label>
                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tahun_lahir_wali" name="tahun_lahir_wali" value="<?php echo $tahun_lahir_wali; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="pendidikanterakhirwali" class="col-sm-3 control-label">Pendidikan Terakhir:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pendidikanterakhirwali" name="pendidikanterakhirwali" value="<?php echo $pendidikanterakhirwali; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="pekerjaanwali" class="col-sm-3 control-label">Pekerjaan:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pekerjaanwali" name="pekerjaanwali" value="<?php echo $pekerjaanwali; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="penghasilanwali" class="col-sm-3 control-label">Penghasilan Perbulan:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pekerjaanwali" name="pekerjaanwali" value="<?php echo $pekerjaanwali; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="nik_wali" class="col-sm-3 control-label">NIK wali:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nik_wali" name="nik_wali" value="<?php echo $nik_wali; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php
                          $sql = "SELECT * FROM siswa
                          JOIN rombel 
                          ON siswa.id_rombel = rombel.id_rombel
                          JOIN tahun_ajaran
                          ON siswa.id_tahun_ajaran = tahun_ajaran.id_tahun_ajaran
                            WHERE siswa.id_siswa = '$get_id_siswa'";
                          $hasil = mysqli_query($conn, $sql);
                          $pndk = mysqli_fetch_array($hasil);
                          $sekolah_asal = $pndk["sekolah_asal"];
                          $skhun = $pndk["skhun"];
                          $no_ujian_nasional = $pndk["no_ujian_nasional"];
                          $noijazah = $pndk["no_seri_ijasah"];
                          $ajaran = $siswa["tahun_ajaran"];
                          $rombel = $siswa["rombel"]; ?>
                          <div class="tab-pane" id="tab_5">
                            <div class="col-lg-12">

                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="sekolahasal" class="col-sm-3 control-label">Sekolah Asal:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="sekolahasal" name="sekolahasal" value="<?php echo $sekolah_asal; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="noskhun" class="col-sm-3 control-label">No. SKHUN:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="noskhun" name="noskhun" value="<?php echo $skhun; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="tanggalskhun" class="col-sm-3 control-label">Nomor Ujian Nasional:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control pull-right" name="tanggalskhun" value="<?php echo $no_ujian_nasional; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="noijazah" class="col-sm-3 control-label">No. Ijazah:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="noijazah" name="noijazah" value="<?php echo $noijazah; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="tanggalijazah" class="col-sm-3 control-label">Rombongan Belajar:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control pull-right" name="rombel" value="<?php echo $rombel; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="tahun_ajaran" class="col-sm-3 control-label">Tahun Ajaran:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="<?php echo $ajaran; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /.tab-pane -->
                          <?php
                          $sql = "SELECT * FROM siswa
                          JOIN bank 
                          ON siswa.id_siswa = bank.id_siswa
                            WHERE siswa.id_siswa = '$get_id_siswa'";
                          $hasil = mysqli_query($conn, $sql);
                          $bank = mysqli_fetch_array($hasil);
                          $nama_bank = $bank["bank"];
                          $norek = $bank["norek_bank"];
                          $an_bank = $bank["an_bank"];
                          ?>
                          <div class="tab-pane" id="tab_6">
                            <div class="col-lg-12">
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="nama_bank" class="col-sm-3 control-label">Nama Bank:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" value="<?php echo $nama_bank; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="nomor_rekening" class="col-sm-3 control-label">Nomor Rekening:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" value="<?php echo $norek; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="an_bank" class="col-sm-3 control-label">Atas Nama:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="an_bank" name="an_bank" value="<?php echo $an_bank; ?>" disabled>
                                  </div>
                                </div>
                              </div>


                            </div>
                          </div>
                          <?php
                          $sql = "SELECT * FROM siswa
                          JOIN pip 
                          ON siswa.id_siswa = pip.id_siswa
                            WHERE siswa.id_siswa = '$get_id_siswa'";
                          $hasil = mysqli_query($conn, $sql);
                          $pip = mysqli_fetch_array($hasil);
                          $nama_siswa = $pip["nama_siswa"];
                          $layak_pip = $pip["layak_pip"];
                          $alasan_layak = $pip["alasan_layak_pip"];
                          ?>
                          <div class="tab-pane" id="tab_7">
                            <div class="col-lg-12">
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="nama_siswa" class="col-sm-3 control-label">Nama Siswa:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?php echo $nama_siswa; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="layak_pip" class="col-sm-3 control-label">Layak PIP:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="layak_pip" name="layak_pip" value="<?php echo $layak_pip; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="alasan_layak" class="col-sm-3 control-label">Alasan Layak PIP:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="alasan_layak" name="alasan_layak" value="<?php echo $alasan_layak; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php
                          $sql = "SELECT * FROM siswa
                            WHERE siswa.id_siswa = '$get_id_siswa'";
                          $hasil = mysqli_query($conn, $sql);
                          $kip = mysqli_fetch_array($hasil);
                          $nama_siswa = $kip["nama_siswa"];
                          $penerima_kip = $kip["penerima_kip"];
                          $nomor_kip = $kip["nomor_kip"];
                          ?>
                          <div class="tab-pane" id="tab_8">
                            <div class="col-lg-12">
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="nama_siswa" class="col-sm-3 control-label">Nama Siswa:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?php echo $nama_siswa; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="penerima_kip" class="col-sm-3 control-label">Penerima KIP:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="penerima_kip" name="penerima_kip" value="<?php echo $penerima_kip; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="nomor_kip" class="col-sm-3 control-label">Nomor KIP:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nomor_kip" name="nomor_kip" value="<?php echo $nomor_kip; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php
                          $sql = "SELECT * FROM siswa
                          JOIN kps
                          ON siswa.id_siswa = kps.id_siswa
                            WHERE siswa.id_siswa = '$get_id_siswa'";
                          $hasil = mysqli_query($conn, $sql);
                          $kps = mysqli_fetch_array($hasil);
                          $nama_siswa = $kps["nama_siswa"];
                          $penerima_kps = $kps["penerima_kps"];
                          $nomor_kps = $kps["no_kps"];
                          ?>
                          <div class="tab-pane" id="tab_9">
                            <div class="col-lg-12">
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="nama_siswa" class="col-sm-3 control-label">Nama Siswa:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?php echo $nama_siswa; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="penerima_kps" class="col-sm-3 control-label">Penerima KPS:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="penerima_kps" name="penerima_kps" value="<?php echo $penerima_kps; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="nomor_kps" class="col-sm-3 control-label">Nomor kps:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nomor_kps" name="nomor_kps" value="<?php echo $nomor_kps; ?>" disabled>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="#">
                            <div class="col-lg-12">
                              <p>Perkembangan Diri Siswa</p>

                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="terimabeasiswatahun1" class="col-sm-3 control-label">Terima Beasiswa Tahun 1:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="terimabeasiswatahun1" name="terimabeasiswatahun1" value="<?php echo $terimabeasiswatahun1; ?>" placeholder="Masukan Beasiswa" maxlength="100">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="terimabeasiswatahun2" class="col-sm-3 control-label">Terima Beasiswa Tahun 2:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="terimabeasiswatahun2" name="terimabeasiswatahun2" value="<?php echo $terimabeasiswatahun2; ?>" placeholder="Masukan Beasiswa" maxlength="100">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="terimabeasiswatahun3" class="col-sm-3 control-label">Terima Beasiswa Tahun 3:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="terimabeasiswatahun3" name="terimabeasiswatahun3" value="<?php echo $terimabeasiswatahun3; ?>" placeholder="Masukan Beasiswa" maxlength="100">
                                  </div>
                                </div>
                              </div>
                              <br />
                              <p>Meninggalkan Sekolah</p>

                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="tahunmeninggalkan" class="col-sm-3 control-label">Tahun Meninggalkan:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tahunmeninggalkan" name="tahunmeninggalkan" value="<?php echo $tahunmeninggalkan; ?>" placeholder="Masukan Tahun Meninggalkan Sekolah" maxlength="100">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="alasanmeninggalkan" class="col-sm-3 control-label">Alasan Meninggalkan:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="alasanmeninggalkan" name="alasanmeninggalkan" value="<?php echo $alasanmeninggalkan; ?>" placeholder="Masukan Alasan Meninggalkan Sekolah" maxlength="100">
                                  </div>
                                </div>
                              </div>
                              <br />
                              <p>Akhir Pendidikan</p>

                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="tamatbelajar" class="col-sm-3 control-label">Tamat Belajar:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tamatbelajar" name="tamatbelajar" value="<?php echo $tamatbelajar; ?>" placeholder="Masukan Tahun Tamat Belajar" maxlength="100">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="noijazahakhir" class="col-sm-3 control-label">No. Ijazah:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="noijazahakhir" name="noijazahakhir" value="<?php echo $noijazahakhir; ?>" placeholder="Masukan No Ijazah" maxlength="100">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="noskhunakhir" class="col-sm-3 control-label">No. SKHUN:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="noskhunakhir" name="noskhunakhir" value="<?php echo $noskhunakhir; ?>" placeholder="Masukan No SKHUN" maxlength="100">
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="#">
                            <div class="col-lg-12">
                              <p>Keterangan Setelah Selesai Pendidikan</p>


                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="melanjutkandi" class="col-sm-3 control-label">Melanjutkan di:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="melanjutkandi" name="melanjutkandi" value="<?php echo $melanjutkandi; ?>" placeholder="Masukan Keterangan Siswa Melanjutkan Dimana" maxlength="100">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="bekerjadi" class="col-sm-3 control-label">Bekerja di:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="bekerjadi" name="bekerjadi" value="<?php echo $bekerjadi; ?>" placeholder="Masukan Keterangan Siswa Kerja Dimana" maxlength="100">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="namaperusahaan" class="col-sm-3 control-label">Nama Perusahaan:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan" value="<?php echo $namaperusahaan; ?>" placeholder="Masukan Keterangan Nama Perusahaan" maxlength="100">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="penghasilansiswa" class="col-sm-3 control-label">Penghasilan Perbulan:</label>
                                  <div class="col-sm-9">

                                    <select class="form-control select2" style="width: 100%;" name="penghasilansiswa" id="penghasilansiswa">
                                      <option></option>
                                      <option value='< 250 Ribu' <?php if ($penghasilansiswa == '< 250 Ribu') {
                                                                    echo 'selected';
                                                                  } ?>>
                                        < 250 Ribu</option>
                                      <option value='250 - 500 Ribu' <?php if ($penghasilansiswa == '250 - 500 Ribu') {
                                                                        echo 'selected';
                                                                      } ?>>250 - 500 Ribu</option>
                                      <option value='500 Ribu - 1 Juta' <?php if ($penghasilansiswa == '500 Ribu - 1 Juta') {
                                                                          echo 'selected';
                                                                        } ?>>500 Ribu - 1 Juta</option>
                                      <option value='1 Juta - 2 Juta' <?php if ($penghasilansiswa == '1 Juta - 2 Juta') {
                                                                        echo 'selected';
                                                                      } ?>>1 Juta - 2 Juta</option>
                                      <option value='2 Juta - 3 Juta' <?php if ($penghasilansiswa == '2 Juta - 3 Juta') {
                                                                        echo 'selected';
                                                                      } ?>>2 Juta - 3 Juta</option>
                                      <option value='3 Juta - 5 Juta' <?php if ($penghasilansiswa == '3 Juta - 5 Juta') {
                                                                        echo 'selected';
                                                                      } ?>>3 Juta - 5 Juta</option>
                                      <option value='5 Juta - 7 Juta' <?php if ($penghasilansiswa == '5 Juta - 7 Juta') {
                                                                        echo 'selected';
                                                                      } ?>>5 Juta - 7 Juta</option>
                                      <option value='7 Juta - 10 Juta' <?php if ($penghasilansiswa == '7 Juta - 10 Juta') {
                                                                          echo 'selected';
                                                                        } ?>>7 Juta - 10 Juta</option>
                                      <option value='> 10 Juta' <?php if ($penghasilansiswa == '> 10 Juta') {
                                                                  echo 'selected';
                                                                } ?>>> 10 Juta</option>
                                    </select>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="#">
                            <div class="col-lg-12">

                              <p>Data Keterangan Lain</p>


                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <div class="col-sm-12">
                                    <textarea class="form-control" rows="10" id="keteranganlain" name="keteranganlain" maxlength="1000" placeholder="Masukan Keterangan"><?php echo $keteranganlain; ?></textarea>
                                  </div>
                                </div>
                              </div>

                            </div>


                          </div>
                          <!-- /.tab-pane -->
                        </div>
                      </form>
                    </div>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                      $kode = mysqli_real_escape_string($conn, $_POST["kode"]);
                      $nisn = mysqli_real_escape_string($conn, $_POST["nisn"]);
                      $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
                      $jeniskelamin = mysqli_real_escape_string($conn, $_POST["jeniskelamin"]);
                      $tempat = mysqli_real_escape_string($conn, $_POST["tempat"]);
                      $tgllahir = mysqli_real_escape_string($conn, $_POST["tgllahir"]);
                      $agama = mysqli_real_escape_string($conn, $_POST["agama"]);
                      $notelp = mysqli_real_escape_string($conn, $_POST["notelp"]);
                      $alamat = mysqli_real_escape_string($conn, $_POST["alamat"]);
                      $kewarganegaraan = mysqli_real_escape_string($conn, $_POST["kewarganegaraan"]);
                      $anakke = mysqli_real_escape_string($conn, $_POST["anakke"]);
                      $jumlahsaudarakandung = mysqli_real_escape_string($conn, $_POST["jumlahsaudarakandung"]);
                      $jumlahsaudaratiri = mysqli_real_escape_string($conn, $_POST["jumlahsaudaratiri"]);
                      $jumlahsaudaraangkat = mysqli_real_escape_string($conn, $_POST["jumlahsaudaraangkat"]);
                      $statuskeorangtuaan = mysqli_real_escape_string($conn, $_POST["statuskeorangtuaan"]);
                      $jarakrumahkesekolah = mysqli_real_escape_string($conn, $_POST["jarakrumahkesekolah"]);
                      $keterangantinggal = mysqli_real_escape_string($conn, $_POST["keterangantinggal"]);
                      $bahasaseharihari = mysqli_real_escape_string($conn, $_POST["bahasaseharihari"]);
                      $ajaran = mysqli_real_escape_string($conn, $_POST["ajaran"]);
                      $statussiswa = mysqli_real_escape_string($conn, $_POST["statussiswa"]);
                      $avatar = mysqli_real_escape_string($conn, $_POST["avatar"]);
                      $namaayah = mysqli_real_escape_string($conn, $_POST["namaayah"]);
                      $tempatayah = mysqli_real_escape_string($conn, $_POST["tempatayah"]);
                      $tgllahirayah = mysqli_real_escape_string($conn, $_POST["tgllahirayah"]);
                      $agamaayah = mysqli_real_escape_string($conn, $_POST["agamaayah"]);
                      $notelpayah = mysqli_real_escape_string($conn, $_POST["notelpayah"]);
                      $alamatayah = mysqli_real_escape_string($conn, $_POST["alamatayah"]);
                      $kewarganegaraanayah = mysqli_real_escape_string($conn, $_POST["kewarganegaraanayah"]);
                      $pendidikanterakhirayah = mysqli_real_escape_string($conn, $_POST["pendidikanterakhirayah"]);
                      $pekerjaanayah = mysqli_real_escape_string($conn, $_POST["pekerjaanayah"]);
                      $penghasilanayah = mysqli_real_escape_string($conn, $_POST["penghasilanayah"]);
                      $statushidupayah = mysqli_real_escape_string($conn, $_POST["statushidupayah"]);
                      $namaibu = mysqli_real_escape_string($conn, $_POST["namaibu"]);
                      $tempatibu = mysqli_real_escape_string($conn, $_POST["tempatibu"]);
                      $tgllahiribu = mysqli_real_escape_string($conn, $_POST["tgllahiribu"]);
                      $agamaibu = mysqli_real_escape_string($conn, $_POST["agamaibu"]);
                      $notelpibu = mysqli_real_escape_string($conn, $_POST["notelpibu"]);
                      $alamatibu = mysqli_real_escape_string($conn, $_POST["alamatibu"]);
                      $kewarganegaraanibu = mysqli_real_escape_string($conn, $_POST["kewarganegaraanibu"]);
                      $pendidikanterakhiribu = mysqli_real_escape_string($conn, $_POST["pendidikanterakhiribu"]);
                      $pekerjaanibu = mysqli_real_escape_string($conn, $_POST["pekerjaanibu"]);
                      $penghasilanibu = mysqli_real_escape_string($conn, $_POST["penghasilanibu"]);
                      $statushidupibu = mysqli_real_escape_string($conn, $_POST["statushidupibu"]);
                      $namawali = mysqli_real_escape_string($conn, $_POST["namawali"]);
                      $tempatwali = mysqli_real_escape_string($conn, $_POST["tempatwali"]);
                      $tgllahirwali = mysqli_real_escape_string($conn, $_POST["tgllahirwali"]);
                      $agamawali = mysqli_real_escape_string($conn, $_POST["agamawali"]);
                      $notelpwali = mysqli_real_escape_string($conn, $_POST["notelpwali"]);
                      $alamatwali = mysqli_real_escape_string($conn, $_POST["alamatwali"]);
                      $kewarganegaraanwali = mysqli_real_escape_string($conn, $_POST["kewarganegaraanwali"]);
                      $pendidikanterakhirwali = mysqli_real_escape_string($conn, $_POST["pendidikanterakhirwali"]);
                      $pekerjaanwali = mysqli_real_escape_string($conn, $_POST["pekerjaanwali"]);
                      $penghasilanwali = mysqli_real_escape_string($conn, $_POST["penghasilanwali"]);
                      $hubungandengansiswa = mysqli_real_escape_string($conn, $_POST["hubungandengansiswa"]);
                      $sekolahasal = mysqli_real_escape_string($conn, $_POST["sekolahasal"]);
                      $noskhun = mysqli_real_escape_string($conn, $_POST["noskhun"]);
                      $tanggalskhun = mysqli_real_escape_string($conn, $_POST["tanggalskhun"]);
                      $noijazah = mysqli_real_escape_string($conn, $_POST["noijazah"]);
                      $tanggalijazah = mysqli_real_escape_string($conn, $_POST["tanggalijazah"]);
                      $lamabelajar = mysqli_real_escape_string($conn, $_POST["lamabelajar"]);
                      $pindahandarisekolah = mysqli_real_escape_string($conn, $_POST["pindahandarisekolah"]);
                      $alasanpindah = mysqli_real_escape_string($conn, $_POST["alasanpindah"]);
                      $diterimaditingkat = mysqli_real_escape_string($conn, $_POST["diterimaditingkat"]);
                      $diterimatanggal = mysqli_real_escape_string($conn, $_POST["diterimatanggal"]);
                      $golongandarah = mysqli_real_escape_string($conn, $_POST["golongandarah"]);
                      $riwayatpenyakit = mysqli_real_escape_string($conn, $_POST["riwayatpenyakit"]);
                      $kelainanjasmani = mysqli_real_escape_string($conn, $_POST["kelainanjasmani"]);
                      $tinggibadan = mysqli_real_escape_string($conn, $_POST["tinggibadan"]);
                      $beratbadan = mysqli_real_escape_string($conn, $_POST["beratbadan"]);
                      $terimabeasiswatahun1 = mysqli_real_escape_string($conn, $_POST["terimabeasiswatahun1"]);
                      $terimabeasiswatahun2 = mysqli_real_escape_string($conn, $_POST["terimabeasiswatahun2"]);
                      $terimabeasiswatahun3 = mysqli_real_escape_string($conn, $_POST["terimabeasiswatahun3"]);
                      $tahunmeninggalkan = mysqli_real_escape_string($conn, $_POST["tahunmeninggalkan"]);
                      $alasanmeninggalkan = mysqli_real_escape_string($conn, $_POST["alasanmeninggalkan"]);
                      $tamatbelajar = mysqli_real_escape_string($conn, $_POST["tamatbelajar"]);
                      $noijazahakhir = mysqli_real_escape_string($conn, $_POST["noijazahakhir"]);
                      $noskhunakhir = mysqli_real_escape_string($conn, $_POST["noskhunakhir"]);
                      $melanjutkandi = mysqli_real_escape_string($conn, $_POST["melanjutkandi"]);
                      $bekerjadi = mysqli_real_escape_string($conn, $_POST["bekerjadi"]);
                      $namaperusahaan = mysqli_real_escape_string($conn, $_POST["namaperusahaan"]);
                      $penghasilansiswa = mysqli_real_escape_string($conn, $_POST["penghasilansiswa"]);
                      $keteranganlain = mysqli_real_escape_string($conn, $_POST["keteranganlain"]);
                      $namaavatar = $_FILES['avatar']['name'];
                      $ukuranavatar = $_FILES['avatar']['size'];
                      $tipeavatar = $_FILES['avatar']['type'];
                      $tmp = $_FILES['avatar']['tmp_name'];
                      $avatar = "dist/upload/" . $namaavatar;

                      $insert = ($_POST["insert"]);



                      $sql = "select * from $tabeldatabase where kode ='$kode'";
                      $result = mysqli_query($conn, $sql);

                      if (mysqli_num_rows($result) > 0) {
                        if ((($tipeavatar == "image/jpeg" || $tipeavatar == "image/png") && ($ukuranavatar <= 10000000)) && ($chmod >= 3 || $_SESSION['jabatan'] == 'admin')) {
                          $sql1 = "update $tabeldatabase set nama='$nama', nisn='$nisn', jeniskelamin='$jeniskelamin', tempat='$tempat', tgllahir='$tgllahir', agama='$agama', notelp='$notelp', alamat='$alamat', kewarganegaraan='$kewarganegaraan', anakke='$anakke', jumlahsaudarakandung='$jumlahsaudarakandung', jumlahsaudaratiri='$jumlahsaudaratiri', jumlahsaudaraangkat='$jumlahsaudaraangkat', statuskeorangtuaan='$statuskeorangtuaan', jarakrumahkesekolah='
                  $jarakrumahkesekolah', keterangantinggal='$keterangantinggal', bahasaseharihari='$bahasaseharihari', ajaran='$ajaran', statussiswa='$statussiswa', avatar='$avatar', namaayah='$namaayah', tempatayah='$tempatayah', tgllahirayah='$tgllahirayah', agamaayah='$agamaayah', notelpayah='$notelpayah', alamatayah='$alamatayah', kewarganegaraanayah='$kewarganegaraanayah', pendidikanterakhirayah='$pendidikanterakhirayah', pekerjaanayah='
                  $pekerjaanayah', penghasilanayah='$penghasilanayah', statushidupayah='$statushidupayah', namaibu='$namaibu', tempatibu='$tempatibu', tgllahiribu='$tgllahiribu', agamaibu='$agamaibu', notelpibu='$notelpibu', alamatibu='$alamatibu', kewarganegaraanibu='$kewarganegaraanibu', pendidikanterakhiribu='$pendidikanterakhiribu', pekerjaanibu='$pekerjaanibu', penghasilanibu='
                  $penghasilanibu', statushidupibu='$statushidupibu', namawali='$namawali', tempatwali='$tempatwali', tgllahirwali='$tgllahirwali', agamawali='$agamawali', notelpwali='$notelpwali', alamatwali='$alamatwali', kewarganegaraanwali='$kewarganegaraanwali', pendidikanterakhirwali='$pendidikanterakhirwali', pekerjaanwali='$pekerjaanwali', penghasilanwali='$penghasilanwali', hubungandengansiswa='
                  $hubungandengansiswa', sekolahasal='$sekolahasal', noskhun='$noskhun', tanggalskhun='$tanggalskhun', noijazah='$noijazah', tanggalijazah='$tanggalijazah', lamabelajar='$lamabelajar', pindahandarisekolah='$pindahandarisekolah', alasanpindah='$alasanpindah', diterimaditingkat='$diterimaditingkat', diterimatanggal='$diterimatanggal', golongandarah='$golongandarah', riwayatpenyakit='$riwayatpenyakit', kelainanjasmani='
                  $kelainanjasmani', tinggibadan='$tinggibadan', beratbadan='$beratbadan', terimabeasiswatahun1='$terimabeasiswatahun1', terimabeasiswatahun2='$terimabeasiswatahun2', terimabeasiswatahun3='$terimabeasiswatahun3', tahunmeninggalkan='$tahunmeninggalkan', alasanmeninggalkan='$alasanmeninggalkan',tamatbelajar='$tamatbelajar', noijazahakhir='$noijazahakhir', noskhunakhir='$noskhunakhir', melanjutkandi='$melanjutkandi', bekerjadi='
                  $bekerjadi', namaperusahaan='$namaperusahaan', penghasilansiswa='$penghasilansiswa', keteranganlain='$keteranganlain' where kode='$kode'";

                          if (mysqli_query($conn, $sql1)) {
                            echo "<script type='text/javascript'>  alert('Berhasil, Data telah diupdate!'); </script>";
                            echo "<script type='text/javascript'>window.location = '$forwardpage';</script>";
                          } else {
                            echo "<script type='text/javascript'>  alert('Gagal, Data gagal diupdate!'); </script>";
                            echo "<script type='text/javascript'>window.location = '$forwardpage';</script>";
                          }
                        } else if ($chmod >= 3 || $_SESSION['jabatan'] == 'admin') {
                          $avatar = "dist/upload/index.jpg";
                          $sql1 = "update $tabeldatabase set nama='$nama', nisn='$nisn', jeniskelamin='$jeniskelamin', tempat='$tempat', tgllahir='$tgllahir', agama='$agama', notelp='$notelp', alamat='$alamat', kewarganegaraan='$kewarganegaraan', anakke='$anakke', jumlahsaudarakandung='$jumlahsaudarakandung', jumlahsaudaratiri='$jumlahsaudaratiri', jumlahsaudaraangkat='$jumlahsaudaraangkat', statuskeorangtuaan='$statuskeorangtuaan', jarakrumahkesekolah='
                     $jarakrumahkesekolah', keterangantinggal='$keterangantinggal', bahasaseharihari='$bahasaseharihari', ajaran='$ajaran', statussiswa='$statussiswa', avatar='$avatar', namaayah='$namaayah', tempatayah='$tempatayah', tgllahirayah='$tgllahirayah', agamaayah='$agamaayah', notelpayah='$notelpayah', alamatayah='$alamatayah', kewarganegaraanayah='$kewarganegaraanayah', pendidikanterakhirayah='$pendidikanterakhirayah', pekerjaanayah='
                     $pekerjaanayah', penghasilanayah='$penghasilanayah', statushidupayah='$statushidupayah', namaibu='$namaibu', tempatibu='$tempatibu', tgllahiribu='$tgllahiribu', agamaibu='$agamaibu', notelpibu='$notelpibu', alamatibu='$alamatibu', kewarganegaraanibu='$kewarganegaraanibu', pendidikanterakhiribu='$pendidikanterakhiribu', pekerjaanibu='$pekerjaanibu', penghasilanibu='
                     $penghasilanibu', statushidupibu='$statushidupibu', namawali='$namawali', tempatwali='$tempatwali', tgllahirwali='$tgllahirwali', agamawali='$agamawali', notelpwali='$notelpwali', alamatwali='$alamatwali', kewarganegaraanwali='$kewarganegaraanwali', pendidikanterakhirwali='$pendidikanterakhirwali', pekerjaanwali='$pekerjaanwali', penghasilanwali='$penghasilanwali', hubungandengansiswa='
                     $hubungandengansiswa', sekolahasal='$sekolahasal', noskhun='$noskhun', tanggalskhun='$tanggalskhun', noijazah='$noijazah', tanggalijazah='$tanggalijazah', lamabelajar='$lamabelajar', pindahandarisekolah='$pindahandarisekolah', alasanpindah='$alasanpindah', diterimaditingkat='$diterimaditingkat', diterimatanggal='$diterimatanggal', golongandarah='$golongandarah', riwayatpenyakit='$riwayatpenyakit', kelainanjasmani='
                     $kelainanjasmani', tinggibadan='$tinggibadan', beratbadan='$beratbadan', terimabeasiswatahun1='$terimabeasiswatahun1', terimabeasiswatahun2='$terimabeasiswatahun2', terimabeasiswatahun3='$terimabeasiswatahun3', tahunmeninggalkan='$tahunmeninggalkan', alasanmeninggalkan='$alasanmeninggalkan',tamatbelajar='$tamatbelajar', noijazahakhir='$noijazahakhir', noskhunakhir='$noskhunakhir', melanjutkandi='$melanjutkandi', bekerjadi='
                     $bekerjadi', namaperusahaan='$namaperusahaan', penghasilansiswa='$penghasilansiswa', keteranganlain='$keteranganlain' where kode='$kode'";

                          if (mysqli_query($conn, $sql1)) {
                            echo "<script type='text/javascript'>  alert('Berhasil, Data telah diupdate!'); </script>";
                            echo "<script type='text/javascript'>window.location = '$forwardpage';</script>";
                          } else {
                            echo "<script type='text/javascript'>  alert('Gagal, Data gagal diupdate!'); </script>";
                            echo "<script type='text/javascript'>window.location = '$forwardpage';</script>";
                          }
                        } else {
                    ?>

                          <body onload="setTimeout(function() { document.frm1.submit() }, 10)">
                            <form action="<?php echo $baseurl; ?>/<?php echo $forwardpage; ?>" name="frm1" method="post">
                              <input type="hidden" name="hapusberhasil" value="3" />
                            </form>
                      <?php
                        }
                      } else if ((($tipeavatar == "image/jpeg" || $tipeavatar == "image/png") && ($ukuranavatar <= 10000000)) && ($chmod >= 2 || $_SESSION['jabatan'] == 'admin')) {
                        move_uploaded_file($tmp, $avatar);
                        $sql2 = "insert into $tabeldatabase values( '$kode','$nisn','$nama','$jeniskelamin','$tempat','$tgllahir','$agama','$notelp','$alamat','$kewarganegaraan','$anakke','$jumlahsaudarakandung','$jumlahsaudaratiri','$jumlahsaudaraangkat','$statuskeorangtuaan','
          $jarakrumahkesekolah','$keterangantinggal','$bahasaseharihari','$ajaran','$statussiswa','$avatar','$namaayah','$tempatayah','$tgllahirayah','$agamaayah','$notelpayah','$alamatayah','$kewarganegaraanayah','$pendidikanterakhirayah','
          $pekerjaanayah','$penghasilanayah','$statushidupayah','$namaibu','$tempatibu','$tgllahiribu','$agamaibu','$notelpibu','$alamatibu','$kewarganegaraanibu','$pendidikanterakhiribu','$pekerjaanibu','
          $penghasilanibu','$statushidupibu','$namawali','$tempatwali','$tgllahirwali','$agamawali','$notelpwali','$alamatwali','$kewarganegaraanwali','$pendidikanterakhirwali','$pekerjaanwali','$penghasilanwali','
          $hubungandengansiswa','$sekolahasal','$noskhun','$tanggalskhun','$noijazah','$tanggalijazah','$lamabelajar','$pindahandarisekolah','$alasanpindah','$diterimaditingkat','$diterimatanggal','$golongandarah','$riwayatpenyakit','
          $kelainanjasmani','$tinggibadan','$beratbadan','$terimabeasiswatahun1','$terimabeasiswatahun2','$terimabeasiswatahun3','$tahunmeninggalkan','$alasanmeninggalkan','$tamatbelajar','$noijazahakhir','$noskhunakhir','$melanjutkandi','
          $bekerjadi','$namaperusahaan','$penghasilansiswa','$keteranganlain','')";
                        if (mysqli_query($conn, $sql2)) {
                          echo "<script type='text/javascript'>  alert('Berhasil, Data telah disimpan!'); </script>";
                          echo "<script type='text/javascript'>window.location = '$forwardpage';</script>";
                        } else {
                          echo "<script type='text/javascript'>  alert('Gagal, Data gagal disimpan!'); </script>";
                          echo "<script type='text/javascript'>window.location = '$forwardpage';</script>";
                        }
                      } else {
                        $avatar = "dist/upload/index.jpg";
                        $sql2 = "insert into $tabeldatabase values( '$kode','$nisn','$nama','$jeniskelamin','$tempat','$tgllahir','$agama','$notelp','$alamat','$kewarganegaraan','$anakke','$jumlahsaudarakandung','$jumlahsaudaratiri','$jumlahsaudaraangkat','$statuskeorangtuaan','
          $jarakrumahkesekolah','$keterangantinggal','$bahasaseharihari','$ajaran','$statussiswa','$avatar','$namaayah','$tempatayah','$tgllahirayah','$agamaayah','$notelpayah','$alamatayah','$kewarganegaraanayah','$pendidikanterakhirayah','
          $pekerjaanayah','$penghasilanayah','$statushidupayah','$namaibu','$tempatibu','$tgllahiribu','$agamaibu','$notelpibu','$alamatibu','$kewarganegaraanibu','$pendidikanterakhiribu','$pekerjaanibu','
          $penghasilanibu','$statushidupibu','$namawali','$tempatwali','$tgllahirwali','$agamawali','$notelpwali','$alamatwali','$kewarganegaraanwali','$pendidikanterakhirwali','$pekerjaanwali','$penghasilanwali','
          $hubungandengansiswa','$sekolahasal','$noskhun','$tanggalskhun','$noijazah','$tanggalijazah','$lamabelajar','$pindahandarisekolah','$alasanpindah','$diterimaditingkat','$diterimatanggal','$golongandarah','$riwayatpenyakit','
          $kelainanjasmani','$tinggibadan','$beratbadan','$terimabeasiswatahun1','$terimabeasiswatahun2','$terimabeasiswatahun3','$tahunmeninggalkan','$alasanmeninggalkan','$tamatbelajar','$noijazahakhir','$noskhunakhir','$melanjutkandi','
          $bekerjadi','$namaperusahaan','$penghasilansiswa','$keteranganlain','')";
                        if (mysqli_query($conn, $sql2)) {
                          echo "<script type='text/javascript'>  alert('Berhasil, Data telah disimpan!'); </script>";
                          echo "<script type='text/javascript'>window.location = '$forwardpage';</script>";
                        } else {
                          echo "<script type='text/javascript'>  alert('Gagal, Data gagal disimpan!'); </script>";
                          echo "<script type='text/javascript'>window.location = '$forwardpage';</script>";
                        }
                      }
                    }


                      ?>

                      <script>
                        function myFunction() {
                          document.getElementById("Myform").submit();
                        }
                      </script>

                      <!-- KONTEN BODY AKHIR -->

                  </div>
                </div>

                <!-- /.box-body -->
              </div>
            </div>

          <?php
          } else {
          ?>
            <div class="callout callout-danger">
              <h4>Info</h4>
              <b>Hanya user tertentu yang dapat mengakses halaman <?php echo $dataapa; ?> ini .</b>
            </div>
          <?php
          }
          ?>
          <!-- ./col -->
        </div>

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php footer(); ?>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="dist/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="dist/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="dist/plugins/morris/morris.min.js"></script>
<script src="dist/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="dist/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="dist/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="dist/plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="dist/plugins/daterangepicker/daterangepicker.js"></script>
<script src="dist/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="dist/plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="dist/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="dist/plugins/fastclick/fastclick.js"></script>
<script src="dist/plugins/select2/select2.full.min.js"></script>
<script src="dist/plugins/input-mask/jquery.inputmask.js"></script>
<script src="dist/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="dist/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="dist/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="dist/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function() {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("yyyy-mm-dd", {
      "placeholder": "yyyy/mm/dd"
    });
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("yyyy-mm-dd", {
      "placeholder": "yyyy/mm/dd"
    });
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      format: 'YYYY/MM/DD h:mm A'
    });
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Hari Ini': [moment(), moment()],
          'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Akhir 7 Hari': [moment().subtract(6, 'days'), moment()],
          'Akhir 30 Hari': [moment().subtract(29, 'days'), moment()],
          'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
          'Akhir Bulan': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    $('.datepicker').datepicker({
      dateFormat: 'yyyy-mm-dd'
    });

    //Date picker 2

    $('#datepicker2').datepicker({
      autoclose: true
    });

    $('.datepicker2').datepicker({
      dateFormat: 'yyyy-mm-dd'
    });

    //Date picker 3

    $('#datepicker3').datepicker({
      autoclose: true
    });

    $('.datepicker3').datepicker({
      dateFormat: 'yyyy-mm-dd'
    });
    //Date picker 4

    $('#datepicker4').datepicker({
      autoclose: true
    });

    $('.datepicker4').datepicker({
      dateFormat: 'yyyy-mm-dd'
    });

    //Date picker 5

    $('#datepicker5').datepicker({
      autoclose: true
    });

    $('.datepicker5').datepicker({
      dateFormat: 'yyyy-mm-dd'
    });
    //Date picker 6

    $('#datepicker6').datepicker({
      autoclose: true
    });

    $('.datepicker6').datepicker({
      dateFormat: 'yyyy-mm-dd'
    });
    //Date picker 7

    $('#datepicker7').datepicker({
      autoclose: true
    });

    $('.datepicker7').datepicker({
      dateFormat: 'yyyy-mm-dd'
    });


    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });


    $('#jeniskelamin').select2({
      placeholder: "Silakan pilih salah satu"
    });
    $('#kewarganegaraan').select2({
      placeholder: "Silakan pilih salah satu"
    });
    $('#statuskeorangtuaan').select2({
      placeholder: "Silakan pilih salah satu"
    });
    $('#ajaran').select2({
      placeholder: "Silakan pilih salah satu"
    });
    $('#statussiswa').select2({
      placeholder: "Silakan pilih salah satu"
    });
    $('#kewarganegaraanayah').select2({
      placeholder: "Silakan pilih salah satu"
    });
    $('#kewarganegaraanibu').select2({
      placeholder: "Silakan pilih salah satu"
    });
    $('#penghasilanayah').select2({
      placeholder: "Silakan pilih salah satu"
    });
    $('#penghasilanibu').select2({
      placeholder: "Silakan pilih salah satu"
    });
    $('#statushidupayah').select2({
      placeholder: "Silakan pilih salah satu"
    });
    $('#statushidupibu').select2({
      placeholder: "Silakan pilih salah satu"
    });
    $('#kewarganegaraanwali').select2({
      placeholder: "Silakan pilih salah satu"
    });
    $('#penghasilanwali').select2({
      placeholder: "Silakan pilih salah satu"
    });
    $('#penghasilansiswa').select2({
      placeholder: "Silakan pilih salah satu"
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
</body>

</html>