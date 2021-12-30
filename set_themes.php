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
				$halaman = "set_themes"; // halaman
				$dataapa = "Themes"; // data
				$tabeldatabase = ""; // tabel database
				$forward = mysqli_real_escape_string($tabeldatabase); // tabel database
				// $forwardpage = mysql_real_escape_string($halaman); // halaman
				$search = $_POST['search'];
				?>

				<!-- SETTING STOP -->


				<!-- BREADCRUMB -->
				<div class="col-lg-12">
					<ol class="breadcrumb ">
						<li><a href="#">Themes</a></li>
					</ol>
				</div>

				<!-- BREADCRUMB -->




				<!-- /.box-body -->

				<!-- ./col -->

			</div>


			<div class="row">
				<?php if ($_SESSION['jabatan'] != 'admin') {
				} else { ?>
					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<img src="dist/img/themes/default.jpg" alt="..." class="img-thumbnail">
							<div class="caption" align="right">
								<h4 align="center">Default Theme</h4>
								<form action="set_themes" method="post">
									<button type="submit" class="btn btn-sm btn-default btn-flat" name="pilih1"><span class="glyphicon glyphicon-check"></span> Pilih Theme</button>
								</form>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<img src="dist/img/themes/blue.jpg" alt="..." class="img-thumbnail">
							<div class="caption" align="right">
								<h4 align="center">Blue Theme</h4>
								<form action="set_themes" method="post">
									<button type="submit" class="btn btn-sm btn-default btn-flat" name="pilih2"><span class="glyphicon glyphicon-check"></span> Pilih Theme</button>
								</form>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<img src="dist/img/themes/green.jpg" alt="..." class="img-thumbnail">
							<div class="caption" align="right">
								<h4 align="center">Green Theme</h4>
								<form action="set_themes" method="post">
									<button type="submit" class="btn btn-sm btn-default btn-flat" name="pilih3"><span class="glyphicon glyphicon-check"></span> Pilih Theme</button>
								</form>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<img src="dist/img/themes/purple.jpg" alt="..." class="img-thumbnail">
							<div class="caption" align="right">
								<h4 align="center">Purple Theme</h4>
								<form action="set_themes" method="post">
									<button type="submit" class="btn btn-sm btn-default btn-flat" name="pilih4"><span class="glyphicon glyphicon-check"></span> Pilih Theme</button>
								</form>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<img src="dist/img/themes/red.jpg" alt="..." class="img-thumbnail">
							<div class="caption" align="right">
								<h4 align="center">Red Theme</h4>
								<form action="set_themes" method="post">
									<button type="submit" class="btn btn-sm btn-default btn-flat" name="pilih5"><span class="glyphicon glyphicon-check"></span> Pilih Theme</button>
								</form>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<img src="dist/img/themes/yellow.jpg" alt="..." class="img-thumbnail">
							<div class="caption" align="right">
								<h4 align="center">Yellow Theme</h4>
								<form action="set_themes" method="post">
									<button type="submit" class="btn btn-sm btn-default btn-flat" name="pilih6"><span class="glyphicon glyphicon-check"></span> Pilih Theme</button>
								</form>
							</div>
						</div>
					</div>


				<?php } ?>
			</div>

			<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {


				if (isset($_POST['pilih1'])) {
					$pilih = '1';
					$sql = "select * from backset";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {

						$sql1 = "update backset set themesback='$pilih'";
						$result = mysqli_query($conn, $sql1); ?>
						<meta http-equiv="refresh" content="0;URL=''" /><?php
																													} else {
																														$sql1 = "insert into backset (themesback) values('$pilih')";
																														$result = mysqli_query($conn, $sql1); ?>
						<meta http-equiv="refresh" content="0;URL=''" /><?php
																													}
																												}

																												if (isset($_POST['pilih2'])) {
																													$pilih = '2';
																													$sql = "select * from backset";
																													$result = mysqli_query($conn, $sql);

																													if (mysqli_num_rows($result) > 0) {

																														$sql1 = "update backset set themesback='$pilih'";
																														$result = mysqli_query($conn, $sql1); ?>
						<meta http-equiv="refresh" content="0;URL=''" /><?php

																													} else {
																														$sql1 = "insert into backset (themesback) values('$pilih')";
																														$result = mysqli_query($conn, $sql1); ?>
						<meta http-equiv="refresh" content="0;URL=''" /><?php
																													}
																												}

																												if (isset($_POST['pilih3'])) {
																													$pilih = '3';
																													$sql = "select * from backset";
																													$result = mysqli_query($conn, $sql);

																													if (mysqli_num_rows($result) > 0) {

																														$sql1 = "update backset set themesback='$pilih'";
																														$result = mysqli_query($conn, $sql1); ?>
						<meta http-equiv="refresh" content="0;URL=''" /><?php

																													} else {
																														$sql1 = "insert into backset (themesback) values('$pilih')";
																														$result = mysqli_query($conn, $sql1); ?>
						<meta http-equiv="refresh" content="0;URL=''" /><?php
																													}
																												}

																												if (isset($_POST['pilih4'])) {
																													$pilih = '4';
																													$sql = "select * from backset";
																													$result = mysqli_query($conn, $sql);

																													if (mysqli_num_rows($result) > 0) {

																														$sql1 = "update backset set themesback='$pilih'";
																														$result = mysqli_query($conn, $sql1); ?>
						<meta http-equiv="refresh" content="0;URL=''" /><?php

																													} else {
																														$sql1 = "insert into backset (themesback) values('$pilih')";
																														$result = mysqli_query($conn, $sql1); ?>
						<meta http-equiv="refresh" content="0;URL=''" /><?php
																													}
																												}

																												if (isset($_POST['pilih5'])) {
																													$pilih = '5';
																													$sql = "select * from backset";
																													$result = mysqli_query($conn, $sql);

																													if (mysqli_num_rows($result) > 0) {

																														$sql1 = "update backset set themesback='$pilih'";
																														$result = mysqli_query($conn, $sql1); ?>
						<meta http-equiv="refresh" content="0;URL=''" /><?php

																													} else {
																														$sql1 = "insert into backset (themesback) values('$pilih')";
																														$result = mysqli_query($conn, $sql1); ?>
						<meta http-equiv="refresh" content="0;URL=''" /><?php
																													}
																												}

																												if (isset($_POST['pilih6'])) {
																													$pilih = '6';
																													$sql = "select * from backset";
																													$result = mysqli_query($conn, $sql);

																													if (mysqli_num_rows($result) > 0) {

																														$sql1 = "update backset set themesback='$pilih'";
																														$result = mysqli_query($conn, $sql1); ?>
						<meta http-equiv="refresh" content="0;URL=''" /><?php

																													} else {
																														$sql1 = "insert into backset (themesback) values('$pilih')";
																														$result = mysqli_query($conn, $sql1); ?>
						<meta http-equiv="refresh" content="0;URL=''" /><?php
																													}
																												}
																											} ?>
			<!-- /.box-body -->
	</div>

	<!-- BATAS -->
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
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="dist/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="dist/plugins/fastclick/fastclick.js"></script>

</body>

</html>