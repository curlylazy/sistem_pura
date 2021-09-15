
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

<div class="col-md-12">
	<div class="box box-success">
		<div class="box-body">
			<div class="table-responsive col-md-12">
			    <table class="table table-condensed" id="tabelData">
			        <thead>
			            <th>No</th>
			            <th>Kode</th>
			            <th>Nama Pura</th>
			            <th>Jenis</th>
			            <th>Provinsi</th>
			            <th>Kabupaten</th>
						<th>Add By</th>
			            <th>More</th>
			        </thead>
			        <tbody>
			            <?php
			            # Query
			            $no = 1;
			            $Sql = " SELECT * FROM tbl_pura
								 INNER JOIN tbl_user ON (tbl_user.kodeuser = tbl_pura.kodeuser)";

			            $sth = $database->pdo->prepare($Sql);
			            $sth->execute();
			            while($row = $sth->fetch())
			            {
							// pengaturan button
							$btn_aksi = "";
							if($_SESSION['akses'] == 'ADMIN')
							{
								$btn_aksi = "
								<div class='btn-group'>
									<a class='btn btn-default btn-xs' href='?page=$arr[prefix]&act=tambah&id=$row[kodepura]'>
										<span class='glyphicon glyphicon-edit'></span>
									</a>
									<a class='btn btn-danger btn-xs' href='$aksi?act=hapus&id=$row[kodepura]' onClick=\"return confirm('Hapus data $row[kodepura] ?')\">
									<span class='glyphicon glyphicon-remove'></span></a>
								</div>";
							}
							else
							{
								$btn_aksi = "
								<div class='btn-group'>
									<a class='btn btn-default btn-xs' href='?page=$arr[prefix]&act=tambah&id=$row[kodepura]'>
										<span class='glyphicon glyphicon-list'></span>
									</a>
								</div>";
							}

			                echo
			                "
			                <tr>
			                    <td>$no</td>
			                    <td>$row[kodepura]</td>
			                    <td>$row[namapura]</td>
			                    <td>$row[jenispura]</td>
			                    <td>$row[provinsi]</td>
			                    <td>$row[kabupaten]</td>
								<td>$row[namauser]</td>
			                    <td>
									$btn_aksi
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
			<a class="btn btn-success" href="?page=<?= $arr['prefix'] ?>&act=tambah"><span class="fa fa-plus"></span> TAMBAH</a>
		</div>
	</div>
</div>
