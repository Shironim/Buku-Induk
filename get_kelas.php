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
$get_kelas = $_GET['kelas'];
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
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <!-- SETTING START-->

          <?php
          error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
          include "configuration/config_chmod.php";
          $halaman = "siswa"; // halaman
          $dataapa = "Siswa"; // data
          $tabeldatabase = "siswa"; // tabel database
          $chmod = $chmenu3; // Hak akses Menu
          $forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
          $forwardpage = mysqli_real_escape_string($conn, $halaman); // halaman
          $search = $_POST['search'];

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

          <!-- BOX HAPUS BERHASIL -->

          <script>
            window.setTimeout(function() {
              $("#myAlert").fadeTo(500, 0).slideUp(1000, function() {
                $(this).remove();
              });
            }, 5000);
          </script>

          <?php
          $hapusberhasil = $_POST['hapusberhasil'];

          if ($hapusberhasil == 1) {
          ?>
            <div id="myAlert" class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Berhasil!</strong> <?php echo $dataapa; ?> telah berhasil dihapus dari Data <?php echo $dataapa; ?>.
            </div>

            <!-- BOX HAPUS BERHASIL -->
          <?php
          } elseif ($hapusberhasil == 2) {
          ?>
            <div id="myAlert" class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Gagal!</strong> <?php echo $dataapa; ?> tidak bisa dihapus dari Data <?php echo $dataapa; ?> karena telah melakukan transaksi sebelumnya, gunakan menu update untuk merubah informasi <?php echo $dataapa; ?> .
            </div>
          <?php
          } elseif ($hapusberhasil == 3) {
          ?>
            <div id="myAlert" class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Gagal!</strong> Hanya user tertentu yang dapat mengupdate Data <?php echo $dataapa; ?> .
            </div>
          <?php
          }

          ?>
          <!-- BOX INFORMASI -->
          <!-- <?php
                if ($chmod == '1' || $chmod == '2' || $chmod == '3' || $chmod == '4' || $chmod == '5' || $_SESSION['jabatan'] == 'admin') {
                } else {
                ?>
            <div class="callout callout-danger">
              <h4>Info</h4>
              <b>Hanya user tertentu yang dapat mengakses halaman <?php echo $dataapa; ?> ini .</b>
            </div>
          <?php
                }
          ?> -->

          <?php
          if ($_SESSION['jabatan'] == 'admin' || $_SESSION['jabatan'] == 'guru') {
          ?>

            <div class="box">
              <div class="box-header d-flex">
                <h3 class="box-title">Data Siswa Kelas <?= $get_kelas ?></span>
                </h3>
                <form class="ml-auto" action="download_excel?kelas=<?= $get_kelas ?>" method="POST">
                  <button type="submit" name="export_xls" class="ml-auto btn btn-default">Export File
                    <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
                  </button>
                </form>
              </div>

              <!-- /.box-header -->
              <!-- /.Paginasi -->
              <?php
              error_reporting(E_ALL ^ E_DEPRECATED);
              ?>
              <div class="box-body table-responsive">
                <table class="table table-hover ">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NISN</th>
                      <th>Nama Lengkap</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Alamat</th>
                      <th>Kelas</th>
                      <th>Tahun Ajaran</th>
                      <?php
                      if ($_SESSION['jabatan'] == 'admin') { ?>
                        <th style="text-align: center;" colspan=3>Opsi</th>
                      <?php } else if ($_SESSION['jabatan'] == 'guru') { ?>
                        <th>Opsi</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $sql = "SELECT * FROM siswa 
                          JOIN rombel 
                          ON rombel.id_rombel = siswa.id_rombel
                          JOIN tahun_ajaran
                          ON tahun_ajaran.id_tahun_ajaran = siswa.id_tahun_ajaran
                          WHERE rombel.rombel = '$get_kelas'
                          ORDER BY siswa.nama_siswa ";
                    $hasil = mysqli_query($conn, $sql);
                    // $arr = [];
                    $no_urut = 0;
                    while ($fill = mysqli_fetch_assoc($hasil)) {
                      if ($fill['jk'] == 'P') {
                        $jk = 'Perempuan';
                      } else if ($fill['jk'] == 'L') {
                        $jk = 'Laki Laki';
                      }
                    ?>
                      <tr>
                        <td><?php echo ++$no_urut; ?></td>
                        <td><?php echo mysqli_real_escape_string($conn, $fill['nisn']); ?></td>
                        <td><?php echo mysqli_real_escape_string($conn, $fill['nama_siswa']); ?></td>
                        <td><?php echo $jk ?></td>
                        <td><?php echo mysqli_real_escape_string($conn, $fill['tempat_lahir']); ?></td>
                        <td><?php echo mysqli_real_escape_string($conn, $fill['tgl_lahir']); ?></td>
                        <td><?php echo mysqli_real_escape_string($conn, $fill['alamat']); ?></td>
                        <td><?php echo mysqli_real_escape_string($conn, $fill['rombel']); ?></td>
                        <td><?php echo mysqli_real_escape_string($conn, $fill['tahun_ajaran']); ?></td>
                        <td>
                          <a href="detail_siswa?id=<?= $fill['id_siswa'] ?>">
                            <button class="btn btn-default">Detail</button>
                          </a>
                        </td>
                        <?php if ($_SESSION['jabatan'] == 'admin') { ?>
                          <td>
                            <a href="edit_siswa?id=<?= $fill['id_siswa'] ?>">
                              <button class="btn btn-info">Edit</button>
                            </a>
                          </td>
                          <td>
                            <a onclick="return confirm('Yakin ingin menghapus data siswa ?')" href="delete_data_siswa?id=<?= $fill['id_siswa'] ?>">
                              <button class="btn btn-danger">Delete</button>
                            </a>
                          </td>
                        <?php } ?>
                      <?php } ?>
                  </tbody>
                </table>
                <div align="right"><?php if ($tcount >= $rpp) {
                                      echo paginate_one($reload, $page, $tpages);
                                    } else {
                                    } ?></div>
              <?php
            }
              ?>
              </div>
              <!-- ./col -->
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
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="dist/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="dist/plugins/fastclick/fastclick.js"></script>

</body>

</html>