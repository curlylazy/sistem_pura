


<?php
session_start();
# Fungsi
// using meedo koneksi
require '../../meedo/src/Medoo.php';
require '../../meedo/vendor/autoload.php';
require '../../meedo/koneksi.php';

include("../../class/class.fungsisql.php");
include("../../class/class.fungsi.php");
include("../../class/class.security.php");

$fs  = new FungsiSql();
$sc  = new Security();

$cetak 	= $_GET['cetak'];

$_SESSION['cetak_lapname'] = "";
$_SESSION['cetak_alamat'] = "Jalan Raya Kedewatan, Ubud No 7";
$_SESSION['cetak_telepon'] = "Telp. (081339318118)";

function templateGenerate($isidata, $lapname)
{
	$iRes = "";
	$iRes = "<!DOCTYPE html>
	<html>
	<head>
		<link href='css/csstable.css' rel='stylesheet'>
	</head>
	<body>
		<div>
			<center><span style='font-size: 19pt; font-weight: bold;'>".$lapname."<span></center>
			<center>".$_SESSION['cetak_alamat']."<br/>".$_SESSION['cetak_telepon']."</center><br/><br/>
		</div>
		
		$isidata
		
	</body>
	</html>";

	return $iRes;
}

switch($cetak)
{
	case "item":
		include("item.php");
	break;

	case "itemmasuk":
		include("itemmasuk.php");
	break;

	case "itemmasukdetail":
		include("itemmasukdetail.php");
	break;

	case "itemkeluar":
		include("itemkeluar.php");
	break;

	case "itemkeluardetail":
		include("itemkeluardetail.php");
	break;

	default:
		echo "Path tidak benar..";
		return;
	break;
}

// require_once 'dompdf/autoload.inc.php';
// use Dompdf\Dompdf;

// // render dompdf
// // instantiate and use the dompdf class
// $dompdf = new Dompdf();
// $dompdf->loadHtml("halo");

// // (Optional) Setup the paper size and orientation
// $dompdf->setPaper('A4', 'landscape');

// // Render the HTML as PDF
// $dompdf->render();

// // Output the generated PDF to Browser
// // $dompdf->stream();
// $dompdf->stream("dompdf_out_".date("dFY_Hi").".pdf", array("Attachment" => false));

?>