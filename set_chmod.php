<!DOCTYPE html>
<html>
<?php
include "configuration/config_include.php";
// etc();encryption();session();connect();head();body();timing();
//alltotal();
//pagination();
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->

        <!-- SETTING START-->

        <?php
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $halaman = "chmod"; // halaman
        $dataapa = "Hak Akses"; // data
        $tabeldatabase = "chmenu"; // tabel database
        // $forward = mysql_real_escape_string($tabeldatabase); // tabel database
        // $forwardpage = mysql_real_escape_string($halaman); // halaman
        $search = $_POST['search'];
        ?>

        <!-- SETTING STOP -->
        <!-- BOX INFORMASI -->
        <?php
        if ($_SESSION['jabatan'] == 'admin') {
        ?>


          <?php
          $sql = "select * from chmenu where userjabatan = $userjabatan";
          $hasil2 = mysqli_query($conn, $sql);


          while ($fill = mysqli_fetch_assoc($hasil2)) {

            $userjabatan = $fill['userjabatan'];
            $menu1 = $fill['menu1'];
            $menu2 = $fill['menu2'];
            $menu3 = $fill['menu3'];
            $menu4 = $fill['menu4'];
            $menu5 = $fill['menu5'];
            $menu6 = $fill['menu6'];
            $menu7 = $fill['menu7'];
            $menu8 = $fill['menu8'];
            $menu9 = $fill['menu9'];
            $menu10 = $fill['menu10'];
            $menu11 = $fill['menu11'];
          }

          $userjabatan = $menu1 = "";
          ?>

          <!-- /.box-body -->

          <!-- ./col -->

      </div>


      <div class="row">
        <?php if ($_SESSION['jabatan'] != 'admin') {
          } else { ?>
          <div class="col-lg-6">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">General Setting</h3>
              </div>

              <div class="box-body">

                <form class="form-horizontal" method="post">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="userjabatan" class="col-sm-3 control-label">User:</label>
                      <div class="col-sm-9">
                        <select class="form-control select2" style="width: 100%;" name="userjabatan">
                          <?php
                          $sql = mysqli_query($conn, "select distinct(nama) from jabatan");
                          while ($row = mysqli_fetch_assoc($sql)) {
                            if ($userjabatan == $row['nama'])
                              echo "<option value='" . $row['nama'] . "' selected='selected'>" . $row['nama'] . "</option>";
                            else
                              echo "<option value='" . $row['nama'] . "'>" . $row['nama'] . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="menu1" class="col-sm-3 control-label">Menu Admin</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="menu1" name="menu1" placeholder="Masukkan Hak Akses" value="<?php echo $menu1; ?>" maxlength="1">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="menu2" class="col-sm-3 control-label">Menu Master Data</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="menu2" name="menu2" placeholder="Masukkan Hak Akses" value="<?php echo $menu2; ?>" maxlength="1">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="menu3" class="col-sm-3 control-label">Menu Siswa</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="menu3" name="menu3" placeholder="Masukkan Hak Akses" value="<?php echo $menu3; ?>" maxlength="1">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="menu4" class="col-sm-3 control-label">Menu Laporan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="menu4" name="menu4" placeholder="Masukkan Hak Akses" value="<?php echo $menu4; ?>" maxlength="1">
                      </div>
                    </div>


                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-default pull-right btn-flat" name="simpan"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $userjabatan = $_POST['userjabatan'];
                  $menu1 = $_POST['menu1'];
                  $menu2 = $_POST['menu2'];
                  $menu3 = $_POST['menu3'];
                  $menu4 = $_POST['menu4'];
                  $menu5 = $_POST['menu5'];
                  $menu6 = $_POST['menu6'];
                  $menu7 = $_POST['menu7'];
                  $menu8 = $_POST['menu8'];
                  $menu9 = $_POST['menu9'];
                  $menu10 = $_POST['menu10'];
                  $menu11 = $_POST['menu11'];


                  if (isset($_POST['simpan'])) {
                    $sql = "select * from chmenu where userjabatan = '$userjabatan'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {

                      $sql1 = "update chmenu set menu1='$menu1', menu2='$menu2', menu3='$menu3', menu4='$menu4', menu5='$menu5', menu6='$menu6', menu7='$menu7', menu8='$menu8',menu9='$menu9',menu10='$menu10',menu11='$menu11' where userjabatan = '$userjabatan'";
                      $result = mysqli_query($conn, $sql1); ?>
                      <meta http-equiv="refresh" content="0;URL=''" /><?php
                                                                    } else {
                                                                      $sql1 = "insert into chmenu values('$userjabatan','$menu1','$menu2','$menu3','$menu4','$menu5','$menu6','$menu7','$menu8','$menu9','$menu10','$menu11')";
                                                                      $result = mysqli_query($conn, $sql1); ?>
                      <meta http-equiv="refresh" content="0;URL=''" /><?php
                                                                    }
                                                                  }
                                                                }
                                                                      ?>

              </div>

              <!-- /.box-body -->

            </div>
          </div>



        <?php } ?>

        <!-- /.box-body -->
      </div>



      <!-- BATAS -->

      <div class="col-lg-6">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Info</h3>
          </div>
          <div class="box-body">
            <p>Hak akses :</p>
            <p>Tulis angka 0 untuk hak akses <b>tidak bisa semua</b> .</p>
            <p>Tulis angka 1 untuk hak akses <b>baca</b> .</p>
            <p>Tulis angka 2 untuk hak akses <b>baca dan tambah</b> .</p>
            <p>Tulis angka 3 untuk hak akses <b>baca, tambah, dan edit</b> .</p>
            <p>Tulis angka 4 untuk hak akses <b>baca, tambah, edit, dan delete</b> .</p>
            <p>Tulis angka 5 untuk hak akses <b>semua bisa</b> .</p>
          </div>
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
  </div>
  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
  </div>
  <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php footer(); ?>
<div class="control-sidebar-bg"></div>
</div>
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