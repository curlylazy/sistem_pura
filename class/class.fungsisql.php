<?php
session_start();
class FungsiSql{

	private $str = "";

	public function __construct()
	{

	}

	function SetFlashMsg($pesan, $redirect)
	{
		$_SESSION['pesanflash'] = $pesan;
		if(!empty($redirect))
			echo "<script language='JavaScript'>document.location='$redirect'</script>";
	}

	function ShowFlashMsg()
	{
		$pesan =
		"
		<div class='alert alert-dismissible alert-success'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			$_SESSION[pesanflash]
		</div>
		";

		if(empty($_SESSION['pesanflash']))
		{
			$pesan = "";
		}

		unset($_SESSION['pesanflash']);

		return $pesan;
	}

	function SetPesan($page, $act)
	{
		if($act == "tambah")
		{
			$pesan = "Tambah $page berhasil.";
		}
		elseif($act == "update")
		{
			$pesan = "Update $page berhasil.";
		}
		elseif($act == "verifikasi")
		{
			$pesan = "Verifikasi $page berhasil.";
		}
		else
		{
			$pesan = "Hapus $page berhasil.";
		}

		echo "<script language='JavaScript'>alert('$pesan');document.location='../../index.php?page=$page'</script>";
	}

	function Pesan($pesan)
	{
		echo "<script language='JavaScript'>alert('$pesan');window.history.back(-1)</script>";
	}

	function SetPesanCustom($pesan, $link)
	{
		echo "<script language='JavaScript'>alert('$pesan');document.location='$link'</script>";
	}

	function GetKode($kode, $param ,$table, $database)
	{

		if($kode =="" || $param == "" || $table == "")
		{
			echo "Tidak dapat menggenerate data Kode Otomatis";
			return;
		}

		$autonum = "";
		$value	 = "";

		$query = $database->pdo->prepare("SELECT max($kode) AS nomer FROM $table");
		$query->execute();
		$row = $query->fetch();

		$autonum = $row['nomer'];

		# Cek Parameter
		if($autonum == "")
		{
			$autonum = $param."001";
		}
		else
		{
			$autonum = (int) substr($autonum, strlen($param), 4);
			$autonum++;
			$autonum =  $param.sprintf("%03s", $autonum);
		}

		return $autonum;
	}

	public function CariData($cari, $column, $value, $tabel, $database)
	{
		$query = $database->pdo->prepare("SELECT * FROM $tabel WHERE $column = :value");
		$query->bindValue(':value', $value, PDO::PARAM_STR);

		$query->execute();
		$row = $query->fetch();

		return $row[$cari];
	}

	public function CekData($value, $column ,$tabel, $database)
	{
		$query = $database->pdo->prepare("SELECT COUNT($column) as jumlah FROM $tabel WHERE $column = :value");
		$query->bindValue(':value', $value, PDO::PARAM_STR);

		$query->execute();
		$row = $query->fetch();
		$jumlah = $row['jumlah'];

		return $jumlah;
	}

	public function CekDataByBengkel($value, $column ,$tabel, $database)
	{
		$query = $database->pdo->prepare("SELECT COUNT($column) as jumlah FROM $tabel WHERE $column = :value AND kodebengkel = :kodebengkel");
		$query->bindValue(':value', $value, PDO::PARAM_STR);
		$query->bindValue(':kodebengkel', $_SESSION['kodebengkel'], PDO::PARAM_STR);

		$query->execute();
		$row = $query->fetch();
		$jumlah = $row['jumlah'];

		return $jumlah;
	}

	public function DropDown($table, $value, $display, $database)
	{
		$iRes = array();
		$Sql = "SELECT * FROM $table";
        $sth = $database->pdo->prepare($Sql);
        $sth->execute();

        while($row = $sth->fetch())
        {
        	$iRes[] = "<option value='$row[$value]'>$row[$display]</option>";
        }

        return join($iRes, "");
	}

	public function DropDownFilterBengkel($table, $value, $display, $database)
	{
		$iRes = array();
		$Sql = "SELECT * FROM $table WHERE kodebengkel = '".$_SESSION['kodebengkel']."'";
        $sth = $database->pdo->prepare($Sql);
        $sth->execute();
        while($row = $sth->fetch())
        {
        	$iRes[] = "<option value='$row[$value]'>$row[$display]</option>";
        }

        return join($iRes, "");
	}

	public function DropDownHari()
	{
		$iRes = array();
		$iRes[] = "<option value='SENIN'>SENIN</option>";
		$iRes[] = "<option value='SELASA'>SELASA</option>";
		$iRes[] = "<option value='RABU'>RABU</option>";
		$iRes[] = "<option value='KAMIS'>KAMIS</option>";
		$iRes[] = "<option value='JUMAT'>JUMAT</option>";
		$iRes[] = "<option value='SABTU'>SABTU</option>";
		$iRes[] = "<option value='MINGGu'>MINGGu</option>";
		return join($iRes, "");
	}

	public function DropDownJenisPura()
	{
		$iRes = array();
		$iRes[] = "<option value='SAD KHAYANGAN'>SAD KHAYANGAN</option>";
		$iRes[] = "<option value='DANG KHAYANGAN'>DANG KHAYANGAN</option>";
		$iRes[] = "<option value='KHAYANGAN TIGA'>KHAYANGAN TIGA</option>";
		$iRes[] = "<option value='JAGATNATHA'>JAGATNATHA</option>";
		$iRes[] = "<option value='KUIL'>KUIL</option>";
		$iRes[] = "<option value='CANDI'>CANDI</option>";
		return join($iRes, "");
	}

	public function DropDownKondisiPura()
	{
		$iRes = array();
		$iRes[] = "<option value='BAIK'>BAIK</option>";
		$iRes[] = "<option value='RUSAK'>RUSAK</option>";
		return join($iRes, "");
	}

	public function DropDownStatusTanahPura()
	{
		$iRes = array();
		$iRes[] = "<option value='SERTIFIKAT'>SERTIFIKAT</option>";
		$iRes[] = "<option value='BELUM SERTIFIKAT'>BELUM SERTIFIKAT</option>";
		$iRes[] = "<option value='HIBAH'>HIBAH</option>";
		return join($iRes, "");
	}

	public function DropDownProvinsi()
	{
		$iOption = array();
		$iOption[] = "<option value=''>-- Pilih Data --</option>";
		$iOption[] = "<option value='1'>Bali</option>";
		$iOption[] = "<option value='2'>Bangka Belitung</option>";
		$iOption[] = "<option value='3'>Banten</option>";
		$iOption[] = "<option value='4'>Bengkulu</option>";
		$iOption[] = "<option value='5'>DI Yogyakarta</option>";
		$iOption[] = "<option value='6'>DKI Jakarta</option>";
		$iOption[] = "<option value='7'>Gorontalo</option>";
		$iOption[] = "<option value='8'>Jambi</option>";
		$iOption[] = "<option value='9'>Jawa Barat</option>";
		$iOption[] = "<option value='10'>Jawa Tengah</option>";
		$iOption[] = "<option value='11'>Jawa Timur</option>";
		$iOption[] = "<option value='12'>Kalimantan Barat</option>";
		$iOption[] = "<option value='13'>Kalimantan Selatan</option>";
		$iOption[] = "<option value='14'>Kalimantan Tengah</option>";
		$iOption[] = "<option value='15'>Kalimantan Timur</option>";
		$iOption[] = "<option value='16'>Kalimantan Utara</option>";
		$iOption[] = "<option value='17'>Kepulauan Riau</option>";
		$iOption[] = "<option value='18'>Lampung</option>";
		$iOption[] = "<option value='19'>Maluku</option>";
		$iOption[] = "<option value='20'>Maluku Utara</option>";
		$iOption[] = "<option value='21'>Nanggroe Aceh Darussalam (NAD)</option>";
		$iOption[] = "<option value='22'>Nusa Tenggara Barat (NTB)</option>";
		$iOption[] = "<option value='23'>Nusa Tenggara Timur (NTT)</option>";
		$iOption[] = "<option value='24'>Papua</option>";
		$iOption[] = "<option value='25'>Papua Barat</option>";
		$iOption[] = "<option value='26'>Riau</option>";
		$iOption[] = "<option value='27'>Sulawesi Barat</option>";
		$iOption[] = "<option value='28'>Sulawesi Selatan</option>";
		$iOption[] = "<option value='29'>Sulawesi Tengah</option>";
		$iOption[] = "<option value='30'>Sulawesi Tenggara</option>";
		$iOption[] = "<option value='31'>Sulawesi Utara</option>";
		$iOption[] = "<option value='32'>Sumatera Barat</option>";
		$iOption[] = "<option value='33'>Sumatera Selatan</option>";
		$iOption[] = "<option value='34'>Sumatera Utara</option>";

		$iOption = join($iOption);
		return $iOption;
	}

	public function DropDownCustom($custom,$database)
	{
		$iRes = array();

		if($custom == "KECAMATAN")
		{
			$Sql = "SELECT * FROM tbl_kecamatan
					INNER JOIN tbl_kabupaten ON (tbl_kabupaten.kodekabupaten = tbl_kecamatan.kodekabupaten)
					WHERE tbl_kecamatan.statuskecamatan = :statuskecamatan ";
	        $sth = $database->pdo->prepare($Sql);
	        $sth->bindValue(':statuskecamatan', 'Y', PDO::PARAM_STR);
	        $sth->execute();
	        while($row = $sth->fetch())
	        {
	        	$iRes[] = "<option value='$row[kodekecamatan]'>KAB. $row[namakabupaten] - KEC. $row[namakecamatan]</option>";
	        }
		}
        return join($iRes, "");
	}

	public function JumlahAnggotaKursus($kodekelas, $database)
	{
		$Sql = "SELECT COUNT(*) as jumlah FROM tbl_kursus
				WHERE kodekelas = :kodekelas";
		$query = $database->pdo->prepare($Sql);
		$query->bindValue(':kodekelas', $kodekelas, PDO::PARAM_STR);
		$query->execute();
		$row = $query->fetch();

		return $row['jumlah'];
	}

	public function HakAkses()
	{
		if(empty($_SESSION[tipe]))
		{
			exit("<center>Maaf Akses DiBlokir</center>");
		}
	}

	public function GetJk($jk)
	{
		$iRes = "";
		if($jk == "P")
		{
			$iRes = "Perempuan";
		}
		else
		{
			$iRes = "Laki - Laki";
		}

		return $iRes;
	}

	public function GetStatusMahasiswa($sts)
	{
		$iRes = "";
		if($sts == 0)
		{
			$iRes = "Pending";
		}
		elseif($sts == 1)
		{
			$iRes = "Aktif";
		}
		elseif($sts == 2)
		{
			$iRes = "Lulus / DO";
		}

		return $iRes;
	}

	public function GetStatusInformasi($sts)
	{
		$iRes = "";
		if($sts == 0)
		{
			$iRes = "Pending";
		}
		elseif($sts == 1)
		{
			$iRes = "Sudah Diverifikasi";
		}
		elseif($sts == 10)
		{
			$iRes = "Ditolak";
		}

		return $iRes;
	}

	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}

?>
