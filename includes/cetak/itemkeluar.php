<?php 

session_start();

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// gen data
$tgldari = $_POST['tgldari'];
$tglsampai = $_POST['tglsampai'];

$detail = array();
$no = 1;

$Sql = "SELECT * FROM tbl_itemkeluarhd
        INNER JOIN tbl_user ON (tbl_user.username = tbl_itemkeluarhd.username)
        WHERE (tbl_itemkeluarhd.tanggalitemkeluar BETWEEN :tgldari AND :tglsampai) ";

$sth = $database->pdo->prepare($Sql);
$sth->bindValue(":tgldari", $tgldari);
$sth->bindValue(":tglsampai", $tglsampai);
$sth->execute();
while($row = $sth->fetch())
{
    $detail[] =
    "
    <tr>
        <td>$no</td>
        <td>$row[kodeitemkeluar]</td>
        <td>$row[nama]</td>
        <td>".date('d F Y', strtotime($row['tanggalitemkeluar']))."</td>
    </tr>
    ";
    $no++;
}

$isidata = "
<table class='greyGridTable'>
	<thead>
		<tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama User</th>
            <th>Tanggal Transaksi</th>
		</tr>
	</thead>
	<tbody>
		".join($detail, "")."
	</tbody>
</table>";


$dompdf = new Dompdf();
$dompdf->loadHtml(templateGenerate($isidata, "LAPORAN BARANG KELUAR"));

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
// $dompdf->stream();
$dompdf->stream("dompdf_out_".date("dFY_Hi").".pdf", array("Attachment" => false));


?>