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

$tabel	= "tbl_pura";
$page 	= "pura";
$act  	= $sc->FilterString($_GET['act']);

if($act == "tambah")
{
	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		// $kodepura = $fs->GetKode("kodepura", "PURA", $tabel, $database);
		$kodepura = $fs->prefixKode($sc->FilterString($_POST['jenispura']));
		$gambarpura = UploadData("gambarpura", "../../data/gambar_upload/", "");

		// insert
		$database->insert($tabel, [
			"kodepura" => $kodepura,
			"kodeuser" => $_SESSION['kodeuser'],
			"jenispura" => $sc->FilterString($_POST['jenispura']),
			"namapura" => $sc->FilterString($_POST['namapura']),
			"alamatpura" => $sc->FilterString($_POST['alamatpura']),
			"kabupaten" => $sc->FilterString($_POST['kabupaten_str']),
			"provinsi" => $sc->FilterString($_POST['provinsi_str']),
			"ketuapengelola" => $sc->FilterString($_POST['ketuapengelola']),
			"notelepon" => $sc->FilterString($_POST['notelepon']),
			"nomor_tanda_daftar_pura" => $sc->FilterString($_POST['nomor_tanda_daftar_pura']),
			"kondisipura" => $sc->FilterString($_POST['kondisipura']),
			"piodalan" => $sc->FilterString($_POST['piodalan']),
			"luaspura" => $sc->FilterString($_POST['luaspura']),
			"status_tanah_pura" => $sc->FilterString($_POST['status_tanah_pura']),
			"keteranganpura" => $_POST['keteranganpura'],
			"gambarpura" => $gambarpura,
			"longitude" => $_POST['longitude'],
			"latitude" => $_POST['latitude'],
			"dateaddpura" => $sc->FilterString(date("Y-m-d")),
			"dateupdpura" => $sc->FilterString(date("Y-m-d")),
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

		$gambarlama = $fs->CariData("gambarpura", "kodepura", $sc->FilterString($_POST['kodepura']), $tabel, $database);
		$gambarpura = UploadData("gambarpura", "../../data/gambar_upload/", $gambarlama);

		$database->update($tabel, [
			"jenispura" => $sc->FilterString($_POST['jenispura']),
			"namapura" => $sc->FilterString($_POST['namapura']),
			"alamatpura" => $sc->FilterString($_POST['alamatpura']),
			"kabupaten" => $sc->FilterString($_POST['kabupaten_str']),
			"provinsi" => $sc->FilterString($_POST['provinsi_str']),
			"ketuapengelola" => $sc->FilterString($_POST['ketuapengelola']),
			"notelepon" => $sc->FilterString($_POST['notelepon']),
			"nomor_tanda_daftar_pura" => $sc->FilterString($_POST['nomor_tanda_daftar_pura']),
			"kondisipura" => $sc->FilterString($_POST['kondisipura']),
			"piodalan" => $sc->FilterString($_POST['piodalan']),
			"luaspura" => $sc->FilterString($_POST['luaspura']),
			"status_tanah_pura" => $sc->FilterString($_POST['status_tanah_pura']),
			"keteranganpura" => $_POST['keteranganpura'],
			"gambarpura" => $gambarpura,
			"longitude" => $_POST['longitude'],
			"latitude" => $_POST['latitude'],
			"dateupdpura" => $sc->FilterString(date("Y-m-d")),
		],[
			"kodepura[=]" => $sc->FilterString($_POST['kodepura'])
		]);

		$error = $database->error();
		if(!empty($error[2]))
		{
			echo "Gagal update $page. : ".$error[2]."|";
			return false;
		}

		echo "ok|";
		echo "Berhasil update $page.|";
		echo "index.php?page=$page&act=tambah&id=".$sc->FilterString($_POST['kodepura'])."|";

	});

}

elseif($act == "hapus")
{

	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		// $cekdata = $fs->CekData($sc->FilterString($_GET['id']), "kodepura" , "tbl_jurusan", $database);
		// if($cekdata > 0)
		// {
		// 	$fs->SetFlashMsg("Tidak dapat menghapus pura, karena ada relasi dengan data jurusan.", "../../index.php?page=$page");
		// 	return false;
		// }

		$database->delete($tabel, [
			"kodepura" => $sc->FilterString($_GET['id'])
		]);

		$error = $database->error();
		if(!empty($error[2]))
		{
			$fs->SetFlashMsg("Gagal hapus $page : ".$error[2], "../../index.php?page=$page");
			return false;
		}

		$fs->SetFlashMsg("Berhasil hapus $page", "../../index.php?page=$page");

	});

}

else
{
	echo "<script>alert('Kesalahan')</script>";
}

?>
