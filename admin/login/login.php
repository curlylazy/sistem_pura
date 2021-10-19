<?php

// using meedo koneksi
require '../meedo/vendor/catfan/medoo/src/Medoo.php';
require '../meedo/vendor/autoload.php';
require '../meedo/koneksi.php';

include("../class/class.fungsisql.php");
include("../class/class.fungsi.php");
include("../class/class.security.php");

$fs  = new FungsiSql();
$sc  = new Security();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css//font-awesome/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <center><img src="../logo.png" style="width: 150px;"/></center>
        </div>

        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg" style="color: black;">
                <span style="letter-spacing: 2px;">ADMIN SISTEM</span>
                <br/>Sistem Informasi Pendataan Pura
            </p>
            <?= $fs->ShowFlashMsg(); ?>
            <form action="actlogin.php?act=login" method="post">
                <div class="form-group has-feedback">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-9">
                        <button type="submit" class="btn btn-danger btn-flat">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
