<?php

$page = SetString($_GET['page']);
$act  = SetString($_GET['act']);


// MY PROFILE
if($page == "profile")
{
	$aksi = "includes/profile/aksi.php";
	include("includes/profile/profile.php");
}

// MASTER DATA
elseif($page == "admin")
{
	$aksi = "includes/admin/aksi.php";
	include("includes/admin/admin.php");
}
elseif($page == "pura")
{
	$aksi = "includes/pura/aksi.php";
	include("includes/pura/pura.php");
}
elseif($page == "atase")
{
	$aksi = "includes/atase/aksi.php";
	include("includes/atase/atase.php");
}
elseif($page == "mahasiswa")
{
	$aksi = "includes/mahasiswa/aksi.php";
	include("includes/mahasiswa/mahasiswa.php");
}
elseif($page == "jurusan")
{
	$aksi = "includes/jurusan/aksi.php";
	include("includes/jurusan/jurusan.php");
}


// INFORMASI
elseif($page == "informasi")
{
	$aksi = "includes/informasi/aksi.php";
	include("includes/informasi/informasi.php");
}
elseif($page == "dokumen")
{
	$aksi = "includes/dokumen/aksi.php";
	include("includes/dokumen/dokumen.php");
}


// LAPORAN
elseif($page == "laporan")
{
	include("includes/laporan/laporan.php");
}


elseif($page == "dashboard" || $page == "home")
{
	include("includes/dashboard/dashboard.php");
}

?>
