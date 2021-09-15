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
		<span class="info-box-icon bg-green"><i class="fa fa-dashboard"></i></span>
		<div class="info-box-content">
			<span class="info-box-number"><?= $arr['headname'] ?></span>
			<p><?= $arr['description']; ?></p>
		</div>
	</div>
</div>

<?php

if($_SESSION['akses'] == 'ADMIN')
{
	bannerPage("Data User", "col-md-6", "Kelola data user", "fa fa-users", "?page=admin");
}

bannerPage("Data Pura", "col-md-6", "lihat informasi mahasiswa", "fa fa-users", "?page=mahasiswa&act=informasi");

?>

<?php 

// ============================ jumlah keseluruhan user
$Sql = " SELECT COUNT(*) as total FROM tbl_user";
$sth = $database->pdo->prepare($Sql);
$sth->execute();
$row = $sth->fetch();
$jumlah_user = number_format($row['total']);

// ============================ jumlah pura aktif
$Sql = " SELECT COUNT(*) as total FROM tbl_pura";
$sth = $database->pdo->prepare($Sql);
$sth->execute();
$row = $sth->fetch();
$jumlah_pura = number_format($row['total']);


// ============================ jumlah mahasiswa pending
// $Sql = " SELECT COUNT(*) as total FROM tbl_mahasiswa
// 		 WHERE tbl_mahasiswa.statusmahasiswa = :statusmahasiswa";
// $sth = $database->pdo->prepare($Sql);
// $sth->bindValue(':statusmahasiswa', 0, PDO::PARAM_INT);
// $sth->execute();
// $row = $sth->fetch();
// $jumlah_mhs_pending = number_format($row['total']);

?>

<!-- untuk tampilan -->
<div class='col-md-3'>
	<div class='small-box bg-green'>
		<div class='inner'>
			<h3>TOTAL USER : <?= $jumlah_user ?></h3>
			<p>jumlah keseluruhan user</p>
		</div>
		<div class='icon'>
			<i class='fa fa-user'></i>
		</div>
		<a href='#' class='small-box-footer'>
			--
		</a>
	</div>
</div>

<div class='col-md-3'>
	<div class='small-box bg-green'>
		<div class='inner'>
			<h3>PURA : <?= $jumlah_pura ?></h3>
			<p>jumlah pura</p>
		</div>
		<div class='icon'>
			<i class='fa fa-building'></i>
		</div>
		<a href='#' class='small-box-footer'>
			--
		</a>
	</div>
</div>