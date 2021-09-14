<?php

// using meedo koneksi
require '../../../meedo/src/Medoo.php';
require '../../../meedo/vendor/autoload.php';
require '../../../meedo/koneksi.php';

include("../../../class/class.thumb.php");
include("../../../class/class.security.php");
include("../../../class/class.fungsisql.php");

$fs  = new FungsiSql();
$sc  = new Security();

$tabel	= "tbl_config";
$page 	= "config";
$act  	= $sc->FilterString($_GET['act']);

if($act == "update")
{	
	
	$database->action(function($database) {

		global $fs, $sc, $page, $tabel;

		$database->update($tabel, [
			"configvalue" => $sc->FilterString($_POST['configvalue']),
		],[
			"configname[=]" => $sc->FilterString($_POST['configname'])
		]);

		$error = $database->error();
		if(!empty($error[2]))
		{
			$fs->SetFlashMsg("Gagal update config : ".$error[2], "../../index.php?page=$page");
			return false;
		}

		$fs->SetFlashMsg("Berhasil update config", "../../index.php?page=$page");

	});

}

else
{
	echo "<script>alert('Kesalahan')</script>";
}

?>