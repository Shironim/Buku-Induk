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
          $halaman = "siswa"; // halaman
          $dataapa = "siswa"; // data
          $tabeldatabase = "siswa"; // tabel database
          $chmod = $chmenu3; // Hak akses Menu
          $forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
          $forwardpage = mysqli_real_escape_string($conn, $halaman); // halaman
          $search = $_POST['search'];
          $insert = $_POST['insert'];

          function autoNumber()
          {
            global $forward;
            global $conn;
            $query = "SELECT MAX(RIGHT(kode, 4)) as max_id FROM $forward ORDER BY kode";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_array($conn, $result);
            $id_max = $data['max_id'];
            $sort_num = (int) substr($id_max, 1, 4);
            $sort_num++;
            $new_code = sprintf("%04s", $sort_num);
            return $new_code;
          }
          ?>


          <!-- SETTING STOP -->


          <!-- BREADCRUMB -->

          <ol class="breadcrumb ">
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
          </ol>

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
          if ($chmod >= 2 || $_SESSION['jabatan'] == 'admin') {
          ?>


            <!-- KONTEN BODY AWAL -->
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Data <?php echo $dataapa; ?></h3>
              </div>
              <!-- /.box-header -->

              <div class="box-body">
                <div class="table-responsive">
                  <!----------------KONTEN------------------->
                  <?php
                  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

                  $kode = $nisn = $nama = $jeniskelamin = $tempat = $tgllahir = $agama = $notelp = $alamat = $kewarganegaraan = $anakke = $jumlahsaudarakandung = $jumlahsaudaratiri = $jumlahsaudaraangkat = $statuskeorangtuaan =
                    $jarakrumahkesekolah = $keterangantinggal = $bahasaseharihari = $ajaran = $statussiswa = $avatar = $namaayah = $tempatayah = $tgllahirayah = $agamaayah = $notelpayah = $alamatayah = $kewarganegaraanayah = $pendidikanterakhirayah =
                    $pekerjaanayah = $penghasilanayah = $statushidupayah = $namaibu = $tempatibu = $tgllahiribu = $agamaibu = $notelpibu = $alamatibu = $kewarganegaraanibu = $pendidikanterakhiribu = $pekerjaanibu =
                    $penghasilanibu = $statushidupibu = $namawali = $tempatwali = $tgllahirwali = $agamawali = $notelpwali = $alamatwali = $kewarganegaraanwali = $pendidikanterakhirwali = $pekerjaanwali = $penghasilanwali =
                    $hubungandengansiswa = $sekolahasal = $noskhun = $tanggalskhun = $noijazah = $tanggalijazah = $lamabelajar = $pindahandarisekolah = $alasanpindah = $diterimaditingkat = $diterimatanggal = $golongandarah = $riwayatpenyakit =
                    $kelainanjasmani = $tinggibadan = $beratbadan = $terimabeasiswatahun1 = $terimabeasiswatahun2 = $terimabeasiswatahun3 = $tahunmeninggalkan = $alasanmeninggalkan = $tamatbelajar = $noijazahakhir = $noskhunakhir = $melanjutkandi =
                    $bekerjadi = $namaperusahaan = $penghasilansiswa = $keteranganlain = "";
                  $no = $_GET["no"];
                  $insert = '1';



                  if (($no != null || $no != "") && ($chmod >= 3 || $_SESSION['jabatan'] == 'admin')) {

                    $sql = "select * from $tabeldatabase where no='$no'";
                    $hasil2 = mysqli_query($conn, $sql);


                    while ($fill = mysqli_fetch_assoc($hasil2)) {


                      $kode = $fill["kode"];
                      $nisn = $fill["nisn"];
                      $nama = $fill["nama"];
                      $jeniskelamin = $fill["jeniskelamin"];
                      $tempat = $fill["tempat"];
                      $tgllahir = $fill["tgllahir"];
                      $agama = $fill["agama"];
                      $notelp = $fill["notelp"];
                      $alamat = $fill["alamat"];
                      $kewarganegaraan = $fill["kewarganegaraan"];
                      $anakke = $fill["anakke"];
                      $jumlahsaudarakandung = $fill["jumlahsaudarakandung"];
                      $jumlahsaudaratiri = $fill["jumlahsaudaratiri"];
                      $jumlahsaudaraangkat = $fill["jumlahsaudaraangkat"];
                      $statuskeorangtuaan = $fill["statuskeorangtuaan"];
                      $jarakrumahkesekolah = $fill["jarakrumahkesekolah"];
                      $keterangantinggal = $fill["keterangantinggal"];
                      $bahasaseharihari = $fill["bahasaseharihari"];
                      $ajaran = $fill["ajaran"];
                      $statussiswa = $fill["statussiswa"];
                      $avatar = $fill["avatar"];
                      $namaayah = $fill["namaayah"];
                      $tempatayah = $fill["tempatayah"];
                      $tgllahirayah = $fill["tgllahirayah"];
                      $agamaayah = $fill["agamaayah"];
                      $notelpayah = $fill["notelpayah"];
                      $alamatayah = $fill["alamatayah"];
                      $kewarganegaraanayah = $fill["kewarganegaraanayah"];
                      $pendidikanterakhirayah = $fill["pendidikanterakhirayah"];
                      $pekerjaanayah = $fill["pekerjaanayah"];
                      $penghasilanayah = $fill["penghasilanayah"];
                      $statushidupayah = $fill["statushidupayah"];
                      $namaibu = $fill["namaibu"];
                      $tempatibu = $fill["tempatibu"];
                      $tgllahiribu = $fill["tgllahiribu"];
                      $agamaibu = $fill["agamaibu"];
                      $notelpibu = $fill["notelpibu"];
                      $alamatibu = $fill["alamatibu"];
                      $kewarganegaraanibu = $fill["kewarganegaraanibu"];
                      $pendidikanterakhiribu = $fill["pendidikanterakhiribu"];
                      $pekerjaanibu = $fill["pekerjaanibu"];
                      $penghasilanibu = $fill["penghasilanibu"];
                      $statushidupibu = $fill["statushidupibu"];
                      $namawali = $fill["namawali"];
                      $tempatwali = $fill["tempatwali"];
                      $tgllahirwali = $fill["tgllahirwali"];
                      $agamawali = $fill["agamawali"];
                      $notelpwali = $fill["notelpwali"];
                      $alamatwali = $fill["alamatwali"];
                      $kewarganegaraanwali = $fill["kewarganegaraanwali"];
                      $pendidikanterakhirwali = $fill["pendidikanterakhirwali"];
                      $pekerjaanwali = $fill["pekerjaanwali"];
                      $penghasilanwali = $fill["penghasilanwali"];
                      $hubungandengansiswa = $fill["hubungandengansiswa"];
                      $sekolahasal = $fill["sekolahasal"];
                      $noskhun = $fill["noskhun"];
                      $tanggalskhun = $fill["tanggalskhun"];
                      $noijazah = $fill["noijazah"];
                      $tanggalijazah = $fill["tanggalijazah"];
                      $lamabelajar = $fill["lamabelajar"];
                      $pindahandarisekolah = $fill["pindahandarisekolah"];
                      $alasanpindah = $fill["alasanpindah"];
                      $diterimaditingkat = $fill["diterimaditingkat"];
                      $diterimatanggal = $fill["diterimatanggal"];
                      $golongandarah = $fill["golongandarah"];
                      $riwayatpenyakit = $fill["riwayatpenyakit"];
                      $kelainanjasmani = $fill["kelainanjasmani"];
                      $tinggibadan = $fill["tinggibadan"];
                      $beratbadan = $fill["beratbadan"];
                      $terimabeasiswatahun1 = $fill["terimabeasiswatahun1"];
                      $terimabeasiswatahun2 = $fill["terimabeasiswatahun2"];
                      $terimabeasiswatahun3 = $fill["terimabeasiswatahun3"];
                      $tahunmeninggalkan = $fill["tahunmeninggalkan"];
                      $alasanmeninggalkan = $fill["alasanmeninggalkan"];
                      $tamatbelajar = $fill["tamatbelajar"];
                      $noijazahakhir = $fill["noijazahakhir"];
                      $noskhunakhir = $fill["noskhunakhir"];
                      $melanjutkandi = $fill["melanjutkandi"];
                      $bekerjadi = $fill["bekerjadi"];
                      $namaperusahaan = $fill["namaperusahaan"];
                      $penghasilansiswa = $fill["penghasilansiswa"];
                      $keteranganlain = $fill["keteranganlain"];
                      $insert = '3';
                    }
                  }
                  ?>
                  <div id="main">
                    <div class="container-fluid">
                      <form class="form-horizontal" method="post" action="add_<?php echo $halaman; ?>" id="Myform">

                        <div class="nav-tabs-custom">
                          <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Data Siswa</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Orang Tua</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Data Wali</a></li>
                            <li><a href="#tab_4" data-toggle="tab">Data Pendidikan</a></li>
                            <li><a href="#tab_5" data-toggle="tab">Data Kesehatan</a></li>
                            <li><a href="#tab_6" data-toggle="tab">Data Perkembangan</a></li>
                            <li><a href="#tab_7" data-toggle="tab">Data Lanjutan</a></li>
                            <li><a href="#tab_8" data-toggle="tab">Lain Lain</a></li>
                          </ul>
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                              <div class="col-lg-6">

                                <?php
                                if ($avatar != null) { ?>
                                  <div class="row">
                                    <div class="form-group col-md-6 col-xs-6">
                                      <img class='profile-user-img img-responsive' src='<?php echo $avatar ?>' title='<?php echo $kode ?>'>
                                    </div>
                                  </div>
                                <?php
                                } else {
                                }
                                ?>

                                <div class="row">
                                  <br />
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="kode" class="col-sm-3 control-label">No. Induk / NISN:</label>

                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $kode; ?>" placeholder="Masukan No.Induk Siswa" maxlength="100" required>
                                    </div>
                                    <div class="col-sm-5">
                                      <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $nisn; ?>" placeholder="Masukan NISN Siswa" maxlength="100">

                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="nama" class="col-sm-3 control-label">Nama Lengkap:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" placeholder="Masukan Nama siswa" maxlength="100" required>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="jeniskelamin" class="col-sm-3 control-label">Jenis Kelamin:</label>
                                    <div class="col-sm-9">

                                      <select class="form-control select2" style="width: 100%;" name="jeniskelamin" id="jeniskelamin">
                                        <option></option>
                                        <option value='laki-laki' <?php if ($jeniskelamin == 'laki-laki') {
                                                                    echo 'selected';
                                                                  } ?>>laki-laki</option>
                                        <option value='perempuan' <?php if ($jeniskelamin == 'perempuan') {
                                                                    echo 'selected';
                                                                  } ?>>perempuan</option>

                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="tempat" class="col-sm-3 control-label">Tempat / Tgl Lahir:</label>
                                    <div class="col-sm-6">
                                      <input type="text" class="form-control" id="tempat" name="tempat" value="<?php echo $tempat; ?>" placeholder="Masukan Tempat Lahir" maxlength="100">
                                    </div>
                                    <div class="col-sm-3">
                                      <input type="text" class="form-control pull-right" id="datepicker2" name="tgllahir" placeholder="Masukan Tanggal" value="<?php echo $tgllahir; ?>">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="agama" class="col-sm-3 control-label">Agama:</label>
                                    <div class="col-sm-9">

                                      <select class="form-control select2" style="width: 100%;" name="agama" id="agama">
                                        <option></option>
                                        <option value='Islam' <?php if ($agama == 'Islam') {
                                                                echo 'selected';
                                                              } ?>>Islam</option>
                                        <option value='Kristen' <?php if ($agama == 'Kristen') {
                                                                  echo 'selected';
                                                                } ?>>Kristen</option>
                                        <option value='Katolik' <?php if ($agama == 'Katolik') {
                                                                  echo 'selected';
                                                                } ?>>Katolik</option>
                                        <option value='Hindu' <?php if ($agama == 'Hindu') {
                                                                echo 'selected';
                                                              } ?>>Hindu</option>
                                        <option value='Buddha' <?php if ($agama == 'Buddha') {
                                                                  echo 'selected';
                                                                } ?>>Buddha</option>
                                        <option value='Konghucu' <?php if ($agama == 'Konghucu') {
                                                                    echo 'selected';
                                                                  } ?>>Konghucu</option>

                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="notelp" class="col-sm-3 control-label">No Telepon:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="notelp" name="notelp" value="<?php echo $notelp; ?>" placeholder="Masukan Nomor Telepon" maxlength="100">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="alamat" class="col-sm-3 control-label">Alamat:</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control" rows="3" id="alamat" name="alamat" maxlength="255" placeholder="Masukan Alamat lengkap"><?php echo $alamat; ?></textarea>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="kewarganegaraan" class="col-sm-3 control-label">Kewarganegaraan:</label>
                                    <div class="col-sm-9">

                                      <select class="form-control select2" style="width: 100%;" name="kewarganegaraan" id="kewarganegaraan">
                                        <option></option>
                                        <option value='indonesia' <?php if ($kewarganegaraan == 'indonesia') {
                                                                    echo 'selected';
                                                                  } ?>>indonesia</option>
                                        <option value='asing' <?php if ($kewarganegaraan == 'asing') {
                                                                echo 'selected';
                                                              } ?>>asing</option>
                                        <option value='-' <?php if ($kewarganegaraan == '-') {
                                                            echo 'selected';
                                                          } ?>>-</option>

                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <?php if ($avatar == null || $avatar == "") { ?>

                                  <div class="row">
                                    <div class="form-group col-md-12 col-xs-12">
                                      <label for="avatar" class="col-sm-3 control-label">Foto:</label>
                                      <div class="col-sm-9">
                                        <input type="file" name="avatar">
                                      </div>
                                    </div>
                                  </div>

                                <?php } else { ?>
                                  <div class="row">
                                    <div class="form-group col-md-12 col-xs-12">
                                      <label for="avatar" class="col-sm-3 control-label">Foto:</label>
                                      <div class="col-sm-9">
                                        <input type="file" name="avatar">
                                      </div>
                                    </div>
                                  </div>
                                <?php } ?>

                              </div>
                              <div class="col-lg-6">
                                <br />
                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="anakke" class="col-sm-3 control-label">Anak ke:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="anakke" name="anakke" value="<?php echo $anakke; ?>" placeholder="Masukan Angka" maxlength="20">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="jumlahsaudarakandung" class="col-sm-3 control-label">Jml Saudara Kandung:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="jumlahsaudarakandung" name="jumlahsaudarakandung" value="<?php echo $jumlahsaudarakandung; ?>" placeholder="Masukan Jumlah Saudara kandung" maxlength="20">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="jumlahsaudaratiri" class="col-sm-3 control-label">Jml Saudara Tiri:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="jumlahsaudaratiri" name="jumlahsaudaratiri" value="<?php echo $jumlahsaudaratiri; ?>" placeholder="Masukan Jumlah Saudara Tiri" maxlength="20">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="jumlahsaudaraangkat" class="col-sm-3 control-label">Jml Saudara Angkat:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="jumlahsaudaraangkat" name="jumlahsaudaraangkat" value="<?php echo $jumlahsaudaraangkat; ?>" placeholder="Masukan Jumlah Saudara Angkat" maxlength="20">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="statuskeorangtuaan" class="col-sm-3 control-label">Status Keorangtuaan:</label>
                                    <div class="col-sm-9">

                                      <select class="form-control select2" style="width: 100%;" name="statuskeorangtuaan" id="statuskeorangtuaan">
                                        <option></option>
                                        <option value='yatim' <?php if ($statuskeorangtuaan == 'yatim') {
                                                                echo 'selected';
                                                              } ?>>yatim</option>
                                        <option value='piatu' <?php if ($statuskeorangtuaan == 'piatu') {
                                                                echo 'selected';
                                                              } ?>>piatu</option>
                                        <option value='yatim piatu' <?php if ($statuskeorangtuaan == 'yatim piatu') {
                                                                      echo 'selected';
                                                                    } ?>>yatim piatu</option>
                                        <option value='-' <?php if ($statuskeorangtuaan == '-') {
                                                            echo 'selected';
                                                          } ?>>-</option>

                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="jarakrumahkesekolah" class="col-sm-3 control-label">Jarak Rumah:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="jarakrumahkesekolah" name="jarakrumahkesekolah" value="<?php echo $jarakrumahkesekolah; ?>" placeholder="Masukan Jarak Rumah ke Sekolah" maxlength="">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="keterangantinggal" class="col-sm-3 control-label">Keterangan Tinggal:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="keterangantinggal" name="keterangantinggal" value="<?php echo $keterangantinggal; ?>" placeholder="Masukan keterangan Tinggal" maxlength="100">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="bahasaseharihari" class="col-sm-3 control-label">Bahasa Sehari-hari:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="bahasaseharihari" name="bahasaseharihari" value="<?php echo $bahasaseharihari; ?>" placeholder="Masukan Bahasa Sehari-hari" maxlength="100">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="ajaran" class="col-sm-3 control-label">Tahun Ajaran:</label>
                                    <div class="col-sm-9">

                                      <select class="form-control select2" style="width: 100%;" name="ajaran" id="ajaran" required>
                                        <option></option>
                                        <?php
                                        $sql = mysqli_query($conn, "select * from ajaran");
                                        while ($row = mysqli_fetch_assoc($sql)) {
                                          if ($ajaran == $row['kode'])
                                            echo "<option value='" . $row['kode'] . "' selected='selected'>" . $row['nama'] . "</option>";
                                          else
                                            echo "<option value='" . $row['kode'] . "'>" . $row['nama'] . "</option>";
                                        }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="statussiswa" class="col-sm-3 control-label">Status Siswa:</label>
                                    <div class="col-sm-9">

                                      <select class="form-control select2" style="width: 100%;" name="statussiswa" id="statussiswa" required>
                                        <option></option>
                                        <?php
                                        $sql = mysqli_query($conn, "select * from status");
                                        while ($row = mysqli_fetch_assoc($sql)) {
                                          if ($statussiswa == $row['kode'])
                                            echo "<option value='" . $row['kode'] . "' selected='selected'>" . $row['nama'] . "</option>";
                                          else
                                            echo "<option value='" . $row['kode'] . "'>" . $row['nama'] . "</option>";
                                        }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <!-- /.tab-1 -->

                              </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">


                              <div class="col-lg-6">
                                <br />
                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="namaayah" class="col-sm-3 control-label">Nama Ayah:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="namaayah" name="namaayah" value="<?php echo $namaayah; ?>" placeholder="Masukan Nama Ayah" maxlength="100">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="tempatayah" class="col-sm-3 control-label">Tempat / Tgl Lahir:</label>
                                    <div class="col-sm-6">
                                      <input type="text" class="form-control" id="tempatayah" name="tempatayah" value="<?php echo $tempatayah; ?>" placeholder="Masukan Tempat Lahir" maxlength="100">
                                    </div>
                                    <div class="col-sm-3">
                                      <input type="text" class="form-control pull-right" id="datepicker3" name="tgllahirayah" placeholder="Masukan Tanggal" value="<?php echo $tgllahirayah; ?>">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="agamaayah" class="col-sm-3 control-label">Agama:</label>
                                    <div class="col-sm-9">

                                      <input type="text" class="form-control" id="agamaayah" name="agamaayah" value="<?php echo $agamaayah; ?>" placeholder="Masukan Nama Agama Ayah" maxlength="100">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="notelpayah" class="col-sm-3 control-label">No Telepon:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="notelpayah" name="notelpayah" value="<?php echo $notelpayah; ?>" placeholder="Masukan Nomor Telepon" maxlength="100">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="alamatayah" class="col-sm-3 control-label">Alamat:</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control" rows="3" id="alamatayah" name="alamatayah" maxlength="255" placeholder="Masukan Alamat lengkap"><?php echo $alamatayah; ?></textarea>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="kewarganegaraanayah" class="col-sm-3 control-label">Kewarganegaraan:</label>
                                    <div class="col-sm-9">

                                      <select class="form-control select2" style="width: 100%;" name="kewarganegaraanayah" id="kewarganegaraanayah">
                                        <option></option>
                                        <option value='indonesia' <?php if ($kewarganegaraanayah == 'indonesia') {
                                                                    echo 'selected';
                                                                  } ?>>indonesia</option>
                                        <option value='asing' <?php if ($kewarganegaraanayah == 'asing') {
                                                                echo 'selected';
                                                              } ?>>asing</option>
                                        <option value='-' <?php if ($kewarganegaraanayah == '-') {
                                                            echo 'selected';
                                                          } ?>>-</option>

                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="pendidikanterakhirayah" class="col-sm-3 control-label">Pendidikan Terakhir:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="pendidikanterakhirayah" name="pendidikanterakhirayah" value="<?php echo $pendidikanterakhirayah; ?>" placeholder="Masukan Pendidikan Terakhir" maxlength="100">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="pekerjaanayah" class="col-sm-3 control-label">Pekerjaan:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="pekerjaanayah" name="pekerjaanayah" value="<?php echo $pekerjaanayah; ?>" placeholder="Masukan Pekerjaan" maxlength="100">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="penghasilanayah" class="col-sm-3 control-label">Penghasilan Perbulan:</label>
                                    <div class="col-sm-9">

                                      <select class="form-control select2" style="width: 100%;" name="penghasilanayah" id="penghasilanayah">
                                        <option></option>
                                        <option value='< 250 Ribu' <?php if ($penghasilanayah == '< 250 Ribu') {
                                                                      echo 'selected';
                                                                    } ?>>
                                          < 250 Ribu</option>
                                        <option value='250 - 500 Ribu' <?php if ($penghasilanayah == '250 - 500 Ribu') {
                                                                          echo 'selected';
                                                                        } ?>>250 - 500 Ribu</option>
                                        <option value='500 Ribu - 1 Juta' <?php if ($penghasilanayah == '500 Ribu - 1 Juta') {
                                                                            echo 'selected';
                                                                          } ?>>500 Ribu - 1 Juta</option>
                                        <option value='1 Juta - 2 Juta' <?php if ($penghasilanayah == '1 Juta - 2 Juta') {
                                                                          echo 'selected';
                                                                        } ?>>1 Juta - 2 Juta</option>
                                        <option value='2 Juta - 3 Juta' <?php if ($penghasilanayah == '2 Juta - 3 Juta') {
                                                                          echo 'selected';
                                                                        } ?>>2 Juta - 3 Juta</option>
                                        <option value='3 Juta - 5 Juta' <?php if ($penghasilanayah == '3 Juta - 5 Juta') {
                                                                          echo 'selected';
                                                                        } ?>>3 Juta - 5 Juta</option>
                                        <option value='5 Juta - 7 Juta' <?php if ($penghasilanayah == '5 Juta - 7 Juta') {
                                                                          echo 'selected';
                                                                        } ?>>5 Juta - 7 Juta</option>
                                        <option value='7 Juta - 10 Juta' <?php if ($penghasilanayah == '7 Juta - 10 Juta') {
                                                                            echo 'selected';
                                                                          } ?>>7 Juta - 10 Juta</option>
                                        <option value='> 10 Juta' <?php if ($penghasilanayah == '> 10 Juta') {
                                                                    echo 'selected';
                                                                  } ?>>> 10 Juta</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="statushidupayah" class="col-sm-3 control-label">Status Hidup:</label>
                                    <div class="col-sm-9">

                                      <select class="form-control select2" style="width: 100%;" name="statushidupayah" id="statushidupayah">
                                        <option></option>
                                        <option value='hidup' <?php if ($statushidupayah == 'hidup') {
                                                                echo 'selected';
                                                              } ?>>hidup</option>
                                        <option value='meninggal' <?php if ($statushidupayah == 'meninggal') {
                                                                    echo 'selected';
                                                                  } ?>>meninggal</option>
                                        <option value='-' <?php if ($statushidupayah == '-') {
                                                            echo 'selected';
                                                          } ?>>-</option>

                                      </select>
                                    </div>
                                  </div>
                                </div>

                              </div>

                              <div class="col-lg-6">
                                <br />
                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="namaibu" class="col-sm-3 control-label">Nama Ibu:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="namaibu" name="namaibu" value="<?php echo $namaibu; ?>" placeholder="Masukan Nama ibu" maxlength="100">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="tempatibu" class="col-sm-3 control-label">Tempat / Tgl Lahir:</label>
                                    <div class="col-sm-6">
                                      <input type="text" class="form-control" id="tempatibu" name="tempatibu" value="<?php echo $tempatibu; ?>" placeholder="Masukan Tempat Lahir" maxlength="100">
                                    </div>
                                    <div class="col-sm-3">
                                      <input type="text" class="form-control pull-right" id="datepicker4" name="tgllahiribu" placeholder="Masukan Tanggal" value="<?php echo $tgllahiribu; ?>">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="agamaibu" class="col-sm-3 control-label">Agama:</label>
                                    <div class="col-sm-9">

                                      <input type="text" class="form-control" id="agamaibu" name="agamaibu" value="<?php echo $agamaibu; ?>" placeholder="Masukan Nama Agama Ibu" maxlength="100">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="notelpibu" class="col-sm-3 control-label">No Telepon:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="notelpibu" name="notelpibu" value="<?php echo $notelpibu; ?>" placeholder="Masukan Nomor Telepon" maxlength="100">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="alamatibu" class="col-sm-3 control-label">Alamat:</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control" rows="3" id="alamatibu" name="alamatibu" maxlength="255" placeholder="Masukan Alamat lengkap"><?php echo $alamatibu; ?></textarea>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="kewarganegaraanibu" class="col-sm-3 control-label">Kewarganegaraan:</label>
                                    <div class="col-sm-9">

                                      <select class="form-control select2" style="width: 100%;" name="kewarganegaraanibu" id="kewarganegaraanibu">
                                        <option></option>
                                        <option value='indonesia' <?php if ($kewarganegaraanibu == 'indonesia') {
                                                                    echo 'selected';
                                                                  } ?>>indonesia</option>
                                        <option value='asing' <?php if ($kewarganegaraanibu == 'asing') {
                                                                echo 'selected';
                                                              } ?>>asing</option>
                                        <option value='-' <?php if ($kewarganegaraanibu == '-') {
                                                            echo 'selected';
                                                          } ?>>-</option>

                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="pendidikanterakhiribu" class="col-sm-3 control-label">Pendidikan Terakhir:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="pendidikanterakhiribu" name="pendidikanterakhiribu" value="<?php echo $pendidikanterakhiribu; ?>" placeholder="Masukan Pendidikan Terakhir" maxlength="100">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="pekerjaanibu" class="col-sm-3 control-label">Pekerjaan:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="pekerjaanibu" name="pekerjaanibu" value="<?php echo $pekerjaanibu; ?>" placeholder="Masukan Pekerjaan" maxlength="100">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="penghasilanibu" class="col-sm-3 control-label">Penghasilan Perbulan:</label>
                                    <div class="col-sm-9">

                                      <select class="form-control select2" style="width: 100%;" name="penghasilanibu" id="penghasilanibu">
                                        <option></option>
                                        <option value='< 250 Ribu' <?php if ($penghasilanibu == '< 250 Ribu') {
                                                                      echo 'selected';
                                                                    } ?>>
                                          < 250 Ribu</option>
                                        <option value='250 - 500 Ribu' <?php if ($penghasilanibu == '250 - 500 Ribu') {
                                                                          echo 'selected';
                                                                        } ?>>250 - 500 Ribu</option>
                                        <option value='500 Ribu - 1 Juta' <?php if ($penghasilanibu == '500 Ribu - 1 Juta') {
                                                                            echo 'selected';
                                                                          } ?>>500 Ribu - 1 Juta</option>
                                        <option value='1 Juta - 2 Juta' <?php if ($penghasilanibu == '1 Juta - 2 Juta') {
                                                                          echo 'selected';
                                                                        } ?>>1 Juta - 2 Juta</option>
                                        <option value='2 Juta - 3 Juta' <?php if ($penghasilanibu == '2 Juta - 3 Juta') {
                                                                          echo 'selected';
                                                                        } ?>>2 Juta - 3 Juta</option>
                                        <option value='3 Juta - 5 Juta' <?php if ($penghasilanibu == '3 Juta - 5 Juta') {
                                                                          echo 'selected';
                                                                        } ?>>3 Juta - 5 Juta</option>
                                        <option value='5 Juta - 7 Juta' <?php if ($penghasilanibu == '5 Juta - 7 Juta') {
                                                                          echo 'selected';
                                                                        } ?>>5 Juta - 7 Juta</option>
                                        <option value='7 Juta - 10 Juta' <?php if ($penghasilanibu == '7 Juta - 10 Juta') {
                                                                            echo 'selected';
                                                                          } ?>>7 Juta - 10 Juta</option>
                                        <option value='> 10 Juta' <?php if ($penghasilanibu == '> 10 Juta') {
                                                                    echo 'selected';
                                                                  } ?>>> 10 Juta</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12 col-xs-12">
                                    <label for="statushidupibu" class="col-sm-3 control-label">Status Hidup:</label>
                                    <div class="col-sm-9">

                                      <select class="form-control select2" style="width: 100%;" name="statushidupibu" id="statushidupibu">
                                        <option></option>
                                        <option value='hidup' <?php if ($statushidupibu == 'hidup') {
                                                                echo 'selected';
                                                              } ?>>hidup</option>
                                        <option value='meninggal' <?php if ($statushidupibu == 'meninggal') {
                                                                    echo 'selected';
                                                                  } ?>>meninggal</option>
                                        <option value='-' <?php if ($statushidupibu == '-') {
                                                            echo 'selected';
                                                          } ?>>-</option>

                                      </select>
                                    </div>
                                  </div>
                                </div>

                              </div>

                              <!-- /.tab-2 -->

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                              <br />

                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="namawali" class="col-sm-3 control-label">Nama wali:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="namawali" name="namawali" value="<?php echo $namawali; ?>" placeholder="Masukan Nama wali" maxlength="100">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="tempatwali" class="col-sm-3 control-label">Tempat / Tgl Lahir:</label>
                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tempatwali" name="tempatwali" value="<?php echo $tempatwali; ?>" placeholder="Masukan Tempat Lahir" maxlength="100">
                                  </div>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control pull-right" id="datepicker4" name="tgllahirwali" placeholder="Masukan Tanggal" value="<?php echo $tgllahirwali; ?>">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="agamawali" class="col-sm-3 control-label">Agama:</label>
                                  <div class="col-sm-9">

                                    <input type="text" class="form-control" id="agamawali" name="agamawali" value="<?php echo $agamawali; ?>" placeholder="Masukan Nama Agama Wali" maxlength="100">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="notelpwali" class="col-sm-3 control-label">No Telepon:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="notelpwali" name="notelpwali" value="<?php echo $notelpwali; ?>" placeholder="Masukan Nomor Telepon" maxlength="100">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="alamatwali" class="col-sm-3 control-label">Alamat:</label>
                                  <div class="col-sm-9">
                                    <textarea class="form-control" rows="3" id="alamatwali" name="alamatwali" maxlength="255" placeholder="Masukan Alamat lengkap"><?php echo $alamatwali; ?></textarea>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="kewarganegaraanwali" class="col-sm-3 control-label">Kewarganegaraan:</label>
                                  <div class="col-sm-9">

                                    <select class="form-control select2" style="width: 100%;" name="kewarganegaraanwali" id="kewarganegaraanwali">
                                      <option></option>
                                      <option value='indonesia' <?php if ($kewarganegaraanwali == 'indonesia') {
                                                                  echo 'selected';
                                                                } ?>>indonesia</option>
                                      <option value='asing' <?php if ($kewarganegaraanwali == 'asing') {
                                                              echo 'selected';
                                                            } ?>>asing</option>
                                      <option value='-' <?php if ($kewarganegaraanwali == '-') {
                                                          echo 'selected';
                                                        } ?>>-</option>

                                    </select>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="pendidikanterakhirwali" class="col-sm-3 control-label">Pendidikan Terakhir:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pendidikanterakhirwali" name="pendidikanterakhirwali" value="<?php echo $pendidikanterakhirwali; ?>" placeholder="Masukan Pendidikan Terakhir" maxlength="100">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="pekerjaanwali" class="col-sm-3 control-label">Pekerjaan:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pekerjaanwali" name="pekerjaanwali" value="<?php echo $pekerjaanwali; ?>" placeholder="Masukan Pekerjaan" maxlength="100">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="penghasilanwali" class="col-sm-3 control-label">Penghasilan Perbulan:</label>
                                  <div class="col-sm-9">

                                    <select class="form-control select2" style="width: 100%;" name="penghasilanwali" id="penghasilanwali">
                                      <option></option>
                                      <option value='< 250 Ribu' <?php if ($penghasilanwali == '< 250 Ribu') {
                                                                    echo 'selected';
                                                                  } ?>>
                                        < 250 Ribu</option>
                                      <option value='250 - 500 Ribu' <?php if ($penghasilanwali == '250 - 500 Ribu') {
                                                                        echo 'selected';
                                                                      } ?>>250 - 500 Ribu</option>
                                      <option value='500 Ribu - 1 Juta' <?php if ($penghasilanwali == '500 Ribu - 1 Juta') {
                                                                          echo 'selected';
                                                                        } ?>>500 Ribu - 1 Juta</option>
                                      <option value='1 Juta - 2 Juta' <?php if ($penghasilanwali == '1 Juta - 2 Juta') {
                                                                        echo 'selected';
                                                                      } ?>>1 Juta - 2 Juta</option>
                                      <option value='2 Juta - 3 Juta' <?php if ($penghasilanwali == '2 Juta - 3 Juta') {
                                                                        echo 'selected';
                                                                      } ?>>2 Juta - 3 Juta</option>
                                      <option value='3 Juta - 5 Juta' <?php if ($penghasilanwali == '3 Juta - 5 Juta') {
                                                                        echo 'selected';
                                                                      } ?>>3 Juta - 5 Juta</option>
                                      <option value='5 Juta - 7 Juta' <?php if ($penghasilanwali == '5 Juta - 7 Juta') {
                                                                        echo 'selected';
                                                                      } ?>>5 Juta - 7 Juta</option>
                                      <option value='7 Juta - 10 Juta' <?php if ($penghasilanwali == '7 Juta - 10 Juta') {
                                                                          echo 'selected';
                                                                        } ?>>7 Juta - 10 Juta</option>
                                      <option value='> 10 Juta' <?php if ($penghasilanwali == '> 10 Juta') {
                                                                  echo 'selected';
                                                                } ?>>> 10 Juta</option>
                                    </select>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="hubungandengansiswa" class="col-sm-3 control-label">Hubungan Dengan Siswa:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="hubungandengansiswa" name="hubungandengansiswa" value="<?php echo $hubungandengansiswa; ?>" placeholder="Masukan Hubungan dengan Siswa" maxlength="100">
                                  </div>
                                </div>
                              </div>

                            </div>
                            <!-- /.tab-pane -->

                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_4">
                              <div class="col-lg-12">
                                <br />

                                <p>Pendidikan Sebelumnya</p>
                                <div class="row">
                                  <div class="form-group col-md-6 col-xs-12">
                                    <label for="sekolahasal" class="col-sm-3 control-label">Sekolah Asal:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="sekolahasal" name="sekolahasal" value="<?php echo $sekolahasal; ?>" placeholder="Masukan Sekolah Asal" maxlength="100">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6 col-xs-12">
                                    <label for="noskhun" class="col-sm-3 control-label">No. SKHUN:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="noskhun" name="noskhun" value="<?php echo $noskhun; ?>" placeholder="Masukan No SKHUN" maxlength="100">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6 col-xs-12">
                                    <label for="tanggalskhun" class="col-sm-3 control-label">Tanggal SKHUN:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control pull-right" id="datepicker5" name="tanggalskhun" placeholder="Masukan Tanggal" value="<?php echo $tanggalskhun; ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6 col-xs-12">
                                    <label for="noijazah" class="col-sm-3 control-label">No. Ijazah:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="noijazah" name="noijazah" value="<?php echo $noijazah; ?>" placeholder="Masukan No Ijazah" maxlength="100">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6 col-xs-12">
                                    <label for="tanggalijazah" class="col-sm-3 control-label">Tanggal Ijazah:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control pull-right" id="datepicker6" name="tanggalijazah" placeholder="Masukan Tanggal" value="<?php echo $tanggalijazah; ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6 col-xs-12">
                                    <label for="lamabelajar" class="col-sm-3 control-label">Lama Belajar:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="lamabelajar" name="lamabelajar" value="<?php echo $lamabelajar; ?>" placeholder="Masukan lama Belajar" maxlength="100">
                                    </div>
                                  </div>
                                </div>
                                <br />
                                <p>Pindahan</p>

                                <div class="row">
                                  <div class="form-group col-md-6 col-xs-12">
                                    <label for="pindahandarisekolah" class="col-sm-3 control-label">Pindahan dari Sekolah:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="pindahandarisekolah" name="pindahandarisekolah" value="<?php echo $pindahandarisekolah; ?>" placeholder="Masukan Nama Sekolah" maxlength="100">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6 col-xs-12">
                                    <label for="alasanpindah" class="col-sm-3 control-label">Alasan Pindah:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="alasanpindah" name="alasanpindah" value="<?php echo $alasanpindah; ?>" placeholder="Masukan Alasan Pindah" maxlength="100">
                                    </div>
                                  </div>
                                </div>
                                <br />
                                <p>Diterima Di Sekolah Ini</p>

                                <div class="row">
                                  <div class="form-group col-md-6 col-xs-12">
                                    <label for="diterimaditingkat" class="col-sm-3 control-label">Diterima di Tingkat:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="diterimaditingkat" name="diterimaditingkat" value="<?php echo $diterimaditingkat; ?>" placeholder="Masukan Tingkat" maxlength="100">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6 col-xs-12">
                                    <label for="diterimatanggal" class="col-sm-3 control-label">Diterima Tanggal:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control pull-right" id="datepicker7" name="diterimatanggal" placeholder="Masukan Tanggal" value="<?php echo $diterimatanggal; ?>">
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                            <!-- /.tab-pane -->

                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_5">
                              <div class="col-lg-12">
                                <br />
                                <div class="row">
                                  <div class="form-group col-md-6 col-xs-12">
                                    <label for="golongandarah" class="col-sm-3 control-label">Golongan Darah:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="golongandarah" name="golongandarah" value="<?php echo $golongandarah; ?>" placeholder="Masukan Golongan Darah" maxlength="100">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6 col-xs-12">
                                    <label for="riwayatpenyakit" class="col-sm-3 control-label">Riwayat Penyakit:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="riwayatpenyakit" name="riwayatpenyakit" value="<?php echo $riwayatpenyakit; ?>" placeholder="Masukan Riwayat Penyakit" maxlength="100">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6 col-xs-12">
                                    <label for="kelainanjasmani" class="col-sm-3 control-label">Kelainan Jasmani:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="kelainanjasmani" name="kelainanjasmani" value="<?php echo $kelainanjasmani; ?>" placeholder="Masukan Kelainan Jasmani" maxlength="100">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6 col-xs-12">
                                    <label for="tinggibadan" class="col-sm-3 control-label">Tinggi Badan:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="tinggibadan" name="tinggibadan" value="<?php echo $tinggibadan; ?>" placeholder="Masukan Tinggi Badan ( cm )" maxlength="100">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6 col-xs-12">
                                    <label for="beratbadan" class="col-sm-3 control-label">Berat Badan:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="beratbadan" name="beratbadan" value="<?php echo $beratbadan; ?>" placeholder="Masukan Berat Badan ( kg )" maxlength="100">
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_6">
                              <div class="col-lg-12">
                                <br />

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
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_7">
                              <div class="col-lg-12">
                                <br />
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
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_8">
                              <div class="col-lg-12">
                                <br />

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

                          <div class="box-body">




                            <input type="hidden" class="form-control" id="insert" name="insert" value="<?php echo $insert; ?>" maxlength="1">


                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <button type="submit" class="btn btn-default pull-left btn-flat" name="simpan" onclick="document.getElementById('Myform').submit();"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
                          </div>
                          <!-- /.box-footer -->


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