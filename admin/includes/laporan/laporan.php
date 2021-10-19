<?php

$FAicon = "fa-bar-chart";

switch ($act)
{
	case 'grafikpurabyprovinsi':
		$arr = array( "headname" => "Laporan Grafik Pura by Provinsi", "description" => "daftar data pura berdasarkan provinsi", "prefix" => "grafik");
		$bc = array( "Home" => "?page=home", "Laporan" => "#", "Grafik Pura" => "#");
		include("includes/laporan/grafikpurabyprovinsi.php");
	break;

	case 'grafikpurabyjenis':
		$arr = array( "headname" => "Laporan Grafik Pura by Jenis", "description" => "daftar data pura berdasarkan jenis", "prefix" => "grafik");
		$bc = array( "Home" => "?page=home", "Laporan" => "#", "Grafik Pura" => "#");
		include("includes/laporan/grafikpurabyjenis.php");
	break;

	default:
		echo "Tidak Ada Halaman.";
	break;
}

?>
