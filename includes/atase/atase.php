<?php

$FAicon = "fa-user-plus";
switch ($act)
{
	case 'tambah':
		$arr = array("headname" => "Atase", "description" => "tambah data atase", "prefix" => "atase");
		$bc = array( "Home" => "?page=home", "List atase" => "?page=atase", "Edit/Tambah atase" => "");
		include("includes/atase/ataseAE.php");
	break;

	case 'popup':
		$arr = array("headname" => "Atase", "description" => "list atase", "prefix" => "atase");
		$bc = array( "Home" => "?page=home", "List atase" => "");
		include("includes/atase/ataseLISTPOPUP.php");
	break;

	default:
		$arr = array( "headname" => "Atase", "description" => "list data atase", "prefix" => "atase");
		$bc = array( "Home" => "?page=home", "List atase" => "");
		include("includes/atase/ataseLIST.php");
	break;
}

?>
