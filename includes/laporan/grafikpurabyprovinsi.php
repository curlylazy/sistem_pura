<?php 

$bentuk = $_POST['bentuk'];
$tahun = $_POST['tahun'];
$bulan = $_POST['bulan'];

if(empty($bentuk))
{
	$bentuk = "bar";
}

if(empty($tahun))
{
	$tahun = date('Y');
}

if(empty($bulan))
{
	$bulan = date('m');
}

function getTotal($kode)
{
    global $database;

    $Sql = "SELECT COUNT(*) as total FROM tbl_pura
            WHERE provinsi = :provinsi";

    $sth = $database->pdo->prepare($Sql);
    $sth->bindValue(":provinsi", $kode);
    $sth->execute();
    $row = $sth->fetch();

    $iRes = $row['total'];

    if($row['total'] == "" || $row['total'] == null)
    {
        $iRes = 0;
    }

    return $iRes;
}

$arr_provinsi = array();
$arr_provinsi[] = "Bali";
$arr_provinsi[] = "Bangka Belitung";
$arr_provinsi[] = "Banten";
$arr_provinsi[] = "Bengkulu";
$arr_provinsi[] = "DI Yogyakarta";
$arr_provinsi[] = "DKI Jakarta";
$arr_provinsi[] = "Gorontalo";
$arr_provinsi[] = "Jambi";
$arr_provinsi[] = "Jawa Barat";
$arr_provinsi[] = "Jawa Tengah";
$arr_provinsi[] = "Jawa Timur";
$arr_provinsi[] = "Kalimantan Barat";
$arr_provinsi[] = "Kalimantan Selatan";
$arr_provinsi[] = "Kalimantan Tengah";
$arr_provinsi[] = "Kalimantan Timur";
$arr_provinsi[] = "Kalimantan Utara";
$arr_provinsi[] = "Kepulauan Riau";
$arr_provinsi[] = "Lampung";
$arr_provinsi[] = "Maluku";
$arr_provinsi[] = "Maluku Utara";
$arr_provinsi[] = "Nanggroe Aceh Darussalam (NAD)";
$arr_provinsi[] = "Nusa Tenggara Barat (NTB)";
$arr_provinsi[] = "Nusa Tenggara Timur (NTT)";
$arr_provinsi[] = "Papua";
$arr_provinsi[] = "Papua Barat";
$arr_provinsi[] = "Riau";
$arr_provinsi[] = "Sulawesi Barat";
$arr_provinsi[] = "Sulawesi Selatan";
$arr_provinsi[] = "Sulawesi Tengah";
$arr_provinsi[] = "Sulawesi Tenggara";
$arr_provinsi[] = "Sulawesi Utara";
$arr_provinsi[] = "Sumatera Barat";
$arr_provinsi[] = "Sumatera Selatan";
$arr_provinsi[] = "Sumatera Utara";

foreach ($arr_provinsi as $value) 
{
    $namaitem[] = "'$value'";
	$total[] = getTotal($value);
}

?>

<script>

function chartDefault()
{
	$('#laporan').highcharts({
        title: {
            text: 'Grafik Pura by Provinsi',
            x: -20 //center
        },
		chart: {
            type: '<?= $bentuk; ?>'
        },
        subtitle: {
            text: 'Jumlah Pura Bedasarkan Provinsi',
            x: -20
        },
        xAxis: {
            categories: [<?= join($namaitem, ","); ?>]
        },
        yAxis: {
            title: {
                text: 'Total'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Pura'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: 
		[
			{
				name: 'Grafik Pura',
				data: [<?= join($total, ","); ?>]
			}
		]
    });
}


$(document).ready(function() {

	chartDefault();
    
    // $('select').select2();

    $("#bentuk").val("<?= $bentuk ?>");
    $("#tahun").val("<?= $tahun ?>");
    $("#bulan").val("<?= $bulan ?>");

    $("#preview").click(function() {
        $("#form1").attr("action", "<?= "index.php?page=laporan&act=grafikpurabyprovinsi"; ?>");
        $("#form1").submit();
    });
    
});
</script>

<div class="col-md-12">
    <section class="content-header">
    <ol class="breadcrumb">
        <?php
            foreach ($bc as $k => $v)
            {
                echo "<li><a href='$v'>$k</a></li>";
            }
        ?>
    </ol>
    </section>

    <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa <?= $FAicon; ?>"></i></span>
        <div class="info-box-content">
            <span class="info-box-number"><?= $arr['headname'] ?></span>
            <p><?= $arr['description']; ?></p>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-body">
            <div id="laporan"></div>
        </div>
        <div class="box-footer">
            <a class="btn btn-success" href="?page=home"><span class="glyphicon glyphicon-backward"></span> KEMBALI</a>
        </div>
    </div>
</div>