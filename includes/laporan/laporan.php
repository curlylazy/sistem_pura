<?php

$FAicon = "fa-book";

switch ($act)
{
	case 'item':
		$arr = array( "headname" => "Laporan Barang", "description" => "daftar data barang", "prefix" => "barang");
		$bc = array( "Home" => "?page=home", "Laporan" => "#", "barang" => "#");
		include("includes/laporan/item.php");
	break;

	case 'itemmasuk':
		$arr = array( "headname" => "Laporan Barang Masuk", "description" => "daftar data barang masuk", "prefix" => "barang");
		$bc = array( "Home" => "?page=home", "Laporan" => "#", "Barang Masuk" => "#");
		include("includes/laporan/itemmasuk.php");
	break;

	case 'itemkeluar':
		$arr = array( "headname" => "Laporan Barang Keluar", "description" => "daftar data barang keluar", "prefix" => "barang");
		$bc = array( "Home" => "?page=home", "Laporan" => "#", "Barang Keluar" => "#");
		include("includes/laporan/itemkeluar.php");
	break;

	case 'grafikitemmasuk':
		$arr = array( "headname" => "Laporan Grafik Barang Masuk", "description" => "daftar data barang masuk", "prefix" => "barang");
		$bc = array( "Home" => "?page=home", "Laporan" => "#", "Barang Masuk" => "#");
		include("includes/laporan/grafikitemmasuk.php");
	break;

	case 'grafikitemkeluar':
		$arr = array( "headname" => "Laporan Grafik Barang Keluar", "description" => "daftar data barang keluar", "prefix" => "barang");
		$bc = array( "Home" => "?page=home", "Laporan" => "#", "Barang Keluar" => "#");
		include("includes/laporan/grafikitemkeluar.php");
	break;

	default:
		echo "Tidak Ada Halaman.";
	break;
}

?>
