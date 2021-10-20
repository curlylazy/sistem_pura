<?php

$page = SetString($_GET['page']);

// MY PROFILE
if($page == "profile")
{
	include("includes/profile/profile.php");
}

elseif($page == "dashboard" || $page == "home")
{
	include("includes/dashboard.php");
}

elseif($page == "puradetail")
{
	include("includes/profile/profile.php");
}

else
{
	include("includes/dashboard.php");
}


?>
