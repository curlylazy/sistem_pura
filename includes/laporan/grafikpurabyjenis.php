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
            WHERE jenispura = :jenispura";

    $sth = $database->pdo->prepare($Sql);
    $sth->bindValue(":jenispura", $kode);
    $sth->execute();
    $row = $sth->fetch();

    $iRes = $row['total'];

    if($row['total'] == "" || $row['total'] == null)
    {
        $iRes = 0;
    }

    return $iRes;
}

$arr_jenis = array();
$arr_jenis[] = "SAD KHAYANGAN";
$arr_jenis[] = "DANG KHAYANGAN";
$arr_jenis[] = "KHAYANGAN TIGA";
$arr_jenis[] = "JAGATNATHA";
$arr_jenis[] = "KUIL";
$arr_jenis[] = "CANDI";

foreach ($arr_jenis as $value) 
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
            text: 'Grafik Pura by Jenis',
            x: -20 //center
        },
		chart: {
            type: '<?= $bentuk; ?>'
        },
        subtitle: {
            text: 'Jumlah Pura Bedasarkan Jenis',
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
        $("#form1").attr("action", "<?= "index.php?page=laporan&act=grafikpurabyjenis"; ?>");
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
    <div class="box box-success">
        <div class="box-body">
            <div id="laporan"></div>
        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="?page=home"><span class="glyphicon glyphicon-backward"></span> KEMBALI</a>
        </div>
    </div>
</div>