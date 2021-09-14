<?php

session_start();

if(empty($_SESSION['kodebengkel']))
{
	header("location:login/login.php");
	return;
}

// using meedo koneksi
require 'meedo/src/Medoo.php';
require 'meedo/vendor/autoload.php';
require 'meedo/koneksi.php';

include("class/class.fungsisql.php");
include("class/class.fungsi.php");
include("class/class.security.php");

$fs  = new FungsiSql();
$sc  = new Security();

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $globalTitle; ?></title>
    
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

    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
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
    
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

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

    <script src="data/posbaleant.js"></script>
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
    </style>
</head>

<script>
$(document).ready(function() {
    $('.datetimepicker').datetimepicker({
        timepicker:false, 
        format: 'Y-m-d'
    });
});
</script>

<body class="hold-transition skin-dark layout-top-nav">
    <div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <span class="logo-mini"><b>A</b>LT</span>
          <span class="logo-lg"><b><?= $_SESSION['nama'] ?></b></span>
        </a>
    

        <nav class="navbar navbar-static-top">

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?= $globalTitle; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
  
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
            	<?php include("route.php"); ?>
            </div>
        </section>
    </div>
  
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-<?= date("Y") ?> LigioTP
        reserved.
    </footer>


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


</body>
</html>

