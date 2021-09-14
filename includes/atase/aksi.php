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
$page 	= "atase";
$act  	= $sc->FilterString($_GET['act']);

if($act == "tambah")
{
	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$kodeuser = $fs->GetKode("kodeuser", "USER", $tabel, $database);

		$username = $sc->FilterString($_POST['username']);
		$cekData = $fs->CariData("username", "username", $username, $tabel, $database);
		if($cekData != "")
		{
			echo "User yang diinput sudah digunakan sebelumnya.|";
			return false;
		}

		// insert
		$database->insert($tabel, [
			"kodeuser" => $kodeuser,
			"username" => $sc->FilterString($_POST['username']),
			"password" => $sc->FilterString($_POST['password']),
			"namauser" => $sc->FilterString($_POST['namauser']),
			"notelepon" => $sc->FilterString($_POST['notelepon']),
			"email" => $sc->FilterString($_POST['email']),
			"aksesuser" => $sc->FilterString("ATASE"),
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
			"password" => $sc->FilterString($_POST['password']),
			"namauser" => $sc->FilterString($_POST['namauser']),
			"notelepon" => $sc->FilterString($_POST['notelepon']),
			"email" => $sc->FilterString($_POST['email']),
			"dateupduser" => $sc->FilterString(date("Y-m-d")),
		],[
			"kodeuser[=]" => $sc->FilterString($_POST['kodeuser'])
		]);

		$error = $database->error();
		if(!empty($error[2]))
		{
			echo "Gagal update $page. : ".$error[2]."|";
			return false;
		}

		echo "ok|";
		echo "Berhasil update $page.|";
		echo "index.php?page=$page&act=tambah&id=".$sc->FilterString($_POST['kodeuser'])."|";

	});

}

elseif($act == "hapus")
{

	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$database->delete($tabel, [
			"kodeuser" => $sc->FilterString($_GET['id'])
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
