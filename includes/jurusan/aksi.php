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

$tabel	= "tbl_jurusan";
$page 	= "jurusan";
$act  	= $sc->FilterString($_GET['act']);

if($act == "tambah")
{
	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$kodejurusan = $fs->GetKode("kodejurusan", "JUR", $tabel, $database);

		// insert
		$database->insert($tabel, [
			"kodejurusan" => $kodejurusan,
			"kodekampus" => $sc->FilterString($_POST['kodekampus']),
			"namajurusan" => $sc->FilterString($_POST['namajurusan']),
			"dateaddjurusan" => $sc->FilterString(date("Y-m-d")),
			"dateupdjurusan" => $sc->FilterString(date("Y-m-d")),
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
			"kodekampus" => $sc->FilterString($_POST['kodekampus']),
			"namajurusan" => $sc->FilterString($_POST['namajurusan']),
			"dateupdjurusan" => $sc->FilterString(date("Y-m-d")),
		],[
			"kodejurusan[=]" => $sc->FilterString($_POST['kodejurusan'])
		]);

		$error = $database->error();
		if(!empty($error[2]))
		{
			echo "Gagal update $page. : ".$error[2]."|";
			return false;
		}

		echo "ok|";
		echo "Berhasil update $page.|";
		echo "index.php?page=$page&act=tambah&id=".$sc->FilterString($_POST['kodejurusan'])."|";

	});

}

elseif($act == "hapus")
{

	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$database->delete($tabel, [
			"kodejurusan" => $sc->FilterString($_GET['id'])
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
