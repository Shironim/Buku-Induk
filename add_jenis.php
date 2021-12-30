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
          $halaman = "jenis"; // halaman
          $dataapa = "Jenis"; // data
          $tabeldatabase = "jenis"; // tabel database
          $chmod = $chmenu4; // Hak akses Menu
          // $forward = mysql_real_escape_string($tabeldatabase); // tabel database
          // $forwardpage = mysql_real_escape_string($halaman); // halaman
          $search = $_POST['search'];
          $insert = $_POST['insert'];


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

                  $kode = $nama = $satuan = $biaya = "";
                  $no = $_GET["no"];
                  $insert = '1';



                  if (($no != null || $no != "") && ($chmod >= 3 || $_SESSION['jabatan'] == 'admin')) {

                    $sql = "select * from $tabeldatabase where no='$no'";
                    $hasil2 = mysqli_query($conn, $sql);


                    while ($fill = mysqli_fetch_assoc($hasil2)) {


                      $kode = $fill["kode"];
                      $nama = $fill["nama"];
                      $satuan = $fill["satuan"];
                      $biaya = $fill["biaya"];
                      $insert = '3';
                    }
                  }
                  ?>
                  <div id="main">
                    <div class="container-fluid">

                      <form class="form-horizontal" method="post" action="add_<?php echo $halaman; ?>" id="Myform">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group col-md-6 col-xs-12">
                              <label for="kode" class="col-sm-3 control-label">Kode:</label>
                              <div class="col-sm-9">
                                <?php if ($no == null || $no == "") { ?>
                                  <input type="text" class="form-control" id="kode" name="kode" value="<?php echo autoNumber(); ?>" maxlength="50" required>
                                <?php } else { ?>
                                  <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $kode; ?>" maxlength="50" required readonly>
                                <?php } ?>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-md-6 col-xs-12">
                              <label for="nama" class="col-sm-3 control-label">Nama:</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" placeholder="Masukan Nama Jenis Layanan" maxlength="50" required>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-md-6 col-xs-12">
                              <label for="satuan" class="col-sm-3 control-label">Satuan:</label>
                              <div class="col-sm-9">
                                <select class="form-control select2" style="width: 100%;" name="satuan" required>
                                  <option></option>
                                  <?php
                                  $sql = mysqli_query($conn, "select * from satuan");
                                  while ($row = mysqli_fetch_assoc($sql)) {
                                    if ($satuan == $row['nama'])
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
                            <div class="form-group col-md-6 col-xs-12">
                              <label for="biaya" class="col-sm-3 control-label">Biaya:</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="biaya" name="biaya" value="<?php echo $biaya; ?>" placeholder="Masukan Biaya Jenis Layanan" maxlength="20" required>
                              </div>
                            </div>
                          </div>



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

                      $kode = mysql_real_escape_string($_POST["kode"]);
                      $nama = mysql_real_escape_string($_POST["nama"]);
                      $satuan = mysql_real_escape_string($_POST["satuan"]);
                      $biaya = mysql_real_escape_string($_POST["biaya"]);
                      $insert = ($_POST["insert"]);


                      $sql = "select * from $tabeldatabase where kode='$kode'";
                      $result = mysqli_query($conn, $sql);

                      if (mysqli_num_rows($result) > 0) {
                        if ($chmod >= 3 || $_SESSION['jabatan'] == 'admin') {
                          $sql1 = "update $tabeldatabase set nama='$nama', satuan='$satuan', biaya='$biaya' where kode='$kode'";
                          $updatean = mysqli_query($conn, $sql1);
                          echo "<script type='text/javascript'>  alert('Berhasil, Data telah diupdate!'); </script>";
                          echo "<script type='text/javascript'>window.location = '$forwardpage';</script>";
                        } else {
                          echo "<script type='text/javascript'>  alert('Gagal, Data gagal diupdate!'); </script>";
                          echo "<script type='text/javascript'>window.location = '$forwardpage';</script>";
                        }
                      } else if (($chmod >= 2 || $_SESSION['jabatan'] == 'admin')) {

                        $sql2 = "insert into $tabeldatabase values( '$kode','$nama','$satuan','$biaya','')";
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
    $('#datepicker2').datepicker('update', new Date());

    $('#datepicker2').datepicker({
      autoclose: true
    });

    $('.datepicker2').datepicker({
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