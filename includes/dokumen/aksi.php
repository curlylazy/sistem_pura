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

$tabel	= "tbl_dokumen";
$page 	= "dokumen";
$act  	= $sc->FilterString($_GET['act']);

if($act == "tambah")
{
	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$kodedokumen = $fs->GetKode("kodedokumen", "dokumen", $tabel, $database);

		$filedokumen_1 = UploadData("filedokumen_1", "../../data/gambar_upload/", "");
		$filedokumen_2 = UploadData("filedokumen_2", "../../data/gambar_upload/", "");
		$filedokumen_3 = UploadData("filedokumen_3", "../../data/gambar_upload/", "");
		$filedokumen_4 = UploadData("filedokumen_4", "../../data/gambar_upload/", "");

		// insert
		$database->insert($tabel, [
			"kodedokumen" => $kodedokumen,
			"kodeuser" => $_SESSION['kodeuser'],
			"juduldokumen" => $sc->FilterString($_POST['juduldokumen']),
			"keterangandokumen" => $sc->FilterString($_POST['keterangandokumen']),
			"filedokumen_1" => $filedokumen_1,
			"filedokumen_2" => $filedokumen_2,
			"filedokumen_3" => $filedokumen_3,
			"filedokumen_4" => $filedokumen_4,
			"dateadddokumen" => $sc->FilterString(date("Y-m-d")),
			"dateupddokumen" => $sc->FilterString(date("Y-m-d")),
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

		$filelama = $fs->CariData("filedokumen_1", "kodedokumen", $sc->FilterString($_POST['kodedokumen']), $tabel, $database);
		$filedokumen_1 = UploadData("filedokumen_1", "../../data/gambar_upload/", $filelama);

		$filelama = $fs->CariData("filedokumen_2", "kodedokumen", $sc->FilterString($_POST['kodedokumen']), $tabel, $database);
		$filedokumen_2 = UploadData("filedokumen_2", "../../data/gambar_upload/", $filelama);

		$filelama = $fs->CariData("filedokumen_3", "kodedokumen", $sc->FilterString($_POST['kodedokumen']), $tabel, $database);
		$filedokumen_3 = UploadData("filedokumen_3", "../../data/gambar_upload/", $filelama);

		$filelama = $fs->CariData("filedokumen_4", "kodedokumen", $sc->FilterString($_POST['kodedokumen']), $tabel, $database);
		$filedokumen_4 = UploadData("filedokumen_4", "../../data/gambar_upload/", $filelama);

		$database->update($tabel, [
			"juduldokumen" => $sc->FilterString($_POST['juduldokumen']),
			"keterangandokumen" => $sc->FilterString($_POST['keterangandokumen']),
			"filedokumen_1" => $filedokumen_1,
			"filedokumen_2" => $filedokumen_2,
			"filedokumen_3" => $filedokumen_3,
			"filedokumen_4" => $filedokumen_4,
			"dateupddokumen" => $sc->FilterString(date("Y-m-d")),
		],[
			"kodedokumen[=]" => $sc->FilterString($_POST['kodedokumen'])
		]);

		$error = $database->error();
		if(!empty($error[2]))
		{
			echo "Gagal update $page. : ".$error[2]."|";
			return false;
		}

		echo "ok|";
		echo "Berhasil update $page.|";
		echo "index.php?page=$page&act=tambah&id=".$sc->FilterString($_POST['kodedokumen'])."|";

	});

}

elseif($act == "hapus")
{

	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$database->delete($tabel, [
			"kodedokumen" => $sc->FilterString($_GET['id'])
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
