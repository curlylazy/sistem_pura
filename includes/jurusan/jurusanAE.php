
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
        $Sql = " SELECT * FROM tbl_jurusan
                 WHERE kodejurusan = :kodejurusan ";

        $sth = $database->pdo->prepare($Sql);
        $sth->bindValue(':kodejurusan', $id, PDO::PARAM_STR);
        $sth->execute();
        $row = $sth->fetch();

        echo
        "
            $('#kodejurusan').addClass('disable');
            $('#kodejurusan').val('$row[kodejurusan]');
            $('#kodekampus').val('$row[kodekampus]');
            $('#namajurusan').val('$row[namajurusan]');
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
        
        if($("#namajurusan").val() == "")
        {
            alertify.alert("KESALAHAN", "[namajurusan] masih kosong..");
        }
        else if($("#kodekampus").val() == "")
        {
            alertify.alert("KESALAHAN", "[kodekampus] masih kosong..");
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

        <!-- <input type="hidden" class="form-control" id="kodekampus" name="kodekampus" /> -->

		<div class="box-body">

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="kodejurusan">Kode Jurusan</label>
                    <input type="text" class="form-control disable" name="kodejurusan" id="kodejurusan" placeholder="AUTO">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="kodekampus">Nama Kampus</label>
                    <select class="form-control" name="kodekampus" id="kodekampus">
                        <option value="">Pilih Data..</option>
                        <?= $fs->DropDown("tbl_kampus", "kodekampus", "namakampus", $database) ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="namajurusan">Nama Jurusan</label>
                    <input type="text" class="form-control" name="namajurusan" id="namajurusan" placeholder="masukkan data..">
                </div>
            </div>

		</div>
		<div class="box-footer">
			<a class="btn btn-default" href="?page=<?= $arr['prefix'] ?>"><span class="glyphicon glyphicon-backward"></span> KEMBALI</a>
			<button type="button" id="simpan" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span> SIMPAN</button>
		</div>

		</form>
	</div>
</div>
