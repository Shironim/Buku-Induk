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
                <h3 class="box-title">Tambah Data Siswa <?= $fetch['nama_siswa'] ?></h3>
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
                            <!-- <li><a href="#">Data Ayah</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Data Ibu</a></li>
                            <li><a href="#tab_4" data-toggle="tab">Data Wali</a></li>
                            <li><a href="#tab_5" data-toggle="tab">Data Pendidikan</a></li>
                            <li><a href="#tab_6" data-toggle="tab">Data Bank Siswa</a></li>
                            <li><a href="#tab_7" data-toggle="tab">Data PIP Siswa</a></li>
                            <li><a href="#tab_8" data-toggle="tab">Data KIP Siswa</a></li>
                            <li><a href="#tab_9" data-toggle="tab">Data KPS Siswa</a></li> -->
                            <!-- <li><a href="#tab_9" data-toggle="tab">Lain Lain</a></li> -->
                          </ul>
                        </div>
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_1">
                            <div class="col-lg-12">
                              <div class="row">
                                <?php
                                if (isset($fetch)) { ?>
                                  <div class="alert alert-info" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    Data Siswa Ditemukan
                                  </div>
                                <?php } else { ?>
                                  <div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    Data Siswa Tidak Ditemukan
                                  </div>
                                <?php } ?>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="kode" class="col-sm-3 control-label">No. Induk / NISN:</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="nis" name="nis" value="<?= $fetch['nis'] ?>">
                                  </div>
                                  <div class="col-sm-5">
                                    <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $fetch['nisn']; ?>">

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="nama" class="col-sm-3 control-label">Nama Lengkap:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $fetch['nama_siswa']; ?>">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="jeniskelamin" class="col-sm-3 control-label">Jenis Kelamin:</label>
                                  <div class="col-sm-9">
                                    <?php
                                    if ($fetch['jk'] == 'P') {
                                      $P = 'selected';
                                    } else if ($fetch['jk'] == 'L') {
                                      $L = 'selected';
                                    }
                                    ?>
                                    <select class="form-control " style="width: 100%;" name="jk" id="jk">
                                      <option value=''></option>
                                      <option <?= $P ?> value='P'>Perempuan</option>
                                      <option <?= $L ?> value='L'>Laki Laki</option>
                                    </select>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="tempat" class="col-sm-3 control-label">Tempat / Tgl Lahir:</label>
                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tempat" name="tempat" value="<?php echo $fetch['tempat_lahir']; ?>">
                                  </div>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control pull-right" id="datepicker2" name="tgllahir" value="<?php echo $fetch['tgl_lahir']; ?>">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="agama" class="col-sm-3 control-label">Agama:</label>
                                  <div class="col-sm-9">

                                    <input type="text" class="form-control pull-right" name="agama" value="<?php echo $fetch['agama']; ?>">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="notelp" class="col-sm-3 control-label">No Telepon / HP:</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="notelp" name="notelp" value="<?php echo $fetch['telepon']; ?>">
                                  </div>
                                  <div class="col-sm-5">
                                    <input type="text" class="form-control" id="hp" name="hp" value="<?php echo $fetch['hp']; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="email" class="col-sm-3 control-label">Email :</label>
                                  <div class="col-sm-9">

                                    <input type="text" class="form-control pull-right" name="email" value="<?php echo $fetch['email']; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="nik" class="col-sm-3 control-label">NIK Siswa :</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control pull-right" name="nik" value="<?php echo $fetch['nik']; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="tinggibadan" class="col-sm-3 control-label">Tinggi / Berat Badan:</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="tinggibadan" name="tinggibadan" value="<?php echo $fetch['tinggi_badan']; ?>">
                                  </div>
                                  <div class="col-sm-5">
                                    <input type="text" class="form-control" id="beratbadan" name="beratbadan" value="<?php echo $fetch['berat_badan']; ?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="jmlsaudarakandung" class="col-sm-3 control-label">Jml Saudara Kandung:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jmlsaudarakandung" name="jmlsaudarakandung" value="<?php echo $fetch['jml_saudara_kandung']; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="jarakrumahkesekolah" class="col-sm-3 control-label">Jarak Rumah (KM):</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jarakrumahkesekolah" name="jarakrumahkesekolah" value="<?php echo $fetch['jarak_ke_rumah']; ?>">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="keterangantinggal" class="col-sm-3 control-label">Keterangan Tinggal:</label>
                                  <div class="col-sm-9">
                                    <?php
                                    if ($fetch['jenis_tinggal'] == 'Bersama orang tua') {
                                      $bersama = 'selected';
                                    } else if ($fetch['jenis_tinggal'] == 'Wali') {
                                      $wali = 'selected';
                                    } else if ($fetch['jenis_tinggal'] == 'Lainnya') {
                                      $lainnya = 'selected';
                                    }
                                    ?>
                                    <select class="form-control " style="width: 100%;" name="keterangantinggal" id="keterangantinggal">
                                      <option value=''></option>
                                      <option <?= $bersama ?> value='Bersama orang tua'>Bersama orang tua</option>
                                      <option <?= $wali ?> value='Wali'>Wali</option>
                                      <option <?= $lainnya ?> value='Lainnya'>Lainnya</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="alat_transportasi" class="col-sm-3 control-label">Alat Transportasi:</label>
                                  <div class="col-sm-9">
                                    <?php
                                    if ($fetch['alat_transportasi'] == 'Kendaraan pribadi') {
                                      $Kendaraan = 'selected';
                                    } else if ($fetch['alat_transportasi'] == 'Mobil pribadi') {
                                      $Mobil = 'selected';
                                    } else if ($fetch['alat_transportasi'] == 'Sepeda motor') {
                                      $Sepeda = 'selected';
                                    } else if ($fetch['alat_transportasi'] == 'Angkutan umum/bus/pete-pete') {
                                      $Angkutan = 'selected';
                                    } else if ($fetch['alat_transportasi'] == 'Mobil/bus antar jemput') {
                                      $Mobil = 'selected';
                                    } else if ($fetch['alat_transportasi'] == 'Ojek') {
                                      $Ojek = 'selected';
                                    } else if ($fetch['alat_transportasi'] == 'Sepeda') {
                                      $Sepeda = 'selected';
                                    } else if ($fetch['alat_transportasi'] == 'Jalan kaki') {
                                      $Jalan = 'selected';
                                    }
                                    ?>
                                    <select class="form-control " style="width: 100%;" name="alat_transportasi" id="alat_transportasi">
                                      <option value=''></option>
                                      <option <?= $Kendaraan ?> value='Kendaraan pribadi'>Kendaraan pribadi</option>
                                      <option <?= $Mobil ?> value='Mobil pribadi'>Mobil pribadi</option>
                                      <option <?= $Sepeda ?> value='Sepeda motor'>Sepeda motor</option>
                                      <option <?= $Angkutan ?> value='Angkutan umum/bus/pete-pete'>Angkutan umum/bus/pete-pete</option>
                                      <option <?= $Mobil ?> value='Mobil/bus antar jemput'>Mobil/bus antar jemput</option>
                                      <option <?= $Ojek ?> value='Ojek'>Ojek</option>
                                      <option <?= $Sepeda ?> value='Sepeda'>Sepeda</option>
                                      <option <?= $Jalan ?> value='Jalan kaki'>Jalan kaki</option>
                                    </select>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="alamat" class="col-sm-3 control-label">Alamat:</label>
                                  <div class="col-sm-9">
                                    <textarea class="form-control" rows="3" id="alamat" name="alamat" maxlength="255"><?php echo $fetch['alamat']; ?></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="rt" class="col-sm-3 control-label">RT / RW :</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="rt" name="rt" value="<?php echo $fetch['rt']; ?>">
                                  </div>
                                  <div class="col-sm-5">
                                    <input type="text" class="form-control" id="rw" name="rw" value="<?php echo $fetch['rw']; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="kelurahan" class="col-sm-3 control-label">Kelurahan / Kecamatan :</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?php echo $fetch['kelurahan']; ?>">
                                  </div>
                                  <div class="col-sm-5">
                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?php echo $fetch['kecamatan']; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="kode_pos" class="col-sm-3 control-label">Kode POS:</label>
                                  <div class="col-sm-9">
                                    <input type='text' class="form-control" rows="3" id="kode_pos" name="kode_pos" value="<?php echo $fetch['kode_pos']; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="box-footer">
                                <button type="submit" class="btn btn-default pull-left btn-flat" name="simpan"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan Perubahan</button>
                                <a href="edit_ayah?id=<?= $get_id_siswa ?>">
                                  <button type="button" class="ml-3 btn btn-info pull-left btn-flat" name="simpan"> Edit Data Ayah <span class="glyphicon glyphicon-arrow-right"></span></button>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                      <?php
                      if (isset($_POST['simpan'])) {
                        $nis = $_POST["nis"];
                        $nisn = $_POST["nisn"];
                        $nama = $_POST["nama"];
                        $jeniskelamin = $_POST["jk"];
                        $tempat = $_POST["tempat"];
                        $tgllahir = $_POST["tgllahir"];
                        $agama = $_POST["agama"];
                        $notelp = $_POST["notelp"];
                        $hp = $_POST["hp"];
                        $email = $_POST["email"];
                        $alat_transportasi = $_POST["alat_transportasi"];
                        $nik = $_POST["nik"];
                        $alamat = $_POST["alamat"];
                        $rt = $_POST["rt"];
                        $rw = $_POST["rw"];
                        $kelurahan = $_POST["kelurahan"];
                        $kecamatan = $_POST["kecamatan"];
                        $kode_pos = $_POST["kode_pos"];
                        $jumlahsaudarakandung = $_POST["jumlahsaudarakandung"];
                        $jarakrumahkesekolah = $_POST["jarakrumahkesekolah"];
                        $keterangantinggal = $_POST["keterangantinggal"];
                        $ajaran = $_POST["tahun_ajaran"];
                        $rombel = $_POST["rombel"];
                        $tinggibadan = $_POST["tinggibadan"];
                        $beratbadan = $_POST["beratbadan"];

                        if (empty($nis) and empty($nisn) and empty($nama) and empty($jeniskelamin) and empty($agama) and empty($nik)) {
                          echo "<script>alert('NIS, NISN, Nama Lengkap, Jenis Kelamin, Agama Dan NIK Siswa Tidak Boleh Kosong')</script>";
                        } else {
                          $sql = "UPDATE siswa SET 
                        nis = '$nis',
                        nisn = '$nisn',
                        nama_siswa = '$nama',
                        jk = '$jk',
                        tempat_lahir = '$tempat',
                        tgl_lahir = '$tgllahir',
                        agama = '$agama',
                        alamat = '$alamat',
                        rt = '$rt',
                        rw = '$rw',
                        kelurahan = '$kelurahan',
                        kecamatan = '$kecamatan',
                        telepon = '$notelp',
                        hp = '$hp',
                        email = '$email',
                        jenis_tinggal = '$keterangantinggal',
                        alat_transportasi = '$alat_transportasi',
                        nik = '$nik',
                        kode_pos = '$kode_pos',
                        jml_saudara_kandung = '$jmlsaudarakandung',
                        jarak_ke_sekolah = '$jarakrumahkesekolah',
                        berat_badan = '$beratbadan',
                        tinggi_badan = '$tinggibadan'
                        
                        WHERE id_siswa = '$get_id_siswa'";

                          $run_sql = mysqli_query($conn, $sql);

                          if ($run_sql) {
                            echo "<script>alert('berhasil');location.href='edit_ayah?id=$get_id_siswa'</script>";
                          } else {
                            echo "<script>alert('gagal')</script>";
                          }
                        }
                      }

                      ?>

                    </div>
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
</body>

</html>