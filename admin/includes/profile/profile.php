<?php

switch ($act) 
{
	default:
		$arr = array("headname" => "Profile User", "description" => "edit data profile anda", "prefix" => "profile");
		$bc = array( "Home" => "?page=home", "List profile" => "?page=profile", "Edit profile" => "");
		include("includes/profile/profileAE.php");
	break;
}

?>