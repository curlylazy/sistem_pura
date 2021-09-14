<?php

// using meedo koneksi
require '../../meedo/vendor/catfan/medoo/src/Medoo.php';
require '../../meedo/vendor/autoload.php';
require '../../meedo/koneksi.php';

include("../../class/class.thumb.php");
include("../../class/class.security.php");
include("../../class/class.fungsisql.php");

$fs  = new FungsiSql();
$sc  = new Security();

$tabel	= "tbl_user";
$page 	= "admin";
$act  	= $sc->FilterString($_GET['act']);

if($act == "tambah")
{
	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$cekData = $fs->CariData("username", "username", $sc->FilterString($_POST['username']), $tabel, $database);
		if($cekData != "")
		{
			echo "User yang diinput sudah digunakan sebelumnya.|";
			return false;
		}

		// insert
		$database->insert($tabel, [
			"username" => $sc->FilterString($_POST['username']),
			"password" => $sc->FilterString($_POST['password']),
			"namauser" => $sc->FilterString($_POST['namauser']),
			"akses" => $sc->FilterString($_POST['akses']),
			"dateadduser" => $sc->FilterString(date("Y-m-d")),
			"dateupduser" => $sc->FilterString(date("Y-m-d")),
			
		]);

		$error = $database->error();
		if(!empty($error[2]))
		{
			echo "Gagal tambah $page. : ".$error[2]."|";
			return false;
		}

		echo "ok|";
		echo "Berhasil tambah $page.|";
		echo "index.php?page=$page|";
	});

}

elseif($act == "update")
{

	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$database->update($tabel, [
			"password" => $sc->FilterString($_POST['password']),
			"namauser" => $sc->FilterString($_POST['namauser']),
			"akses" => $sc->FilterString($_POST['akses']),
			"dateupduser" => $sc->FilterString(date("Y-m-d")),
		],[
			"username[=]" => $sc->FilterString($_POST['username'])
		]);

		$error = $database->error();
		if(!empty($error[2]))
		{
			echo "Gagal update $page. : ".$error[2]."|";
			return false;
		}

		echo "ok|";
		echo "Berhasil update $page.|";
		echo "index.php?page=$page&act=tambah&id=".$sc->FilterString($_POST['username'])."|";

	});

}

elseif($act == "hapus")
{

	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$database->delete($tabel, [
			"username" => $sc->FilterString($_GET['id'])
		]);

		$error = $database->error();
		if(!empty($error[2]))
		{
			$fs->SetFlashMsg("Gagal hapus $page : ".$error[2], "../../index.php?page=$page");
			return false;
		}

		$fs->SetFlashMsg("Berhasil update $page", "../../index.php?page=$page");

	});

}

else
{
	echo "<script>alert('Kesalahan')</script>";
}

?>
