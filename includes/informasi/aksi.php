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

$tabel	= "tbl_informasi";
$page 	= "informasi";
$act  	= $sc->FilterString($_GET['act']);

if($act == "tambah")
{
	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$kodeinformasi = $fs->GetKode("kodeinformasi", "INFORMASI", $tabel, $database);
		$gambarinformasi = UploadData("gambarinformasi", "../../data/gambar_upload/", "");

		// insert
		$database->insert($tabel, [
			"kodeinformasi" => $kodeinformasi,
			"kodeuser" => $_SESSION['kodeuser'],
			"judulinformasi" => $sc->FilterString($_POST['judulinformasi']),
			"isiinformasi" => $_POST['isiinformasi'],
			"statusinformasi" => $sc->FilterString($_POST['statusinformasi']),
			"gambarinformasi" => $gambarinformasi,
			"dateaddinformasi" => $sc->FilterString(date("Y-m-d")),
			"dateupdinformasi" => $sc->FilterString(date("Y-m-d")),
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

		$gambarlama = $fs->CariData("gambarinformasi", "kodeinformasi", $sc->FilterString($_POST['kodeinformasi']), $tabel, $database);
		$gambarinformasi = UploadData("gambarinformasi", "../../data/gambar_upload/", $gambarlama);

		$database->update($tabel, [
			"judulinformasi" => $sc->FilterString($_POST['judulinformasi']),
			"isiinformasi" => $_POST['isiinformasi'],
			"gambarinformasi" => $gambarinformasi,
			"statusinformasi" => $sc->FilterString($_POST['statusinformasi']),
			"dateupdinformasi" => $sc->FilterString(date("Y-m-d")),
		],[
			"kodeinformasi[=]" => $sc->FilterString($_POST['kodeinformasi'])
		]);

		$error = $database->error();
		if(!empty($error[2]))
		{
			echo "Gagal update $page. : ".$error[2]."|";
			return false;
		}

		echo "ok|";
		echo "Berhasil update $page.|";
		echo "index.php?page=$page&act=tambah&id=".$sc->FilterString($_POST['kodeinformasi'])."|";

	});

}

elseif($act == "hapus")
{
	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$database->delete($tabel, [
			"kodeinformasi" => $sc->FilterString($_GET['id'])
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
