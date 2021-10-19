<?php

// using meedo koneksi
require '../meedo/vendor/catfan/medoo/src/Medoo.php';
require '../meedo/vendor/autoload.php';
require '../meedo/koneksi.php';

include("../class/class.thumb.php");
include("../class/class.security.php");
include("../class/class.fungsisql.php");

$fs  = new FungsiSql();
$sc  = new Security();

$act  	    = $sc->FilterString($_GET['act']);
$username  = $sc->FilterString($_POST['username']);
$password = $sc->FilterString($_POST['password']);

if($act == "login")
{
	$Sql = " SELECT COUNT(*) as jumlah, tbl_user.* FROM tbl_user
             WHERE tbl_user.username = :username AND tbl_user.password = :password ";

    $sth = $database->pdo->prepare($Sql);
    $sth->bindValue(':username', $username, PDO::PARAM_STR);
    $sth->bindValue(':password', $password, PDO::PARAM_STR);
    $sth->execute();
    $row = $sth->fetch();

    if($row['jumlah'] > 0)
    {
    	$_SESSION['kodeuser'] = $row['kodeuser'];
        $_SESSION['username'] = $username;
    	$_SESSION['password'] = $password;
        $_SESSION['nama'] = $row['namauser'];
        $_SESSION['akses'] = $row['akses'];
    	header("location:../index.php?page=home");
    }
    else
    {
    	$fs->SetFlashMsg("Kesalahan username atau password : ", "login.php");
    	return;
    }
}

elseif($act == "logout")
{
	session_destroy();
	header("location:login.php");
}

else
{
	echo "<script>alert('Kesalahan')</script>";
}

?>
