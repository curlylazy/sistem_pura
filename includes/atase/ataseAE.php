
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
        $Sql = " SELECT * FROM tbl_user
                 WHERE kodeuser = :kodeuser ";

        $sth = $database->pdo->prepare($Sql);
        $sth->bindValue(':kodeuser', $id, PDO::PARAM_STR);
        $sth->execute();
        $row = $sth->fetch();

        $gambar = "";
        if(file_exists("data/gambar_upload/$row[gambarkampus]"))
        {
            $gambarraw = "data/gambar_upload/$row[gambarkampus]";
            $gambar = "<img src='data/gambar_upload/$row[gambarkampus]' style='width: 200px;' />";
        }

        echo
        "
            $('#kodeuser').addClass('disable');
            $('#kodeuser').val('$row[kodeuser]');
            $('#username').val('$row[username]');
            $('#username_old').val('$row[username]');
            $('#namauser').val('$row[namauser]');
            $('#password').val('$row[password]');
            $('#notelepon').val('$row[notelepon]');
            $('#email').val('$row[email]');
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
        
        if($("#username").val() == "")
        {
            alertify.alert("KESALAHAN", "[username] masih kosong..");
        }
        else if($("#password").val() == "")
        {
            alertify.alert("KESALAHAN", "[password] masih kosong..");
        }
        else if($("#namauser").val() == "")
        {
            alertify.alert("KESALAHAN", "[namauser] masih kosong..");
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

        <input type="hidden" class="form-control" id="username_old" name="username_old" />

		<div class="box-body">

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="kodeuser">Kode User</label>
                    <input type="text" class="form-control disable" name="kodeuser" id="kodeuser" placeholder="AUTO">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="masukkan data..">
                </div>

                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="masukkan data..">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="namauser">Nama User</label>
                    <input type="text" class="form-control" name="namauser" id="namauser" placeholder="masukkan data..">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="notelepon">Notelepon</label>
                    <input type="text" class="form-control" name="notelepon" id="notelepon" placeholder="masukkan data..">
                </div>

                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="masukkan data..">
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
