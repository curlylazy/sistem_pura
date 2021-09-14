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

$tabel	= "tbl_mahasiswa";
$page 	= "mahasiswa";
$act  	= $sc->FilterString($_GET['act']);

if($act == "tambah")
{
	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$kodemahasiswa = $fs->GetKode("kodemahasiswa", "STUDANTE", $tabel, $database);

		$gambarkampus = UploadData("gambarkampus", "../../data/gambar_upload/", "");
		$gambarpasport = UploadData("gambarpasport", "../../data/gambar_upload/", "");

		$nim = $sc->FilterString($_POST['nim']);
		$cekData = $fs->CariData("nim", "nim", $nim, $tabel, $database);
		if($cekData != "")
		{
			echo "NIM yang diinput sudah digunakan sebelumnya.|";
			return false;
		}

		// insert
		$database->insert($tabel, [
			"kodemahasiswa" => $kodemahasiswa,
			"kodekampus" => $sc->FilterString($_POST['kodekampus']),
			"kodejurusan" => $sc->FilterString($_POST['kodejurusan']),
			"nim" => $sc->FilterString($_POST['nim']),
			"password" => $sc->FilterString($_POST['password']),
			"namamahasiswa" => $sc->FilterString($_POST['namamahasiswa']),
			"tanggallahir" => $sc->FilterString($_POST['tanggallahir']),
			"kabupatenmahasiswa" => $sc->FilterString($_POST['kabupatenmahasiswa']),
			"kecamatanmahasiswa" => $sc->FilterString($_POST['kecamatanmahasiswa']),
			"alamattinggal" => $sc->FilterString($_POST['alamattinggal']),
			"noidentitas" => $sc->FilterString($_POST['noidentitas']),
			"nopassport" => $sc->FilterString($_POST['nopassport']),
			"notelepon" => $sc->FilterString($_POST['notelepon']),
			"emailmahasiswa" => $sc->FilterString($_POST['emailmahasiswa']),
			"gambarmahasiswa" => $gambarmahasiswa,
			"gambarpasport" => $gambarpasport,
			"statusmahasiswa" => $sc->FilterString($_POST['statusmahasiswa']),
			"dateaddmahasiswa" => $sc->FilterString(date("Y-m-d")),
			"dateupdmahasiswa" => $sc->FilterString(date("Y-m-d")),
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

		$nim = $sc->FilterString($_POST['nim']);
		$nim_old = $sc->FilterString($_POST['nim_old']);

		if($nim != $nim_old)
		{
			$cekData = $fs->CariData("nim", "nim", $nim, $tabel, $database);
			if($cekData != "")
			{
				echo "User yang diinput sudah digunakan sebelumnya.|";
				return false;
			}
		}

		$gambarlama = $fs->CariData("gambarmahasiswa", "kodemahasiswa", $sc->FilterString($_POST['kodemahasiswa']), $tabel, $database);
		$gambarmahasiswa = UploadData("gambarmahasiswa", "../../data/gambar_upload/", $gambarlama);

		$gambarlama = $fs->CariData("gambarpasport", "kodemahasiswa", $sc->FilterString($_POST['kodemahasiswa']), $tabel, $database);
		$gambarpasport = UploadData("gambarpasport", "../../data/gambar_upload/", $gambarlama);

		$database->update($tabel, [
			"kodekampus" => $sc->FilterString($_POST['kodekampus']),
			"kodejurusan" => $sc->FilterString($_POST['kodejurusan']),
			"nim" => $sc->FilterString($_POST['nim']),
			"password" => $sc->FilterString($_POST['password']),
			"namamahasiswa" => $sc->FilterString($_POST['namamahasiswa']),
			"tanggallahir" => $sc->FilterString($_POST['tanggallahir']),
			"kabupatenmahasiswa" => $sc->FilterString($_POST['kabupatenmahasiswa']),
			"kecamatanmahasiswa" => $sc->FilterString($_POST['kecamatanmahasiswa']),
			"alamattinggal" => $sc->FilterString($_POST['alamattinggal']),
			"noidentitas" => $sc->FilterString($_POST['noidentitas']),
			"nopassport" => $sc->FilterString($_POST['nopassport']),
			"notelepon" => $sc->FilterString($_POST['notelepon']),
			"emailmahasiswa" => $sc->FilterString($_POST['emailmahasiswa']),
			"gambarmahasiswa" => $gambarmahasiswa,
			"gambarpasport" => $gambarpasport,
			"statusmahasiswa" => $sc->FilterString($_POST['statusmahasiswa']),
			"dateupdmahasiswa" => $sc->FilterString(date("Y-m-d")),
		],[
			"kodemahasiswa[=]" => $sc->FilterString($_POST['kodemahasiswa'])
		]);

		$error = $database->error();
		if(!empty($error[2]))
		{
			echo "Gagal update $page. : ".$error[2]."|";
			return false;
		}

		echo "ok|";
		echo "Berhasil update $page.|";
		echo "index.php?page=$page&act=tambah&id=".$sc->FilterString($_POST['kodemahasiswa'])."|";

	});

}

elseif($act == "hapus")
{

	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$database->delete($tabel, [
			"kodemahasiswa" => $sc->FilterString($_GET['id'])
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
