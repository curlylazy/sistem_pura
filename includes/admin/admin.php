<?php

$FAicon = "fa-user-plus";
switch ($act)
{
	case 'tambah':
		$arr = array("headname" => "Admin", "description" => "tambah data admin", "prefix" => "admin");
		$bc = array( "Home" => "?page=home", "List admin" => "?page=admin", "Edit/Tambah admin" => "");
		include("includes/admin/adminAE.php");
	break;

	default:
		$arr = array( "headname" => "Admin", "description" => "list data admin", "prefix" => "admin");
		$bc = array( "Home" => "?page=home", "List admin" => "");
		include("includes/admin/adminLIST.php");
	break;
}

?>
