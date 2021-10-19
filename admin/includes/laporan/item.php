<?php 

$katakunci = $_POST['katakunci'];

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
        $("#form1").attr("action", "<?= "index.php?page=laporan&act=item"; ?>");
        $("#form1").submit();
    });

    $("#cetak").click(function() {
        $("#form1").attr("action", "<?= "$actcetak?cetak=item"; ?>");
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Katakunci</label>
                            <input type="text" class="form-control" name="katakunci" id="katakunci">
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
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Merek</th>
                        <th>Stok</th>
                    </thead>
                    <tbody>
                        <?php
                        # Query
                        $no = 1;
                        $Sql = " SELECT * FROM tbl_item
                                 INNER JOIN tbl_merek ON (tbl_merek.kodemerek = tbl_item.kodemerek)
                                 WHERE (tbl_item.namaitem LIKE :katakunci OR tbl_item.kodeitem LIKE :katakunci )";

                        $sth = $database->pdo->prepare($Sql);
                        $sth->bindValue(":katakunci", "%$katakunci%");
                        $sth->execute();
                        while($row = $sth->fetch())
                        {
                            echo
                            "
                            <tr>
                                <td>$no</td>
                                <td>$row[kodeitem]</td>
                                <td>$row[namaitem]</td>
                                <td>$row[satuan]</td>
                                <td>$row[namamerek]</td>
                                <td>".number_format($row['stok'])."</td>
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