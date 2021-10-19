<?php

// using meedo koneksi

session_start();
if(empty($_SESSION['kodeuser']))
{
	exit("Anda belum melakukan login.");
}

require '../../meedo/vendor/catfan/medoo/src/Medoo.php';
require '../../meedo/vendor/autoload.php';
require '../../meedo/koneksi.php';

include("../../class/class.thumb.php");
include("../../class/class.security.php");
include("../../class/class.fungsisql.php");

$fs  = new FungsiSql();
$sc  = new Security();

$tabel	= "tbl_user";
$page 	= "profile";
$act  	= $sc->FilterString($_GET['act']);

if($act == "update")
{

	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$username = $sc->FilterString($_POST['username']);
		$username_old = $sc->FilterString($_POST['username_old']);

		if($username != $username_old)
		{
			$cekData = $fs->CariData("username", "username", $username, $tabel, $database);
			if($cekData != "")
			{
				echo "User yang diinput sudah digunakan sebelumnya.|";
				return false;
			}
		}

		$database->update($tabel, [
			"username" => $sc->FilterString($_POST['username']),
			"namauser" => $sc->FilterString($_POST['namauser']),
			"password" => $sc->FilterString($_POST['password']),
			"notelepon" => $sc->FilterString($_POST['notelepon']),
			"email" => $sc->FilterString($_POST['email']),
			"dateupduser" => date("Y-m-d"),
		],[
			"kodeuser[=]" => $sc->FilterString($_SESSION['kodeuser'])
		]);

		$_SESSION['nama'] = $sc->FilterString($_POST['namauser']);

		$error = $database->error();
		if(!empty($error[2]))
		{
			echo "Gagal update $page. : ".$error[2]."|";
			return false;
		}

		echo "ok|";
		echo "Berhasil update $page.|";
		echo "index.php?page=$page|";

	});

}

else
{
	echo "<script>alert('Kesalahan')</script>";
}

?>
