<?php

$FAicon = "fa-bookmark";
switch ($act)
{
	case 'tambah':
		$arr = array("headname" => "Jurusan", "description" => "tambah data jurusan", "prefix" => "jurusan");
		$bc = array( "Home" => "?page=home", "List jurusan" => "?page=jurusan", "Edit/Tambah jurusan" => "");
		include("includes/jurusan/jurusanAE.php");
	break;

	default:
		$arr = array( "headname" => "Jurusan", "description" => "list data jurusan", "prefix" => "jurusan");
		$bc = array( "Home" => "?page=home", "List jurusan" => "");
		include("includes/jurusan/jurusanLIST.php");
	break;
}

?>
