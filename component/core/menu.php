<?php
include "configuration/config_connect.php";
include "configuration/config_chmod.php";
?>
<aside class="main-sidebar">

    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $_SESSION['avatar']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $_SESSION['nama']; ?></p>
                <a href="#"><i class="fa fa-circle text-online"></i> Online</a>
            </div>
        </div>
        <br>
        <ul class="sidebar-menu">
            <!-- <li class="header">MENU UTAMA</li> -->
            <li class="treeview">
                <a href="index"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>

            </li>
            <?php

            if ($_SESSION['jabatan'] == 'admin') { ?>

                <li class="treeview">
                    <a href="#"> <i class="glyphicon glyphicon-user"></i> <span>Admin</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span> </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="admin"><i class="fa fa-circle-o"></i>Data Admin</a>
                        </li>
                        <li>
                            <a href="add_admin"><i class="fa fa-circle-o"></i>Tambah Admin</a>
                        </li>
                    </ul>
                </li>

            <?php } else {
            }
            if ($_SESSION['jabatan'] == 'admin' || $_SESSION['jabatan'] == 'guru') { ?>

                <li class="treeview">
                    <a href="#"> <i class="glyphicon glyphicon-folder-close"></i> <span>Master Data</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span> </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                            <a href="tahun_ajaran"> <i class="fa fa-circle-o"></i> <span>Tahun Ajaran</span> </a>
                        </li>
                        <li class="treeview">
                            <a href="kelas_rombel"> <i class="fa fa-circle-o"></i> <span>Kelas Rombel</span> </a>
                        </li>
                        <li class="treeview">
                            <a href="siswa"> <i class="fa fa-circle-o"></i> <span>Data Siswa</span>
                                <!-- <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span>  -->
                            </a>
                            <!-- <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="tahun_ajaran"> <i class="fa fa-circle-o"></i> <span>Kelas 7</span> </a>
                                </li>
                                <li class="treeview">
                                    <a href="kelas_rombel"> <i class="fa fa-circle-o"></i> <span>Kelas 8</span> </a>
                                </li>
                                <li class="treeview">
                                    <a href="siswa"> <i class="fa fa-circle-o"></i> <span>Kelas 9</span> </a>
                                </li>
                            </ul> -->
                        </li>
                    </ul>
                </li>
            <?php } else {
            }
            if ($_SESSION['jabatan'] == 'admin') { ?>
                <li class="treeview">
                    <a href=""> <i class="glyphicon glyphicon-cog"></i> <span>Pengaturan</span> <span class="pull-right-container"> </span> </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="set_general"><i class="fa fa-circle-o"></i>General Setting</a>
                        </li>
                        <li>
                            <a href="set_themes"><i class="fa fa-circle-o"></i>Theme Setting</a>
                        </li>
                        <li>
                            <a href="add_jabatan"><i class="fa fa-circle-o"></i>User Setting</a>
                        </li>
                        <li>
                            <a href="set_chmod"><i class="fa fa-circle-o"></i>Hak Akses</a>
                        </li>
                    </ul>
                </li>
            <?php } else {
            } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>