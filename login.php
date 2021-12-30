<?php
error_reporting(0);
session_start();
// include "configuration/config_etc.php";
include "configuration/config_include.php";
connect();
timing();
?>
<html>
<title>Login</title>
<?php head();

?>

<body class="hold-transition login-page">


  <?php
  $username = $password = "";


  $tabeldatabase = "user"; // tabel database
  $forward = mysqli_real_escape_string($conn, $tabeldatabase);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['txtuser']);
    $password = mysqli_real_escape_string($conn, $_POST['txtpass']);
    $password = md5($password);
    $password = sha1($password);

    $sql = "select * from $forward where userna_me='$username' and pa_ssword='$password'";
    $hasil = mysqli_query($conn, $sql);
    if (mysqli_num_rows($hasil) > 0) {
      $data = mysqli_fetch_assoc($hasil);
      $_SESSION['username'] = $data['userna_me'];
      $_SESSION['nama'] = $data['nama'];
      $_SESSION['jabatan'] = $data['jabatan'];
      $_SESSION['avatar'] = $data['avatar'];
      $_SESSION['nouser'] = $data['no'];
      $_SESSION['baseurl'] = 'http://localhost/buku_induk';
      login_validate();
      header("Location: index");
    } else if (mysqli_num_rows($hasil) <= 0) {
      $sql1 = "select * from guru where kode='$username' and password='$password'";
      $hasil1 = mysqli_query($conn, $sql1);
      $data = mysqli_fetch_assoc($hasil1);
      $_SESSION['username'] = $data['kode'];
      $_SESSION['nama'] = $data['nama'];
      $_SESSION['jabatan'] = $data['jabatan'];
      $_SESSION['avatar'] = $data['avatar'];
      $_SESSION['nouser'] = $data['no'];
      $_SESSION['baseurl'] = 'http://localhost/buku_induk';
      login_validate();
      header("Location: index");
    } else {
      header("Location: login");
    }
  }




  ?>




  <div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

      <?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
      ?>

      <div class="login-box">
        <div class="login-logo">
          <a href=""><b>Buku Induk</b><br>
            <img width="300px" heigth="300px" src="smp17.png" /></a>

        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">

          <form method="post">
            <div class="form-group has-feedback">
              <input type="txt" class="form-control" name="txtuser" placeholder="Username" maxlength="20" required>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" name="txtpass" placeholder="Password" maxlength="20" required>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-xs-12" align="right">
                <button type="submit" class="btn btn-default btn-block btn-flat">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <!-- /.social-auth-links -->
          <br>
          <p class="login-box-msg">Copyright © 2016 Proware. All rights reserved.</p>

        </div>
        <!-- /.login-box-body -->
      </div>
      <!-- /.login-box -->
    </div>


  </div>
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
  <script src="dist/js/pages/dashboard.js"></script>
  <script src="dist/js/demo.js"></script>
  <script src="dist/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="dist/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="dist/plugins/fastclick/fastclick.js"></script>
</body>

</html>