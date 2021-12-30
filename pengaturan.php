<!DOCTYPE html> 
<html> 
    <?php  include "config/session.php" ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="ico/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="ico/ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
      <?php  include 'component/body.php'; ?> 
        <?php  include 'config/dbkonek.php'; ?>
        <div class="wrapper"> 
               <?php  include 'component/header.php'; ?>     
                         <?php  include 'component/menu.php'; ?> 
            <!-- Content Wrapper. Contains page content -->             
            <div class="content-wrapper"> 
                <!-- Content Header (Page header) -->                 
                <section class="content-header"> 
</section>                 
                <!-- Main content -->                 
                <section class="content"> 
                    <!-- Small boxes (Stat box) -->                     
                    <div class="row"> 
                        <!-- ./col -->      

<!-- BREADCRUMB --> 				
                        <div class="col-lg-12"> 
			<ol class="breadcrumb">
  <li><a href="index.php">Dashboard</a></li>
  <li><a href="#">Pengaturan</a></li>
    <?php 
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$search = $_GET['search'];
	
	if($search!=null || $search!=""){
		?>
  <li class="active"><?php  echo $search; ?></li>
  <?php  } else { ?>
  <?php  } ?>
</ol>

<!-- BREADCRUMB --> 

<!-- BOX INSERT BERHASIL --> 
					
	
	<!-- BOX UPDATE BERHASIL --> 
							<?php 
	$update = $_GET['update'];
	
	if($update == "success"){
		?>
	<div class="alert alert-success alert-dismissible" role="alert">
	 <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong> Berhasil!</strong> pengaturan telah <b>terupdate</b>.
</div>

<!-- BOX UPDATE GAGAL --> 
<?php 
	} else if($update == "fail") {?>
	<div class="alert alert-danger alert-dismissible" role="alert">	
	 <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong> Gagal!</strong> pengaturan <b>gagal terupdate</b>, silakan cek kolom dan data lainnya.
</div>
	<?php
	}
	?>
	
	<!-- BOX WARN GAGAL --> 
<?php 
$warn = $_GET['warn'];
	if($warn == "fail") {?>
	<div class="alert alert-warning alert-dismissible" role="alert">
	 <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   Ada kolom yang belum terisi, <b>wajib diisi</b>.
</div>
	<?php
	}
	?>
	
	<!-- BOX INFORMASI -->
	<?php if($_SESSION['jabatan'] =='admin'){}else{ ?>
	<div class="callout callout-danger">
	<h4>Info</h4>
	<b>Hanya admin yang bisa mengakses halaman ini .</b>
	</div>
	<?php } ?>	
	
<?php if($_SESSION['jabatan'] !='admin'){}else{ ?>
                            <div class="box box-solid box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Pengaturan</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
								 
                                <div class="box-body">
								<div class="table-responsive">
                                     <?php include 'config/dbkonek.php';?>
    <!----------------KONTEN------------------->
      <?php
	  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));   
	  	  
      $namae=$alamate=$notelpe=$ketentuane="";
	  $namae = $_GET["namae"];  	
      if($_SERVER["REQUEST_METHOD"] == "POST"){  
                  $namae = $_POST["namae"];  
                  $alamate = $_POST["alamate"];
                  $notelpe = $_POST["notelpe"];  
                  $ketentuane= $_POST["ketentuane"];			  
         
  if(isset($_GET['batal'])){         
    unset($namae);
	unset($alamate);
	unset($notelpe);
	unset($ketentuane);
	
		}				  
                
		}
			 
			   $sql="select * from data";
                  $hasil2 = mysqli_query($conn,$sql);
				  
                      
                  while ($fill = mysqli_fetch_assoc($hasil2)){
                  
				  $namae = $fill["namae"];  
                  $alamate = $fill["alamate"];
                  $notelpe = $fill["notelpe"];  
                  $ketentuane= $fill["ketentuane"];                      
                    
		
		}
		?>
	<div id="main">  
	 <div class="container-fluid">
  
  <form method="post" >
  

     <div class="form-group">
      <label for="pwd">Nama:</label>
      <input type="text" class="form-control" name=namae value="<?php echo $namae; ?>">
    </div>
     <div class="form-group">
      <label for="usr">Alamat:</label>
      <input type="text" class="form-control" name=alamate value="<?php echo $alamate; ?>">
    </div>
    <div class="form-group">
      <label for="usr">No Telepon:</label>
      <input type="text" class="form-control" name=notelpe value="<?php echo $notelpe; ?>">
    </div>   
		
    <div class="form-group">  
      <label for="usr">Ketentuan:</label>
                <textarea class="textarea" name=ketentuane placeholder="<?php echo $ketentuane;?>" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="<?php echo $ketentuane;?>"></textarea>
             
            </div>
	
	</div>
	
	
<!-- your server code `avatar_upload.php` will receive `$_FILES['avatar']` on form submission -->
 
<!-- the fileinput plugin initialization -->
<br/>
    <div class="col-sm-3" >
     <button type="submit" class="btn btn-primary btn-block" name=simpan>Simpan</button>
<br/>
    </div>
    <div class="col-sm-3">

    </div>
  



	</form>
</div>
<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){                  
        $namae= $_POST["namae"];   
                  $alamate=$_POST["alamate"];				  
                  $notelpe = $_POST["notelpe"];  
                  $ketentuane= $_POST["ketentuane"];  
         
                  if(isset($_POST['simpan'])){  
				  
				   $sql="select * from data";
                  $result=mysqli_query($conn,$sql);
				 
              if(mysqli_num_rows($result)>0){
                $sql1 = "update data set namae='$namae', alamate='$alamate', notelpe='$notelpe', ketentuane='$ketentuane' where no='1'";
			        if (mysqli_query($conn, $sql1)) {
   
    ?><meta http-equiv="refresh" content="0;  url='pengaturan.php?update=success'" /> 
	<?php
} else { 
    ?> 	<meta http-equiv="refresh" content="0;  url='pengaturan.php?update=fail'" />
	<?php 
	}
			  }
				  }		
  }
  
 	     
         ?>


	  
	  <!-- KONTEN BODY AKHIR --> 
<?php } ?>
                                </div>
								</div> 

                                <!-- /.box-body -->
                            </div>
                        </div>                         
                        <!-- ./col -->
                    </div>                     
                    <!-- /.row -->                     
                    <!-- Main row -->                     
                    <div class="row"> 
                        <!-- Left col -->                         
                        <!-- /.Left col -->                         
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->                         
                        <!-- right col -->                         
                    </div>                     
                    <!-- /.row (main row) -->                     
                </section>                 
                <!-- /.content -->                 
            </div>             
            <!-- /.content-wrapper -->             
         <?php  include 'component/footer.php'; ?>                
            <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->             
            <div class="control-sidebar-bg"></div>             
        </div>         
          <!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {  
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
</body>      
</html>