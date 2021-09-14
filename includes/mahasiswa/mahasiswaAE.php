
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

function DropDownJurusan()
{
    var kodekampus = $("#kodekampus").val();
    
    $.ajax({ 
        method: "POST",
        url: "includes/ajax/ajax.php", 
        data: {kodekampus : kodekampus, act: 'loadjurusan'}, 
        cache: false, 
        success: function(result){
            $("#kodejurusan").html(result);
        }
    });
}

function DropDownKabupaten()
{
    var option = "";
    option += "<option value=''>Pilih Kabupaten</option>";
    option += "<option value='Denpasar'>Denpasar</option>";
    option += "<option value='Badung'>Badung</option>";
    option += "<option value='Singaraja'>Singaraja</option>";

    $('#kabupatenmahasiswa').html(option);
}

function DropDownKecamatan()
{
    var kabupaten = $("#kabupatenmahasiswa").val();
    var option = "";

    $('#kecamatanmahasiswa').html("");

    option += "<option value=''>Pilih Kecamatan</option>";

    if(kabupaten == "Denpasar")
    {
        option += "<option value='Denpasar Utara'>Denpasar Utara</option>";
        option += "<option value='Denpasar Barat'>Denpasar Barat</option>";
        option += "<option value='Denpasar Timur'>Denpasar Timur</option>";
        option += "<option value='Denpasar Selatan'>Denpasar Selatan</option>";
    }

    else if(kabupaten == "Badung")
    {
        option += "<option value='Abian Semal'>Abian Semal</option>";
        option += "<option value='Kuta'>Kuta</option>";
        option += "<option value='Kuta Selatan'>Kuta Selatan</option>";
        option += "<option value='Kuta Utara'>Kuta Utara</option>";
        option += "<option value='Mengwi'>Mengwi</option>";
        option += "<option value='Petang'>Petang</option>";
    }

    else if(kabupaten == "Singaraja")
    {
        option += "<option value='Banjar'>Banjar</option>";
        option += "<option value='Buleleng'>Buleleng</option>";
        option += "<option value='Busung Biu'>Busung Biu</option>";
        option += "<option value='Gerokgak'>Gerokgak</option>";
        option += "<option value='Kubutambahan'>Kubutambahan</option>";
        option += "<option value='Sawan'>Sawan</option>";
        option += "<option value='Seririt'>Seririt</option>";
        option += "<option value='Sukasada'>Sukasada</option>";
        option += "<option value='Tejakula'>Tejakula</option>";
    }

    $('#kecamatanmahasiswa').html(option);
}

function ReadDataHeader()
{
    <?php

    if(!empty($id))
    {
        $Sql = " SELECT * FROM tbl_mahasiswa
                 WHERE kodemahasiswa = :kodemahasiswa ";

        $sth = $database->pdo->prepare($Sql);
        $sth->bindValue(':kodemahasiswa', $id, PDO::PARAM_STR);
        $sth->execute();
        $row = $sth->fetch();

        $gambarmahasiswa = "";
        if(file_exists("data/gambar_upload/$row[gambarmahasiswa]"))
        {
            $gambarmahasiswa_raw = "data/gambar_upload/$row[gambarmahasiswa]";
            $gambarmahasiswa = "<img src='data/gambar_upload/$row[gambarmahasiswa]' style='width: 200px;' />";
        }

        $gambarpasport = "";
        if(file_exists("data/gambar_upload/$row[gambarpasport]"))
        {
            $gambarpasport_raw = "data/gambar_upload/$row[gambarpasport]";
            $gambarpasport = "<img src='data/gambar_upload/$row[gambarpasport]' style='width: 200px;' />";
        }

        echo
        "
            $('#kodemahasiswa').addClass('disable');
            $('#kodemahasiswa').val('$row[kodemahasiswa]');
            $('#kodejurusan').val('$row[kodejurusan]');
            $('#kabupatenmahasiswa').val('$row[kabupatenmahasiswa]');
            $('#kodekampus').val('$row[kodekampus]');
            
            DropDownKecamatan();
            DropDownJurusan();

            $('#kecamatanmahasiswa').val('$row[kecamatanmahasiswa]');
            $('#password').val('$row[password]');
            $('#nim').val('$row[nim]');
            $('#nim_old').val('$row[nim]');
            $('#namamahasiswa').val('$row[namamahasiswa]');
            $('#tanggallahir').val('$row[tanggallahir]');
            $('#alamattinggal').val('$row[alamattinggal]');
            $('#noidentitas').val('$row[noidentitas]');
            $('#nopassport').val('$row[nopassport]');
            $('#notelepon').val('$row[notelepon]');
            $('#emailmahasiswa').val('$row[emailmahasiswa]');
            $('#statusmahasiswa').val('$row[statusmahasiswa]');
        ";

    }

    ?>
}

$(document).ready(function() {

    var id = "<?= $id; ?>";

    // edit data

    // $('#jk_lakilaki').attr('checked', true);

    DropDownKabupaten();
    DropDownKecamatan();

    if(id != "")
    {
        ReadDataHeader();
    }
    else
    {
        $("#password").val("<?= $fs->generateRandomString(5); ?>");
    }

    $("#kabupatenmahasiswa").change(function() {
        DropDownKecamatan();
    });

    $("#kodekampus").change(function() {
        DropDownJurusan();
    });

    // $('.intnumber').number(true, 0);
    $("#simpan").click(function() {
        
        if($("#nim").val() == "")
        {
            alertify.alert("KESALAHAN", "[nim] masih kosong..");
        }
        else if($("#password").val() == "")
        {
            alertify.alert("KESALAHAN", "[password] masih kosong..");
        }
        else if($("#kodejurusan").val() == "")
        {
            alertify.alert("KESALAHAN", "[kodejurusan] masih kosong..");
        }
        else if($("#namamahasiswa").val() == "")
        {
            alertify.alert("KESALAHAN", "[namamahasiswa] masih kosong..");
        }
        else if($("#kodekampus").val() == "")
        {
            alertify.alert("KESALAHAN", "[kodekampus] masih kosong..");
        }
        else if($("#statusmahasiswa").val() == "")
        {
            alertify.alert("KESALAHAN", "[statusmahasiswa] masih kosong..");
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

		<form id="form1" enctype="multipart/form-data" autocomplete="off">

        <input type="hidden" class="form-control" id="nim_old" name="nim_old" />

		<div class="box-body">

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="kodemahasiswa">Kode Mahasiswa</label>
                    <input type="text" class="form-control disable" name="kodemahasiswa" id="kodemahasiswa" placeholder="AUTO">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="kodekampus">Kampus</label>
                    <select class="form-control" name="kodekampus" id="kodekampus">
                        <option value=''>Pilih Data..</option>
                        <?= $fs->DropDown("tbl_kampus", "kodekampus", "namakampus", $database) ?>        
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="kodejurusan">Jurusan</label>
                    <select class="form-control" name="kodejurusan" id="kodejurusan"></select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" name="nim" id="nim" placeholder="masukkan data..">
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="masukkan data..">
                </div>
                <div class="form-group col-md-12">
                    <label for="namamahasiswa">Nama Mahasiswa</label>
                    <input type="text" class="form-control" name="namamahasiswa" id="namamahasiswa" placeholder="masukkan data..">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="kabupatenmahasiswa">Kabupaten</label>
                    <select class="form-control" name="kabupatenmahasiswa" id="kabupatenmahasiswa"></select>
                </div>
                <div class="form-group col-md-6">
                    <label for="kecamatanmahasiswa">Kecamatan</label>
                    <select class="form-control" name="kecamatanmahasiswa" id="kecamatanmahasiswa"></select>
                </div>
                <div class="form-group col-md-6">
                    <label for="alamattinggal">Alamat Tinggal Mahasiswa</label>
                    <input type="text" class="form-control" name="alamattinggal" id="alamattinggal" placeholder="masukkan data..">
                </div>
                <div class="form-group col-md-6">
                    <label for="tanggallahir">Tanggal Lahir Mahasiswa</label>
                    <input type="text" class="form-control datepicker" name="tanggallahir" id="tanggallahir" placeholder="masukkan data..">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="emailmahasiswa">Email</label>
                    <input type="text" class="form-control" name="emailmahasiswa" id="emailmahasiswa" placeholder="masukkan data..">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="noidentitas">No Kitas</label>
                    <input type="text" class="form-control" name="noidentitas" id="noidentitas" placeholder="masukkan data..">
                </div>
                <div class="form-group col-md-4">
                    <label for="nopassport">No Passport</label>
                    <input type="text" class="form-control" name="nopassport" id="nopassport" placeholder="masukkan data..">
                </div>
                <div class="form-group col-md-4">
                    <label for="notelepon">No Telepon</label>
                    <input type="text" class="form-control" name="notelepon" id="notelepon" placeholder="masukkan data..">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Foto Profile</label>
                        <input type="file" class="form-control" id="gambarmahasiswa" name="gambarmahasiswa">
                        <?= $gambarmahasiswa; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gambar Pasport</label>
                        <input type="file" class="form-control" id="gambarpasport" name="gambarpasport">
                        <?= $gambarpasport; ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="statusmahasiswa">Status Mahasiswa</label>
                    <select class="form-control" name="statusmahasiswa" id="statusmahasiswa">
                        <option value=''>Pilih Data..</option>  
                        <option value='0'>Pending</option>  
                        <option value='1'>Aktif</option>  
                        <option value='2'>Lulus / DO </option>  
                    </select>
                </div>
            </div>

		</div>
		<div class="box-footer">
			<a class="btn btn-default" href="?page=<?= $arr['prefix'] ?>"><span class="fa fa-backward"></span> KEMBALI</a>
			<button type="button" id="simpan" class="btn btn-danger"><span class="fa fa-save"></span> SIMPAN</button>
		</div>

		</form>
	</div>
</div>
