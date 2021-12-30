	<header class="main-header">
	    <title>Buku Induk</title>
	    <!-- Logo -->
	    <a href="<?php echo $_SESSION['baseurl']; ?>" class="logo">
	        <!-- mini logo for sidebar mini 50x50 pixels -->
	        <span class="logo-mini"><b></b></span>
	        <!-- logo for regular state and mobile devices -->
	        <span class="logo-lg"><img width="35px" heigth="35px" src="smp17.png" /><b>SMPN 17 SMG</b></span>
	    </a>
	    <!-- Header Navbar: style can be found in header.less -->
	    <nav class="navbar navbar-static-top">
	        <!-- Sidebar toggle button-->
	        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>
	        <div class="navbar-custom-menu">
	            <ul class="nav navbar-nav">
	                <!-- User Account: style can be found in dropdown.less -->
	                <li class="dropdown user user-menu">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                        <img src="<?php echo $_SESSION['avatar']; ?>" class="user-image" alt="User Image">
	                        <span class="hidden-xs"> <?php echo $_SESSION['nama']; ?></span>
	                    </a>
	                    <ul class="dropdown-menu">
	                        <!-- User image -->
	                        <li class="user-header">
	                            <img src="<?php echo $_SESSION['avatar']; ?>" class="img-circle" alt="User Image">
	                            <p>
	                                <?php echo $_SESSION['nama']; ?> - <?php echo $_SESSION['jabatan']; ?></p>
	                        </li>
	                </li>
	                <!-- Menu Footer-->
	                <li class="user-footer">
	                    <div class="pull-left">
	                        <a href="add_admin?no=<?php echo $_SESSION['nouser']; ?>" class="btn btn-default btn-flat">Profil</a>
	                    </div>
	                    <div class="pull-right">
	                        <a href="logout?logout=1" class="btn btn-default btn-flat">Keluar</a>
	                    </div>
	                </li>
	            </ul>
	            </li>
	            <!-- Control Sidebar Toggle Button -->
	            <li>
	            </li>
	            </ul>
	        </div>
	    </nav>
	</header>