<?php

switch ($act) 
{
	default:
		$arr = array( "headname" => "Dashboard", "description" => "selamat datang di halaman dashboard.", "prefix" => "dashboard");
		$bc = array( "Home" => "?page=home", "Dashboard" => "");
		include("includes/dashboard/dashboardMENU.php");
	break;
}

?>