<?php

// using meedo koneksi
require '../../../meedo/src/medoo.php';
require '../../../meedo/vendor/autoload.php';
require '../../../meedo/koneksi.php';

include("../../../class/class.thumb.php");
include("../../../class/class.security.php");
include("../../../class/class.fungsisql.php");

$fs  = new FungsiSql();
$sc  = new Security();

$tabel	= "tbl_berita";
$page 	= "berita";
$act  	= $sc->FilterString($_GET['act']);

if($act == "tambah")
{	
	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$gambarberita = UploadData("gambarberita", "../../../data/gambar_upload/", "");
		$kodeberita = $fs->GetKode("kodeberita", "BERITA" ,$tabel, $database);

		$database->insert($tabel, [
			"kodeberita" => $sc->FilterString($kodeberita),
			"judulberita" => $sc->FilterString($_POST['judulberita']),
			"tanggalpost" => $sc->FilterString(date("Y-m-d")),
			"keteranganberita" => $sc->FilterString($_POST['keteranganberita']),
			"gambarberita" => $sc->FilterString($gambarberita),
			"statusberita" => "AKTIF",
		]);

		$error = $database->error();
		if(!empty($error[2]))
		{
			$fs->SetFlashMsg("Gagal tambah berita : ".$error[2], "../../index.php?page=$page");
			return false;
		}

		$fs->SetFlashMsg("Berhasil update berita", "../../index.php?page=$page");
	});
	
}

elseif($act == "update")
{	
	
	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$gambarlama = $fs->CariData("gambarberita", "kodeberita", $_POST['kodeberita'], $tabel, $database);
		$gambarberita = UploadData("gambarberita", "../../../data/gambar_upload/", $gambarlama);

		$database->update($tabel, [
			"judulberita" => $sc->FilterString($_POST['judulberita']),
			"keteranganberita" => $sc->FilterString($_POST['keteranganberita']),
			"gambarberita" => $sc->FilterString($gambarberita),
		],[
			"kodeberita[=]" => $sc->FilterString($_POST['kodeberita'])
		]);

		$error = $database->error();
		if(!empty($error[2]))
		{
			$fs->SetFlashMsg("Gagal update berita : ".$error[2], "../../index.php?page=$page");
			return false;
		}

		$fs->SetFlashMsg("Berhasil update berita", "../../index.php?page=$page");

	});

}

elseif($act == "hapus")
{	

	$database->action(function($database) {
		
		global $fs, $sc, $page, $tabel;

		$database->update($tabel, [
			"statusberita" => "DIHAPUS",
		],[
			"kodeberita[=]" => $sc->FilterString($_GET['id'])
		]);

		$error = $database->error();
		if(!empty($error[2]))
		{
			$fs->SetFlashMsg("Gagal hapus berita : ".$error[2], "../../index.php?page=$page");
			return false;
		}

		$fs->SetFlashMsg("Berhasil update berita", "../../index.php?page=$page");
		
	});

}

else
{
	echo "<script>alert('Kesalahan')</script>";
}

?>