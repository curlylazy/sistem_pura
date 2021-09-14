<?php

$FAicon = "fa-info";
switch ($act)
{
	case 'tambah':
		$arr = array("headname" => "Informasi", "description" => "tambah data info", "prefix" => "informasi");
		$bc = array( "Home" => "?page=home", "List info" => "?page=info", "Edit/Tambah info" => "");
		include("includes/informasi/informasiAE.php");
	break;

	case 'popup':
		$arr = array("headname" => "Informasi", "description" => "list info", "prefix" => "informasi");
		$bc = array( "Home" => "?page=home", "List info" => "");
		include("includes/informasi/informasiLISTPOPUP.php");
	break;

	default:
		$arr = array( "headname" => "Informasi", "description" => "list data informasi dari atase maupun mahasiswa", "prefix" => "informasi");
		$bc = array( "Home" => "?page=home", "List info" => "");
		include("includes/informasi/informasiLIST.php");
	break;
}

?>
