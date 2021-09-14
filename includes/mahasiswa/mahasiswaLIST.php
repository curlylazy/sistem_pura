<!-- tampilan untuk admin -->
<script>
$(document).ready(function() {
	$('#tabelData').dataTable({
		"ordering": false
	});
	$('.pagination').addClass('pagination-sm');
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

<div class="col-md-12">
	<div class="box box-warning">
		<div class="box-body">
			<div class="table-responsive col-md-12">
			    <table class="table table-condensed" id="tabelData">
			        <thead>
			            <th>No</th>
			            <th>NIM</th>
			            <th>Nama</th>
			            <th>Kampus</th>
			            <th>Kabupaten</th>
			            <th>Kecamatan</th>
			            <th>Alamat</th>
			            <th>No Telepon</th>
			            <th>Status</th>
			            <th>More</th>
			        </thead>
			        <tbody>
			            <?php
			            # Query

			            $totalmhs = 0;
			            $total_pending = 0;
			            $total_aktif = 0;
			            $total_tidak_aktif = 0;

			            $no = 1;
			            $Sql = " SELECT * FROM tbl_mahasiswa
			            		 INNER JOIN tbl_kampus ON (tbl_kampus.kodekampus = tbl_mahasiswa.kodekampus)";

			            $sth = $database->pdo->prepare($Sql);
			            $sth->execute();
			            while($row = $sth->fetch())
			            {
			            	$totalmhs = $totalmhs + 1;

			            	if($row['statusmahasiswa'] == 0)
			            		$total_pending = $total_pending + 1;

			            	if($row['statusmahasiswa'] == 1)
			            		$total_aktif = $total_aktif +1;

			            	if($row['statusmahasiswa'] == 2)
			            		$total_tidak_aktif = $total_tidak_aktif +1;

			                echo
			                "
			                <tr>
			                    <td>$no</td>
			                    <td>$row[nim]</td>
			                    <td>$row[namamahasiswa]</td>
			                    <td>$row[namakampus]</td>
			                    <td>$row[kabupatenmahasiswa]</td>
			                    <td>$row[kecamatanmahasiswa]</td>
			                    <td>$row[alamattinggal]</td>
			                    <td>$row[notelepon]</td>
			                    <td>".$fs->GetStatusMahasiswa($row['statusmahasiswa'])."</td>
			                    <td>
									<div class='btn-group'>
										<a class='btn btn-default btn-xs' href='?page=$arr[prefix]&act=tambah&id=$row[kodemahasiswa]'>
											<span class='glyphicon glyphicon-edit'></span>
										</a>
										<a class='btn btn-danger btn-xs' href='$aksi?act=hapus&id=$row[kodemahasiswa]' onClick=\"return confirm('Hapus data $row[kodemahasiswa] ?')\">
										<span class='glyphicon glyphicon-remove'></span></a>
									</div>
			                    </td>
			                </tr>
			                ";
			                $no++;
			            }
			            ?>
			        </tbody>
			    </table>

			    <hr />
			    
			    <h5>Pending : <b><?= $total_pending ?></b> Mahasiswa</h5>
			    <h5>Aktif : <b><?= $total_aktif ?></b> Mahasiswa</h5>
			    <h5>Tidak Aktif : <b><?= $total_tidak_aktif ?></b> Mahasiswa</h5>
			    <h5>Total Mahasiswa : <b><?= $totalmhs ?></b> Mahasiswa</h5>
			</div>
		</div>
		<div class="box-footer">
			<a class="btn btn-default" href="?page=home"><span class="fa fa-backward"></span> KEMBALI</a>
			<a class="btn btn-danger" href="?page=<?= $arr['prefix'] ?>&act=tambah"><span class="fa fa-plus"></span> TAMBAH</a>
		</div>
	</div>
</div>
