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
          $chmod = $chmenu4; // Hak akses Menu
          // $forward = mysql_real_escape_string($tabeldatabase); // tabel database
          // $forwardpage = mysql_real_escape_string($halaman); // halaman
          $status = $_POST['search'];

          ?>

          <!-- SETTING STOP -->


          <!-- BREADCRUMB -->

          <ol class="breadcrumb ">
            <li><a href="<?php echo $_SESSION['baseurl']; ?>">Dashboard </a></li>
            <li><a href="<?php echo $halaman; ?>"><?php echo $dataapa ?></a></li>
            <?php

            if ($status != null || $status != "") {
            ?>
              <li> <a href="<?php echo $halaman; ?>">Data <?php echo $dataapa ?></a></li>
              <li class="active"><?php
                                  echo $status;
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
          <?php
          if ($chmod == '1' || $chmod == '2' || $chmod == '3' || $chmod == '4' || $chmod == '5' || $_SESSION['jabatan'] == 'admin') {
          } else {
          ?>
            <div class="callout callout-danger">
              <h4>Info</h4>
              <b>Hanya user tertentu yang dapat mengakses halaman <?php echo $dataapa; ?> ini .</b>
            </div>
          <?php
          }
          ?>

          <?php
          if ($chmod >= 1 || $_SESSION['jabatan'] == 'admin') {
          ?>

            <?php
            $status = $_POST['status'];

            if ($status == null) {
              $sqla = "SELECT no, COUNT( * ) AS totaldata FROM $forward";
            } else {
              $sqla = "SELECT no, COUNT( * ) AS totaldata FROM $forward where ajaran = '$status'";
            }
            $hasila = mysqli_query($conn, $sqla);
            $rowa = mysqli_fetch_assoc($hasila);
            $totaldata = $rowa['totaldata'];


            ?>
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data <?php echo $dataapa ?> <span class="no-print label label-default" id="no-print"><?php echo $totaldata; ?></span>
                </h3>

                <form method="post">
                  <br />
                  <div class="col-lg-12 col-md-12 col-sm-12 no-print" id="no-print">

                    <div class="col-lg-3 col-md-3 col-sm-3">
                      <select class="form-control select2" style="width: 100%;" name="status" id="status" onchange="this.form.submit()" required>
                        <option></option>
                        <?php
                        $sql = mysqli_query($conn, "select * from status");
                        while ($row = mysqli_fetch_assoc($sql)) {
                          if ($status == $row['kode'])
                            echo "<option value='" . $row['kode'] . "' selected='selected'>" . $row['nama'] . "</option>";
                          else
                            echo "<option value='" . $row['kode'] . "'>" . $row['nama'] . "</option>";
                        }
                        ?>
                      </select>

                    </div>

                  </div>

                </form>


              </div>

              <!-- /.box-header -->
              <!-- /.Paginasi -->
              <?php
              error_reporting(E_ALL ^ E_DEPRECATED);
              $sql    = "SELECT *,siswa.no as no,siswa.nama as nama, siswa.kode as kode, ajaran.nama as tahunajaran, status.nama as statussiswa FROM $forward inner join ajaran on ajaran.kode = siswa.ajaran inner join status on status.kode = siswa.statussiswa order by siswa.no";
              $result = mysqli_query($conn, $sql);
              $rpp    = 15;
              $reload = "$halaman" . "?pagination=true";
              $page   = intval(isset($_GET["page"]) ? $_GET["page"] : 0);

              if ($page <= 0)
                $page = 1;
              $tcount  = mysqli_num_rows($result);
              $tpages  = ($tcount) ? ceil($tcount / $rpp) : 1;
              $count   = 0;
              $i       = ($page - 1) * $rpp;
              $no_urut = ($page - 1) * $rpp;
              ?>
              <div class="box-body table-responsive">
                <table class="table table-hover ">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Induk</th>
                      <th>NISN</th>
                      <th>Foto</th>
                      <th>Nama Lengkap</th>
                      <th>Tahun Ajaran</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Agama</th>
                      <th>No Telepon</th>
                      <th>Alamat</th>
                      <th>Kewarganegaraan</th>
                      <th>Status Siswa</th>
                      <?php if ($chmod >= 3 || $_SESSION['jabatan'] == 'admin') { ?>
                        <th>Opsi</th>
                      <?php } else {
                      } ?>
                    </tr>
                  </thead>
                  <?php
                  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                  $status = $_POST['status'];

                  if ($status != null || $status != "") {

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                      if (isset($_POST['status'])) {
                        $query1 = "SELECT *,siswa.no as no,siswa.nama as nama, siswa.kode as kode, ajaran.nama as tahunajaran, status.nama as statussiswa FROM $forward inner join ajaran on ajaran.kode = siswa.ajaran inner join status on status.kode = siswa.statussiswa where siswa.statussiswa like '%$status%' order by siswa.no limit $rpp";
                        $hasil = mysqli_query($conn, $query1);
                        $no = 1;
                        while ($fill = mysqli_fetch_assoc($hasil)) {
                  ?>
                          <tbody>
                            <tr>
                              <td><?php echo ++$no_urut; ?></td>
                              <td><?php echo mysql_real_escape_string($fill['kode']); ?></td>
                              <td><?php echo mysql_real_escape_string($fill['nisn']); ?></td>
                              <td>
                                <div class="user-block"><img class="img-circle" src="<?php echo $fill['avatar']; ?>" alt="Image"></div>
                              </td>
                              <td><?php echo mysql_real_escape_string($fill['nama']); ?></td>
                              <td><?php echo mysql_real_escape_string($fill['tahunajaran']); ?></td>
                              <td><?php echo mysql_real_escape_string($fill['jeniskelamin']); ?></td>
                              <td><?php echo mysql_real_escape_string($fill['tempat']); ?></td>
                              <td><?php echo mysql_real_escape_string($fill['tgllahir']); ?></td>
                              <td><?php echo mysql_real_escape_string($fill['agama']); ?></td>
                              <td><?php echo mysql_real_escape_string($fill['notelp']); ?></td>
                              <td><?php echo mysql_real_escape_string($fill['alamat']); ?></td>
                              <td><?php echo mysql_real_escape_string($fill['kewarganegaraan']); ?></td>
                              <td><?php echo mysql_real_escape_string($fill['statussiswa']); ?></td>
                              <td>
                                <?php if ($chmod >= 3 || $_SESSION['jabatan'] == 'admin') { ?>
                                  <button type="button" class="btn btn-success btn-xs btn-flat" onclick="window.location.href='add_<?php echo $halaman; ?>?no=<?php echo $fill['no']; ?>'">Edit</button>
                                <?php } else {
                                } ?>

                                <?php if ($chmod >= 4 || $_SESSION['jabatan'] == 'admin') { ?>
                                  <button type="button" class="btn btn-danger btn-xs btn-flat" onclick="window.location.href='component/delete/delete_master?no=<?php echo $fill['no'] . '&'; ?>forward=<?php echo $forward . '&'; ?>forwardpage=<?php echo $forwardpage . '&'; ?>chmod=<?php echo $chmod; ?>'">Hapus</button>
                                <?php } else {
                                } ?>
                              </td>
                            </tr><? php;
                                }

                                  ?>
                          </tbody>
                </table>
                <div align="right"><?php if ($tcount >= $rpp) {
                                      echo paginate_one($reload, $page, $tpages);
                                    } else {
                                    } ?></div>
              <?php
                      }
                    }
                  } else {
                    while (($count < $rpp) && ($i < $tcount)) {
                      mysqli_data_seek($result, $i);
                      $fill = mysqli_fetch_array($result);
              ?>
              <tbody>
                <tr>
                  <td><?php echo ++$no_urut; ?></td>
                  <td><?php echo mysql_real_escape_string($fill['kode']); ?></td>
                  <td><?php echo mysql_real_escape_string($fill['nisn']); ?></td>
                  <td>
                    <div class="user-block"><img class="img-circle" src="<?php echo $fill['avatar']; ?>" alt="Image"></div>
                  </td>
                  <td><?php echo mysql_real_escape_string($fill['nama']); ?></td>
                  <td><?php echo mysql_real_escape_string($fill['tahunajaran']); ?></td>
                  <td><?php echo mysql_real_escape_string($fill['jeniskelamin']); ?></td>
                  <td><?php echo mysql_real_escape_string($fill['tempat']); ?></td>
                  <td><?php echo mysql_real_escape_string($fill['tgllahir']); ?></td>
                  <td><?php echo mysql_real_escape_string($fill['agama']); ?></td>
                  <td><?php echo mysql_real_escape_string($fill['notelp']); ?></td>
                  <td><?php echo mysql_real_escape_string($fill['alamat']); ?></td>
                  <td><?php echo mysql_real_escape_string($fill['kewarganegaraan']); ?></td>
                  <td><?php echo mysql_real_escape_string($fill['statussiswa']); ?></td>
                  <td>
                    <?php if ($chmod >= 3 || $_SESSION['jabatan'] == 'admin') { ?>
                      <button type="button" class="btn btn-success btn-xs btn-flat" onclick="window.location.href='add_<?php echo $halaman; ?>?no=<?php echo $fill['no']; ?>'">Edit</button>
                    <?php } else {
                      } ?>

                    <?php if ($chmod >= 4 || $_SESSION['jabatan'] == 'admin') { ?>
                      <button type="button" class="btn btn-danger btn-xs btn-flat" onclick="window.location.href='component/delete/delete_master?no=<?php echo $fill['no'] . '&'; ?>forward=<?php echo $forward . '&'; ?>forwardpage=<?php echo $forwardpage . '&'; ?>chmod=<?php echo $chmod; ?>'">Hapus</button>
                    <?php } else {
                      } ?>
                  </td>
                </tr>
              <?php
                      $i++;
                      $count++;
                    }

              ?>
              </tbody>
              </table>
              <div align="right"><?php if ($tcount >= $rpp) {
                                    echo paginate_one($reload, $page, $tpages);
                                  } else {
                                  } ?></div>
            <?php } ?>

              </div>
              <!-- /.box-body -->
            </div>

          <?php } else {
          } ?>
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