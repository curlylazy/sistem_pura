
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
        WHERE username = :username ";

        $sth = $database->pdo->prepare($Sql);
        $sth->bindValue(':username', $id, PDO::PARAM_STR);
        $sth->execute();
        $row = $sth->fetch();

        echo
        "
            $('#username').addClass('disable');
            $('#username').val('$row[username]');
            $('#namauser').val('$row[namauser]');
            $('#password').val('$row[password]');
            $('#akses').val('$row[akses]');
        ";
    }

    ?>
}

$(document).ready(function() {

    var id = "<?= $id; ?>";

    // edit data

    $('#jk_lakilaki').attr('checked', true);

    if(id != "")
    {
        ReadDataHeader();
    }

    // $('.intnumber').number(true, 0);
    $("#simpan").click(function() {
        
        if($("#namauser").val() == "")
        {
            $("#pesan").removeClass("hidden");
            $("#pesanisi").html("namauser masih kosong");
        }
        else if($("#username").val() == "")
        {
            $("#pesan").removeClass("hidden");
            $("#pesanisi").html("username masih kosong");
        }
        else if($("#password").val() == "")
        {
            $("#pesan").removeClass("hidden");
            $("#pesanisi").html("password masih kosong");
        }
        else if($("#akses").val() == "")
        {
            $("#pesan").removeClass("hidden");
            $("#pesanisi").html("akses masih kosong");
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
        <div class="box-header with-border">
            <h3 class="box-title">Form <?= $arr['headname'] ?></h3>
        </div>

        <form id="form1" enctype="multipart/form-data">

        

        <div class="box-body">


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" class="form-control" id="namauser" name="namauser">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Akses</label>
                        <select type="text" class="form-control" id="akses" name="akses">
                            <option value="">Pilih Akses</option>
                            <option value="ADMIN">ADMIN</option>
                            <option value="PIC">PIC</option>
                        </select>
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
