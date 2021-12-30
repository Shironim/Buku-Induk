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
                <h3 class="box-title">Tambah Data Siswa </h3>
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
                            <div class="col-lg-6">
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="kode" class="col-sm-3 control-label">No. Induk / NISN:</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="nis" name="nis" value="<?= $nis ?>">
                                  </div>
                                  <div class="col-sm-5">
                                    <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $nisn; ?>">

                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="nama" class="col-sm-3 control-label">Nama Lengkap:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="jeniskelamin" class="col-sm-3 control-label">Jenis Kelamin:</label>
                                  <div class="col-sm-9">
                                    <select class="form-control " style="width: 100%;" name="jk" id="jk">
                                      <option value=''></option>
                                      <option value='P'>Perempuan</option>
                                      <option value='L'>Laki Laki</option>
                                    </select>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="tempat" class="col-sm-3 control-label">Tempat / Tgl Lahir:</label>
                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tempat" name="tempat" value="<?php echo $tempat; ?>">
                                  </div>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control pull-right" id="datepicker2" name="tgllahir" value="<?php echo $tgllahir; ?>">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="agama" class="col-sm-3 control-label">Agama:</label>
                                  <div class="col-sm-9">

                                    <input type="text" class="form-control pull-right" name="agama" value="<?php echo $agama; ?>">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="notelp" class="col-sm-3 control-label">No Telepon / HP:</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="notelp" name="notelp" value="<?php echo $notelp; ?>">
                                  </div>
                                  <div class="col-sm-5">
                                    <input type="text" class="form-control" id="hp" name="hp" value="<?php echo $hp; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="email" class="col-sm-3 control-label">Email :</label>
                                  <div class="col-sm-9">

                                    <input type="text" class="form-control pull-right" name="email" value="<?php echo $email; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="nik" class="col-sm-3 control-label">NIK Siswa :</label>
                                  <div class="col-sm-9">

                                    <input type="text" class="form-control pull-right" name="nik" value="<?php echo $nik; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="tinggibadan" class="col-sm-3 control-label">Tinggi / Berat Badan:</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="tinggibadan" name="tinggibadan" value="<?php echo $tinggibadan; ?>">
                                  </div>
                                  <div class="col-sm-5">
                                    <input type="text" class="form-control" id="beratbadan" name="beratbadan" value="<?php echo $beratbadan; ?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="jmlsaudarakandung" class="col-sm-3 control-label">Jml Saudara Kandung:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jmlsaudarakandung" name="jmlsaudarakandung" value="<?php echo $jumlahsaudarakandung; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="jarakrumahkesekolah" class="col-sm-3 control-label">Jarak Rumah (KM):</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jarakrumahkesekolah" name="jarakrumahkesekolah" value="<?php echo $jarakrumahkesekolah; ?>">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="keterangantinggal" class="col-sm-3 control-label">Keterangan Tinggal:</label>
                                  <div class="col-sm-9">
                                    <!-- <input type="text" class="form-control" id="keterangantinggal" name="keterangantinggal" value="<?php echo $keterangantinggal; ?>"> -->
                                    <select class="form-control " style="width: 100%;" name="keterangantinggal" id="keterangantinggal">
                                      <option value=''></option>
                                      <option value='Bersama orang tua'>Bersama orang tua</option>
                                      <option value='Wali'>Wali</option>
                                      <option value='Lainnya'>Lainnya</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="alat_transportasi" class="col-sm-3 control-label">Alat Transportasi:</label>
                                  <div class="col-sm-9">
                                    <!-- <input type="text" class="form-control" id="alat_transportasi" name="alat_transportasi" value="<?php echo $alat_transportasi; ?>"> -->
                                    <select class="form-control " style="width: 100%;" name="alat_transportasi" id="alat_transportasi">
                                      <option value=''></option>
                                      <option value='Kendaraan pribadi'>Kendaraan pribadi</option>
                                      <option value='Mobil pribadi'>Mobil pribadi</option>
                                      <option value='Sepeda motor'>Sepeda motor</option>
                                      <option value='Angkutan umum/bus/pete-pete'>Angkutan umum/bus/pete-pete</option>
                                      <option value='Mobil/bus antar jemput'>Mobil/bus antar jemput</option>
                                      <option value='Ojek'>Ojek</option>
                                      <option value='Sepeda'>Sepeda</option>
                                      <option value='Jalan kaki'>Jalan kaki</option>
                                    </select>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="alamat" class="col-sm-3 control-label">Alamat:</label>
                                  <div class="col-sm-9">
                                    <textarea class="form-control" rows="3" id="alamat" name="alamat" maxlength="255"></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="rt" class="col-sm-3 control-label">RT / RW :</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="rt" name="rt" value="">
                                  </div>
                                  <div class="col-sm-5">
                                    <input type="text" class="form-control" id="rw" name="rw" value="">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="kelurahan" class="col-sm-3 control-label">Kelurahan / Kecamatan :</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="">
                                  </div>
                                  <div class="col-sm-5">
                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="kode_pos" class="col-sm-3 control-label">Kode POS:</label>
                                  <div class="col-sm-9">
                                    <input type='text' class="form-control" rows="3" id="kode_pos" name="kode_pos">
                                  </div>
                                </div>
                              </div>
                              <div class="box-footer">
                                <button type="submit" class="btn btn-default pull-left btn-flat" name="simpan"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
                                <!-- <a href="tambah_ayah_siswa">
                                  <button type="button" class="ml-3 btn btn-info pull-left btn-flat" name="simpan"> Tambah Data Ayah <span class="glyphicon glyphicon-arrow-right"></span></button>
                                </a> -->
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
                        $jmlsaudarakandung = $_POST["jmlsaudarakandung"];
                        $jarakrumahkesekolah = $_POST["jarakrumahkesekolah"];
                        $keterangantinggal = $_POST["keterangantinggal"];
                        $tinggibadan = $_POST["tinggibadan"];
                        $beratbadan = $_POST["beratbadan"];

                        if (empty($nis) and empty($nisn) and empty($nama) and empty($jeniskelamin) and empty($agama) and empty($nik)) {
                          echo "<script>alert('NIS, NISN, Nama Lengkap, Jenis Kelamin, Agama Dan NIK Siswa Tidak Boleh Kosong')</script>";
                        } else {
                          $sql = "INSERT INTO siswa (nis,nisn,nama_siswa, jk, tempat_lahir, tgl_lahir, agama, alamat, rt, rw, kelurahan, kecamatan, telepon, hp, email, jenis_tinggal, alat_transportasi, nik, kode_pos, jml_saudara_kandung, jarak_ke_sekolah, berat_badan, tinggi_badan) VALUES ('$nis','$nisn','$nama','$jeniskelamin','$tempat','$tgllahir','$agama','$alamat','$rt','$rw','$kelurahan','$kecamatan','$notelp','$hp','$email','$keterangantinggal','$alat_transportasi','$nik','$kode_pos','$jmlsaudarakandung','$jarakrumahkesekolah','$beratbadan','$tinggibadan')";

                          $run_sql = mysqli_query($conn, $sql);

                          if ($run_sql) {
                            echo "<script>alert('Berhasil tambah data');location.href='tambah_ayah_siswa'</script>";
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