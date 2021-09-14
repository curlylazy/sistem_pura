<?php

switch ($act) 
{
	case 'tambah':
		$arr = array("headname" => "Config", "description" => "Optimalisasi data config anda, seperti about us, contact dan hal personal lainnya.", "prefix" => "config");
		$bc = array( "Home" => "?page=home", "List config" => "?page=config", "Edit/Tambah config" => "");
		include("includes/config/configAE.php");
	break;
	
	default:
		$arr = array( "headname" => "Config", "description" => "list data config", "prefix" => "config");
		$bc = array( "Home" => "?page=home", "List config" => "");
		include("includes/config/configLIST.php");
	break;
}

?>