<?php 

session_start();

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// gen data
$kodeitemkeluar = $_GET['id'];

$Sql = "SELECT * FROM tbl_itemkeluarhd
        INNER JOIN tbl_karyawan ON (tbl_itemkeluarhd.userkaryawan = tbl_karyawan.userkaryawan)
        WHERE tbl_itemkeluarhd.kodeitemkeluar = :kodeitemkeluar ";

$sth = $database->pdo->prepare($Sql);
$sth->bindValue(":kodeitemkeluar", $kodeitemkeluar);
$sth->execute();
$rowhd = $sth->fetch();

$detail = array();
$no = 1;

$Sql = "SELECT * FROM tbl_itemkeluardt
        INNER JOIN tbl_item ON (tbl_item.kodeitem = tbl_itemkeluardt.kodeitem)
        INNER JOIN tbl_merek ON (tbl_merek.kodemerek = tbl_item.kodemerek)
        WHERE tbl_itemkeluardt.kodeitemkeluar = :kodeitemkeluar ";

$sth = $database->pdo->prepare($Sql);
$sth->bindValue(":kodeitemkeluar", $kodeitemkeluar);
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
    Kode Barang Masuk : ".$rowhd['kodeitemkeluar']." <br />
    Karyawan : ".$rowhd['namakaryawan']." <br />
    Tanggal : ".date('d F Y', strtotime($rowhd['dateitemkeluar']))." <br />
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
$dompdf->loadHtml(templateGenerate($isidata, "LAPORAN BARANG KELUAR DETAIL <br/> <small>".$rowhd['kodeitemkeluar']."</small>"));

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
// $dompdf->stream();
$dompdf->stream("dompdf_out_".date("dFY_Hi").".pdf", array("Attachment" => false));


?>