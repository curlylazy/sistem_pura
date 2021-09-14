
<?php

$id = $_GET['id'];
if(empty($id))
{
    $aksiform = "$aksi?act=tambah";
}
else
{
	$aksiform = "$aksi?act=update";
    $Sql = " SELECT * FROM tbl_pura
             WHERE kodepura = :kodepura ";

    $sth = $database->pdo->prepare($Sql);
    $sth->bindValue(':kodepura', $id, PDO::PARAM_STR);
    $sth->execute();
    $row = $sth->fetch();

    $keterangan = $row['keterangan'];
}

?>

<script>

function DropDownKabupaten()
{
    var option = "";
    option += "<option value=''>Pilih Kabupaten</option>";
    option += "<option value='Denpasar'>Denpasar</option>";
    option += "<option value='Badung'>Badung</option>";
    option += "<option value='Singaraja'>Singaraja</option>";

    $('#kabupatenkampus').html(option);
}

function DropDownKecamatan()
{
    var kabupatenkampus = $("#kabupatenkampus").val();
    var option = "";

    $('#kecamatankampus').html("");

    option += "<option value=''>Pilih Kecamatan</option>";

    if(kabupatenkampus == "Denpasar")
    {
        option += "<option value='Denpasar Utara'>Denpasar Utara</option>";
        option += "<option value='Denpasar Barat'>Denpasar Barat</option>";
        option += "<option value='Denpasar Timur'>Denpasar Timur</option>";
        option += "<option value='Denpasar Selatan'>Denpasar Selatan</option>";
    }

    else if(kabupatenkampus == "Badung")
    {
        option += "<option value='Abian Semal'>Abian Semal</option>";
        option += "<option value='Kuta'>Kuta</option>";
        option += "<option value='Kuta Selatan'>Kuta Selatan</option>";
        option += "<option value='Kuta Utara'>Kuta Utara</option>";
        option += "<option value='Mengwi'>Mengwi</option>";
        option += "<option value='Petang'>Petang</option>";
    }

    else if(kabupatenkampus == "Singaraja")
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

    $('#kecamatankampus').html(option);
}

function ReadDataHeader()
{
    <?php

    if(!empty($id))
    {
        // $gambar = "";
        // if(file_exists("data/gambar_upload/$row[gambarkampus]"))
        // {
        //     $gambarraw = "data/gambar_upload/$row[gambarkampus]";
        //     $gambar = "<img src='data/gambar_upload/$row[gambarkampus]' style='width: 200px;' />";
        // }

        echo
        "
            $('#kodepura').addClass('disable');
            $('#kodepura').val('$row[kodepura]');
            $('#jenispura').val('$row[jenispura]');
            $('#namapura').val('$row[namapura]');
            $('#alamatpura').val('$row[alamatpura]');
            $('#kabupaten_str').val('$row[kabupaten]');
            $('#provinsi_str').val('$row[provinsi]');
            $('#ketuapengelola').val('$row[ketuapengelola]');
            $('#notelepon').val('$row[notelepon]');
            $('#nomor_tanda_daftar_pura').val('$row[nomor_tanda_daftar_pura]');
            $('#kondisipura').val('$row[kondisipura]');
            $('#piodalan').val('$row[piodalan]');
            $('#luaspura').val('$row[luaspura]');
            $('#status_tanah_pura').val('$row[status_tanah_pura]');
        ";
    }

    ?>
}

$(document).ready(function() {

    var id = "<?= $id; ?>";

    // edit data

    // $('#jk_lakilaki').attr('checked', true);

    // DropDownKabupaten();
    // DropDownKecamatan();

    $('.textarea').wysihtml5();

    var KabupatenSource = "";
    var ProvinsiSource = "";
    var KabupatenURL = 'http://localhost/sistem_pura/data/kabupaten.txt';
    var ProvinsiURL = 'http://localhost/sistem_pura/data/provinsi.txt';
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", KabupatenURL, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var allText = rawFile.responseText;
                KabupatenSource = JSON.parse(allText);
                // KabupatenSource.push(allText);
                // KabupatenSource = "["+allText+"]";
                console.log(KabupatenSource);
            }
        }
    }
    rawFile.send(null);

    rawFile.open("GET", ProvinsiURL, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var allText = rawFile.responseText;
                ProvinsiSource = JSON.parse(allText);
                console.log(ProvinsiSource);
            }
        }
    }
    rawFile.send(null);

    if(id != "")
    {
        var kabupaten = "<?= $row['kabupaten']; ?>";
        var kecamatan = "<?= $row['kecamatan']; ?>";
        ReadDataHeader();
    }

    $("#provinsi").change(function() {
        var obj = ProvinsiSource.find(o => o.value === this.value);
        $("#provinsi_str").val(obj['label']);

        var arr_opt_kabupaten = "";
        var rows_kabupaten = KabupatenSource.filter(o => o.idprov === this.value);

        arr_opt_kabupaten += "<option value=''>Pilih Kabupaten</option>";
        for (let index = 0; index < rows_kabupaten.length; ++index)
        {
            arr_opt_kabupaten += "<option value='" + rows_kabupaten[index]['value'] + "'>" + rows_kabupaten[index]['label'] + "</option>";
        }

        $("#kabupaten").html(arr_opt_kabupaten);
    });

    $("#kabupaten").change(function() {
        var obj = KabupatenSource.find(o => o.value === this.value);
        $("#kabupaten_str").val(obj['label']);
    });

    // $('.intnumber').number(true, 0);
    $("#simpan").click(function() {
        
        if($("#namapura").val() == "")
        {
            alertify.alert("KESALAHAN", "[namapura] masih kosong..");
        }
        else if($("#jenispura").val() == "")
        {
            alertify.alert("KESALAHAN", "[jenispura] masih kosong..");
        }
        else if($("#alamatpura").val() == "")
        {
            alertify.alert("KESALAHAN", "[alamatpura] masih kosong..");
        }
        else if($("#provinsi").val() == "")
        {
            alertify.alert("KESALAHAN", "[provinsi] masih kosong..");
        }
        else if($("#kabupaten").val() == "")
        {
            alertify.alert("KESALAHAN", "[kabupaten] masih kosong..");
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

        <input type="hidden" class="form-control" id="provinsi_str" name="provinsi_str" />
        <input type="hidden" class="form-control" id="kabupaten_str" name="kabupaten_str" />

		<div class="box-body">

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="kodepura">Kode Pura</label>
                    <input type="text" class="form-control disable" name="kodepura" id="kodepura" placeholder="AUTO">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="namapura">Nama Pura</label>
                    <input type="text" class="form-control" name="namapura" id="namapura" placeholder="masukkan data..">
                </div>
                <div class="form-group col-md-6">
                    <label for="jenispura">Jenis Pura</label>
                    <select class="form-control" name="jenispura" id="jenispura"><?= $fs->DropDownJenisPura(); ?></select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="provinsi">Provinsi</label>
                    <select class="form-control" name="provinsi" id="provinsi"><?= $fs->DropDownProvinsi(); ?></select>
                </div>
                <div class="form-group col-md-6">
                    <label for="kabupaten">Kabupaten</label>
                    <select class="form-control" name="kabupaten" id="kabupaten"></select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="alamatpura">Alamat Pura</label>
                    <input class="form-control" name="alamatpura" id="alamatpura" />
                </div>
                <div class="form-group col-md-4">
                    <label for="notelepon">No Telepon</label>
                    <input class="form-control" name="notelepon" id="notelepon" />
                </div>
                <div class="form-group col-md-4">
                    <label for="nomor_tanda_daftar_pura">No Tanda Daftar Pura</label>
                    <input class="form-control" name="nomor_tanda_daftar_pura" id="nomor_tanda_daftar_pura" />
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="piodalan">Piodalan</label>
                    <input type="text" class="form-control" name="piodalan" id="piodalan" placeholder="masukkan data..">
                </div>
                <div class="form-group col-md-6">
                    <label for="kondisipura">Jenis Pura</label>
                    <select class="form-control" name="kondisipura" id="kondisipura"><?= $fs->DropDownKondisiPura(); ?></select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="luaspura">Luas Pura</label>
                    <input type="text" class="form-control" name="luaspura" id="luaspura" placeholder="masukkan data..">
                </div>
                <div class="form-group col-md-6">
                    <label for="status_tanah_pura">Status Tanah Pura</label>
                    <select class="form-control" name="status_tanah_pura" id="status_tanah_pura"><?= $fs->DropDownStatusTanahPura(); ?></select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="keterangan">Keterangan</label>
                    <textarea type="text" class="form-control textarea" name="keterangan" id="keterangan"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="ketuapengelola">Alamat Pura</label>
                    <input class="form-control" name="ketuapengelola" id="ketuapengelola" />
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" id="gambarkampus" name="gambarkampus">
                        <?= $gambar; ?>
                    </div>
                </div>
            </div> -->

		</div>
		<div class="box-footer">
			<a class="btn btn-default" href="?page=<?= $arr['prefix'] ?>"><span class="glyphicon glyphicon-backward"></span> KEMBALI</a>
			<button type="button" id="simpan" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span> SIMPAN</button>
		</div>

		</form>
	</div>
</div>
