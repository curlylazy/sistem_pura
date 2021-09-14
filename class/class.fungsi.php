<?php
function SetInt($tipe)
{
	$res = filter_var(str_replace(",", "", $tipe), FILTER_SANITIZE_NUMBER_INT);
	return $res;
}

function SetBool($tipe)
{
	$tipefile = settype($tipe, "bool");
	return $tipefile;
}

function SetFloat($tipe)
{
	$res = filter_var($tipe, FILTER_SANITIZE_NUMBER_FLOAT);
	return $res;
}

function SetString($tipe)
{
	$res = trim(filter_var($tipe, FILTER_SANITIZE_STRING));
	return $res;
}

function FormatNum($num)
{
	return number_format($num,0,",",".");
}

function bannerPage($judulpage, $col, $keterangan, $gambar, $lokasi)
{
	echo"
	<div class='$col'>
		<div class='small-box bg-yellow'>
			<div class='inner'>
				<h3>$judulpage</h3>
				<p>$keterangan</p>
			</div>
			<div class='icon'>
				<i class='fa $gambar'></i>
			</div>
			<a href='$lokasi' class='small-box-footer'>
				Tampil Menu <i class='fa fa-arrow-circle-right'></i>
			</a>
		</div>
	</div>";
}

?>
