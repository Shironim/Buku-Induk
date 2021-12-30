 <?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    error_reporting(0);
    include 'configuration/config_connect.php';
    $queryback = "SELECT * FROM backset";
    // $resultback = mysqli_query($conn, $queryback);
    // $rowback = mysqli_fetch_assoc($resultback);
    $footer;


    ?>
 <footer class="main-footer">
     <div class="pull-right hidden-xs">
         <b>Version</b> 1.0.0
     </div>
     <strong>Copyright © 2021 Kampus Mengajar Angkatan 2.</strong> All rights
     reserved.
     </div>
 </footer>