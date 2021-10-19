<?php 

session_start();

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// gen data
$kodeitemmasuk = $_GET['id'];

$Sql = "SELECT * FROM tbl_itemmasukhd
        WHERE tbl_itemmasukhd.kodeitemmasuk = :kodeitemmasuk ";

$sth = $database->pdo->prepare($Sql);
$sth->bindValue(":kodeitemmasuk", $kodeitemmasuk);
$sth->execute();
$rowhd = $sth->fetch();

$detail = array();
$no = 1;

$Sql = "SELECT * FROM tbl_itemmasukdt
        INNER JOIN tbl_item ON (tbl_item.kodeitem = tbl_itemmasukdt.kodeitem)
        INNER JOIN tbl_merek ON (tbl_merek.kodemerek = tbl_item.kodemerek)
        WHERE tbl_itemmasukdt.kodeitemmasuk = :kodeitemmasuk ";

$sth = $database->pdo->prepare($Sql);
$sth->bindValue(":kodeitemmasuk", $kodeitemmasuk);
$sth->execute();
while($row = $sth->fetch())
{
    $detail[] =
    "
    <tr>
        <td>$no</td>
        <td>$row[kodeitem]</td>
        <td>$row[namaitem]</td>
        <td>$row[namamerek]</td>
        <td>".number_format($row['jumlah'])." $row[satuan]</td>
    </tr>
    ";
    $no++;
}

$isidata = "

<p>
    Kode Barang Masuk : ".$rowhd['kodeitemmasuk']." <br />
    Tanggal : ".date('d F Y', strtotime($rowhd['dateitemmasuk']))." <br />
</p>

<table class='greyGridTable'>
	<thead>
		<tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Nama Merek</th>
            <th>Jumlah</th>
		</tr>
	</thead>
	<tbody>
		".join($detail, "")."
	</tbody>
</table>";


$dompdf = new Dompdf();
$dompdf->loadHtml(templateGenerate($isidata, "LAPORAN BARANG MASUK DETAIL <br/> <small>".$rowhd['kodeitemmasuk']."</small> "));

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
// $dompdf->stream();
$dompdf->stream("dompdf_out_".date("dFY_Hi").".pdf", array("Attachment" => false));


?>