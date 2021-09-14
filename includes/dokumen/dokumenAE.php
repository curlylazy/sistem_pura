
<?php

$id = $_GET['id'];
if(empty($id))
{
    $aksiform = "$aksi?act=tambah";
}
else
{
	$aksiform = "$aksi?act=update";
}

?>

<script>

function ReadDataHeader()
{
    <?php

    if(!empty($id))
    {
        $Sql = " SELECT * FROM tbl_dokumen
                 WHERE kodedokumen = :kodedokumen ";

        $sth = $database->pdo->prepare($Sql);
        $sth->bindValue(':kodedokumen', $id, PDO::PARAM_STR);
        $sth->execute();
        $row = $sth->fetch();

        echo
        "
            $('#kodedokumen').addClass('disable');
            $('#kodedokumen').val('$row[kodedokumen]');
            $('#juduldokumen').val('$row[juduldokumen]');
            $('#keterangandokumen').val('$row[keterangandokumen]');
        ";



    }

    ?>
}

$(document).ready(function() {

    var id = "<?= $id; ?>";

    if(id != "")
    {
        ReadDataHeader();
    }

    // $('.intnumber').number(true, 0);
    $("#simpan").click(function() {
        
        if($("#juduldokumen").val() == "")
        {
            alertify.alert("KESALAHAN", "[juduldokumen] masih kosong..");
        }
        else
        {
            SubmitData("#form1", "<?= $aksiform; ?>");
        }

    });

    $(".selectd").select2();

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
        <span class="info-box-icon bg-yellow"><i class="fa <?= $FAicon; ?>"></i></span>
        <div class="info-box-content">
            <span class="info-box-number"><?= $arr['headname'] ?></span>
            <p><?= $arr['description']; ?></p>
        </div>
    </div>
</div>

<div class="col-md-12">
	<?= $fs->ShowFlashMsg(); ?>
</div>

<div class="col-md-12 hidden" id="pesan">
    <div class="alert alert-danger" id="pesanisi"></div>
</div>

<div class="col-md-12">
	<div class="box box-warning">

		<form id="form1" enctype="multipart/form-data">

		<div class="box-body">

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="kodedokumen">Kode Dokumen</label>
                    <input type="text" class="form-control disable" name="kodedokumen" id="kodedokumen" placeholder="AUTO">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="juduldokumen">Judul Dokumen</label>
                    <input type="text" class="form-control" name="juduldokumen" id="juduldokumen" placeholder="masukkan data..">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="keterangandokumen">Keterangan Dokumen</label>
                    <input type="text" class="form-control" name="keterangandokumen" id="keterangandokumen" placeholder="masukkan data..">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="filedokumen_1">File Dokumen 1</label>
                    <input type="file" class="form-control" name="filedokumen_1" id="filedokumen_1" placeholder="masukkan data..">
                </div>

                <div class="form-group col-md-3">
                    <label for="filedokumen_2">File Dokumen 2</label>
                    <input type="file" class="form-control" name="filedokumen_2" id="filedokumen_2" placeholder="masukkan data..">
                </div>

                <div class="form-group col-md-3">
                    <label for="filedokumen_3">File Dokumen 3</label>
                    <input type="file" class="form-control" name="filedokumen_3" id="filedokumen_3" placeholder="masukkan data..">
                </div>

                <div class="form-group col-md-3">
                    <label for="filedokumen_4">File Dokumen 4</label>
                    <input type="file" class="form-control" name="filedokumen_4" id="filedokumen_4" placeholder="masukkan data..">
                </div>
            </div>

            <div class="row">
                <?php if(!empty($row['filedokumen_1'])): ?>
                    <div class="form-group col-md-3">
                        <label>File Dokumen 1</label><br />
                        Nama File : <a href="data/gambar_upload/<?= $row['filedokumen_1'] ?>"><?= $row['filedokumen_1'] ?></a>
                    </div>
                <?php endif ?>

                <?php if(!empty($row['filedokumen_2'])): ?>
                    <div class="form-group col-md-3">
                        <label>File Dokumen 2</label><br />
                        Nama File : <a href="data/gambar_upload/<?= $row['filedokumen_2'] ?>"><?= $row['filedokumen_2'] ?></a>
                    </div>
                <?php endif ?>

                <?php if(!empty($row['filedokumen_3'])): ?>
                    <div class="form-group col-md-3">
                        <label>File Dokumen 3</label><br />
                        Nama File : <a href="data/gambar_upload/<?= $row['filedokumen_3'] ?>"><?= $row['filedokumen_3'] ?></a>
                    </div>
                <?php endif ?>

                <?php if(!empty($row['filedokumen_4'])): ?>
                    <div class="form-group col-md-3">
                        <label>File Dokumen 4</label><br />
                        Nama File : <a href="data/gambar_upload/<?= $row['filedokumen_4'] ?>"><?= $row['filedokumen_4'] ?></a>
                    </div>
                <?php endif ?>
            </div>

		</div>
		<div class="box-footer">
			<a class="btn btn-default" href="?page=<?= $arr['prefix'] ?>"><span class="fa fa-backward"></span> KEMBALI</a>
			<button type="button" id="simpan" class="btn btn-danger"><span class="fa fa-save"></span> SIMPAN</button>
		</div>

		</form>
	</div>
</div>
