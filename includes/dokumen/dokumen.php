<?php

$FAicon = "fa-book";
switch ($act)
{
	case 'tambah':
		$arr = array("headname" => "Dokumen", "description" => "tambah data dokumen", "prefix" => "dokumen");
		$bc = array( "Home" => "?page=home", "List dokumen" => "?page=dokumen", "Edit/Tambah dokumen" => "");
		include("includes/dokumen/dokumenAE.php");
	break;

	case 'popup':
		$arr = array("headname" => "Dokumen", "description" => "list dokumen", "prefix" => "dokumen");
		$bc = array( "Home" => "?page=home", "List dokumen" => "");
		include("includes/dokumen/dokumenLISTPOPUP.php");
	break;

	default:
		$arr = array( "headname" => "Dokumen", "description" => "list data dokumen", "prefix" => "dokumen");
		$bc = array( "Home" => "?page=home", "List dokumen" => "");
		include("includes/dokumen/dokumenLIST.php");
	break;
}

?>
