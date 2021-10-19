<?php

$FAicon = "fa-building";
switch ($act)
{
	case 'tambah':
		$arr = array("headname" => "Pura", "description" => "tambah data pura", "prefix" => "pura");
		$bc = array( "Home" => "?page=home", "List pura" => "?page=pura", "Edit/Tambah pura" => "");
		include("includes/pura/puraAE.php");
	break;

	case 'popup':
		$arr = array("headname" => "Pura", "description" => "list pura", "prefix" => "pura");
		$bc = array( "Home" => "?page=home", "List pura" => "");
		include("includes/pura/puraLISTPOPUP.php");
	break;

	default:
		$arr = array( "headname" => "Pura", "description" => "list data pura", "prefix" => "pura");
		$bc = array( "Home" => "?page=home", "List pura" => "");
		include("includes/pura/puraLIST.php");
	break;
}

?>
