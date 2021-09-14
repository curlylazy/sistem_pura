
<?php

$id = $_GET['id'];
if(empty($id))
{
    $aksiform = "$aksi?act=tambah";
    $isiinformasi = "";
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
        $Sql = " SELECT tbl_informasi.*, COALESCE(tbl_user.namauser, tbl_mahasiswa.namamahasiswa) as author, tbl_user.aksesuser FROM tbl_informasi
                 LEFT JOIN tbl_user ON (tbl_user.kodeuser = tbl_informasi.kodeuser)
                 LEFT JOIN tbl_mahasiswa ON (tbl_mahasiswa.kodemahasiswa = tbl_informasi.kodemahasiswa)
                 WHERE tbl_informasi.kodeinformasi = :kodeinformasi ";

        $sth = $database->pdo->prepare($Sql);
        $sth->bindValue(':kodeinformasi', $id, PDO::PARAM_STR);
        $sth->execute();
        $row = $sth->fetch();

        $gambar = "";
        if(file_exists("data/gambar_upload/$row[gambarinformasi]"))
        {
            $gambarraw = "data/gambar_upload/$row[gambarinformasi]";
            $gambar = "<img src='data/gambar_upload/$row[gambarinformasi]' style='width: 500px;' />";
        }

        $isiinformasi = $row['isiinformasi'];

        if(!empty($row['kodeuser']))
        {
            $upload_by = $row['aksesuser'];
        }
        else
        {
            $upload_by = "MAHASISWA";
        }   

        echo
        "
            $('#kodeinformasi').addClass('disable');
            $('#kodeinformasi').val('$row[kodeinformasi]');
            $('#judulinformasi').val('$row[judulinformasi]');
            $('#statusinformasi').val('$row[statusinformasi]');

            $('#author').val('$upload_by $row[author]');
            $('#dateaddinformasi').val('".date("d F Y", strtotime($row['dateaddinformasi']))."');
        ";
    }

    ?>
}

$(document).ready(function() {

    var id = "<?= $id; ?>";

    $('#statusinformasi').val('1');

    if(id != "")
    {
        ReadDataHeader();
    }

    $('#isiinformasi').wysihtml5({
        "image": false, //Button to insert an image. Default true,
    });

    // $('.intnumber').number(true, 0);
    $("#simpan").click(function() {
        
        if($("#judulinformasi").val() == "")
        {
            alertify.alert("KESALAHAN", "[judulinformasi] masih kosong..");
        }
        else if($("#statusinformasi").val() == "")
        {
            alertify.alert("KESALAHAN", "[statusinformasi] masih kosong..");
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
                    <label for="kodekampus">Kode Informasi</label>
                    <input type="text" class="form-control disable" name="kodeinformasi" id="kodeinformasi" placeholder="AUTO">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="judulinformasi">Judul Informasi</label>
                    <input type="text" class="form-control" name="judulinformasi" id="judulinformasi" placeholder="masukkan data..">
                </div>
            </div>

            <?php if(!empty($id)): ?>
                <div class="row">
                    <div class="form-group col-md-6 disable">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" name="author" id="author" placeholder="masukkan data..">
                    </div>
                    <div class="form-group col-md-6 disable">
                        <label for="dateaddinformasi">Date Add Informasi</label>
                        <input type="text" class="form-control" name="dateaddinformasi" id="dateaddinformasi" placeholder="masukkan data..">
                    </div>
                </div>
            <?php endif ?>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="isiinformasi">Isi Informasi</label>
                    <textarea type="text" class="form-control" name="isiinformasi" id="isiinformasi" placeholder="masukkan data.."><?= $isiinformasi ?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="statusinformasi">Status Informasi</label>
                    <select type="text" class="form-control" name="statusinformasi" id="statusinformasi">
                        <option value="">Pilih Data..</option>
                        <option value="0">Pending</option>
                        <option value="1">Sudah Verifikasi</option>
                        <option value="10">Ditolak</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" id="gambarinformasi" name="gambarinformasi"><br />
                        <?= $gambar; ?>
                    </div>
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
