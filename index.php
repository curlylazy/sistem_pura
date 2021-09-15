<?php

session_start();

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);

if(empty($_SESSION['kodeuser']))
{
	header("location:login/login.php");
	return;
}

// using meedo koneksi
require 'meedo/vendor/catfan/medoo/src/Medoo.php';
require 'meedo/vendor/autoload.php';
require 'meedo/koneksi.php';

include("class/class.fungsisql.php");
include("class/class.fungsi.php");
include("class/class.security.php");

$actcetak = "includes/cetak/cetak.php";
$fs  = new FungsiSql();
$sc  = new Security();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Pendataan Pura</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Theme style -->

    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- jQuery 3.1.1 -->
    <script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jsui.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->

    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="dist/js/pages/dashboard.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- Date Picker -->
    <link href="plugins/datepicker/jquery.datetimepicker.css" rel="stylesheet">
    <script src="plugins/datepicker/jquery.datetimepicker.full.js"></script>

    <!-- select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">

    <link rel="stylesheet" href="dist/css/AdminLTE.css">

    <!-- numeral JS -->
    <script type="text/javascript" src="plugins/numeral/numeral.min.js"></script>

    <!-- autonumeric -->
    <script type="text/javascript" src="plugins/autonumeric/autoNumeric.min.js"></script>

    <!-- append grid -->
    <script type="text/javascript" src="plugins/appendgrid/jquery-ui-1.11.1.min.js"></script>
    <script type="text/javascript" src="plugins/appendgrid/jquery.appendGrid-1.6.3.js"></script>

    <!-- JQuery Grid -->
    <link rel="stylesheet" type="text/css" href="plugins/appendgrid/jquery-ui.structure.min.css"/>
    <link rel="stylesheet" type="text/css" href="plugins/appendgrid/jquery-ui.theme.min.css"/>
    <link rel="stylesheet" type="text/css" href="plugins/appendgrid/jquery.appendGrid-1.6.3.css"/>

    <!-- Colorbox -->
    <link href="plugins/colorbox/colorbox.css" rel="stylesheet" />
    <script src="plugins/colorbox/jquery.colorbox.js"></script>

    <!-- alertify -->
    <script src="plugins/alertifyjs/alertify.min.js"></script>
    <link href="plugins/alertifyjs/css/alertify.min.css" rel="stylesheet">
    <link href="plugins/alertifyjs/css/themes/default.min.css" rel="stylesheet">

    <!-- editors -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <script src="plugins/highchart/highcharts.js"></script>
    <script src="plugins/highchart/modules/exporting.js"></script>
    <script src="plugins/highchart/modules/export-data.js"></script>
    <script src="plugins/highchart/modules/accessibility.js"></script>

    <script src="data/balicoding.js"></script>
    <style>
        body
        {
            font-family: "Segoe UI";
        }
        .disable
        {
            pointer-events: none;
        }
        .small-box h3 {
            font-size: 28px;
        }
        .gridtext
        {
            border: 0px solid rgba(0,0,0,.15);
        }
    </style>
</head>

<script>
$(document).ready(function() {
    $('.datepicker').datetimepicker({
        timepicker:false,
        format: 'Y-m-d'
    });

    $('.datetimepicker').datetimepicker({
        timepicker:true,
        format: 'Y-m-d'
    });
});
</script>

<body class="hold-transition skin-green fixed sidebar-mini">
    <div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <span class="logo-mini"><b>S</b>B</span>
          <span class="logo-lg" style="text-transform: uppercase;"><b><?= $_SESSION['akses']; ?></b></span>
        </a>

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="logo.png" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?= $globalTitle; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="logo.png" class="img-circle" alt="User Image">
                                <p>
                                    <?= $_SESSION['kodeuser']; ?>
                                    <small><?= $_SESSION['nama'] ?></small>
                                </p>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <aside class="main-sidebar">

        <section class="sidebar">

            <div class="user-panel">
                <div class="pull-left image">
                    <img src="logo.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?= $_SESSION['nama']; ?></p>
                    <a href="#"><?= $_SESSION['akses'] ?></a>
                </div>
            </div>

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">PROFILE</li>
                <li><a href="?page=dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li><a href="?page=profile"><i class="fa fa-users"></i> <span>Profile</span></a></li>
                <li><a href="login/actlogin.php?act=logout"><i class="fa fa-lock"></i> <span>Log Out</span></a></li>

                <?php if($_SESSION['akses'] == 'ADMIN'): ?>
                    <li class="header">MASTER DATA</li>
                    <li><a href="?page=admin"><i class="fa fa-building"></i> <span>User</span></a></li>
                <?php endif ?>

                <li class="header">INFORMASI</li>
                <li><a href="?page=pura"><i class="fa fa-building"></i> <span>Pura</span></a></li>
                <li><a href="?page=laporan&act=grafikpurabyprovinsi"><i class="fa fa-bar-chart"></i> <span>Grafik By Provinsi</span></a></li>
                <li><a href="?page=laporan&act=grafikpurabyjenis"><i class="fa fa-bar-chart"></i> <span>Grafik By Jenis</span></a></li>

                <!-- <li class="header">LAPORAN</li>
                <li><a href="?page=laporan&act=item"><i class="fa fa-book"></i> <span>Laporan Barang</span></a></li>
                <li><a href="?page=laporan&act=itemmasuk"><i class="fa fa-book"></i> <span>Laporan Barang Masuk</span></a></li>
                <li><a href="?page=laporan&act=itemkeluar"><i class="fa fa-book"></i> <span>Laporan Barang Keluar</span></a></li>
                <li><a href="?page=laporan&act=grafikitemmasuk"><i class="fa fa-bar-chart"></i> <span>Grafik Barang Masuk</span></a></li>
                <li><a href="?page=laporan&act=grafikitemkeluar"><i class="fa fa-bar-chart"></i> <span>Grafik Barang keluar</span></a></li> -->

                
            </ul>
        </section>
    </aside>

    <div class="content-wrapper">
        <section class="content">
            <div class="row">
            	<?php include("route.php"); ?>
            </div>
        </section>
    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; <?= date("Y"); ?> by: I Gede Dipayana
    </footer>


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


</body>
</html>
