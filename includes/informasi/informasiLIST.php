
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
			            <th>Kode</th>
			            <th>Author</th>
			            <th>Judul</th>
			            <th>Tanggal Dibuat</th>
			            <th>Status Informasi</th>
			            <th>More</th>
			        </thead>
			        <tbody>
			            <?php
			            # Query
			            $no = 1;
			            $Sql = " SELECT tbl_informasi.*, COALESCE(tbl_user.namauser, tbl_mahasiswa.namamahasiswa) as author, tbl_user.aksesuser FROM tbl_informasi
								 LEFT JOIN tbl_user ON (tbl_user.kodeuser = tbl_informasi.kodeuser)
								 LEFT JOIN tbl_mahasiswa ON (tbl_mahasiswa.kodemahasiswa = tbl_informasi.kodemahasiswa)";

			            $sth = $database->pdo->prepare($Sql);
			            $sth->execute();
			            while($row = $sth->fetch())
			            {
			            	if(!empty($row['kodeuser']))
			            	{
			            		$upload_by = $row['aksesuser'];
			            	}
			            	else
			            	{
			            		$upload_by = "MAHASISWA";
			            	}

			            	// status informasi
			            	$statusinformasi = "";
			            	if($row['statusinformasi'] == 0)
			            	{
			            		$statusinformasi = "Pending";
			            	}
			            	elseif($row['statusinformasi'] == 1)
			            	{
			            		$statusinformasi = "Sudah Diverifikasi";
			            	}
			            	elseif($row['statusinformasi'] == 10)
			            	{
			            		$statusinformasi = "Ditolak";
			            	}


			                echo
			                "
			                <tr>
			                    <td>$no</td>
			                    <td>$row[kodeinformasi]</td>
			                    <td>$upload_by - $row[author]</td>
			                    <td>$row[judulinformasi]</td>
			                    <td>".date("d F Y", strtotime($row['dateaddinformasi']))."</td>
			                    <td>$statusinformasi</td>
			                    <td>
									<div class='btn-group'>
										<a class='btn btn-default btn-xs' href='?page=$arr[prefix]&act=tambah&id=$row[kodeinformasi]'>
											<span class='glyphicon glyphicon-edit'></span>
										</a>
										<a class='btn btn-danger btn-xs' href='$aksi?act=hapus&id=$row[kodeinformasi]' onClick=\"return confirm('Hapus data $row[kodeinformasi] ?')\">
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
			</div>
		</div>
		<div class="box-footer">
			<a class="btn btn-default" href="?page=home"><span class="fa fa-backward"></span> KEMBALI</a>
			<a class="btn btn-danger" href="?page=<?= $arr['prefix'] ?>&act=tambah"><span class="fa fa-plus"></span> TAMBAH</a>
		</div>
	</div>
</div>
