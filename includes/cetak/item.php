<?php 

session_start();

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// gen data
$katakunci = $_POST['katakunci'];
$detail = array();
$no = 1;

$Sql = " SELECT * FROM tbl_item
         INNER JOIN tbl_merek ON (tbl_merek.kodemerek = tbl_item.kodemerek)
         WHERE (tbl_item.namaitem LIKE :katakunci OR tbl_item.kodeitem LIKE :katakunci )";

$sth = $database->pdo->prepare($Sql);
$sth->bindValue(":katakunci", "%$katakunci%");
$sth->execute();
while($row = $sth->fetch())
{
    $gambar = "";
    if(file_exists("../../data/gambar_upload/$row[gambar]"))
    {
        $gambarraw = "../../data/gambar_upload/$row[gambar]";
    }

	$detail[] = "
	<tr>
        <td>$no</td>
        <td>$row[kodeitem]</td>
        <td><img src='$gambarraw' style='height: 70px; width: 70px;' /></td>
        <td>$row[namaitem]</td>
        <td>$row[satuan]</td>
        <td>$row[namamerek]</td>
        <td>".number_format($row['stok'])."</td>
    </tr>
	";
	$no++;
}

$isidata = "
<table class='greyGridTable'>
	<thead>
		<tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Merek</th>
            <th>Stok</th>
		</tr>
	</thead>
	<tbody>
		".join($detail, "")."
	</tbody>
</table>";

$dompdf = new Dompdf();

$options = $dompdf->getOptions(); 
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml(templateGenerate($isidata, "LAPORAN BARANG"));

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
// $dompdf->stream();
$dompdf->stream("dompdf_out_".date("dFY_Hi").".pdf", array("Attachment" => false));


?>