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
          $sql = "SELECT * FROM siswa ORDER BY id_siswa DESC LIMIT 1";
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
                <h3 class="box-title">Tambah Data Pendidikan Siswa <?= $fetch['nama_siswa'] ?></h3>
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
                            <li class="active"><a href="#tab_1" data-toggle="tab">Data Pendidikan </a></li>
                          </ul>
                        </div>
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_1">
                            <div class="col-lg-12">

                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="sekolahasal" class="col-sm-3 control-label">Sekolah Asal:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="sekolahasal" name="sekolahasal" value="<?php echo $sekolah_asal; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="noskhun" class="col-sm-3 control-label">No. SKHUN:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="noskhun" name="noskhun" value="<?php echo $skhun; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="no_ujian_nasional" class="col-sm-3 control-label">Nomor Ujian Nasional:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control pull-right" name="no_ujian_nasional" value="<?php echo $no_ujian_nasional; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="noijazah" class="col-sm-3 control-label">No. Ijazah:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="noijazah" name="noijazah" value="<?php echo $noijazah; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="rombel" class="col-sm-3 control-label">Rombongan Belajar:</label>
                                  <div class="col-sm-9">
                                    <!-- <input type="text" class="form-control pull-right" name="rombel" value="<?php echo $rombel; ?>"> -->
                                    <select class="form-control " style="width: 100%;" name="rombel" id="rombel">
                                      <option value=''></option>
                                      <?php
                                      $sql = "SELECT * FROM rombel";
                                      $run_rombel = mysqli_query($conn, $sql);
                                      while ($data = mysqli_fetch_array($run_rombel)) { ?>
                                        <option value='<?= $data['id_rombel'] ?>'><?= $data['rombel'] ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                  <label for="tahun_ajaran" class="col-sm-3 control-label">Tahun Ajaran:</label>
                                  <div class="col-sm-9">
                                    <!-- <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="<?php echo $ajaran; ?>"> -->
                                    <select class="form-control " style="width: 100%;" name="tahun_ajaran" id="tahun_ajaran">
                                      <option value=''></option>
                                      <?php
                                      $sql = "SELECT * FROM tahun_ajaran";
                                      $run_tahun_ajaran = mysqli_query($conn, $sql);
                                      while ($data = mysqli_fetch_array($run_tahun_ajaran)) { ?>
                                        <option value='<?= $data['id_tahun_ajaran'] ?>'><?= $data['tahun_ajaran'] ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="box-footer">
                                <button type="submit" class="btn btn-default pull-left btn-flat" name="simpan"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
                                <a href="tambah_bank_siswa">
                                  <button type="button" class="ml-3 btn btn-info pull-left btn-flat" name="simpan"> Tidak ada data pendidikan <span class="glyphicon glyphicon-arrow-right"></span></button>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                      <?php
                      if (isset($_POST['simpan'])) {
                        $sekolahasal = $_POST['sekolahasal'];
                        $noskhun = $_POST["noskhun"];
                        $no_ujian_nasional = $_POST["no_ujian_nasional"];
                        $noijazah = $_POST["noijazah"];
                        $rombel = $_POST["rombel"];
                        $tahun_ajaran = $_POST["tahun_ajaran"];
                        $id_siswa = $fetch['id_siswa'];
                        if (empty($sekolahasal) and empty($rombel) and empty($tahun_ajaran)) {
                          echo "<script>alert('Sekolah Asal, Rombongan Belajar dan Tahun Ajaran Tidak boleh kosong');</script>";
                        } else {
                          $sql = "UPDATE siswa SET
                        sekolah_asal = '$sekolahasal',
                        skhun = '$noskhun',
                        no_ujian_nasional = '$no_ujian_nasional',
                        no_seri_ijasah = '$noijazah',
                        id_rombel = '$rombel',
                        id_tahun_ajaran = '$tahun_ajaran'
                        WHERE id_siswa = '$id_siswa';
                        ";

                          $run_sql = mysqli_query($conn, $sql);

                          if ($run_sql) {
                            echo "<script>alert('Berhasil tambah data');location.href='tambah_bank_siswa'</script>";
                          } else {
                            echo "<script>
                          alert('gagal')
                          </script>";
                          }
                        }
                      }
                      ?>
                    </div>
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
</body>

</html>