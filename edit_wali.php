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
          $sql = "SELECT siswa.id_siswa, siswa.nama_siswa FROM siswa WHERE id_siswa = '$get_id_siswa'";
          $data = mysqli_query($conn, $sql);
          $fetch = mysqli_fetch_array($data);
          $sql_wali = "SELECT * FROM wali_siswa WHERE id_siswa = '$get_id_siswa'";
          $data_wali = mysqli_query($conn, $sql_wali);
          $fetch_wali = mysqli_fetch_array($data_wali);
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
                <h3 class="box-title">Tambah Data wali Siswa <?php
                                                              if ($fetch['nama_siswa'] == '') {
                                                                echo "Tidak Ada Data Wali";
                                                              } else {
                                                                echo $fetch['nama_siswa'];
                                                              }
                                                              ?></h3>
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
                            <li class="active"><a href="#tab_1" data-toggle="tab">Data wali</a></li>
                          </ul>
                        </div>
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_1">
                            <div class="col-lg-12">
                              <div class="row">
                                <?php
                                if (isset($fetch_wali)) { ?>
                                  <div class="alert alert-info" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    Data Wali Ditemukan
                                  </div>
                                <?php } else { ?>
                                  <div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    Data Wali Tidak Ditemukan
                                  </div>
                                <?php } ?>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="namawali" class="col-sm-3 control-label">Nama wali:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_wali" name="nama_wali" value="<?php echo $fetch_wali['nama_wali']; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="tempatwali" class="col-sm-3 control-label">Tahun Lahir:</label>
                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tahun_lahir_wali" name="tahun_lahir_wali" value="<?php echo $fetch_wali['tahun_lahir_wali']; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="pendidikanterakhirwali" class="col-sm-3 control-label">Pendidikan Terakhir:</label>
                                  <div class="col-sm-9">
                                    <?php
                                    $jenjang = $fetch_wali['jenjang_pendidikan_wali'];
                                    if ($jenjang == 'Tidak Sekolah') {
                                      $td = 'Selected';
                                    } else if ($jenjang == 'SD / sederajat') {
                                      $sd = 'Selected';
                                    } else if ($jenjang == 'SMP / sederajat') {
                                      $smp = 'Selected';
                                    } else if ($jenjang == 'SMA / sederajat') {
                                      $sma = 'Selected';
                                    } else if ($jenjang == 'S1') {
                                      $s1 = 'Selected';
                                    } else if ($jenjang == 'S2') {
                                      $s2 = 'Selected';
                                    } else if ($jenjang == 'S3') {
                                      $s3 = 'Selected';
                                    } else if ($jenjang == 'D1') {
                                      $d1 = 'Selected';
                                    } else if ($jenjang == 'D2') {
                                      $d2 = 'Selected';
                                    } else if ($jenjang == 'D3') {
                                      $d3 = 'Selected';
                                    } else if ($jenjang == 'D4') {
                                      $d4 = 'Selected';
                                    } else if ($jenjang == 'Putus SD') {
                                      $psd = 'Selected';
                                    }
                                    ?>
                                    <select class="form-control " style="width: 100%;" name="pendidikanterakhirwali" id="pendidikanterakhirwali">
                                      <option value=''></option>
                                      <option <?= $td ?> value='Tidak sekolah'>Tidak sekolah</option>
                                      <option <?= $psd ?> value='Putus SD'>Putus SD</option>
                                      <option <?= $sd ?> value='SD / sederajat'>SD / sederajat</option>
                                      <option <?= $smp ?> value='SMP / sederajat'>SMP / sederajat</option>
                                      <option <?= $sma ?> value='SMA / sederajat'>SMA / sederajat</option>
                                      <option <?= $s1 ?> value='S1'>S1</option>
                                      <option <?= $s2 ?> value='S2'>S2</option>
                                      <option <?= $s3 ?> value='S3'>S3</option>
                                      <option <?= $d1 ?> value='D1'>D1</option>
                                      <option <?= $d2 ?> value='D2'>D2</option>
                                      <option <?= $d3 ?> value='D3'>D3</option>
                                      <option <?= $d4 ?> value='D4'>D4</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="pekerjaanwali" class="col-sm-3 control-label">Pekerjaan:</label>
                                  <div class="col-sm-9">
                                    <?php
                                    $pekerjaan = $fetch_wali['pekerjaan_wali'];
                                    if ($pekerjaan == 'Tidak bekerja') {
                                      $tb = 'Selected';
                                    } else if ($pekerjaan == 'Tidak dapat diterapkan') {
                                      $tdd = 'Selected';
                                    } else if ($pekerjaan == 'Sudah Meninggal') {
                                      $sm = 'Selected';
                                    } else if ($pekerjaan == 'Wiraswasta') {
                                      $Wiraswasta = 'Selected';
                                    } else if ($pekerjaan == 'Wirausaha') {
                                      $Wirausaha = 'Selected';
                                    } else if ($pekerjaan == 'Karyawan Swasta') {
                                      $Karyawan = 'Selected';
                                    } else if ($pekerjaan == 'Pedagang Kecil') {
                                      $Pedagang = 'Selected';
                                    } else if ($pekerjaan == 'Petani') {
                                      $Petani = 'Selected';
                                    } else if ($pekerjaan == 'Buruh') {
                                      $Buruh = 'Selected';
                                    } else if ($pekerjaan == 'PNS/TNI/Polri') {
                                      $PNS = 'Selected';
                                    } else if ($pekerjaan == 'Lainnya') {
                                      $Lainnya = 'Selected';
                                    }
                                    ?>
                                    <select class="form-control " style="width: 100%;" name="pekerjaanwali" id="pekerjaanwali">
                                      <option value=''></option>
                                      <option <?= $tb ?> value='Tidak bekerja'>Tidak bekerja</option>
                                      <option <?= $tdd ?> value='Tidak dapat diterapkan'>Tidak dapat diterapkan</option>
                                      <option <?= $sm ?> value='Sudah Meninggal'>Sudah Meninggal</option>
                                      <option <?= $Wiraswasta ?> value='Wiraswasta'>Wiraswasta</option>
                                      <option <?= $Wirausaha ?> value='Wirausaha'>Wirausaha</option>
                                      <option <?= $Karyawan ?> value='Karyawan Swasta'>Karyawan Swasta</option>
                                      <option <?= $Pedagang ?> value='Pedagang Kecil'>Pedagang Kecil</option>
                                      <option <?= $Petani ?> value='Petani'>Petani</option>
                                      <option <?= $Buruh ?> value='Buruh'>Buruh</option>
                                      <option <?= $PNS ?> value='PNS/TNI/Polri'>PNS/TNI/Polri</option>
                                      <option <?= $Lainnya ?> value='Lainnya'>Lainnya</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="penghasilanwali" class="col-sm-3 control-label">Penghasilan Perbulan:</label>
                                  <div class="col-sm-9">
                                    <!-- <input type="text" class="form-control" id="penghasilanwali" name="penghasilanwali" value="<?php echo $pekerjaanwali; ?>"> -->
                                    <?php
                                    $penghasilan = $fetch_wali['penghasilan_wali'];
                                    if ($penghasilan == 'Tidak Berpenghasilan') {
                                      $a = 'Selected';
                                    } else if ($penghasilan == 'Kurang dari Rp. 500,000') {
                                      $b = 'Selected';
                                    } else if ($penghasilan == 'Rp. 500,000 - Rp. 999,999') {
                                      $c = 'Selected';
                                    } else if ($penghasilan == 'Rp. 1,000,000 - Rp. 1,999,999') {
                                      $d = 'Selected';
                                    } else if ($penghasilan == 'Rp. 2,000,000 - Rp. 4,999,999') {
                                      $e = 'Selected';
                                    } else if ($penghasilan == 'Rp. 5,000,000 - Rp. 20,000,000') {
                                      $f = 'Selected';
                                    } else if ($penghasilan == 'Lebih dari Rp. 20,000,000') {
                                      $h = 'Selected';
                                    }
                                    ?>
                                    <select class="form-control " style="width: 100%;" name="penghasilanwali" id="penghasilanwali">
                                      <option value=''></option>
                                      <option <?= $a ?> value='Tidak Berpenghasilan'>Tidak Berpenghasilan</option>
                                      <option <?= $b ?> value='Kurang dari Rp. 500,000'>Kurang dari Rp. 500,000</option>
                                      <option <?= $c ?> value='Rp. 500,000 - Rp. 999,999'>Rp. 500,000 - Rp. 999,999</option>
                                      <option <?= $d ?> value='Rp. 1,000,000 - Rp. 1,999,999'>Rp. 1,000,000 - Rp. 1,999,999</option>
                                      <option <?= $e ?> value='Rp. 2,000,000 - Rp. 4,999,999'>Rp. 2,000,000 - Rp. 4,999,999</option>
                                      <option <?= $f ?> value='Rp. 5,000,000 - Rp. 20,000,000'>Rp. 5,000,000 - Rp. 20,000,000</option>
                                      <option <?= $h ?> value='Lebih dari Rp. 20,000,000'>Lebih dari Rp. 20,000,000</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                  <label for="nik_wali" class="col-sm-3 control-label">NIK wali:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nik_wali" name="nik_wali" value="<?php echo $fetch_wali['nik_wali']; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="box-footer">
                                <?php
                                if (isset($fetch_wali)) { ?>
                                  <button type="submit" class="btn btn-default pull-left btn-flat" name="simpan"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan Perubahan</button>
                                  <a href="edit_pendidikan?id=<?= $get_id_siswa ?>">
                                    <button type="button" class="ml-3 btn btn-info pull-left btn-flat" name="simpan"> Edit Data Pendidikan <span class="glyphicon glyphicon-arrow-right"></span></button>
                                  </a>
                                <?php } else { ?>
                                  <button type="submit" class="ml-3 btn btn-info pull-left btn-flat" name="tambah"> Tambah Data Wali <span class="glyphicon glyphicon-plus"></span></button>
                                  <a href="edit_pendidikan?id=<?= $get_id_siswa ?>">
                                    <button type="button" class="ml-3 btn btn-info pull-left btn-flat"> Tidak ada Data Wali <span class="glyphicon glyphicon-arrow-right"></span></button>
                                  </a>
                                <?php } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                      <?php

                      $nama_wali = $_POST["nama_wali"];
                      $pekerjaanwali = $_POST["pekerjaanwali"];
                      $penghasilanwali = $_POST["penghasilanwali"];
                      $pendidikanterakhirwali = $_POST["pendidikanterakhirwali"];
                      $tahun_lahir_wali = $_POST["tahun_lahir_wali"];
                      $nik_wali = $_POST["nik_wali"];
                      if (isset($_POST['tambah'])) {
                        if (empty($nama_wali)) {
                          echo "<script>alert('Nama Wali Siswa Tidak Boleh Kosong')</script>";
                        } else {

                          $sql = "INSERT INTO wali_siswa (id_siswa, nama_wali, pekerjaan_wali, penghasilan_wali, jenjang_pendidikan_wali, tahun_lahir_wali, nik_wali) VALUES ('$get_id_siswa','$nama_wali','$pekerjaanwali','$penghasilanwali','$pendidikanterakhirwali','$tahun_lahir_wali','$nik_wali')";
                          $run_sql = mysqli_query($conn, $sql);

                          if ($run_sql) {
                            echo "<script>
                                alert('Berhasil Tambah Data Wali Siswa');location.href='edit_pendidikan?id=$get_id_siswa'
                              </script>";
                          } else {
                            echo "<script>
                                alert('gagal')
                              </script>";
                          }
                        }
                      }

                      if (isset($_POST['simpan'])) {
                        if (empty($nama_wali)) {
                          echo "<script>alert('Nama Wali Siswa Tidak Boleh Kosong')</script>";
                        } else {

                          $sql = "UPDATE wali_siswa SET 
                        nama_wali = '$nama_wali',
                        pekerjaan_wali = '$pekerjaanwali',
                        penghasilan_wali = '$penghasilanwali', 
                        jenjang_pendidikan_wali = '$pendidikanterakhirwali', 
                        tahun_lahir_wali = '$tahun_lahir_wali', 
                        nik_wali = '$nik_wali'
                        
                        WHERE id_siswa = '$get_id_siswa'";

                          $run_sql = mysqli_query($conn, $sql);

                          if ($run_sql) {
                            echo "<script>
                                alert('Berhasil Update Data Wali');location.href='edit_pendidikan?id=$get_id_siswa'
                              </script>";
                          } else {
                            echo "<script>
                                alert('gagal')
                              </script>";
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
  $.widget.bridge('uwalitton', $.ui.button);
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