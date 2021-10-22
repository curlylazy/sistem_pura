
<?php

// detek apakah online atau localhost
$whitelist = array(
    '127.0.0.1',
    '::1'
);

if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    $ipaddress = "http://localhost/sistem_pura/admin";
}
else
{
    $ipaddress = "https://sidatrabimashindu.com/admin";
}


$id = $_GET['id'];
if(empty($id))
{
    $aksiform = "$aksi?act=tambah";
    $isenablesave = true;

    $latitude = '-8.537056073005832';
    $longitude = '115.11086225509644';
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
    $kodeuser = $row['kodeuser'];

    $isenablesave = false;
    if($_SESSION['akses'] == 'ADMIN')
    {
        $isenablesave = true;
    }
    else
    {
        if($_SESSION['kodeuser'] == $kodeuser)
        {
            $isenablesave = true;
        }
        else
        {
            $isenablesave = false;
        }
    }

}

?>

<script>

function ReadDataHeader()
{
    <?php

    if(!empty($id))
    {
        $gambar = "";
        if(file_exists("data/gambar_upload/$row[gambarpura]"))
        {
            $gambarraw = "data/gambar_upload/$row[gambarpura]";
            $gambar = "<img src='data/gambar_upload/$row[gambarpura]' style='width: 800px;' />";
        }

        if(empty($row['latitude']))
            $latitude = '-8.537056073005832';
        else
            $latitude = $row['latitude'];

        if(empty($row['longitude']))
            $longitude = '115.11086225509644';
        else
            $longitude = $row['longitude'];

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

            $('#latitude').val('$row[latitude]');
            $('#longitude').val('$row[longitude]');
        ";
    }

    ?>
}

$(document).ready(function() {

    var id = "<?= $id; ?>";

    // edit data

    $('.textarea').wysihtml5();

    var KabupatenSource = "";
    var ProvinsiSource = "";
    var KabupatenURL = "<?= $ipaddress ?>/data/kabupaten.txt";
    var ProvinsiURL = "<?= $ipaddress ?>/data/provinsi.txt";
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
                // console.log(KabupatenSource);
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
        var provinsi = "<?= $row['provinsi']; ?>";
        ReadDataHeader();

        var obj = ProvinsiSource.find(o => o.label === provinsi);
        $("#provinsi").val(obj.value);

        // load kabupatennya
        var arr_opt_kabupaten = "";
        var rows_kabupaten = KabupatenSource.filter(o => o.idprov === obj.value);

        arr_opt_kabupaten += "<option value=''>Pilih Kabupaten</option>";
        for (let index = 0; index < rows_kabupaten.length; ++index)
        {
            arr_opt_kabupaten += "<option value='" + rows_kabupaten[index]['value'] + "'>" + rows_kabupaten[index]['label'] + "</option>";
        }

        $("#kabupaten").html(arr_opt_kabupaten);
        
        var obj = KabupatenSource.find(o => o.label === kabupaten);
        $("#kabupaten").val(obj.value);
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJwqttWL-EfiBEYAu16mSUWw4PO6hWorY&libraries=places&callback=initAutocomplete"
async defer></script>

<script type="text/javascript">

var map;
var markersArray = [];

function initAutocomplete() {

    var map = new google.maps.Map(document.getElementById('petalokasi'), {
        center: {lat: <?= $latitude; ?>, lng: <?= $longitude; ?>},
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    google.maps.event.addListener(map, 'click', function (e) {
        $("#latitude").val(e.latLng.lat());
        $("#longitude").val(e.latLng.lng());

        placeMarker(e.latLng);
    });

    var myLatLng = {lat: <?= $latitude; ?>, lng: <?= $longitude; ?>};


        placeMarker(myLatLng);

    function placeMarker(location) {
        // first remove all markers if there are any
        deleteOverlays();

        var marker = new google.maps.Marker({
            position: location,
            map: map
        });

        // add marker in markers array
        markersArray.push(marker);

        //map.setCenter(location);
    }

    // Deletes all markers in the array by removing references to them
    function deleteOverlays() {
        if (markersArray) {
            for (i in markersArray) {
                markersArray[i].setMap(null);
            }
        markersArray.length = 0;
        }
    }

    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // [START region_getplaces]
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
        
        var places = searchBox.getPlaces();

        if (places.length == 0) {
          return;
        }

        // Clear out the old markers.
        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];


        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
    // [END region_getplaces]
}
</script>

<style>

#map 
{
    height: 100%;
}

.controls 
{
    margin-top: 10px;
    border: 1px solid transparent;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    height: 32px;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 12px;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;
    width: 300px;
}

#pac-input:focus {
    border-color: #4d90fe;
}

.pac-container {
    font-family: Roboto;        
}

#type-selector {
    color: #fff;
    background-color: #4d90fe;
    padding: 5px 11px 0px 11px;
}

#type-selector label {
    font-family: Roboto;
    font-size: 13px;
    font-weight: 300;
}

#target {
    width: 345px;
}

</style>

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
        <span class="info-box-icon bg-green"><i class="fa <?= $FAicon; ?>"></i></span>
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
	<div class="box box-success">

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
                    <label for="kondisipura">Kondisi Pura</label>
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
                    <label for="ketuapengelola">Ketua Pengelola</label>
                    <input class="form-control" name="ketuapengelola" id="ketuapengelola" />
                </div>
            </div>

            <div class="row">
                    <div class="form-group col-md-12">
                        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                        <div id="petalokasi" name="petalokasi" style="height: 500px;"></div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="latitude">Latitude</label>
                        <input type="text" class="form-control" name="latitude" id="latitude" placeholder="masukkan data..">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="longitude">Longitude</label>
                        <input type="text" class="form-control" name="longitude" id="longitude" placeholder="masukkan data..">
                    </div>
                </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" id="gambarpura" name="gambarpura"><br />
                        <?= $gambar; ?>
                    </div>
                </div>
            </div>

		</div>
		<div class="box-footer">
			<a class="btn btn-default" href="?page=<?= $arr['prefix'] ?>"><span class="glyphicon glyphicon-backward"></span> KEMBALI</a>
            <?php if($isenablesave): ?>
                <button type="button" id="simpan" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> SIMPAN</button>
            <?php endif ?>
		</div>

		</form>
	</div>
</div>
