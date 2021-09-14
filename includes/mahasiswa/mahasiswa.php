<?php

$FAicon = "fa-users";
switch ($act)
{
	case 'informasi':
		$arr = array("headname" => "Mahasiswa", "description" => "informasi data mahasiswa", "prefix" => "mahasiswa");
		$bc = array( "Home" => "?page=home", "List mahasiswa" => "?page=mahasiswa", "Edit/Tambah mahasiswa" => "");
		include("includes/mahasiswa/mahasiswaLISTINFORMASI.php");
	break;

	case 'tambah':
		$arr = array("headname" => "Mahasiswa", "description" => "tambah data mahasiswa", "prefix" => "mahasiswa");
		$bc = array( "Home" => "?page=home", "List mahasiswa" => "?page=mahasiswa", "Edit/Tambah mahasiswa" => "");
		include("includes/mahasiswa/mahasiswaAE.php");
	break;

	case 'detail':
		$arr = array("headname" => "Mahasiswa", "description" => "detail data mahasiswa", "prefix" => "mahasiswa");
		$bc = array( "Home" => "?page=home", "List mahasiswa" => "?page=mahasiswa", "detail mahasiswa" => "");
		include("includes/mahasiswa/mahasiswaDETAIL.php");
	break;

	case 'popup':
		$arr = array("headname" => "Mahasiswa", "description" => "list mahasiswa", "prefix" => "mahasiswa");
		$bc = array( "Home" => "?page=home", "List mahasiswa" => "");
		include("includes/mahasiswa/mahasiswaLISTPOPUP.php");
	break;

	default:
		$arr = array( "headname" => "Mahasiswa", "description" => "list data mahasiswa", "prefix" => "mahasiswa");
		$bc = array( "Home" => "?page=home", "List mahasiswa" => "");
		include("includes/mahasiswa/mahasiswaLIST.php");
	break;
}

?>
