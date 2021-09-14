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

function getTotal($kodeitem, $tahun, $bulan)
{
    global $database;

    $Sql = "SELECT tbl_item.kodeitem, SUM(tbl_itemkeluardt.jumlah) as total FROM tbl_itemkeluardt
            INNER JOIN tbl_item ON (tbl_item.kodeitem = tbl_itemkeluardt.kodeitem)
            INNER JOIN tbl_itemkeluarhd ON (tbl_itemkeluarhd.kodeitemkeluar = tbl_itemkeluardt.kodeitemkeluar)
            WHERE 
                DATE_FORMAT(tbl_itemkeluarhd.dateitemkeluar, '%Y') = :tahun AND 
                DATE_FORMAT(tbl_itemkeluarhd.dateitemkeluar, '%m') = :bulan AND
                tbl_item.kodeitem = :kodeitem
            GROUP BY tbl_item.kodeitem";

    $sth = $database->pdo->prepare($Sql);
    $sth->bindValue(":tahun", $tahun);
    $sth->bindValue(":bulan", $bulan);
    $sth->bindValue(":kodeitem", $kodeitem);
    $sth->execute();
    $row = $sth->fetch();

    $iRes = $row['total'];

    if($row['total'] == "" || $row['total'] == null)
    {
        $iRes = 0;
    }

    return $iRes;
}

$Sql = "SELECT * FROM tbl_item";
$sth = $database->pdo->prepare($Sql);
$sth->execute();
while($row = $sth->fetch())
{
    $namaitem[] = "'$row[namaitem]'";
	$total[] = getTotal($row['kodeitem'], $tahun, $bulan);
}

?>

<script>

function chartDefault()
{
	$('#laporan').highcharts({
        title: {
            text: 'Laporan Grafik',
            x: -20 //center
        },
		chart: {
            type: '<?= $bentuk; ?>'
        },
        subtitle: {
            text: 'Data Item Keluar',
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
            valueSuffix: ' Item'
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
				name: 'Grafik Item Keluar',
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
        $("#form1").attr("action", "<?= "index.php?page=laporan&act=grafikitemkeluar"; ?>");
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
        <span class="info-box-icon bg-blue"><i class="fa <?= $FAicon; ?>"></i></span>
        <div class="info-box-content">
            <span class="info-box-number"><?= $arr['headname'] ?></span>
            <p><?= $arr['description']; ?></p>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-body">

            <form id="form1" enctype="multipart/form-data" method="post" autocomplete="off">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tahun</label>
                            <select type="text" class="form-control" name="tahun" id="tahun">
                                <?php 
                                
                                for($i=2019;$i<=date('Y');$i++)
                                {
                                    echo "<option value='$i'>$i</option>";
                                }

                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bulan</label>
                            <select type="text" class="form-control" name="bulan" id="bulan">
                                <option value='01'>Januari</option>
                                <option value='02'>Februari</option>
                                <option value='03'>Maret</option>
                                <option value='04'>April</option>
                                <option value='05'>Mei</option>
                                <option value='06'>Juni</option>
                                <option value='07'>Juli</option>
                                <option value='08'>Agustus</option>
                                <option value='09'>September</option>
                                <option value='10'>Oktober</option>
                                <option value='11'>November</option>
                                <option value='12'>Desember</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="button" id="preview" class="btn btn-default"><span class="fa fa-search"></span> CARI</button>
                
            </form>

        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-body">
            <div id="laporan"></div>
        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="?page=home"><span class="glyphicon glyphicon-backward"></span> KEMBALI</a>
        </div>
    </div>
</div>