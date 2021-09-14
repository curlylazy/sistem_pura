<?php

// using meedo koneksi
require '../../meedo/vendor/catfan/medoo/src/Medoo.php';
require '../../meedo/vendor/autoload.php';
require '../../meedo/koneksi.php';

include("../../class/class.thumb.php");
include("../../class/class.security.php");
include("../../class/class.fungsisql.php");

$fs  = new FungsiSql();
$sc  = new Security();

$act  	= $_POST['act'];

if($act == "loadkaryawan")
{	

	$Sql = " SELECT * FROM tbl_karyawan
			 WHERE tbl_karyawan.userkaryawan = :userkaryawan";

    $sth = $database->pdo->prepare($Sql);
    $sth->bindValue(':userkaryawan', $sc->FilterString($_POST['userkaryawan']), PDO::PARAM_STR);
    $sth->execute();
    $row = $sth->fetch();

    echo json_encode($row);
}

elseif($act == "loadjurusan")
{	

	$Sql = " SELECT * FROM tbl_jurusan
			 WHERE tbl_jurusan.kodekampus = :kodekampus";

    $sth = $database->pdo->prepare($Sql);
    $sth->bindValue(':kodekampus', $sc->FilterString($_POST['kodekampus']), PDO::PARAM_STR);
    $sth->execute();

    $res = array();
    while($row = $sth->fetch())
    {
        $res[] = "<option value='$row[kodejurusan]'>$row[namajurusan]</option>";
    }

    echo join("", $res);
}

else
{
	echo "<script>alert('Kesalahan')</script>";
}

?>