<?php

$tgldari = $_POST['tgldari'];
$tglsampai = $_POST['tglsampai'];

if(empty($tgldari))
{
    $tgldari = date('Y-m-01');
}

if(empty($tglsampai))
{
    $tglsampai = date('Y-m-t');
}

?>

<script>
$(document).ready(function() {
	$('#data-table').dataTable({
        "ordering": false,
        "searching": false,
    });
    
    // $('select').select2();

    $("#katakunci").val("<?= $katakunci ?>");

    $("#preview").click(function() {
        $("#form1").attr("action", "<?= "index.php?page=laporan&act=itemmasuk"; ?>");
        $("#form1").submit();
    });

    $("#cetak").click(function() {
        $("#form1").attr("action", "<?= "$actcetak?cetak=itemmasuk"; ?>");
        $("#form1").submit();
    });

    $('#tgldari').val('<?= $tgldari ?>');
    $('#tglsampai').val('<?= $tglsampai ?>');
    
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
                            <label>Tanggal Dari</label>
                            <input type="text" class="form-control datepicker" name="tgldari" id="tgldari">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Sampai</label>
                            <input type="text" class="form-control datepicker" name="tglsampai" id="tglsampai">
                        </div>
                    </div>
                </div>

                <button type="button" id="preview" class="btn btn-default"><span class="fa fa-search"></span> CARI</button>
                <button type="button" id="cetak" class="btn btn-default"><span class="fa fa-print"></span> CETAK</button>
            </form>

        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-body">
            <div class="table-responsive col-md-12">
                <table class="table table-condensed" id="tabelData">
                    <thead>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama User</th>
                        <th>Tanggal Transaksi</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        # Query
                        $no = 1;
                        $Sql = "SELECT * FROM tbl_itemmasukhd
                                INNER JOIN tbl_user ON (tbl_user.username = tbl_itemmasukhd.username)
                                WHERE (tbl_itemmasukhd.tanggalitemmasuk BETWEEN :tgldari AND :tglsampai)";

                        $sth = $database->pdo->prepare($Sql);
                        $sth->bindValue(":tgldari", $tgldari);
                        $sth->bindValue(":tglsampai", $tglsampai);
                        $sth->execute();
                        while($row = $sth->fetch())
                        {
                            
                            echo
                            "
                            <tr>
                                <td>$no</td>
                                <td>$row[kodeitemmasuk]</td>
                                <td>$row[nama]</td>
                                <td>".date('d F Y', strtotime($row['tanggalitemmasuk']))."</td>
                                <td>
                                    <div class='btn-group'>
										<a class='btn btn-default btn-xs' href='$actcetak?cetak=itemmasukdetail&id=$row[kodeitemmasuk]' onClick=\"return confirm('Cetak data detail transaksi $row[kodeitemmasuk] ?')\">
										<span class='glyphicon glyphicon-print'></span> Cetak</a>
									</div>
                                </td>
                            </tr>
                            ";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="?page=home"><span class="glyphicon glyphicon-backward"></span> KEMBALI</a>
            <!-- <a class="btn btn-primary" href="?page=<?= $arr['prefix'] ?>&act=tambah"><span class="glyphicon glyphicon-plus"></span> TAMBAH</a> -->
        </div>
    </div>
</div>