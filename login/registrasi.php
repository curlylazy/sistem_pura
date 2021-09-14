<?php

// using meedo koneksi
require '../meedo/src/Medoo.php';
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
    <title><?= $globalTitle; ?></title>
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
    <div class="login-box" style="width: 460px; padding-bottom: 20px;">
        <div class="login-logo">
            <center><img src="../logo2.png" style="width: 150px;"/></center>
            <!-- <a href="#">Admin Panel Bengkel</a> -->
        </div>

        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg" style="color: black;"><span style="letter-spacing: 2px;">REGISTRASI</span><br/>silahkan melakukan registrasi agar bisa menggunakan sistem.</p>
            <?= $fs->ShowFlashMsg(); ?>
            <form action="actlogin.php?act=registrasi" method="post">
                <div class="form-group has-feedback">
                    <label for="kodebengkel">Kode Bengkel</label>
                    <input type="text" id="kodebengkel" name="kodebengkel" class="form-control" placeholder="Masukkan data.." required>
                </div>                <div class="form-group has-feedback">
                    <label for="passwordbengkel">Password Bengkel</label>
                    <input type="password" id="passwordbengkel" name="passwordbengkel" class="form-control" placeholder="Masukkan data.." required>
                </div>
                <div class="form-group has-feedback">
                    <label for="namabengkel">Nama Bengkel</label>
                    <input type="text" id="namabengkel" name="namabengkel" class="form-control" placeholder="Masukkan data.." required>
                </div>
                <div class="form-group has-feedback">
                    <label for="noteleponbengkel">Notelepon Bengkel</label>
                    <input type="text" id="noteleponbengkel" name="noteleponbengkel" class="form-control" placeholder="Masukkan data.." required>
                </div>
                <div class="form-group has-feedback">
                    <label for="alamatbengkel">Alamat Bengkel</label>
                    <input type="text" id="alamatbengkel" name="alamatbengkel" class="form-control" placeholder="Masukkan data.." required>
                </div>
                <div class="form-group has-feedback">
                    <label for="namapemilik">Nama Pemilik</label>
                    <input type="text" id="namapemilik" name="namapemilik" class="form-control" placeholder="Masukkan data.." required>
                </div>
                <div class="row">
                    <div class="col-xs-9">
                        <a class="btn btn-link btn-flat" href="login.php">Sign In</a>
                        <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
